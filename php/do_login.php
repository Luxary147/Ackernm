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

  $email_posted = $_POST['l_email'];
  $password_posted = $_POST['l_password'];

  $query = "SELECT id, contraseña FROM Tusuario WHERE email = '".$email_posted."'";
  $result = mysqli_query($db, $query) or die('Query error');

  if (mysqli_num_rows($result) > 0) {
     $only_row = mysqli_fetch_array($result);
    
      if (password_verify($password_posted, $only_row[1])) {
          session_start();
          $_SESSION['user_id'] = $only_row[0];
          header("Location: main.php");

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
