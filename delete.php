<?php
session_start();
require 'user.php';

$delete = new User();

$delete->delete($login);