<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/tipoacceso.models.php");
error_reporting(0);

$TipoAccesos = new TipoAccesos;
switch ($_GET["op"]) {
        /*TODO:Listar todos los registros */
    case 'todos':
        $data = array();
        $datos = $TipoAccesos->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        /*TODO: Sacar un registro */
    case 'uno':
        $IdparaAcceso = $_POST["IdparaAcceso"];
        $datos = array();
        $datos = $IdparaAcceso->uno($IdparaAcceso);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        /*TODO: Para insertar */
    case 'insertar':

        $Detalle = $_POST["Detalle"];

        $datos = array();
        $datos = $IdparaAcceso->Insertar($Detalle);
        echo json_encode($datos);
        break;
        /*TODO: actualizar */
    case 'actualizar':
        $IdparaAcceso = $_POST["IdparaAcceso"];
        $Detalle = $_POST["Detalle"];

        $datos = array();
        $datos = $TipoAccesos->Actualizar($IdparaAcceso, $Detalle);
        echo json_encode($datos);
        break;
        /*TODO: Eliminar */
    case 'eliminar':
        $IdparaAcceso = $_POST["IdparaAcceso"];
        $datos = array();
        $datos = $TipoAccesos->Eliminar($IdparaAcceso);
        echo json_encode($datos);
        break;
}
