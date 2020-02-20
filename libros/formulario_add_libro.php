<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/session.php");
}
require '../config.php';
require '../includes/class/class_bd.php';


$administracion = true;


include('../includes/class/Libro.php');
include('../includes/class/class_libro_foto.php');
$libro = new Libro();
$libroFoto = new libroFoto();

$libro_categoria = $libro->getCategoria();
$libro_autor = $libro->getAutores();

if (isset($_POST) && !empty($_POST)) {
    $libro->guardarLibro($_POST);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agregar libro&nbsp;|&nbsp;<?php echo $nom_proyecto ?></title>
    <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Estilos adicionales -->
</head>

<body>
    <?php
    include '../navbar.php';
    ?>

    <div class="container-fluid" style="text-align: center;">
        <div class="row">
            <div class="col-12">
                <h1>CREAR LIBRO</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
            <form method="POST" name="formProducto" id="formProducto" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="newLibro">Nuevo libro</label>
                            <input type="text" class="form-control" id="newLibro" name="newLibro" placeholder="Ingrese libro a registrar" onkeyup="val_input(1)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="newPrecio">Precio</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><strong>$</strong></div>
                                </div>
                                <input type="text" class="form-control" id="newPrecio" name="newPrecio" placeholder="Precio" onkeyup="val_input(2); formato_miles(this);">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState">Categoria</label>
                            <select id="inputState" class="form-control" name="newCategoria" id="newCategoria" onchange="val_input(3)">
                                <option selected disabled="" value="0">Seleccione Categoria</option>
                                <?php
                                $conector_bd = new DB_zoon();
                                $query_consulta_cat = 'SELECT CA.id_categoria, CA.nom_categoria FROM tb_categoria CA
                                                            WHERE CA.id_est_registro = 1
                                                            ORDER BY CA.id_categoria DESC';
                                $con_categorias = mysqli_query($conector_bd->connectBD(), $query_consulta_cat);
                                while ($fila_datos_categoria = mysqli_fetch_array($con_categorias)) {
                                    echo "<option value='" . $fila_datos_categoria['id_categoria'] . "'>" . utf8_encode($fila_datos_categoria['nom_categoria']) . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="newDesc">Descripción</label>
                        <textarea class="form-control" id="newDesc" name="newDesc" placeholder="Descripcion del producto" rows="3" onkeyup="val_input(4)"></textarea>
                    </div>
                    <!-- Subida de imagenes -->
                    <div class="form-group">
                        <label for="imgProducto">Imagenes para el producto</label>
                    </div>
                    <div class="form-group image-upload" style="text-align: center;">
                        <?php
                        for ($c = 1; $c <= 6; $c++) {
                            echo " 
                                        <label for='imgProducto$c'><img src='../../img/manager/productos/add_img.png' alt='' class='mr-2' title='imagen $c para el producto'></label>
                                        <input type='file' id='imgProducto$c' name='imgProducto$c'>
                                    ";
                        }
                        ?>
                    </div>
                    <button type="button" onclick="val_formulario()" id="btnAjax" name="btnAjax" style="width: 100%" class="btn btn-dark mb-3">Crear</button>
                    <!-- GIF carga ajax -->
                    <div style="text-align: center" class="ordenAjax" id="carga_ajax">
                        <img src="../../img/loading2.gif" style="width: 50px;">
                    </div>
                    <!-- Alertas controladas por ajax -->
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert" id="alertNullFormName">
                        <strong>Ingrese el nombre del nuevo producto.</strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert" id="alertNullFormPrice">
                        <strong>Ingrese el precio del nuevo producto.</strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert" id="alertNullFormCategoria">
                        <strong>Seleccione una categoria.</strong>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show ordenAjax" role="alert" id="alertNullFormDesc">
                        <strong>Ingrese una descripcion relacionada al producto.</strong>
                    </div>
                    <div class="alert alert-danger animated shake ordenAjax" role="alert" id="ajaxRepetido">
                        <strong>El producto ingresado ya existe en la base de datos.</strong>
                    </div>
                    <div class="alert alert-success animated fadeInLeft ordenAjax" role="alert" id="ajaxCorrecto">
                        <strong>Producto registrado correctamente.</strong>
                    </div>
                    <div class="alert alert-danger animated shake ordenAjax" role="alert" id="ajaxImgNull">
                        <strong>Tiene imagenes obligatorias pendientes por escojer.</strong>
                    </div>
                    <div class="alert alert-danger animated shake ordenAjax" role="alert" id="ajaxImgError">
                        <strong>Uno o varios archivos seleccionados tienen una extension erronea o sobrepasa el peso permitido - (2Mb).</strong>
                    </div>
                    <div class="alert alert-danger animated shake ordenAjax" role="alert" id="ajaxImgFatalError">
                        <strong>Error al subir las imagenes, comuniquese con el administrador</strong>
                    </div>
                    <div id="ajax_respuesta">
                        <!-- respuesta ajax... -->
                    </div>
                </form>

                <h1>---------------------------------------</h1>

                <form method="POST">
                    <div class="form-group">
                        <label>Autor:</label>
                        <select class="form-control" id="idAutor" name="id_autor">
                            <?php
                            while ($value = mysqli_fetch_object($libro_autor)) {
                                echo "<option value='$value->id_autor'>$value->persona</option>";
                            }
                            ?>
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
                            while ($value  = mysqli_fetch_object($libro_categoria)) {
                                var_dump($value->id_categoria);
                                echo "<option value='$value->id_categoria'>$value->nom_categoria</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <input type="hidden" id="id_usuario" name="id_usuario" value="1">
                    <button class="btn btn-success">CREAR</button>
                </form>


            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include '../../footer.php';
    ?>
    <script src="../../js/jquery/jquery.min.js"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript">
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
            $("#ajaxRepetido").hide("fast");
            $("#ajaxCorrecto").hide("fast");
            $("#ajaxImgNull").hide("fast");
            $("#carga_ajax").hide("fast");
            $("#ajaxImgError").hide("fast");
            if (document.formProducto.newProducto.value == "") {
                $("#alertNullFormName").show("slow");
                document.formProducto.newProducto.style.border = '2px solid red';
                return;
            } else if (document.formProducto.newPrecio.value == "") {
                $("#alertNullFormPrice").show("slow");
                document.formProducto.newPrecio.style.border = '2px solid red';
                return;
            } else if (document.formProducto.newCategoria.value == 0) {
                $("#alertNullFormCategoria").show("slow");
                document.formProducto.newCategoria.style.border = '2px solid red';
                return;
            } else if (document.formProducto.newDesc.value == "") {
                $("#alertNullFormDesc").show("slow");
                document.formProducto.newDesc.style.border = '2px solid red';
                return;
            }

            llamado_registro_ajax();
        }

        function val_input(input) {
            if (input == 1) {
                $("#alertNullFormName").hide("slow");
                document.formProducto.newProducto.style.border = '2px solid #5ab55a';
            } else if (input == 2) {
                $("#alertNullFormPrice").hide("slow");
                document.formProducto.newPrecio.style.border = '2px solid #5ab55a';
            } else if (input == 3) {
                $("#alertNullFormCategoria").hide("slow");
                document.formProducto.newCategoria.style.border = '2px solid #5ab55a';
            } else if (input == 4) {
                $("#alertNullFormDesc").hide("slow");
                document.formProducto.newDesc.style.border = '2px solid #5ab55a';
            }
        }

        function llamado_registro_ajax() {
            if (document.formProducto.newProducto.value != "" && document.formProducto.newPrecio.value != "" && document.formProducto.newCategoria.value != "" && document.formProducto.newDesc.value != "") {

                var formData = new FormData($("#formProducto")[0]);

                var nom_producto = document.formProducto.newProducto.value;
                var precio = document.formProducto.newPrecio.value;
                var id_categoria = document.formProducto.newCategoria.value;
                var descripcion = document.formProducto.newDesc.value;
                /*{nom_producto:nom_producto,precio:precio,id_categoria:id_categoria,descripcion:descripcion},*/
                $.ajax({

                    type: "POST",
                    url: "crear_producto.php",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $("#carga_ajax").show("fast");
                        $("#ajaxRepetido").hide("fast");
                        $("#ajaxCorrecto").hide("fast");
                        $("#ajaxImgNull").hide("fast");
                        $("#ajaxImgError").hide("fast");
                        $("#ajaxImgFatalError").hide("fast");
                        $("#btnAjax").hide("fast");
                    },

                    success: function(resp) {
                        $("#btnAjax").show("fast");
                        $("#ajaxRepetido").hide("fast");
                        $("#ajaxCorrecto").hide("fast");
                        $("#ajaxImgNull").hide("fast");
                        $("#carga_ajax").hide("fast");
                        $("#ajaxImgError").hide("fast");
                        $("#ajaxImgFatalError").hide("fast");

                        if (resp == 1) {
                            $("#btnAjax").show("fast");
                            $("#carga_ajax").hide("fast");
                            $("#ajaxRepetido").hide("fast");
                            $("#ajaxImgNull").hide("fast");
                            $("#ajaxCorrecto").show("fast");
                            $("#ajaxImgError").hide("fast");
                            $("#ajaxImgFatalError").hide("fast");
                            document.formProducto.newProducto.style.border = '1px solid #ced4da';
                            document.formProducto.newPrecio.style.border = '1px solid #ced4da';
                            document.formProducto.newCategoria.style.border = '1px solid #ced4da';
                            document.formProducto.newDesc.style.border = '1px solid #ced4da';
                            formProducto.reset();
                        } else if (resp == 2) {
                            $("#btnAjax").show("fast");
                            $("#carga_ajax").hide("fast");
                            $("#ajaxRepetido").show("fast");
                            $("#ajaxImgNull").hide("fast");
                            $("#ajaxCorrecto").hide("fast");
                            $("#ajaxImgError").hide("fast");
                            $("#ajaxImgFatalError").hide("fast");
                            document.formProducto.newProducto.style.border = '2px solid red';
                        } else if (resp == 3) {
                            $("#btnAjax").show("fast");
                            $("#ajaxRepetido").hide("fast");
                            $("#ajaxImgNull").show("fast");
                            $("#ajaxCorrecto").hide("fast");
                            $("#carga_ajax").hide("fast");
                            $("#ajaxImgError").hide("fast");
                            $("#ajaxImgFatalError").hide("fast");
                        } else if (resp == 4) {
                            $("#btnAjax").show("fast");
                            $("#ajaxRepetido").hide("fast");
                            $("#ajaxImgNull").hide("fast");
                            $("#ajaxCorrecto").hide("fast");
                            $("#carga_ajax").hide("fast");
                            $("#ajaxImgError").show("fast");
                            $("#ajaxImgFatalError").hide("fast");
                        } else if (resp == 5) {
                            $("#btnAjax").show("fast");
                            $("#ajaxRepetido").hide("fast");
                            $("#ajaxImgNull").hide("fast");
                            $("#ajaxCorrecto").hide("fast");
                            $("#carga_ajax").hide("fast");
                            $("#ajaxImgError").hide("fast");
                            $("#ajaxImgFatalError").show("fast");
                        }

                    }
                });
            }
        }
    </script>
</body>

</html>