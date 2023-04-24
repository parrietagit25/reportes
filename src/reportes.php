<?php 

session_start();

if (!isset($_SESSION["usuario"])) {
  header("Location: login.php");
  exit();
}

require_once("controladores/ReportesController.php");
$reporteController = new ReportesController();

if (isset($_POST['registro_reporte'])) {

    $datos = [];
    $excluir = ['registro_reporte'];
    foreach ($_POST as $clave => $valor) {
        if (!in_array($clave, $excluir)) {
            $datos[$clave] = $valor;
        }
    }

    $reporteController->agregarReporte($datos);
}

if (isset($_POST['eliminar_reporte'])) {
    $reporteController->eliminarReporte($_POST['id']);
}

if (isset($_GET["view"])) {
    $view = $_GET["view"];
  
    switch ($view) {
      case "agregar_reporte":
        require_once("vistas/agregar_reporte.php");
        break;
      case "reportes":
        $reportes = $reporteController->obtenerReportes();
        require_once("vistas/agregar_reporte.php");
        break;
      default:
        $usuarios = $usuarioController->obtenerUsuarios();
        require_once("vistas/agregar_reporte.php");
        break;
    }
  } else {
    $usuarios = $usuarioController->obtenerUsuarios();
    require_once("vistas/agregar_reporte.php");
  }
  