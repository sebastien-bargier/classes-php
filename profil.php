<?php
session_start();

require 'user.php';
require 'user-pdo.php';

$user = new User();
$user = new UserPDO();

$userSession = new User();
$getLogin = new User();
var_dump($userSession);
var_dump($getLogin);
 
if(isset($_POST["mod"])) {
        
    $login = htmlentities(trim($_POST['login']));
    $email = htmlentities(trim($_POST['email']));
    $firstName = htmlentities(trim($_POST['firstname']));
    $lastName = htmlentities(trim($_POST['lastname']));
    $password = htmlentities(trim($_POST['password']));


    $user->update($login, $password, $email, $firstName, $lastName);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header>
    <?php require 'header.php' ?>
</header>
<form action='#' method='POST'>

<h1>Mon profil</h1>

<br />

<label for="login">Login :</label>
<input type="text" name="login">

<label for="email">Email :</label>
<input type="email" name="email">

<label for="firstname">Prenom :</label>
<input type="text" name="firstname">

<label for="lastname">Nom :</label>
<input type="text" name="lastname">

<label for="password">Password :</label>
<input type="password" name="password">

<label for="confirm-password">Confirm password :</label>
<input type="password" name="confirm-password">

<input type="submit" class="btn" name="mod" value="Modifier"></input>
</form>
</body>
</html>