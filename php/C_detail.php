<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="C_detail.css">
        <title>Document</title>
    </head>
    
    <body> 
    <?php
        session_start();
            
        if (isset($_SESSION['user_id'])) { 

        //recupero la información del input del formulario 
        $idCarta = $_POST['cartaid'];
        $nombreCarta = $_POST['cartanombre'];
        $urlimagen = $_POST['cartaurl'];
        $costeEssencias = $_POST['cartaessencias'];

        //almaceno el id del usuario logeado
        $idUsuario = $_SESSION['user_id'];

          
        echo '<div id="pagina">
                  <div id="carta">
                        <img class ="imagen" src="'.$urlimagen.'" alt="'.$nombreCarta.'">
                  </div>

                  <div id="formu">
                        <form action="do_buy_card.php" method="post" id="do_buy_card">
                            <h2>'.$nombreCarta.'</h2>
                            <p>'.$costeEssencias.'</p>
                            <input id="cartaid" name="cartaid" type="hidden" value="'.$idCarta.'">
                            <input type="submit" value="Comprar">
                        </form>
                   </div>
               </div>';
            
        }else{
            
            echo '<div class="contenedorLogin">
                      <p>No estás logueado, Inicia Sesión <a href="/login.php"> aquí</a></p>
                  </div>';
                
        }

?>
    </body>
</html>
