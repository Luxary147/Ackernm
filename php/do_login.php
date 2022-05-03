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

          //header('Location: login.php?login_failed_password=True');
          echo 'La contraseña es incorrecta';

      }
}else{
    echo ("falla aqui");
  }
?>
