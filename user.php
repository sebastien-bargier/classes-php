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
}