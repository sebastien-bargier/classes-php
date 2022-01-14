<?php

class User {
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    public function __construct($login ="", $email ="", $firstName ="", $lastName= "") {
        $this->login = $login;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function register($login, $password, $email, $firstName, $lastName) {

        $db = mysqli_connect('localhost','root','','classes');
        $sql = mysqli_prepare($db, "INSERT INTO utilisateurs(login, password, email, firstname, lastname)
        VALUES('$login', '$password', '$email', 'f$irstName', '$lastName')");
        mysqli_stmt_execute($sql);
    }

    public function connect($login, $password) {

        $db = mysqli_connect('localhost','root','','classes');
	    $sql = "SELECT * FROM `utilisateurs` WHERE login ='$login'";
	    $result = mysqli_query($db, $sql);
        $user = mysqli_fetch_assoc($result);

	    if($password == $user['password'] && $login == $user['login']) {

            session_start();
            $_SESSION['login'] = $user['login'];
			$_SESSION['id'] = $user['id'];
			header("Location: index.php");
			exit;
        } else {

            echo "le mot de passe est incorrect";
        }
    }
}