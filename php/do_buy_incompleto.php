<?php
        
        session_start();
            
        if (isset($_SESSION['user_id'])) { 
            //bloque php donde compruebo si el ususario esta logeado o no

        } else {
            echo '<h2> El usuario tiene que estar logeado para poder adquerir cartas a su coleción </h2>
                  <a href="login.php"> Puedes iniciar sesión Aqui </a>';
            }
        ?>

<?php
//recuperar los datos 
    $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

        $query = "SELECT essencias FROM Tusuario WHERE id = '".$_SESSION['user_id']"'";
        $esencias= mysqli_query($db, $query) or die('Query error');

          if (mysqli_num_rows($esencias) > 0) {
             $Compra = mysqli_fetch_array($esencias);

             if ($Compra[0] > 300){
                //Esto esta hecho de esta manera para que en el caso de que proximamente se quiero modificar el código sea mas sencillo
                //Esto esta pensado para modificarlo en el futuro , en caso de implementar diferentes valores de essencias , dependiendo de la rareza de la carta.
                //Actualmente todas valen por defecto 300 
                $coste = 300

                $essent = $Compra[0] - $coste

                $update = "UPDATE Tusuario SET essencias ='".$essent."'WHERE id ='".$_SESSION['user_id']"'";




                $insert= "INSERT INTO TCartaUsuario (idUsuario, idCarta) VALUES  (?, ?)";
                $stmt = $db -> prepare($insert);
                $stmt -> bind_param('ii', $idUsuario, $idCarta);
                $stmt -> execute();
                $stmt -> close();
             }
          }