<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: http://localhost/libreriaVirtual/session.php");
}
include_once 'class_user_session.php';

$userSession = new userSession();
$userSession->closeSession();
header("location: http://localhost/libreriaVirtual/session.php");
?>