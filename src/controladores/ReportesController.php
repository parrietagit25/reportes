<?php
if (isset($modalDocu) && $modalDocu == 1) {
    require_once("../../modelos/Reportes.php");
}else{
    require_once("modelos/Reportes.php");
}

class ReportesController {
  private $usuarioModel;
  private $tabla;

    public function __construct() {
        $this->reporteModel = new Reporte();
        $this->tabla = "reportes_pb";
    }

    public function obtenerReportes() {
        return $this->reporteModel->obtenerReportes($this->tabla);
    }

    public function agregarReporte($datos){
        
        $datos['id_user']=$_SESSION['usuario']["id"];
        $datos['stat']=1;
        
        $this->reporteModel->agregarReporte($this->tabla, $datos);
    }

    public function actualizarReporte($id, $datos) {
        $this->reporteModel->actualizarReporte($this->tabla, $id, $datos);
    }

    public function eliminarReporte($id) {
        $this->reporteModel->eliminarReporte($this->tabla, $id);
    }

    public function obtenerReporte($id) {
        return $this->reporteModel->obtenerReporte($this->tabla, $id);
    }
}