<?php
include('../includes/class/Libro.php');
$libro = new Libro();
if(isset($_POST) && !empty($_POST)){
    $update = $libro->update($_POST);
    if($update){
        header('admin_listado_libros.php');
    } else {
        echo "Error en la actualizacion";
    }
}