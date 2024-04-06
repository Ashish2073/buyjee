<?php
// site connection

function contdatabase(){
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "buyjee_ecomersdb";
    
    $conntdb = new mysqli($host,$username,$password,$dbname);
    
    return $conntdb;
}

$contdb = contdatabase();
?>