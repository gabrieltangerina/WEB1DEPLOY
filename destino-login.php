<?php
session_start();

$pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
$senha_correta = "senha_da_nasa";

if ($pass === $senha_correta) {
    $_SESSION['pass'] = $senha_correta;

    setcookie("user_logged", true, time() + (30 * 24 * 60 * 60), "/");

    header("Location: log_de_acesso.php");
    exit();
} else {
    $_SESSION['erro'] = "Chave Incorreta!";
    header("Location: log_de_acesso_login.php");
    exit();
}
