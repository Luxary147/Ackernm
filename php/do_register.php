<?php

$nick = $_POST['nick'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];


  if($pass != $pass2){
    die("Las contraseñas no coinciden");
  }

$sql = "INSERT INTO tUser (name, email, encrypted_password) VALUES  (?, ?, ?)";
$stmt = $mysqli -> prepare($sql);
$pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
$stmt -> bind_param("sss", $name, $email, $pass);
$stmt -> execute();
$stmt -> close();
  


header("Location: register.php")
?>


