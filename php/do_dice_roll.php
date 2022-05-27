<?php
        session_start();
            
        if (isset($_SESSION['user_id'])) { 
            //bloque php donde compruebo si el ususario esta logeado o no
                
        $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

        //recupero la información del input del formulario 
        $pago = $_POST['pago'];
        $apuesta = $pago;

        //almaceno el id del usuario logeado
        $idUsuario = $_SESSION['user_id'];
                
        //$Ndado = $_POST['numero'];
        //Generación de un numero aleatorio entre el uno y el 6 , esta funcion genera números enteros aleatorios criptográficos aptos para resultados imparciales críticos
        $Ndado = random_int(1, 6);
        $query2 = "SELECT esencias FROM Tusuario WHERE id = '".$_SESSION['user_id']."'";
        $esencias= mysqli_query($db, $query2) or die('Query error');
                

          if (mysqli_num_rows($esencias) > 0) {
             $Compra = mysqli_fetch_array($esencias);           

             if ($Compra[0] >= $apuesta){

        
                switch ($Ndado) {
                    case 1:
                        $apuesta = 0;
                        break;
                    case 2:
                        $apuesta = $apuesta/3;
                        break;
                    case 3:
                        $apuesta = $apuesta/2;
                        break;
                    case 4:
                        $apuesta = $apuesta * 1.25;
                        break;
                    case 5:
                        $apuesta = $apuesta * 1.5;
                        break;
                    case 6:
                        $apuesta = $apuesta *3;
                        break;
                        }
                
            
                //Aqui se va a redondear el valor de esencias para que no nos almacene numeros decimales          
                $apuesta = round($apuesta);

                //Aqui guardaremos el valor total de las essencias del usuario mas sus ganacnias tras la apuesta
                $essent = ($Compra[0] - $pago) + $apuesta;

                $update = "UPDATE Tusuario SET esencias ='".$essent."'WHERE id ='".$_SESSION['user_id']."'";
                  
                  }else{
                          echo ' <p> No Dispone de las sufiecientes essecias para apostar dicha cantidad </p>';
                  }
                
        }else{
                //Este error nunca deberia de saltar , pero nunca se sabe asi que aqui esta ( a mi me salio)
                echo '<p> Este usuario no dispone de ningun valor de esencias en la base de datos </p>';
        }
                
                $_SESSION['essencias'] = $pago;
                $_SESSION['ganancias'] = $apuesta;
                $_SESSION['total'] = $essent;

                if ($db->query($update) === TRUE) {
                    echo '<p> Añadido el resultado correctamente </p>';      
                }else {
                    echo "Fallo ";
                }
                
                


        } else {
            echo '<h2> El usuario tiene que estar logeado para poder adquerir cartas a su coleción </h2>
                  <a href="login.php"> Puedes iniciar sesión Aqui </a>';
        }
        
        mysqli_close($db);

        header("Location: dice_roll.php?result=$Ndado");
?>
