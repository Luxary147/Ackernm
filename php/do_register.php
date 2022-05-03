<?php

//ini_set('display_errors', 'On');
//require __DIR__ . '/../php/db_connection.php';
//$mysqli = get_db_connection_or_die();

$db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$nick = $_POST['nick'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

  if($pass != $pass2){
    die("Las contraseñas no coinciden");
  }

$sql = "INSERT INTO Tusuario (nick, email, contraseña) VALUES  (?, ?, ?)";
$stmt = $db -> prepare($sql);
$passH = password_hash($_POST['pass'], PASSWORD_BCRYPT);
$stmt -> bind_param('sss', $nick, $email, $passH);
$stmt -> execute();
$stmt -> close();
  

header("Location: register.php")
?>


