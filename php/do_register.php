<?php

ini_set('display_errors', 'On');
require __DIR__ . '/../php/db_connection.php';

$mysqli = get_db_connection_or_die();

$nick = $_POST['nick'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];


  if($pass != $pass2){
    die("Las contraseñas no coinciden");
  }

$sql = "INSERT INTO Tusuario (nick, email, encrypted_password) VALUES  (?, ?, ?)";
$stmt = $mysqli -> prepare($sql);
$pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
$stmt -> bind_param("sss", $nick, $email, $pass);
$stmt -> execute();
$stmt -> close();
  


header("Location: register.php")
?>


