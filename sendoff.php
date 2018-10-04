<?php

header("Content_type: application/json");

session_start();

$csrfToken = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_COOKIE["PHPSESSID"])) {
    $csrfToken = $_SESSION['csrfToken'];

    $returnObj = new \stdClass();
    $returnObj->status = 200;
    $returnObj->status_message = 'Token Dispatched.';
    $returnObj->csrfToken = $csrfToken[$_COOKIE["PHPSESSID"]];
    $returnJSON = json_encode($returnObj);
    
    echo $returnJSON;
}
?>