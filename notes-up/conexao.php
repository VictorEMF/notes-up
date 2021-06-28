<?php

global $pdo;

try {
    $pdo = new PDO("mysql:dbname=notas;host=localhost","root","");
} catch (PDOException $e) {
    echo "Erro com o banco de dados: ".$e->getMessage();
}