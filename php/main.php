
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
        <title>Document</title>
    </head>
    
    <body> 
        <?php
        session_start();
        
        
        if (empty($_SESSION['user_id'])) { 
            //bloque php donde compruebo si el ususario esta logeado o no 
        ?>
            <div class="contenedorLogin">
                <p>No estás logueado, para poder interactuar con la colección, Inicia Sesión <a href='/login.php'> aquí</a>.</p>
            </div>
        
        <?php
            
        } else {
        ?>
            <div class="main">
                <p > Estas logueado buen trabajo </p>
            </div>
        
            <div id="cerrar">
                <input type="submit" value="Cerrar Sesion" onclick="location.href='do_logout.php'" style="padding:10px; display:flex; float:right ; border-radius: 8px; margin-right: 2%;  font-size: 22px;"  >
            </div>
        
        <?php
            }
         ?>
        
        
        <nav class="selecciones">
            <ul id="ul1">
                <a href="?main=coleccion"><li> Colección </li></a>
                <a href="?main=dado"><li> Tirada </li></a>
            </ul>
        </nav>
        <section>
         <?php
            
            if (isset($_GET["main"])){
                switch ($_GET["main"]){
                    case 'coleccion':
                        include("coleccion.php");
                        break;

                    case 'dado':
                        include ("tirada.php");
                        break;
                }
            }
        
        ?>
       </section>
    </body>
</html>
