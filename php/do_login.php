<?php
  $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

  $email_posted = $_POST['l_email'];
  $password_posted = $_POST['l_password'];

echo ($email_posted);
echo ($password_posted);

  $query = "SELECT id, contraseña FROM Tusuario WHERE email = '".$email_posted."'";

echo ($query);

  $result = mysqli_query($db, $query) or die('Query error');
//el fallo que tengo esta en esta linea 

echo ("hola");

  if (mysqli_num_rows($result) > 0) {
    
    echo ("adios");

      $only_row = mysqli_fetch_array($result);

      if (password_verify($password_posted, $only_row['encrypted_password'])) {
        //Hasta aqui recupera la tuplas donde el email guardado sea igual al email qu nosotros recuperamos de login.php
        //si esa tupla existe y las contraseñas son iguales inicio una sesión
          session_start();
          $_SESSION['user_id'] = $only_row[0];
          header("Location: main.php");

      } else {

          header('Location: login.php?login_failed_password=True');
          echo 'La contraseña es incorrecta';

      }
}
?>
