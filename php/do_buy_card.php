
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h2 {
            margin-top:12%;
            text-align: center;
            justify-content: center;
        }
        p{
            margin-top:12%;
            text-align: center;
            justify-content: center;
        }
    </style>
</head>
        <?php
        session_start();
            
        if (isset($_SESSION['user_id'])) { 
            //bloque php donde compruebo si el ususario esta logeado o no
                
        $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

        //recupero la información del input del formulario 
        $idCarta = $_POST['cartaid'];
     
        //almaceno el id del usuario logeado
        $idUsuario = $_SESSION['user_id'];
                

        $query2 = "SELECT esencias FROM Tusuario WHERE id = '".$_SESSION['user_id']."'";
        $esencias= mysqli_query($db, $query2) or die('Query error');
                

          if (mysqli_num_rows($esencias) > 0) {
             $Compra = mysqli_fetch_array($esencias);
                  
                //tienes que quedar con minimo 1 essencia tras realizar la compra
             if ($Compra[0] > 300){
                //Esto esta hecho de esta manera para que en el caso de que proximamente se quiero modificar el código sea mas sencillo
                //Esto esta pensado para modificarlo en el futuro , en caso de implementar diferentes valores de essencias , dependiendo de la rareza de la carta.
                //Actualmente todas valen por defecto 300 
                $coste = 300;

                $essent = $Compra[0] - $coste;
                     

                $update = "UPDATE Tusuario SET esencias ='".$essent."'WHERE id ='".$_SESSION['user_id']."'";
                 
                 if ($db->query($update) === TRUE) {
                          echo "<p> Update realizada con exito </p> ";      
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
                  <a href="main.php"> Volver a la colección </a>';
          }
                
                 echo '<h2> Compra realizada con exito </h2>';
                
                echo '<h2> Regresando a la Colección , Espere </h2>';
                        header("Refresh: 3; main.php?main=coleccion");

        } else {
            echo '<h2> El usuario tiene que estar logeado para poder adquerir cartas a su coleción </h2>
                  <a href="login.php"> Puedes iniciar sesión Aqui </a>';
        }
        
        mysqli_close($db);
?>
</html>
