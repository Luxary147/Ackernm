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
        
        h2{
            color:white;
            font-size:40px;
            font-weight: bolder;
            margin-top:12%;
            text-align:center;
        }
        
       img{
           margin-left:40%;
        }
    </style>
    <title>Document</title>
</head>
  
<?php
  $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

  $email_posted = $_POST['l_email'];
  $password_posted = $_POST['l_password'];

  $query = "SELECT id, contraseña, esencias, fecha_ultimo_login FROM Tusuario WHERE email = '".$email_posted."'";
  $result = mysqli_query($db, $query) or die('Query error');

  if (mysqli_num_rows($result) > 0) {
     $only_row = mysqli_fetch_array($result);
    
      if (password_verify($password_posted, $only_row[1])) {
          session_start();
          $_SESSION['user_id'] = $only_row[0];

          //comprobar si es un inicio de sesion es en una fecha distinta
          $fecha = date('Y-m-d');
            if ($only_row[3] != $fecha ){
          //añadir mas essencias al usuario si las fechas son distintas  (  en este caso , se añadiran 300 esencias mas por cada dia que inicie sesion el usuario )
               $esencias = $only_row[2] + 300;
               $updateE = "UPDATE Tusuario SET esencias ='".$esencias."'WHERE id ='".$_SESSION['user_id']."'";  
               $db->query($updateE);
                
                echo '<h2> Gracias por regresar </h2>' ;
                echo '<p> Se han añadido 300 esencias a tu alijo </p>' ;
            }
          //guardar fecha del inicio de sesion         
          $updateF = "UPDATE Tusuario SET fecha_ultimo_login ='".$fecha."'WHERE id ='".$_SESSION['user_id']."'";  
          $db->query($updateF);
          
          echo '<p> Redirigiendo a la pestaña principal </p>' ;
          echo '<img src="https://github.com/Luxary147/Ackernm/blob/a45fd6d5ec3e36c15aa9870238ce33e84e7db4cd/raw/img/giphy.gif" alt="Cargando">';
          header("Refresh:2; main.php");

      } else {
          echo '<p> La contraseña es incorrecta </p>' ;
          header("Refresh: 3; login.php");

      }
}else{
    echo '<p> No Existe hay ningun usuario registrado con ese email </p>';
    header("Refresh: 3; login.php");
  }
  mysqli_close($db);
?>
  
</html>
