<?php

include 'user.php';

$newUser = new User();

if(isset($_POST["in"]) && $_POST["in"] == "S'inscrire") {
        
    $login = htmlentities(trim($_POST['login']));
    $email = htmlentities(trim($_POST['email']));
    $firstName = htmlentities(trim($_POST['firstname']));
    $lastName = htmlentities(trim($_POST['lastname']));
    $password = htmlentities(trim($_POST['password']));

    if ($_POST["password"] == $_POST["confirm-password"]) {

        $newUser->register($login, $password, $email, $firstName, $lastName);
        header('Location: connexion.php');

    } else {

        echo "les mots de passe ne correspondent pas";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>

<form action="" method="POST">
    
    <h1>Inscription</h1>

    <br />

    <label for="login">Login :</label>
    <input type="text" name="login" required>

    <label for="email">Email :</label>
    <input type="email" name="email" required>

    <label for="firstname">Prenom :</label>
    <input type="text" name="firstname" required>

    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" required>

    <label for="password">Password :</label>
    <input type="password" name="password" required>

    <label for="confirm-password">Confirm password :</label>
    <input type="password" name="confirm-password" required>

    <input type="submit" class="btn" name="in" value="S'inscrire"></input>
</form>

</body>
</html>