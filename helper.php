<?php
$errors = [];
$alert = null;

function clean_input($value){
    $value = trim($value);
    $value = stripcslashes($value);
    $value = htmlspecialchars($value);

    return $value;
}

function validLen($value , $legth = 150):bool
{
    return strlen($value) <= $legth;
}

function url(?string $path = null):string
{
    $url = $_ENV['APP_URL'];
    if($path)
        $url .= $path;
    return $url;
}

function path(?string $path = null)
{
    return __DIR__ . $path;
}


?>