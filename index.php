<!DOCTYPE html>
<html lang="es" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Consultorios Jurídicos UNIANDES</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="./public/assets/img/favicon/favicon.ico" />



  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="./public/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="./public/assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="./public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="./public/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="./public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="./public/assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="./public/assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="./public/assets/js/config.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="./public/assets/js/face-api.min.js"></script>
  <script src="./public/assets/js/models/face_landmark_68_model-weights_manifest.json"></script>
  <script src="./public/assets/js/models/face_recognition_model-weights_manifest.json"></script>
  <script src="./public/assets/js/models/face_expression_model-weights_manifest.json"></script>
  <script src="./public/assets/js/models/tiny_face_detector_model-weights_manifest.json"></script>
  <script src="./public/assets/js/models/face_landmark_68_model-shard1"></script>
  <script src="./public/assets/js/models/face_landmark_68_model-shard2"></script>
  <script src="./public/assets/js/models/face_landmark_68_model-shard3"></script>
  <script src="./public/assets/js/models/face_landmark_68_model-shard4"></script>
  <script src="./public/assets/js/models/face_landmark_68_model-shard5"></script>
  <script src="./public/assets/js/models/face_recognition_model-shard1"></script>
  <script src="./public/assets/js/models/face_recognition_model-shard2"></script>
  <script src="./public/assets/js/models/face_recognition_model-shard3"></script>
  <script src="./public/assets/js/models/face_recognition_model-shard4"></script>
  <script src="./public/assets/js/models/face_recognition_model-shard5"></script>
  <script src="./public/assets/js/models/face_expression_model-shard1"></script>
  <script src="./public/assets/js/models/face_expression_model-shard2"></script>
  <script src="./public/assets/js/models/face_expression_model-shard3"></script>
  <script src="./public/assets/js/models/face_expression_model-shard4"></script>
  <script src="./public/assets/js/models/face_expression_model-shard5"></script>
  <script src="./public/assets/js/models/tiny_face_detector_model-shard1"></script>
  <script src="./public/assets/js/models/tiny_face_detector_model-shard2"></script>
  <script src="./public/assets/js/models/tiny_face_detector_model-shard3"></script>
  <script src="./public/assets/js/models/tiny_face_detector_model-shard4"></script>
  <script src="./public/assets/js/models/tiny_face_detector_model-shard5"></script>
  
</head>

<body>
  <!-- Content -->
  <form id="frm" class="mb-3" method="POST" enctype="multipart/form-data">
  <video id= "video" width="300" height="300" autoplay style="position: absolute; top:0px"></video>
  

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">

          <!-- Register Card -->
          <button class="btn btn-primary d-block mx-auto mb-3" type="button" id="tomar-captura">CAPTURAR IMAGEN</button>
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="#" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">

                  </span>
                  <span class="app-brand-text demo text-body fw-bolder">Registro de Asistencia</span>
                  
                </a>
                
              </div>
              <!-- /Logo -->

              <div class="mb-3">
                <label for="username" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese su número de cédula" autofocus required />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Tipo de Acceso</label>
                <select name="tipo" id="tipo" class="form-control"></select>
              </div>
              <button class="btn btn-primary d-grid w-100" type="submit">Aceptar</button>

              <hr>
              <p class="text-center">

                <a href="login.php">
                  <span>Inicio de Sesión</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->
  </form>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="./public/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="./public/assets/vendor/libs/popper/popper.js"></script>
  <script src="./public/assets/vendor/js/bootstrap.js"></script>
  <script src="./public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="./public/assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="./public/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="./public/assets/js/index.js"></script>

  <!-- Face Recognition JS -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const video = document.getElementById('video');
      const tomarCapturaBtn = document.getElementById('tomar-captura');

      async function startVideo() {
        if (navigator.mediaDevices.getUserMedia) {
          navigator.mediaDevices
            .getUserMedia({
              video: true
            })
            .then((stream) => {
              video.srcObject = stream;
            })
            .catch((err) => {
              console.log('Error: ', err);
            });
        }
      }

      startVideo();

      tomarCapturaBtn.addEventListener('click', async () => {
        const canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        const base64Image = canvas.toDataURL('image/jpeg');

        const response = await fetch('guardar_captura.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            imagen: base64Image
          })
        });

        if (response.ok) {
          console.log('Captura guardada correctamente');
        } else {
          console.error('Error al guardar la captura');
        }
      });
    });
  </script>
</body>

</html>