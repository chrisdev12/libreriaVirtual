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
    
    function getAllAutores(){
        $sql = "SELECT * FROM tb_autores";
        return mysqli_query($this->conn, $sql); 
    }
    
    function getAutorById($id){ //Traer solo la categoria con el id seleccionado
        $sql = "SELECT * FROM tb_autores WHERE id_autor = $id";
        return mysqli_fetch_object(mysqli_query($this->conn,$sql));
    }
    
    function updateAutorById($id,$data){
        $nombre = $data['nom_autor'];
        $apellido = $data['apell_autor'];
        $sql = "UPDATE tb_autores SET nom_autor = '$nombre', 
        apell_autor = '$apellido'
        WHERE id_autor = $id";
        return mysqli_query($this->conn,$sql);
    }

}