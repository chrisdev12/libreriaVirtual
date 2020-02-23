<?php
if(isset($_GET['id'])){
    require('../includes/class/Libro.php');
    $libro = new Libro();
    $eliminar = $libro->delete($_GET['id']);
    if($eliminar){
        header('Location: admin_listado_libros.php');
    } else {
        echo "Error al al eliminar";
    }
}