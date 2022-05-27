<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
</head>

<body>
    <div id="formulario">

        <h1> Registro </h1>
        <form action="do_register.php" method="post" id="registro">
        <label for="Nick"> Introduce tu nombre de Usuario </label>
        <input name="nick" type="text" placeholder="Nombre de Usuario" id ="nick">
        <label for="Email">Introduce tu correo Electronico :</label>
        <input name="email" type="email" placeholder="e-mail" id ="f_email">
        <label for="pass1">Introduce una Contraseña </label>
        <input name="pass" type="password" placeholder="Contraseña" id ="pass">
        <label for="pass2"> Repite la Contraseña</label>
        <input name="pass2" type="password" placeholder="Repetir Contraseña" id ="pass2">
        <input type="submit" value="Registrame">
        </form>

        <a href="login.php"> <p> Ya tienes cuenta, Inicia Sesión, Pulsando Aqui </p></a>
    </div>
    
</body>
</html>
