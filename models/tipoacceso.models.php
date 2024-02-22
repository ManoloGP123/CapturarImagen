<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class TipoAccesos
{
    
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Tipo_Acceso`";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }
    
    public function uno($IdparaAcceso)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Tipo_Acceso` WHERE `IdparaAcceso`=$IdparaAcceso";
        $datos = mysqli_query($con, $cadena);
        return $datos;
        $con->close();
    }

    public function Insertar($Detalle)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `Tipo_Acceso`(`Detalle`) VALUES ('$Detalle')";

        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return mysqli_error($con);
        }
        $con->close();
    }

    public function Actualizar($IdparaAcceso, $Detalle)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "UPDATE `Tipo_Acceso` SET `Detalle`='$Detalle' WHERE `IdparaAcceso`=$IdparaAcceso";
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
        $con->close();
    }
    
    public function Eliminar($IdparaAcceso)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Tipo_Acceso where IdparaAcceso = $IdparaAcceso";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
        $con->close();
    }
}
