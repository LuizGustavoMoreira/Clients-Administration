<?php
//INICIA A SESSION
session_start();
//DESTROI A SESSIONS
unset($_SESSION['id_user']);
unset($_SESSION['name_user']);
header("location:../index.php");

?>