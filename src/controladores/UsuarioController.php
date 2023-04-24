<?php
if (isset($modalDocu) && $modalDocu == 1) {
    require_once("../../modelos/Usuario.php");
}else{
    require_once("modelos/Usuario.php");
}

class UsuarioController {
  private $usuarioModel;
  private $tabla_tipos;
  private $tabla_usuarios;

    public function __construct() {
        $this->usuarioModel = new Usuario();
        $this->tabla_tipos = "tipos";
        $this->tabla_usuarios = "usuarios";
    }

    public function obtenerUsuarios() {
        return $this->usuarioModel->obtenerUsuarios();
    }

    public function actualizarUsuario($datos) {
        
        if ($datos['password']== '') {
            unset($datos['password']);
        }else{
            $hashed_password = password_hash($datos['password'], PASSWORD_DEFAULT);
            $datos['password'] = $hashed_password; 
        }

        $id_user = $datos['id_usuario'];
        unset($datos['id_usuario']);

        $this->usuarioModel->actualizar($this->tabla_usuarios, $id_user, $datos);
    }

    public function eliminarUsuario($id) {
        $this->usuarioModel->eliminarUsuario($id);
    }

    public function obtenerUsuario($id) {
        return $this->usuarioModel->obtenerUsuario($id);
    }

    public function autenticar($email, $password) {
        return $this->usuarioModel->autenticar($email, $password);
    }

    public function obtenerTipos(){
        return $this->usuarioModel->obtenerTodos($this->tabla_tipos);
    } 
    public function agregar_usuario($datos){
        $datos["stat"]= 1;
        return $this->usuarioModel->agregar($this->tabla_usuarios, $datos);
    }
}