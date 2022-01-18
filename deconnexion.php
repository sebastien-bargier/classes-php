<?php
session_start();
session_start();
require 'user.php';
require 'user-pdo.php';

$user = new User();
$user = new UserPDO();

$disconnect->disconnect();
