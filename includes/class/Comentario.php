<?php
include_once('class_bd.php');
class Comentario  
{
    public $id_libro;
    public $comentario;
    private $conn;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    function guardarComentario($id_libro, $data){
        $comentario = $data['comentario'];

        $sql = "INSERT INTO tb_comentarios (id_libro, comentario) VALUES ($id_libro, '$comentario')";
        return mysqli_query($this->conn, $sql);
    }

    function getComentarios($id_libro){
        $sql = "SELECT * FROM tb_comentarios where id_libro = $id_libro order by (fec_cre) DESC";
        return mysqli_query($this->conn, $sql);
    }
    
}
