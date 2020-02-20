<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location: ../session");
}
include_once 'class_user_session.php';

$userSession = new userSession();
$userSession->closeSession();

header("location: ../session");
?>