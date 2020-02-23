<?php
include_once('class_bd.php');
class Autor {

    public $nom_autor;
    public $apell_autor;
    public $conn;

    function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    function crearAutor($data){
        $nom_autor = $data['nom_autor'];
        $apell_autor = $data['apell_autor'];

        $sql = "INSERT INTO tb_autores (nom_autor, apell_autor) 
        VALUES('$nom_autor','$apell_autor')";
        return mysqli_query($this->conn, $sql);
    }

}