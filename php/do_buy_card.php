<?php
        session_start();
            
        if (isset($_SESSION['user_id'])) { 
            //bloque php donde compruebo si el ususario esta logeado o no
                
        $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

        //recupero la información del input del formulario 
        $idCarta = $_POST['cartaid'];
                
                echo ($idCarta);

        //almaceno el id del usuario logeado
        $idUsuario = $_SESSION['user_id'];

        $query2 = "SELECT esencias FROM Tusuario WHERE id = '".$_SESSION['user_id']."'";
                echo ($query2);
        $esencias= mysqli_query($db, $query2) or die('Query error');
                

          if (mysqli_num_rows($esencias) > 0) {
             $Compra = mysqli_fetch_array($esencias);
                  

             if ($Compra[0] >= 300){
                //Esto esta hecho de esta manera para que en el caso de que proximamente se quiero modificar el código sea mas sencillo
                //Esto esta pensado para modificarlo en el futuro , en caso de implementar diferentes valores de essencias , dependiendo de la rareza de la carta.
                //Actualmente todas valen por defecto 300 
                $coste = 300;

                $essent = $Compra[0] - $coste;
                     

                $update = "UPDATE Tusuario SET esencias ='".$essent."'WHERE id ='".$_SESSION['user_id']."'";
                 
                 if ($db->query($update) === TRUE) {
                          echo "Update realizada con exito ";      
                 }else {
                                echo "Fallo ";
                 }



                $insert= "INSERT INTO TcartaUsuario (idUsuario, idCarta) VALUES  (?, ?)";
                $stmt = $db -> prepare($insert);
                $stmt -> bind_param('ii', $idUsuario, $idCarta);
                $stmt -> execute();
                $stmt -> close();
             }
          }else{
                  echo '<h2> No tienes suficientes essencias para realizar esta compra </h2>
                  <a href="main.php"> Volver a lacolección </a>';
          }
                
                 echo '<h2> Compra realizada con exito </h2>';

        } else {
            echo '<h2> El usuario tiene que estar logeado para poder adquerir cartas a su coleción </h2>
                  <a href="login.php"> Puedes iniciar sesión Aqui </a>';
        }
        
        mysqli_close($db);
?>
