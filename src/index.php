<?php 

session_start();

if (!isset($_SESSION["usuario"])) {
  header("Location: login.php");
  exit();
}

require_once("controladores/UsuarioController.php");
$usuarioController = new UsuarioController();

if (isset($_POST['registro_usuario'])) {
    $datos = $_POST;  
    unset($datos['registro_usuario']);
    $usuarioController->agregar_usuario($datos);
}

if (isset($_POST['editar_usuario'])) {
    $datos = $_POST;  
    unset($datos['editar_usuario']);
    $usuarioController->actualizarUsuario($datos);
}

if(isset($_POST['eliminar_usuario'])){
    $usuarioController->eliminarUsuario($_POST['id']);
}

if (isset($_GET["view"])) {
    $view = $_GET["view"];
  
    switch ($view) {
      case "ver":
        $usuarios = $usuarioController->obtenerUsuarios();
        $tipos = $usuarioController->obtenerTipos();
        require_once("vistas/usuarios.php");
        break;
      case "editar":
        $id = $_GET["id"];
        $usuario = $usuarioController->obtenerUsuario($id);
        require_once("vistas/editar_usuario.php");
        break;
      default:
        $usuarios = $usuarioController->obtenerUsuarios();
        require_once("vistas/usuarios.php");
        break;
    }
  } else {
    $usuarios = $usuarioController->obtenerUsuarios();
    require_once("vistas/principal.php");
  }
  