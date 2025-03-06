<?php

class Conexion {

    private $host = "postgres-db"; // Servidor local
    private $port = "5432";      // Puerto por defecto de PostgreSQL
    private $dbname = "devdb"; // Nombre de tu base de datos
    private $user = "postgres";  // Usuario de PostgreSQL
    private $password = "1993"; // Contraseña del usuario
    public $conexion;

    public function __construct() {
        try {
            // Crear la cadena de conexión
            $urlConexion = "host={$this->host} port={$this->port} dbname={$this->dbname} user={$this->user} password={$this->password}";

            // Conectar a PostgreSQL
            $this->conexion = pg_connect($urlConexion);

            if (!$this->conexion) {
                throw new Exception("❌ Error en la conexión a PostgreSQL");
            } 
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}

?>
