<?php

$host     = 'localhost';
$port     = '5432';
$dbname   = 'Hospital';  
$user     = 'postgres';   
$password = 'Tumaco2025'; 

// Hace la conexión 
$conn = pg_connect(
    "host=$host port=$port dbname=$dbname user=$user password=$password"
);

// Verificar si hay conexión
if (!$conn) {
    die('Error de conexión a PostgreSQL: ' . pg_last_error());
}

