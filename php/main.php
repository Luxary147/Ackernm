<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

    </head>

    
    <body> 
    <?php
        
    session_start();
        
    if (empty($_SESSION['user_id'])) { 
        //bloque php donde compruebo si el ususario esta logeado o no 
    ?>
        <div class="contenedorLogin">
            <p>No estás logueado, Inicia Sesión <a href='/login.php'> aquí</a>.</p>
        </div>

    <?php
    } else {
    ?>
        <div class="main">
            <p > Estas logueado buen trabajo </p>

        </div>
        
     <?php
           }
     ?>
        
    </body>
</html>
