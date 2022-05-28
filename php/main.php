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
        <nav class="selecciones">
            <ul>
                <a href="?main=colecion"><li> Colección </li></a>
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
        
        session_start();
        
        $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');
          if (!$db) {
              die("Connection failed: " . mysqli_connect_error());
          }
        
        if (empty($_SESSION['user_id'])) { 
            //bloque php donde compruebo si el ususario esta logeado o no 
        ?>
            <div class="contenedorLogin">
                <p>No estás logueado, para poder interactuar con la colección, Inicia Sesión <a href='/login.php'> aquí</a>.</p>
            </div>
        
        <?php
          $query = "SELECT id, nombre, url_imagen, essencias FROM Tcarta" ;
          $cartas = mysqli_query($db, $query) or die('Query error');
        
          if (mysqli_num_rows($cartas) > 0) {     
          ?>
        
          <div id="coleccion">
              
          <?php
             while ($only_row = mysqli_fetch_array($cartas)){
                     echo '<div class="imagenalfa">
                            <img class ="imagen" src="'.$only_row[2].'" alt="'.$only_row[1].'">
                            </div>';
                 }
              ?>
             </div>
          <?php
              }else{
                echo ("Error al recuperar los datos");
              /*ya que siempre exestiran cartas en la base de datos , por que asi esta definida la coleccion*/
              }
            
        } else {
        ?>
            <div class="main">
                <p > Estas logueado buen trabajo </p>
            </div>
        
        <?php
          $query = "SELECT Tcarta.id, nombre, url_imagen, essencias , idUsuario FROM Tcarta LEFT JOIN TcartaUsuario ON Tcarta.id = TcartaUsuario.idCarta" ;
          $cartas = mysqli_query($db, $query) or die('Query error');
        
          if (mysqli_num_rows($cartas) > 0) {     
          ?>
        
          <div id="coleccion">
              
          <?php
              $Tcartas = [];
             while ($only_row = mysqli_fetch_array($cartas)){
                 array_push($Tcartas, $only_row[0], $only_row[1], $only_row[2], $only_row[3],$only_row[4]);
                 
                 if ($only_row[4] != NULL){
                     
                       if ($only_row[4] == $idUsuario){

                                 echo '<div id="carta'.$only_row[0].'">
                                        <img class ="imagen" src="'.$only_row[2].'" alt="'.$only_row[1].'">
                                        </div>';

                 }else{
                  $cartarepetida = $cartarepetida + 1;
                    echo '<div id="formu">
                               <form action="C_detail.php" method="post" id="C_detail">
                                      <input id="cartaid" name="cartaid" type="hidden" value="'.$only_row[0].'">
                                      <input id="cartanombre" name="cartanombre" type="hidden" value="'.$only_row[1].'">
                                      <input id="cartaurl" name="cartaurl" type="hidden" value="'.$only_row[2].'">
                                      <input id="cartaessencias" name="cartaessencias" type="hidden" value="'.$only_row[3].'">
                                      <button id="boton" onclick="location.href=C_detail.php" type="submit">
                                               <div>
                                                    <img class ="imagenalfa" src="'.$only_row[2].'" alt="'.$only_row[1].'">
                                              </div>
                                      </button>
                                </form>
                            </div>';
                 }            
                }
              ?>
             </div>
         <?php
            
         }
        }
        }
         print_r($cartarepetida);
            print_r($Tcartas);
         mysqli_close($db);   
         ?>
        
    </body>
</html>
