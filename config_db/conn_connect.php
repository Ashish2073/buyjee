<?php
// site connection

function conndata(){
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "buyjee_ecomersdb";
    
    $conn = new mysqli($host,$username,$password,$dbname);
    
    return $conn;
}
?>