<?php
include_once('class_bd.php');
class Libro  

{
    public $id_autor;
    public $nom_libro;
    public $valor;
    public $descripcion;
    public $fecha_publicacion;
    public $id_categoria;
    public $id_usuario;
    public $conn;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    function guardarLibro($data)
    {
        $id_autor = $data['id_autor'];
        $nom_libro = $data['nom_libro'];
        $valor = $data['valor'];
        $fecha_publicacion = $data['fecha_publicacion'];
        $id_categoria = $data['id_categoria'];
        $id_usuario = $data['id_usuario'];
        $descripcion = $data['descripcion'];
        $aa = "";

        if (!isset($nom_libro) && empty($nom_libro)) {
            $aa = "llenar todos los campos ....";
            return $aa;
        } else {
            $sql = "INSERT INTO tb_libros (id_autor, nom_libro, valor, fec_publicacion, id_categoria, id_usuario_cre, descripcion) 
                VALUES($id_autor, '$nom_libro', $valor, '$fecha_publicacion', $id_categoria, $id_usuario,'$descripcion')";
            return mysqli_query($this->conn, $sql);
        }
    }

    function getLibro($id){
        $sql = "SELECT L.*, A.nom_autor, C.nom_categoria, IL.nom_archivo_servidor FROM tb_libros L 
        INNER JOIN tb_autores A on L.id_autor = A.id_autor 
        INNER JOIN tb_categorias C on L.id_categoria = C.id_categoria 
        INNER JOIN tb_img_libro IL on L.id_libro = IL.id_libro 
        WHERE L.id_libro = $id";
        return  mysqli_fetch_object(mysqli_query($this->conn, $sql));

    }

    function getLibros(){

        $sql = "SELECT L.*, A.nom_autor, C.nom_categoria FROM tb_libros L 
        INNER JOIN tb_autores A on L.id_autor = A.id_autor 
        INNER JOIN tb_categorias C on L.id_categoria = C.id_categoria";
        return mysqli_query($this->conn, $sql);
    }

    function getDetalleLibro($id){
        $sql = "SELECT L.*, A.nom_autor, C.nom_categoria FROM tb_libros L 
        INNER JOIN tb_autores A on L.id_autor = A.id_autor 
        INNER JOIN tb_categorias C on L.id_categoria = C.id_categoria 
        WHERE L.id_libro = $id";
        return mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function delete($id)
    {
        $sql = "DELETE FROM tb_libros where id_libro = $id";
        return mysqli_query($this->conn, $sql);
    }
    
    function getLibroImg($id){
        $sql = "SELECT ruta FROM tb_img_libro where id_libro=$id limit 1";
        //return mysqli_fetch_object(mysqli_query($this->conn, $sql));
        return mysqli_fetch_array(mysqli_query($this->conn, $sql));
    }

    function update($data)
    {
        $id_libro = $data['id_libro'];
        $id_autor = $data['id_autor'];
        $nom_libro = $data['nom_libro'];
        $valor = $data['valor'];
        $fecha_publicacion = $data['fecha_publicacion'];
        $id_categoria = $data['id_categoria'];
        $descripcion = $data['descripcion'];

        $sql = "UPDATE tb_libros SET id_autor = $id_autor, nom_libro = '$nom_libro', valor = '$valor', fec_publicacion = '$fecha_publicacion', id_categoria = '$id_categoria', descripcion = '$descripcion'
                WHERE id_libro = $id_libro";
        return mysqli_query($this->conn, $sql);
    }
    function getCategoria()
    {
        $sql = "SELECT id_categoria,nom_categoria FROM tb_categorias";
        return mysqli_query($this->conn,$sql);
    }
    
    function getCategoriaById($id){ //Traer solo la categoria con el id seleccionado
        $sql = "SELECT * FROM tb_categorias WHERE id_categoria = $id";
        return mysqli_fetch_object(mysqli_query($this->conn,$sql));
    }
    
    function updateCategoriaById($id,$data){
        $nombre = $data['nom_categoria'];
        $sql = "UPDATE tb_categorias SET nom_categoria = '$nombre' 
        WHERE id_categoria = $id";
        return mysqli_query($this->conn,$sql);
    }
    
    function addCategoria($data){
        $nombre = $data['nom_categoria'];
        $sql = "INSERT INTO tb_categorias (nom_categoria) VALUES('$nombre')";
        return mysqli_query($this->conn,$sql);
    }
    
    //Traer todos los libros del mismo id_categoria con el nombre de la
    //categoria, la imagen del libro y ordenados de menos a mayor por su nombre
    function getLibrosByCategoria($categoria){
        $sql = "SELECT lib.id_libro, lib.nom_libro, lib.descripcion,
        lib.valor, cat.nom_categoria
        from tb_libros lib INNER JOIN tb_categorias cat on 
        lib.id_categoria = cat.id_categoria where lib.id_categoria = $categoria 
        ORDER BY lib.nom_libro ASC";   
        return mysqli_query($this->conn,$sql);
    }
    
    function getAutores(){
        $sql = "SELECT id_autor, CONCAT(nom_autor,' ',apell_autor) as persona FROM tb_autores";
        return mysqli_query($this->conn, $sql);
    }
}