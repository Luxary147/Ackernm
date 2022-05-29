<?php

session_start();
        
        $db = mysqli_connect('localhost', 'root', '1234', 'Ackernm') or die('Fail');
          if (!$db) {
              die("Connection failed: " . mysqli_connect_error());
          }
        
        if (empty($_SESSION['user_id'])) { 
          
          
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
              }
            
        } else {
                
          $idUsuario = $_SESSION['user_id'];

          $query = "SELECT Tcarta,id , nombre , url_imagen , essencias , idUsuario FROM Tcarta LEFT JOIN (SELECT * FROM TcartaUsuario WHERE idUsuario = ".$idUsuario." ) AS CartaUsuario ON Tcarta.id = CartaUsuario.idCarta";
          $cartas = mysqli_query($db, $query) or die('Query error');
        
          if (mysqli_num_rows($cartas) > 0) {     
          ?>
        
          <div id="coleccion">
              
          <?php
             while ($only_row = mysqli_fetch_array($cartas)){
                 
                 if ($only_row[4] != NULL){
                     
                     echo '<div id="carta'.$only_row[0].'">
                            <img class ="imagen" src="'.$only_row[2].'" alt="'.$only_row[1].'">
                            </div>';
                     
                 }else{
                  
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
         mysqli_close($db);   
         ?>
