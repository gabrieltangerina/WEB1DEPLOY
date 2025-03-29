<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$config = parse_ini_file('config.ini', true);
$baseUrl = $config['site']['base_url'];

$url = $_SERVER['REQUEST_URI'];
$segments = explode('/', $url);
$lastSegment = end($segments);
$pageName = ucfirst(str_replace('_', ' ', explode('.', $lastSegment)[0]));
?>

<nav class="navbar color-primary">
  <div class="container-fluid">
    <a class="navbar-brand text-white">Trabalho TI - Gabriel Tangerina<?= $pageName != '' && $pageName != 'Index' ? ' | ' . $pageName : '' ?></a>
    <div class="d-flex ms-auto">
      <ul class="navbar-nav d-flex flex-row">
        <li class="nav-item me-3">
          <a class="nav-link <?= ($pageName == '' || $pageName == 'Index') ? 'text-warning' : 'text-white' ?>" href="index.php">
            Início
          </a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link <?= ($pageName == 'Sobre') ? 'text-warning' : 'text-white' ?>" href="sobre.php">
            Sobre
          </a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link <?= ($pageName == 'Contato') ? 'text-warning' : 'text-white' ?>" href="contato.php">
            Contato
          </a>
        </li>
        <li class="nav-item me-3">
          <a class="nav-link <?= ($pageName == 'Log de acesso') ? 'text-warning' : 'text-danger' ?>" href="log_de_acesso_login.php">
            #Log de Acesso
          </a>
        </li>

        <?php if (isset($_COOKIE['user_logged'])): ?>
          <li class="nav-item me-3">
            <a class="nav-link text-danger" href="logout.php">
              Sair
            </a>
          </li>
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>