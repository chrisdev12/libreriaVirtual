<?php
 include_once '../includes/class/class_bd.php';
 
 $conector_bd = new Database();
 
 $nombre = ucwords($_POST["nombre"]);
 $apellido = ucwords($_POST["apellido"]);
 $correo = $_POST["username"];
 $pass_registro = password_hash($_POST["password"], PASSWORD_DEFAULT);
 $tipo_usuario = 2;
 
 //vericamos que el correo que se esta tratando de registrar no exista en la bd
 $verificar_correo = mysqli_query($conector_bd->conectar(), "SELECT correo FROM tb_usuario WHERE correo = '$correo'");
 if(mysqli_num_rows($verificar_correo) > 0){
    echo '  
        <script>
            alert("El correo ingresado ya esta registrado.");
            location.href="http://localhost/libreriaVirtual/session.php";
        </script>
    ';
    exit;
}
//Creacion del query para insertar el dato en la tabla
$insert_query = "INSERT INTO tb_usuario (nom_usuario, apell_usuario, correo, pass, id_perfil) VALUES ('$nombre', '$apellido', '$correo', '$pass_registro', $tipo_usuario)";

//ejecucion de la consulta
$resultdo = mysqli_query($conector_bd->conectar(), $insert_query);
if(!$resultdo){
    echo 'Error al registrar, comuniquese con el administrador';
}else{
    echo '  
        <script>
            alert("Usuario registrado correctamente.");
            location.href="http://localhost/libreriaVirtual/session.php";
        </script>
    ';
}
mysqli_close($conector_bd->conectar());