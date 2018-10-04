<?php

$username = "it15057198";
$password = "it15057198";

if(isset($_POST['username']) && isset($_POST['password'])){
    if($_POST['username'] == $username && $_POST['password'] == $password){
        session_start();
        session_destroy();
        session_unset();
        session_start();
        session_regenerate_id(true);
        
        $array = array();

        $token = base64_encode(hash("sha256", uniqid(mt_rand(1000, 9999).microtime(), true), true));
        $array[session_id()] = $token;

        $_SESSION['csrfToken'] = $array;
        
        echo    "<script type='text/javascript'>
                    window.location = \"user_registration.html\";
                </script>";
    }
    else{
        echo    "<script type='text/javascript'>
                    window.location = \"index.html\";
                    alert(\"Invalid login credentials.\");
                </script>";
    }
}
else{
    echo "error";
}
?>