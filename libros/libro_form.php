<?php
include('includes/class/Libro.php');
$libro = new Libro();
$libro_categoria = $libro->getCategoria();

if (isset($_POST) && !empty($_POST)) {
    $libro->guardarLibro($_POST);
} else {
    echo 'aun no se ha creado form';
}



?>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-6" style="border: 1px solid red">
            <div>
                <h3>Crear Nuevo Libro</h3>
            </div>
            <form method="POST">
                <div class="form-group">
                    <label>Autor:</label>
                    <select class="form-control" id="idAutor" name="id_autor">
                        <option value="1">García Martin</option>
                        <option value="2">Guía</option>
                        <option value="3">Gutiérrez Solana</option>
                        <option value="4">Guy Verhofstadt</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre del libro:</label>
                    <input type="text" class="form-control" id="nomLibro" name="nom_libro" placeholder="Ej: Gabriel Garcia">
                </div>
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="number" class="form-control" id="valor" name="valor" placeholder="Ej: 124.000">
                </div>
                <div class="form-group">
                    <label>Descripcion:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="1" rows="2">
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Fecha:</label>
                    <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion">
                </div>
                <div class="form-group">
                    <label>Categoria:</label>
                    <select class="form-control" id="idCategoria" name="id_categoria">
                    <?php
                    while($value  = mysqli_fetch_object($libro_categoria)){
                        var_dump( $value->id_categoria);
                        echo "<option value='$value->id_categoria'>$value->nom_categoria</option>";
                    }
                    ?>
                    </select>
                </div>
                <input type="hidden" id="id_usuario" name="id_usuario" value="1">
                <button class="btn btn-success">CREAR</button>
            </form>
        </div>
    </div>
</div>