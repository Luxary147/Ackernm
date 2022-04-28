<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="formulario">

        <h1> Registro </h1>
        <form action="do_register.php" method="post" id="registro">
            <input name="nick" type="" placeholder="Nombre de Usuario" id ="nick"><br>
            <input name="email" type="email" placeholder="e-mail" id ="f_email"><br>
            <input name="pass" type="password" placeholder="Contraseña" id ="pass"><br>
            <input name="pass2" type="password" placeholder="Repetir Contraseña" id ="pass2"><br>
            <input type="submit" value="Registrame">
        </form>

        <a href="login.php"> Ya tienes cuenta, Inicia Sesión</a>
    </div>
    
</body>
</html>
