<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <Style>

    *{
        background-color: rgb(106, 105, 105);
        color:rgba(222, 226, 240, 0.966);
    }
        h1{

            margin-top:12%;
            text-align: center;
        }

        h3{
            margin-top:6%;
            text-align: center;
        }

    </Style>
</head>
<body>
  <?php
  
  session_start();
            
        if (isset($_SESSION['user_id'])) { 
          
          $numero = ($_GET["result"]);
          $essencias = $_SESSION['essencias'];
          $ganancias = $_SESSION['ganancias'];
          $total = $_SESSION['total'];
                     
            echo "<h1> Los Dioses han hablado , has sacado un <bolder>$numero</bolder> </h1>";

            echo "<h3> Tras haber apostado $essencias essencias, has conseguido ganar $ganancias essencias más </h3>";
            
            echo "<h3> Ahora tienes <bolder> $total</bolder> essencias  </h3>";

         }
    
    header("Refresh: 5; main.php?main=dado");
    ?>
</body>
</html>
