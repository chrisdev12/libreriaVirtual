<?php
session_start();
if (isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/index.php");
}

require_once '../config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio de sesion │ <?php echo $nom_proyecto ?></title>
    <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
    <link rel="stylesheet" href="../styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles/login.css" />
</head>

<body>

    <?php
    include_once '../secciones/navbar.php';
    ?>

    <div class="contenedorPrincipal">
        <div class="contenedorHijo">
            <h3>Inicio de sesion</h3><br>
            <form method="POST" action="back_registro_user.php">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre"><b>Nombre</b></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido"><b>Apellidos</b></label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="user"><b>Correo</b></label>
                    <input type="email" class="form-control" id="user" name="username" required="">
                </div>
                <div class="form-group">
                    <label for="pass"><b>Contraseña</b></label>
                    <input type="password" class="form-control" id="pass" name="password" required="">
                </div>
                <button type="submit" class="btn btn-dark" id="login">Registrar</button>
                <!--<input type="submit" id="btn-submit" value="Crear cuenta">-->
                <span id="result"></span>
            </form>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>