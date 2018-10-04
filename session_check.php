<?php

session_start();

$array = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_COOKIE["PHPSESSID"]) && isset($_POST['csrf_token'])) {

    $array = $_SESSION['csrfToken'];

    if($_POST['csrf_token'] == $array[$_COOKIE["PHPSESSID"]]){
        echo    "<script type='text/javascript'>
                    alert(\"Registration successful\");
                </script>";
    }
    else{
        echo    "<script type='text/javascript'>
                    alert(\"Registration failed\");
                </script>";
    }
}
else{
    if(!(isset($_POST['csrf_token']))){
        echo "error";
    }
}

?>