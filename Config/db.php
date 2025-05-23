<?php

$charset = 'utf8mb4';
$host = 'localhost';
$port = '3306';
$user = 'root';
$pass = '';
$db = 'project_agendamentos';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   
    PDO::ATTR_EMULATE_PREPARES   => false,     
];

try{
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e){
    echo 'connection failed' . $e->getMessage();
    exit;
 }
?>