<?php
include('class_bd.php');
class Libro  
{
    public $idAutor;
    public $nomLibro;
    public $valor;
    public $descripcion;
    public $fecha_publicacion;
    public $idCategoria;
    public $idUsuario;
    public $conn;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    function guardarLibro($data){
        $idAutor = $data['idAutor'];
        $nomLibro = $data['nomLibro'];
        $valor = $data['valor'];
        $fecha_publicacion = $data['fecha_publicacion'];
        $idCategoria = $data['idCategoria'];
        $idUsuario = $data['idUsuario'];
        $descripcion = $data['descripcion'];

        $sql = "INSERT INTO tb_libros (id_autor, nom_libro, valor, fec_publicacion, id_categoria, id_usuario_cre, descripcion) 
                VALUES($idAutor, '$nomLibro', $valor, '$fecha_publicacion', $idCategoria, $idUsuario,'$descripcion')";
        return mysqli_query($this->conn, $sql);
        
    }

    function getLibro($id){
        $sql = "SELECT tb_libros.*, nom_autor, nom_categoria FROM tb_libros
        INNER JOIN tb_autores on tb_libros.id_autor = tb_autores.id_autor
        INNER JOIN tb_categorias on tb_libros.id_categoria = tb_categorias.id_categoria
        WHERE id_libro = $id";
        return  mysqli_fetch_object(mysqli_query($this->conn, $sql));
    }

    function getLibros(){
        $sql = "SELECT * FROM tb_libros";
        return mysqli_query($this->conn,$sql);
    }

    function delete($id){
        $sql = "DELETE FROM tb_libros where id_libro = $id";
        return mysqli_query($this->conn, $sql);
    }

    function update($data){
        $idAutor = $data['idAutor'];
        $nomLibro = $data['nomLibro'];
        $valor = $data['valor'];
        $fecha_publicacion = $data['fecha_publicacion'];
        $idCategoria = $data['idCategoria'];
        $idUsuario = $data['idUsuario'];
        $descripcion = $data['descripcion'];
        $idLibro = $data['idLibro'];

        $sql = "UPDATE tb_libros SET nom_libro = '$nomLibro', valor = '$valor', fec_publicacion = '$fecha_publicacion', id_categoria = '$idCategoria', descripcion = '$descripcion'
                WHERE id_libro = $idLibro";
        return mysqli_query($this->conn, $sql);
    }
    function getCategoria()
    {
        $sql = "SELECT id_categoria,nom_categoria FROM tb_categorias";
        return mysqli_query($this->conn,$sql);
    }
    function getLibroByCategoria($categoria){
        $sql = "SELECT * from tb_libros where id_categoria = $categoria";
    }
}
