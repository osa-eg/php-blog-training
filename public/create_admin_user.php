<?php 

require_once __DIR__."/../vendor/autoload.php";

require_once path("/classes/User.php");
use Classes\User;

$user = new User();
$user->createAdminUser()


?>
