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
        
     <?php
     
     $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');

      if (!$db) {
          die("Connection failed: " . mysqli_connect_error());
      }
      

      $query = "SELECT nombre, url_imagen, essencias FROM Tcarta" ;
      $cartas = mysqli_query($db, $query) or die('Query error');
      
      /*compruebo si existen cartas*/
      if (mysqli_num_rows($cartas) > 0) {     
      ?>
      <div>
      <?php
         /*revisar esta linea*/
         while ($only_row = mysqli_fetch_array($cartas)){
            echo '<div id="carta">
                        <img class ="imagen" src="'.$only_row[1].'" alt="'.$only_row[0].'">
                  </div>
                  <div id="formu">
                      <form action="do_buy_card.php" method="post" id="do_buy_card">
                          <h2>'.$only_row[0].'</h2>
                          <p>'.$only_row[2].'</p>
                          <input type="submit" value="Comprar">
                      </form>
                  </div>';
            }
          ?>
         </div>
         
      <?php
      }else{
        echo ("Error al recuperar los datos");
      /*ya que siempre exestiran cartas en la base de datos , por que asi esta definida la coleccion*/
      }
      
      mysqli_close($db);
      ?> 
    </body>
</html>
