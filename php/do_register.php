<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            background-color: rgb(106, 105, 105);
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        p{ 
            color:white;
            font-size:32px;
            font-weight: bolder;
            margin-top:12%;
            text-align:center;
        }
    </style>
    <title>Document</title>
</head>

<?php
        $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $nick = $_POST['nick'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];

        if (strlen($pass) > 6 ){

              if($pass != $pass2){
                echo '<p> Las contraseñas no coinciden </p>';
                  header("Refresh: 2; register.php");

              }else{
                    $sql = "INSERT INTO Tusuario (nombre, contraseña, email) VALUES  (?, ?, ?)";
                    $stmt = $db -> prepare($sql);
                    $passH = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                    $stmt -> bind_param('sss', $nick, $passH, $email);
                    $stmt -> execute();
                    $stmt -> close();
                    header("Refresh: 3; login.php");
                    echo '<p> Usuario registrado con Exito </p>';
              }
          }else{
            echo '<p> La contraseña es demasiado corta </p>';
            header("Refresh: 2; register.php");
         }
    
?>
</html>




