<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tirada.css">
  </head>
<body>

    <div id="formulario">
        <h1> Prueba tu suerte </h1>
        <h3> Apuesta una cantidad de essencias personalizada y triplica esa cantidad o <bolder> PIERDELO TODO</bolder></h3>
        <form action="do_dice_roll.php" method="post" id="dado">
        <label for="pago"> Realiza tu apuesta </label>
        <input name="pago" type="number" min="1" id ="pago">
        <input type="submit" value="Tirar">
        </form>

     

     <div id="stats">
        <p> * Se realizara una tirada de dado aleatoria, y dependiendo del numero sacado se modificara la cantidad apostada de la siguiente manera *</p>
        <ul>
            <li> En caso de obtener un 1 , la cantidad apostada pasara a ser 0 essencias</li>
            <li> En caso de obtener un 2 , la cantidad apostada se vera reducida a una tercera parte de esta , es decir , solo recibiras 1/3 de la cantidad apostada</li>
            <li> En caso de obtener un 3 , la cantidad apostada se vera reducida a la mitad de esta , es decir , solo recibiras 1/2 de la cantidad apostada</li>
            <li> En caso de obtener un 4 , la cantidad apostada se vera multiplicada por 1.25 , es decir , recibiras 25% mas de la cantidad apostada</li>
            <li> En caso de obtener un 5 , la cantidad apostada se vera multiplicada por 1.5 , es decir , recibiras 50% mas de la cantidad apostada</li>
            <li> En caso de obtener un 6 , la cantidad apostada se vera multiplicada por 3 , es decir , recibiras tres veces la cantidad apostada</li>
        </ul>
    </div>
</body>
</html>
