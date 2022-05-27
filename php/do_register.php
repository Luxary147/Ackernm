<?php
$db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$nick = $_POST['nick'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

if (strlen($pass) > 6 ){
    
      if($pass != $pass2){
        die("Las contraseñas no coinciden");
          
      }else{
            $sql = "INSERT INTO Tusuario (nombre, contraseña, email) VALUES  (?, ?, ?)";
            $stmt = $db -> prepare($sql);
            $passH = password_hash($_POST['pass'], PASSWORD_BCRYPT);
            $stmt -> bind_param('sss', $nick, $passH, $email);
            $stmt -> execute();
            $stmt -> close();
            //header("Location: login.php");
            header("Refresh: 15; login.php");
 
            echo 'Esto ha esperado';
      }
  }else{
    echo ("La contraseña es demasiado corta");
 }
//echo ('<p id="mensaje" > Usuario creado Con Exito </p>');
    
?>

<a href="register.php"> Volver al registro</a>


