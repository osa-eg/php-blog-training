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


function alert(?string $message= "Done Successfully!" , ?bool $success = true  )
{
    $_SESSION['alert'] = [
        'success' => $success,
        'message' => $message
    ];
}

function inputError(array $errors, $input_name  ): string
{
    $output = "";
    if (isset($errors[$input_name])) {
        $output = ' <small class="text-danger">'.$errors[$input_name] .'</small>';
    }                                      
   return $output;
}


?>