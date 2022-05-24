<?php
        session_start();
            
        if (isset($_SESSION['user_id'])) { 
            //bloque php donde compruebo si el ususario esta logeado o no
                
        $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

        //recupero la información del input del formulario 
        $esencias = $_POST['pago'];

        //almaceno el id del usuario logeado
        $idUsuario = $_SESSION['user_id'];

         
        if()
        switch ($i) {
            case 1:
                $esencias = 0;
                break;
            case 2:
                $esencias = $esencias/3;
                break;
            case 3:
                $esencias = $esencias/2;
                break;
            case 4:
                $esencias = $esencias * 1.25;
                break;
            case 5:
                $esencias = $esencias * 1.5:
                break;
            case 6:
                $esencias = $esencias *3;
                break;
                }
        }
        //Aqui se va a redondear el valor de esencias para que no nos almacene numeros decimales          
        $esencias = round($esencias);

        $update = "UPDATE Tusuario SET esencias ='".$essent."'WHERE id ='".$_SESSION['user_id']."'";
                 
        if ($db->query($update) === TRUE) {
            echo "Añadido el resultado correctamente ";      
        }else {
            echo "Fallo ";
        }


        } else {
            echo '<h2> El usuario tiene que estar logeado para poder adquerir cartas a su coleción </h2>
                  <a href="login.php"> Puedes iniciar sesión Aqui </a>';
        }
        
        mysqli_close($db);

        
?>