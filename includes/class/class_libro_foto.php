<?php
    include_once 'class_bd.php';
    class libroFoto{

        public $id_libro;
        public $nom_archivo_subido;
        public $nom_archivo_servidor;
        public $ruta;
        
        function __construct() {
            $db = new Database();
            $this->conn = $db->conectar();
        }

        function guardarFoto($data){
            $id_libro = $data['id_libro'];
            $nom_archivo_subido = $data['nom_archivo_subido'];
            $nom_archivo_servidor = $data['nom_archivo_servidor'];
            $ruta = $data['ruta'];

            $sql = "INSERT INTO tb_img_libro (id_libro, nom_archivo_subido, nom_archivo_servidor, ruta) 
            VALUES ($id_libro,'$nom_archivo_subido','$nom_archivo_servidor','$ruta')";
            return mysqli_query($this->con, $sql);
        }
    }
?>