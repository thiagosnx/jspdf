<?php

$hostname= 'localhost';
$database= 'jspdf';
$username= 'root';
$password= '';




try{
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}