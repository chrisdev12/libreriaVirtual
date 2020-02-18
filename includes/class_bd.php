<?php
class Database  
{
    public $host = 'localhost';
    public $user = 'root_libreriaBIT';
    public $pass = 'Blo2SonNT@2508';
    public $db = 'Libreria_BIT';
    private $conn;

    function __construct()
    {
        $this->conn = $this->conectar();
        return $this->conn;
    }

    /**
     * Método que nos permite conectarnos a la DB
     * @return $conn -> Conexión a la BD
     */

    function conectar(){
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if(mysqli_connect_error()){
            echo "Error en la conexion" . mysqli_connect_error();
        }
        return $conn;
    }
}
