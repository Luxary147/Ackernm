<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Document</title>
</head>

<body>
    <div id="formulario">

        <h1> Login </h1>
        <form action="do_login.php" method="post" id="formulario">
            <label for="Email">Introduce tu correo Electronico :</label>
            <input name="l_email" type="email" placeholder="e-mail" id ="l_email">
            <label for="pass1">Introduce una Contraseña </label>
            <input name="l_password" type="password" placeholder="Contraseña" id ="l_password">
            <input type="submit" value="Login">
        </form>

        <a href="register.php"> <p> No tienes cuenta, crea una <bolder>Aqui</bolder></p></a>
    </div>
    
</body>
</html>
