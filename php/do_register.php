<?php
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

$sql = "INSERT INTO Tusuario (nombre, contraseña, email) VALUES  (?, ?, ?)";
$stmt = $db -> prepare($sql);
$passH = password_hash($_POST['pass'], PASSWORD_BCRYPT);
$stmt -> bind_param('sss', $nick, $passH, $email);

echo ("bind_param");
$stmt -> execute();
echo ("ejecucion");
$stmt -> close();
  
echo ("Usuario Registrado con exito");

sleep(15);

header("Location: login.php")
?>


