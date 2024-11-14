<?php
// classConnectionMySQL.php

class ConnectionMySQL {
    // Definición de atributos
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;
    
    public function __construct() {
        // Constructor
        require_once "Config_db.php";
        $this->host = HOST;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->database = DATABASE;
    }
    
    public function CreateConnection() {
        // Método que crea y retorna la conexión a la BD
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_errno) {
            die("Error al conectarse a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error);
        }
    }
    
    public function CloseConnection() {
        // Método que cierra la conexión a la BD
        if ($this->conn) {
            $this->conn->close();
        }
    }
    
    public function ExecuteQuery($sql) {
        // Método que ejecuta una consulta SQL
        if ($this->conn) {
            $result = $this->conn->query($sql);
            if ($this->conn->error) {
                die("Error en la consulta: " . $this->conn->error);
            }
            return $result;
        }
        return false;
    }
    
    public function PrepareStatement($sql) {
        // Método que prepara una declaración SQL
        if ($this->conn) {
            $stmt = $this->conn->prepare($sql);
            if (!$stmt) {
                die("Error en la preparación de la declaración: " . $this->conn->error);
            }
            return $stmt;
        }
        return false;
    }
    
    public function GetCountAffectedRows() {
        // Método que retorna la cantidad de filas afectadas con el último query realizado
        return $this->conn ? $this->conn->affected_rows : 0;
    }
    
    public function GetRows($result) {
        // Método que retorna la última fila de un resultado en forma de arreglo
        return $result ? $result->fetch_assoc() : null;
    }
    
    public function SetFreeResult($result) {
        // Método que libera el resultado del query
        if ($result) {
            $result->free_result();
        }
    }
    
    public function GetLastInsertId() {
        // Método que retorna el último ID insertado
        return $this->conn ? $this->conn->insert_id : 0;
    }
    
    public function EscapeString($str) {
        // Método que escapa una cadena para evitar inyecciones SQL
        return $this->conn ? $this->conn->real_escape_string($str) : $str;
    }
    
    public function getConnection() {
        return $this->conn;
    }
}

?>