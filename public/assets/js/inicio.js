const video = document.getElementById('video');
const canvas = document.createElement('canvas');
const ctx = canvas.getContext('2d');
let capturaBase64 = null;

// Inicialización de la cámara
async function startVideo() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
    } catch (err) {
        console.error('Error al iniciar la cámara: ', err);
        // Notificar al usuario del error
        alert('Error al iniciar la cámara, revise su configuración de cámara y permisos.');
    }
}

// Verificar si el navegador soporta getUserMedia
if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
    console.error('getUserMedia no es soportado en este navegador');
    // Notificar al usuario del error
    alert('Su navegador no soporta la API getUserMedia. Por favor, intente con otro navegador.');
} else {
    startVideo();
}

// Cargar modelos de faceapi y luego iniciar la cámara
Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('../../public/assets/models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('../../public/assets/models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('../../public/assets/models'),
    faceapi.nets.faceExpressionNet.loadFromUri('../../public/assets/models')
]).then(startVideo);

// Dibujar rostros detectados en el canvas
video.addEventListener('play', () => {
    const displaySize = { width: video.width, height: video.height };
    faceapi.matchDimensions(canvas, displaySize);
    let intervalId = setInterval(async () => {
        const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks();
        const resizedDetections = faceapi.resizeResults(detections, displaySize);
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        faceapi.draw.drawDetections(canvas, resizedDetections);
        faceapi.draw.drawFaceLandmarks(canvas, resizedDetections);
        if (resizedDetections.length > 0) {
            // Si se detecta un rostro, tomar una captura
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
            capturaBase64 = canvas.toDataURL('image/jpeg');
            clearInterval(intervalId); // Detener la detección de rostros
            guardarCaptura(); // Guardar la captura en la base de datos
        }
    }, 100);

    // Limpiar intervalo cuando la página se cierra o cambia
    window.addEventListener('unload', () => {
        clearInterval(intervalId);
    });

    // Solicitar permiso al usuario para acceder a la cámara
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(error => {
            console.error('Error al iniciar la cámara: ', error);
            // Notificar al usuario del error
            alert('Error al iniciar la cámara. Por favor, revise su configuración de cámara y permisos.');
        });

    // Verificar si el navegador soporta getUserMedia
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        console.error('getUserMedia no es soportado en este navegador');
        // Notificar al usuario del error
        alert('Su navegador no soporta la API getUserMedia. Por favor, intente con otro navegador.');
    }
});

function guardarCaptura() {
    // Enviar la captura a tu servidor y guardarla en la base de datos
    fetch('guardar_captura.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ captura: capturaBase64 })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Captura guardada exitosamente
            alert('Captura guardada exitosamente.');
        } else {
            // Error al guardar la captura
            alert('Error al guardar la captura.');
        }
    })
    .catch(error => {
        console.error('Error al enviar la captura: ', error);
        // Notificar al usuario del error
        alert('Error al enviar la captura.');
    });
}


