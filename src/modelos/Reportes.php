<?php

require_once("Conexion.php");

class Reporte extends Conexion {
    private $conn;

    public function __construct() {
      $this->conn = $this->conectar();
    }

    public function __destruct() {
        $this->conn->close();
    }

    public function agregarReporte($tabla, $datos) {
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

    function actualizarReporte($tabla, $id, $datos) {
        $set_values = "";
        foreach ($datos as $column => $value) {
            $set_values .= "$column = ?, ";
        }
        $set_values = rtrim($set_values, ", ");
        $sql = "UPDATE $tabla SET $set_values WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $i = 1;
        foreach ($datos as $value) {
            $stmt->bindValue($i, $value);
            $i++;
        }
        $stmt->bindValue($i, $id);
        $resultado = $stmt->execute();
        echo 'Registro Actualizado';
        return $resultado;
    }
    
    function eliminarReporte($tabla, $id) {
        $result = $this->conn->query("DELETE FROM $tabla WHERE id = $id");
        echo 'Registro Eliminado';
        return $result;
    }
    
    function obtenerReporte($tabla, $id) {
        $result = $this->conn->query("SELECT * FROM $tabla WHERE id = $id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function obtenerReportes($tabla) {

        if($_SESSION["usuario"]["tipo_user"]=="admin"){
            $result = $this->conn->query("SELECT r.id, r.fecha, r.titulo, u.nombre FROM $tabla r inner join usuarios u on u.id = r.id_user WHERE r.stat = 1");
        }else{
            $result = $this->conn->query("SELECT r.id, r.fecha, r.titulo, u.nombre FROM $tabla r inner join usuarios u on u.id = r.id_user WHERE r.stat = 1 and r.id_user = '".$_SESSION["usuario"]["id"]."'");
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
}