<?php
session_start();
require 'user.php';
require 'user-pdo.php';

$user = new User();
$user = new UserPDO();

$delete->delete($login);