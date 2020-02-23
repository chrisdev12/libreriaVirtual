<?php

include_once 'includes/class/class_user.php';
include_once 'includes/class/class_user_session.php';
require_once 'config.php';

$userSession = new userSession();
$user = new user();
if (isset($_SESSION['user'])) {
//    ya existe una sesion por ende se redirige al index
    $nombre_usuario = $user->getNombre();
    
    $user->setUser($userSession->getCurrentUser());
    
    include_once 'index.php';
} else if (isset($_POST['username']) && isset($_POST['password'])) {
    //Validacion del login al momento de dar ingresar
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];
    if($user->userExists($userForm, $passForm)){
        //echo "Usuario valido";
        $userSession->setCurrentUser($userForm);
        print_r($userSession);exit;
        $user->setUser($userForm);
        include_once 'index.php';
    }else{
        //echo "usuario no valido";
        $errorLogin = "Nombre de usuario y/o contraseña incorrecto";
        include_once 'login.php';
    }
} else {
    //echo "login";
    include_once 'login.php';
}

?>