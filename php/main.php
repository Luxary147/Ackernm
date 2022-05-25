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
        <nav>
            <ul>
                <a href="?main=colecion"><li> Colección </li></a>
                <a href="?main=dado"><li> Tirada </li></a>
            </ul>
        </nav>
        
         <?php
        session_start();
        
         $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');
          if (!$db) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $query = "SELECT id, nombre, url_imagen, essencias FROM Tcarta" ;
          $cartas = mysqli_query($db, $query) or die('Query error');
          /*compruebo si existen cartas*/
          if (mysqli_num_rows($cartas) > 0) {     
          ?>
        
          <div id="coleccion">
              
          <?php
              $Tcartas = [];
             while ($only_row = mysqli_fetch_array($cartas)){
                 array_push($Tcartas, $only_row[0]);
                echo '<div id="carta'.$only_row[0].'">
                            <img class ="imagen" src="'.$only_row[2].'" alt="'.$only_row[1].'">
                      </div>
                      <div id="formu1">
                          <form action="do_buy_card.php" method="post" id="do_buy_card">
                              <h2>'.$only_row[1].'</h2>
                              <p>'.$only_row[3].'</p>
                              <input id="cartaid" name="cartaid" type="hidden" value="'.$only_row[0].'">
                              <input type="submit" value="Comprar">
                          </form>
                      </div>';
                 //es una forma cutre pero a lo mejor funciona, esto nos almacenara la cantidad de cartas que hay en nuestra colección
                 $coleccion = $coleccion +1;
                }
              ?>
             </div>
          <?php
              }else{
                echo ("Error al recuperar los datos");
              /*ya que siempre exestiran cartas en la base de datos , por que asi esta definida la coleccion*/
              }
           ?>
        
        
        <?php
        
        if (empty($_SESSION['user_id'])) { 
            //bloque php donde compruebo si el ususario esta logeado o no 
        ?>
            <div class="contenedorLogin">
                <p>No estás logueado, Inicia Sesión <a href='/login.php'> aquí</a>.</p>
            </div>
        <?php
        } else {
       //Hasta aqui seria la parte de recuperar la coleccion completa.
      //Ahora vendria la parte de recuperar los datos de la tabla Tcartacoleccion , para saber que cartas ya tiene desbloqueada ese usuario
        ?>
            <div class="main">
                <p > Estas logueado buen trabajo </p>
            </div>
         <?php
            
          $query2 = "SELECT TcartaUsuario.idUsuario FROM TcartaUsuario INNER JOIN Tcarta ON TcartasUsuario.idCarta = Tcarta.id";
          $earned = mysqli_query($db, $query2) or die('Query error en segunda fase');

              if (mysqli_num_rows($earned) > 0) {
                 $Cearn = mysqli_fetch_array($earned);
                 
                 echo ($query2);
                 echo ($Cearn);
                  
             }
         }
         mysqli_close($db);   
         print_r($Tcartas);
         print_r($Cearn);
         ?>
        
    </body>
</html>
