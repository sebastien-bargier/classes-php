<?php

class UserPDO {

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

    public function connect($login, $password) {

        $db = new PDO('localhost','root','','classes');
        $sql = $db->prepare("SELECT * FROM articles ORDER BY date DESC LIMIT 3;");
        $sql->execute();
        $user = $sql->fetchAll(PDO::FETCH_ASSOC);

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
            $db = new PDO('localhost','root','','classes');
            $sql = $db->prepare("DELETE FROM utilisateurs WHERE login = $login");
            $sql->execute();
        }

        public function update($login, $password, $email, $firstName, $lastName) {
            
            $db = new PDO('localhost','root','','classes');
            $sql = $db->prepare("UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE id = $this->id");
            $sql->execute();
        }

        public function isConnected()
        {
            if (isset($_SESSION['login'])) {
                return true;

            } else {
                return false;
            }
        }
    
        public function getAllInfos()
        {
            $db = new PDO('localhost','root','','classes');
            $sql = $db->prepare("SELECT * FROM `utilisateurs` WHERE login = '".$_SESSION['login']."'");
            $sql->execute();
            $result = $sql->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getEmail() {
            $db = new PDO('localhost','root','','classes');
            $sql = $db->prepare("SELECT email FROM utilisateurs WHERE login = '$this->login'");
            $sql->execute();
            $result = $sql->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getFirstname() {
            $db = new PDO('localhost','root','','classes');
            $sql = $db->prepare("SELECT firstname FROM utilisateurs WHERE login = '$this->login'");
            $sql->execute();
            $result = $sql->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getLastname() {
            $db = new PDO('localhost','root','','classes');
            $sql = $db->prepare("SELECT lastname FROM utilisateurs WHERE login = '$this->login'");
            $sql->execute();
            $result = $sql->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }
    }