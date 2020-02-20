<?php
class Database  
{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $charset;
    
    private $conn;

    public function __construct() {
        $this->host = 'localhost';
        $this->db = 'Libreria_BIT';
        $this->user = 'root';
        $this->password = '';
        $this->charset = 'utf8mb4';
    }
    
    /**
     * Método que nos permite conectarnos a la DB
     * @return $conn -> Conexión a la BD
     */
    function conectar(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if(mysqli_connect_error()){
            echo "Error en la conexion" . mysqli_connect_error();
        }
        return $this->conn;
    }
    
    /** Metdo usado para hacer unicamente el login  - modelo vista controlador para uso de ssession php*/
    function connect_user_session() {
        try {
            $connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];  //Funciones especificas del PDO para generar errores de una forma mas concreta

            $pdo = new PDO($connection, $this->user, $this->password, $options);

            return $pdo;
            
        } catch (PDOException $e) {
            print_r("Error connection: " . $e->getMessage());
        }
    }
}