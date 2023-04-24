<?php
require_once("Conexion.php");

class Usuario extends Conexion {
  private $conn;

  public function __construct() {
    $this->conn = $this->conectar();
  }

  public function obtenerUsuarios() {
    $result = $this->conn->query("SELECT * FROM usuarios");
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  public function agregarUsuario($nombre, $email, $edad, $password) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre, email, edad, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nombre, $email, $edad, $hashed_password);
    if($stmt->execute()){
      echo 'Ususario Creado'; 
    }
  }

  public function actualizarUsuario($id, $nombre, $email, $edad) {
    $stmt = $this->conn->prepare("UPDATE usuarios SET nombre = ?, email = ?, edad = ? WHERE id = ?");
    $stmt->bind_param("ssii", $nombre, $email, $edad, $id);
    $stmt->execute();
  }

  public function eliminarUsuario($id) {
    $stmt = $this->conn->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo 'Usuario eliminado';
  }

  public function obtenerUsuario($id) {
    $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
  }

  public function autenticar($email, $password) {
    $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $usuario = $result->fetch_assoc();
      if (password_verify($password, $usuario["password"])) {
        return $usuario;
      }
    }

    return null;
  }

  function obtenerTodos($tabla) {

    $result = $this->conn->query("SELECT * FROM $tabla WHERE stat = 1");
    return $result->fetch_all(MYSQLI_ASSOC);

  }

  public function agregar($tabla, $datos) {

    $columnas = implode(", ", array_keys($datos));
    $placeholders = implode(", ", array_fill(0, count($datos), "?"));
    $sql = "INSERT INTO $tabla ($columnas) VALUES ($placeholders)";
    $stmt = $this->conn->prepare($sql);
    $tipos = str_repeat("s", count($datos));
    $params = array_merge([$tipos], array_values($datos));
    $tmp = array();
    foreach ($params as $key => $value) {
        $tmp[$key] = &$params[$key];
    }
    call_user_func_array([$stmt, 'bind_param'], $tmp);
    $resultado = $stmt->execute();
    echo 'Registro Realizados';
    return $resultado;
    
  }

  function actualizar($tabla, $id, $datos) {
    $set_values = "";
    $param_types = "";
    foreach ($datos as $column => $value) {
        $set_values .= "$column = ?, ";
        $param_types .= $this->get_param_type($value);
    }
    $set_values = rtrim($set_values, ", ");
    $sql = "UPDATE $tabla SET $set_values WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    
    $param_values = array_values($datos);
    $param_values[] = $id;
    $param_types .= "i"; // Assuming id is an integer

    $stmt->bind_param($param_types, ...$param_values);

    $resultado = $stmt->execute();
    echo 'Registro Actualizado';
    return $resultado;
  }

  function get_param_type($value) {
    if (is_integer($value)) {
        return "i";
    } elseif (is_double($value)) {
        return "d";
    } elseif (is_string($value)) {
        return "s";
    } else {
        return "b";
    }
  }

}
