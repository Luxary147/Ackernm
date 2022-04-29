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

        <h1> Login </h1>
        <form action="do_login.php" method="post" id="formulario">
            <input name="l_email" type="email" placeholder="e-mail" id ="l_email"><br>
            <input name="l_password" type="password" placeholder="Contraseña" id ="l_password"><br>
            <input type="submit" value="Login">
        </form>

        <a href="register.php"> No tienes cuenta, crea una</a>
    </div>
    
</body>
</html>
