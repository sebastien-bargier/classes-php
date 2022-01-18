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
        VALUES('$login', '$password', '$email', '$firstName', '$lastName')");
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
    
    public function disconnect() {

        session_destroy();
        header('Location: connexion.php');
    }

    public function delete($login) {

        $db = mysqli_connect('localhost','root','','classes');
        $sql = "DELETE FROM utilisateurs WHERE login = $login";
        $result = mysqli_query($db,$sql);
    }

    public function update($login, $password, $email, $firstName, $lastName) {

        $db = mysqli_connect('localhost','root','','classes');
        $sql = "UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstName', lastname = '$lastName' WHERE id = $this->id";
        $update = mysqli_query($db, $sql);

        if(isset($update)) {
            echo "Votre profil à été modifié.";
        }
    }

    public function isConnected() {
        if (isset($_SESSION['login'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllInfos() {

        $db = mysqli_connect('localhost','root','','classes');
        $sql = "SELECT * FROM utilisateurs WHERE login='".$_SESSION['login']."'";
        $result = mysqli_query($db,$sql);
        $userSession = mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $userSession;
    }

    public function getLogin() {

        $db = mysqli_connect('localhost','root','','classes');
        $sql = "SELECT login FROM utilisateurs where login = '$login'";
        $result = mysqli_query($db, $sql);
        $getLogin = mysqli_fetch_assoc($result);
        return $getLogin;
    }

    public function getEmail() {

        $db = mysqli_connect('localhost','root','','classes');
        $sql = "SELECT email FROM utilisateurs where login = '$login'";
        $result = mysqli_query($db, $sql);
        $getLogin = mysqli_fetch_assoc($result);
        return $getEmail;
    }
    
    public function getFirstname() {

        $db = mysqli_connect('localhost','root','','classes');
        $sql = "SELECT firstname FROM utilisateurs where login = '$login'";
        $result = mysqli_query($db, $sql);
        $getLogin = mysqli_fetch_assoc($result);
        return $getFirstname;
    }

    public function getLastname() {

        $db = mysqli_connect('localhost','root','','classes');
        $sql = "SELECT lastname FROM utilisateurs where login = '$login'";
        $result = mysqli_query($db, $sql);
        $getLogin = mysqli_fetch_assoc($result);
        return $getLastname;
    }

}