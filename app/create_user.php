<?php
// Script para criar um usuário de teste (execute uma vez) - NÃO deixar em produção
require 'conexao.php';

$username = 'admin';
$password = 'Admin@123';
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->exec($sql);

$stmt = $conn->prepare('select id from users where username = ?');
$stmt->execute([$username]);
if ($stmt->fetch()) {
    echo "Usuario já existe\n";
    exit;
}

$stmt = $conn->prepare('insert into users (username, password_hash) values (?, ?)');
$stmt->execute([$username, $hash]);

echo "Usuário criado: $username\n";
