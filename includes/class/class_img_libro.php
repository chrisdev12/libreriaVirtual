<?php
include_once('class_bd.php');
class Imagen_libro {

    public $id_img_libro;
    public $id_libro;
    public $nom_archivo_servidor;
    public $ruta;
    public $fec_cre;
    public $principal;
    public $conn;

    function __construct(){
        $db = new Database();
        $this->conn = $db->conectar();
    }
    
    function get_ruta_principal_img_libro($id){
        $sql = "SELECT IRL.ruta, IRL.id_libro FROM tb_img_libro IRL WHERE IRL.id_libro = $id AND IRL.principal = TRUE";
        // print_r($sql.'<br>');
        return  mysqli_query($this->conn, $sql);
    }


    
}