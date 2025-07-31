<?php
session_start();

require_once __DIR__."/vendor/autoload.php";
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//generate CSRF token

function generateCSRFToken()
{
    if(!isset($_SESSION['CSRF_TOKEN'])){
        $_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32)); 
    }
    return $_SESSION['CSRF_TOKEN'];
}

function validateCSRFToken()
{
    if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !=  generateCSRFToken()){
        die("Session is expired");
    }
}

function guest()
{
    if(isset($_SESSION['USER'])){
       header("Location:" . url('admin'));
        exit;   
    }
}

function auth()
{
    if(!isset($_SESSION['USER'])){
       header("Location:" . url('login.php'));
        exit;   
    }
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    validateCSRFToken();
}

?>