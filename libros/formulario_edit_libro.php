<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/session.php");
}
include('../includes/class/Libro.php');
include('../includes/class/class_libro_foto.php');
require_once '../config.php';
require_once '../includes/class/class_bd.php';

if(isset($_GET['id'])){
    $libro = new Libro();
    $getLibro = $libro->getDetalleLibro($_GET['id']);
    $libro_categoria = $libro->getCategoria();
    $libro_autor = $libro->getAutores();
    $libro = new Libro();
    if(isset($_POST) && !empty($_POST)){
        $update = $libro->update($_POST);
        if($update){
            header('Location: admin_listado_libros.php');
        } else {
            echo "Error en la actualizacion";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/estilo_form_libros.css">
    <title>Formulario de edición</title>
</head>

<body>
    <section>
        <?php
        include '../secciones/navbar.php';
        ?>
    </section>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6 card" style="margin: 20px 0 0; padding: 10px">
                <div>
                    <h3>Editar libro: <?=$getLibro->nom_libro?></h3>
                </div>
                <form method="POST" name="formProducto" id="formProducto" enctype="multipart/form-data">
                    <input type="hidden" name="id_libro" value="<?=$getLibro->id_libro?>">
                    <div class="form-group">
                        <label>Autor:</label>
                        <select class="form-control" id="id_autor" name="id_autor" onkeyup="val_input(1);">
                            <option value="<?=$getLibro->id_autor?>"><?=$getLibro->nom_autor?></option>
                            <?php
                            while ($value = mysqli_fetch_object($libro_autor)) {
                                echo "<option value='$value->id_autor'>" . utf8_decode($value->persona) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nombre del libro:</label>
                        <input type="text" class="form-control" id="nom_libro" value="<?=$getLibro->nom_libro?>"
                            name="nom_libro" placeholder="Ej: Gabriel Garcia" onkeyup="val_input(2);">
                    </div>
                    <div class="form-group">
                        <label>Precio:</label>
                        <input type="text" class="form-control" id="valor" value="<?=$getLibro->valor?>" name="valor"
                            placeholder="Ej: 124.000" onkeyup="val_input(3); formato_miles(this);">
                    </div>
                    <div class="form-group">
                        <label>Descripcion:</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="1" rows="2"
                            onkeyup="val_input(4);"><?=$getLibro->descripcion?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Fecha publicacion del libro:</label>
                        <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion"
                            value="<?=$getLibro->fec_publicacion?>" onkeyup="val_input(5);">
                    </div>
                    <div class="form-group">
                        <label>Categoria:</label>
                        <select class="form-control" id="id_categoria" name="id_categoria" onkeyup="val_input(6);">
                            <option value="<?=$getLibro->id_categoria?>"><?=$getLibro->nom_categoria?></option>
                            <?php
                            while ($value  = mysqli_fetch_object($libro_categoria)) {
                                var_dump($value->id_categoria);
                                echo "<option value='$value->id_categoria'>" . utf8_decode($value->nom_categoria) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <input type="hidden" id="id_usuario_consulta" name="id_usuario_consulta"
                        value="<?php echo $_SESSION['user'] ?>">
                    <button type="submit" onclick="val_formulario()" id="btnAjax" name="btnAjax" style="width: 100%"
                        class="btn btn-warning mb-3">Editar</button>
                    <!-- GIF carga ajax -->
                    <div style="text-align: center" class="ordenAjax" id="carga_ajax">
                        <img src="../img/cargando.gif" style="width: 50px;">
                    </div>
                    <!-- Alertas controladas por ajax -->
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert"
                        id="alertNullFormName">
                        <strong>Ingrese el nombre del nuevo libro.</strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert"
                        id="alertNullFormPrice">
                        <strong>Ingrese el precio del nuevo libro.</strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert"
                        id="alertNullFormCategoria">
                        <strong>Seleccione una categoria.</strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert"
                        id="alertNullFormFecPublic">
                        <strong>Ingrese fecha de publicacion del libro</strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert"
                        id="alertNullFormAutor">
                        <strong>Seleccione un autor.</strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert"
                        id="alertNullFormDesc">
                        <strong>Ingrese una descripcion relacionada al libro.</strong>
                    </div>
                    <div class="alert alert-danger animated shake ordenAjax" role="alert" id="ajaxRepetido">
                        <strong>El libro ingresado ya existe en la base de datos.</strong>
                    </div>
                    <div class="alert alert-success animated fadeInLeft ordenAjax" role="alert" id="ajaxCorrecto">
                        <strong>Libro actualizado correctamente.</strong>
                    </div>
                    <div class="alert alert-danger animated shake ordenAjax" role="alert" id="ajaxImgNull">
                        <strong>Tiene imagenes obligatorias pendientes por escojer.</strong>
                    </div>
                    <div class="alert alert-danger animated shake ordenAjax" role="alert" id="ajaxImgError">
                        <strong>Uno o varios archivos seleccionados tienen una extension erronea o sobrepasa el peso
                            permitido - (2Mb).</strong>
                    </div>
                    <div class="alert alert-danger animated shake ordenAjax" role="alert" id="ajaxImgFatalError">
                        <strong>Error al subir las imagenes, comuniquese con el administrador</strong>
                    </div>
                    <div id="ajax_respuesta">
                        <!-- respuesta ajax... -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section>
        <?php
        include '../secciones/footer.php';
        ?>
    </section>
    <script src="https://bionalmedicalandpets.com/subdominios/zoon.bionalmedicalandpets.com/js/jquery/jquery.min.js">
    </script>
    <script src="../js/bootstrap/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
    //Funcion para formatear los campos numericos a miles
    function formato_miles(input) {
        var num = input.value.replace(/\./g, '');
        if (!isNaN(num)) {
            num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
            num = num.split('').reverse().join('').replace(/^[\.]/, '');
            input.value = num;
        } else {
            input.value = input.value.replace(/[^\d\.]*/g, '');
        }
    };


    function val_formulario() {
        // console.log(document.formProducto.descripcion.value);
        $("#ajaxRepetido").hide("fast");
        $("#ajaxCorrecto").hide("fast");
        $("#ajaxImgNull").hide("fast");
        $("#carga_ajax").hide("fast");
        $("#ajaxImgError").hide("fast");
        if (document.formProducto.id_autor.value == 0) {
            $("#alertNullFormAutor").show("slow");
            document.formProducto.id_autor.style.border = '2px solid red';
            console.log('1');
            return;
        } else if (document.formProducto.nom_libro.value == "") {
            $("#alertNullFormName").show("slow");
            document.formProducto.nom_libro.style.border = '2px solid red';
            console.log('2');
            return;
        } else if (document.formProducto.valor.value == "") {
            $("#alertNullFormPrice").show("slow");
            document.formProducto.valor.style.border = '2px solid red';
            console.log('3');
            return;
        } else if (document.formProducto.descripcion.value == "") {
            $("#alertNullFormDesc").show("slow");
            document.formProducto.descripcion.style.border = '2px solid red';
            console.log('4');
            return;
        } else if (document.formProducto.fecha_publicacion.value == "") {
            $("#alertNullFormFecPublic").show("slow");
            document.formProducto.fecha_publicacion.style.border = '2px solid red';
            console.log('5');
            return;
        } else if (document.formProducto.id_categoria.value == 0) {
            $("#alertNullFormCategoria").show("slow");
            document.formProducto.id_categoria.style.border = '2px solid red';
            console.log('6');
            return;
        }

        llamado_registro_ajax();
    }

    function val_input(input) {
        if (input == 1) {
            $("#alertNullFormAutor").hide("slow");
            document.formProducto.id_autor.style.border = '2px solid #5ab55a';
        } else if (input == 2) {
            $("#alertNullFormName").hide("slow");
            document.formProducto.nom_libro.style.border = '2px solid #5ab55a';
        } else if (input == 3) {
            $("#alertNullFormPrice").hide("slow");
            document.formProducto.valor.style.border = '2px solid #5ab55a';
        } else if (input == 4) {
            $("#alertNullFormDesc").hide("slow");
            document.formProducto.descripcion.style.border = '2px solid #5ab55a';
        } else if (input == 5) {
            $("#alertNullFormFecPublic").hide("slow");
            document.formProducto.fecha_publicacion.style.border = '2px solid #5ab55a';
        } else if (input == 6) {
            $("#alertNullFormCategoria").hide("slow");
            document.formProducto.id_categoria.style.border = '2px solid #5ab55a';
        }
    }
    </script>

</body>

</html>