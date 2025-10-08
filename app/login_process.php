<?php
require 'header.php';
require 'conexao.php';

$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$pass = $_POST['password'] ?? '';

if (empty($user) || empty($pass)) {
    $_SESSION['login_error'] = 'Usuário ou senha inválidos.';
    header('Location: login.php');
    exit;
}

$sql = "select id, username, password_hash from users where username = ? limit 1";
$stmt = $conn->prepare($sql);
$stmt->execute([$user]);
$u = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$u) {
    $_SESSION['login_error'] = 'Usuário ou senha inválidos.';
    header('Location: login.php');
    exit;
}

if (password_verify($pass, $u['password_hash'])) {
    // Regenerate session id to prevent fixation
    session_regenerate_id(true);
    $_SESSION['user'] = $u['username'];
    $_SESSION['user_id'] = $u['id'];
    header('Location: listagem.php');
    exit;
} else {
    $_SESSION['login_error'] = 'Usuário ou senha inválidos.';
    header('Location: login.php');
    exit;
}
