<?php
session_destroy();
session_start();
if (isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/index.php");
}

require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesion │ <?php echo $nom_proyecto ?></title>
        <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
        <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" href="styles/login.css"/>
    </head>
    <body>

        <div class="contenedorPrincipal">
            <div class="contenedorHijo">
                <h3>Inicio de sesion</h3><br>
                <form method="POST">
                    <div class="form-group">
                        <label for="user"><b>Correo</b></label>
                        <input type="email" class="form-control" id="user" name="username">
                    </div>
                    <div class="form-group">
                        <label for="pass"><b>Contraseña</b></label>
                        <input type="password" class="form-control" id="pass" name="password">
                    </div>
                    <?php
                    if (isset($errorLogin)) {
                        ?>
                        <div class="errorLoginAcces">
                            <p>
                                <?php
                                echo $errorLogin;
                                ?>
                            </p>
                        </div>
                        <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-dark" id="login">Ingresar</button>
                    <span id="result"></span>
                </form>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
    </body>
<?php 

?>
</html>
