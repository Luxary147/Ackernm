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
            
        if (isset($_SESSION['user_id'])) { 
          
          $numero = ($_GET["result"]
          $essencias = $_SESSION['essencias']
          $ganacias = $_SESSION['ganancias']
                     
    echo "<h1> Los Dioses han hablado , has sacado un '$numero' </h1>";

    echo "<h3> Tras haber apostado '$essencias' essencias, has conseguido ganar '$ganancias' essencias más </h3>";

</body>
</html>
