<?php

session_start();
if (!isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/session.php");
}

require '../includes/class/class_bd.php';
require '../includes/class/class_util.php';
require '../config.php';
$obj_util = new util();

$id_autor = $_POST['id_autor'];
$nom_libro = ucwords(utf8_encode($_POST['nom_libro']));
$valor = $obj_util->limpia_dato_miles($_POST['valor']);
$descripcion = ucwords(utf8_encode($_POST['descripcion']));
$fecha_publicacion = $_POST['fecha_publicacion'];
$id_categoria = $_POST['id_categoria'];
$correo_user_session = $_POST['id_usuario_consulta'];
$perfil_admin = 1;


// print_r( $id_autor.' '.$nom_libro.' '.$valor.' '.$descripcion.' '.$fecha_publicacion.' '.$id_categoria);exit;

if($id_autor != "" && $nom_libro != "" && $valor != "" && $descripcion != "" && $fecha_publicacion !="" && $id_categoria != ""){
    $conector_bd = new Database();
    $consulta_repetida = "SELECT * FROM tb_libros WHERE nom_libro = '$nom_libro' AND id_categoria = '$id_categoria'";
    $dato_repetido = mysqli_query($conector_bd->conectar(), $consulta_repetida);
    if (mysqli_num_rows($dato_repetido) >= 1) {
        echo 2;
        exit();
    }
    //Validacion de imagenes donde hago las primeras 4 imagenes obligatorias
    $img_valida = FALSE;
    if ($_FILES['imgProducto0']['size'] == 0) {
        echo 3;
        exit();
    }else{
        $img_valida = TRUE;
    }
    
    
    /*Consulta de id del usuario para la auditoria de tablas*/
    $datos_user = mysqli_query($conector_bd->conectar(), 'SELECT id_usuario FROM tb_usuario WHERE correo = "' . $correo_user_session . '" AND id_perfil = '.$perfil_admin);
    while ($fila_datos_user = mysqli_fetch_array($datos_user)) {
        $id_usuario = $fila_datos_user['id_usuario'];
    }
    
    $query1 = "SELECT nom_libro FROM tb_libros WHERE id_categoria = $id_categoria AND nom_libro = '".$nom_libro."'";
    $val_registros = mysqli_query($conector_bd->conectar(), $query1);
    if (mysqli_num_rows($val_registros) == 0) {
        $insert_query = "INSERT INTO tb_libros (id_autor, nom_libro, descripcion, valor, fec_publicacion, id_categoria, id_usuario_cre) VALUES ($id_autor, '$nom_libro', '$descripcion', $valor, '$fecha_publicacion', $id_categoria, $id_usuario)";
        $resultado = mysqli_query($conector_bd->conectar(), $insert_query);
        
        if ($img_valida == TRUE) {
            $ext_permitidas = array("image/jpg", "image/jpeg", "image/png", "image/gif", "image/JPG", "image/JPEG", "image/PNG", "image/GIF");
            $limit_peso_img_kb = 2000 * 1024;
            
            //Despues de haber guardado la imagen consulto la bd para saber que id le corresponde al producto recien creado para asi guardar los datos correspondientes de la respectiva imagen
            $consulta_id_producto = "SELECT id_libro FROM tb_libros WHERE nom_libro = '$nom_libro' AND id_categoria = $id_categoria";
            $registro_producto_creado_query = mysqli_query($conector_bd->conectar(), $consulta_id_producto);
            $id_producto_creado = mysqli_fetch_array($registro_producto_creado_query);
            
            //Se realiza el correspondiente ciclo para proceder a guardar las imagenes en la carpeta correspondiente
            for ($ci = 0; $ci <= 5; $ci++) {
                if ($_FILES['imgProducto' . $ci]['size'] != 0) {
                    $ext_original = explode(".", $_FILES['imgProducto' . $ci]['name']);
                    $extension = end($ext_original);
                    $_FILES['imgProducto' . $ci]['name'] = $nom_libro . "_0" . $ci . "." . $extension;
                    if (in_array($_FILES['imgProducto' . $ci]['type'], $ext_permitidas) && $_FILES['imgProducto' . $ci]['size'] <= $limit_peso_img_kb) {
                        
                        $nombre_producto_carpeta = str_replace(' ', '_', $nom_libro);
                        $carpeta_save = "img_libros/cat" . $id_categoria . "_" . strtolower($nombre_producto_carpeta) . "/";
                        if (!file_exists($carpeta_save)) {
                            mkdir($carpeta_save, 0777, true);
                        }
                        $ruta = $carpeta_save . str_replace(' ', '', $_FILES['imgProducto' . $ci]['name']);
                        $resul_img = move_uploaded_file($_FILES['imgProducto' . $ci]['tmp_name'], $ruta);
                        $nombre_imagen = $_FILES['imgProducto' . $ci]['name'];
                        $ruta_completa_img = "libros/" . $ruta;
                        if ($ci == 0) {
                            $insert_registro_img = "INSERT INTO tb_img_libro (id_libro, nom_archivo_servidor, principal, ruta) VALUES ($id_producto_creado[id_libro], '$nombre_imagen', TRUE, '$ruta_completa_img')";
                            $resul_tb_img = mysqli_query($conector_bd->conectar(), $insert_registro_img);
                        }elseif ($ci == 1 or $ci == 2 or $ci == 3 or $ci == 4 or $ci == 5 or $ci == 6) {
                            $insert_registro_img = "INSERT INTO tb_img_libro (id_libro, nom_archivo_servidor, principal, ruta) VALUES ($id_producto_creado[id_libro], '$nombre_imagen', FALSE, '$ruta_completa_img')";
                            $resul_tb_img = mysqli_query($conector_bd->conectar(), $insert_registro_img);
                        }
                        
                    } else {
                        echo 4;
                        rmdir($carpeta_save);
                        exit();
                    }
                }
            }
        }else{
            echo 5;
            exit();
        }

        mysqli_close($conector_bd->conectar());
        echo 1;
    }
}
