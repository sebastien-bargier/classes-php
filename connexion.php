<?php
require 'user.php';

$user = new User();


if(isset($_POST['co']) && $_POST['co'] == 'Se Connecter') {

    $login = htmlentities(trim($_POST['login']));
    $password = htmlentities(trim($_POST['password']));
    
    if (!empty($_POST['login']) && !empty($_POST['password'])) {

        $user->connect($login, $password);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>

<form action='#' method='post'>
    
    <h1>Connexion</h1>
    
    <br />

    <label for="login">Login</label>
    <input type="text" name="login">

    <label for="password">Password</label>
    <input type="password" name="password">

    <input type="submit" class="btn" name="co" value="Se Connecter"></input>
</form>

</body>
</html>