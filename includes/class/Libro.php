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

        $sql = "SELECT * FROM tb_libros";
        return mysqli_query($this->conn, $sql);
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

        $id_autor = $data['id_autor'];
        $nom_libro = $data['nom_libro'];
        $valor = $data['valor'];
        $fecha_publicacion = $data['fecha_publicacion'];
        $id_categoria = $data['id_categoria'];
        $id_usuario = $data['id_usuario'];
        $descripcion = $data['descripcion'];
        $id_libro = $data['idLibro'];

        $sql = "UPDATE tb_libros SET nom_libro = '$nom_libro', valor = '$valor', fec_publicacion = '$fecha_publicacion', id_categoria = '$id_categoria', descripcion = '$descripcion'
                WHERE id_libro = $id_libro";
        return mysqli_query($this->conn, $sql);
    }
    function getCategorias()
    {
        $sql = "SELECT id_categoria,nom_categoria FROM tb_categorias";
        return mysqli_query($this->conn,$sql);
    }
    function getLibroByCategoria($categoria){
        $sql = "SELECT * from tb_libros where id_categoria = $categoria";
        return mysqli_query($this->conn, $sql);
    }
    function getAutores(){
        $sql = "SELECT id_autor, CONCAT(nom_autor,apell_autor) as persona FROM tb_autores";
        return mysqli_query($this->conn, $sql);
    }
}
