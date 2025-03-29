<?php
session_start();

if (!isset($_SESSION['pass']) || !isset($_COOKIE['user_logged'])) {
  header("Location: log_de_acesso_login.php");
  exit();
}

$logFile = 'log.ini';

if (file_exists($logFile)) {
  $logs = parse_ini_file($logFile, true);
} else {
  $logs = ['contador' => ['total' => 0], 'paginas' => [], 'log' => []];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['limparPagina'])) {
    $paginaLimpar = $_POST['limparPagina'];
    $logs['paginas'][$paginaLimpar] = 0;
    $_SESSION['mensagem'] = "Contador de " . ucfirst($paginaLimpar) . " apagado com sucesso!";
  }

  if (isset($_POST['limparTodos'])) {
    $logs['paginas'] = [];
    $_SESSION['mensagem'] = "Todos os acessos foram apagados com sucesso!";
  }

  if (isset($_POST['limparLogs'])) {
    $logs['log'] = [];
    $_SESSION['mensagem'] = "Todos os logs foram apagados com sucesso!";
  }

  $logs['contador']['total'] = array_sum($logs['paginas']);

  $iniContent = "";
  foreach ($logs as $section => $values) {
    $iniContent .= "[$section]\n";
    foreach ($values as $key => $value) {
      $iniContent .= "$key = \"$value\"\n";
    }
    $iniContent .= "\n";
  }

  file_put_contents($logFile, $iniContent);

  header("Location: log_de_acesso.php");
  exit();
}

$paginas = $logs['paginas'] ?? [];
arsort($paginas);

$totalAcessos = $logs['contador']['total'] ?? 0;

$logEntries = $logs['log'] ?? [];

$icones = [
  'inicio' => '📄',
  'contato' => '📞',
  'sobre' => 'ℹ️'
];

$todasPaginas = ['index.php' => 'inicio', 'contato.php' => 'contato', 'sobre.php' => 'sobre'];

foreach ($todasPaginas as $pagina => $nomeAmigavel) {
  if (!isset($logs['paginas'][$pagina])) {
    $logs['paginas'][$pagina] = 0;
  }
}

$paginas = $logs['paginas'];
arsort($paginas);

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trabalho WEB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <?php include './core/style/style.php'; ?>
  <script>
    function confirmarAcao(mensagem, form) {
      if (!confirm(mensagem)) {
        return false;
      }
      form.submit();
    }

    document.addEventListener("DOMContentLoaded", function() {
      const mensagem = document.getElementById("mensagemAlerta");
      if (mensagem) {
        setTimeout(() => {
          mensagem.style.display = "none";
        }, 3000);
      }
    });
  </script>
</head>

<body class="background-image">
  <?php include './core/ui/navbar.php'; ?>

  <div class="content card color-secundary container mt-3 border-black">
    <h1 class="pt-2">Log de Acesso</h1>
    <hr>

    <div>
      <div class="d-flex justify-content-center">
        <?php
        foreach ($paginas as $pagina => $acessos) :
          $nomePagina = $todasPaginas[$pagina] ?? strtolower(str_replace('.php', '', $pagina));
          $icone = $icones[$nomePagina] ?? '📄';
        ?>
          <div class="card color-secundary container mt-3 mb-3 border-black" style="min-width: 200px; width: auto; height: auto;">
            <div class="d-flex flex-column align-items-center justify-content-center p-3">
              <div class="d-flex align-items-center mb-2">
                <p class="me-1 mb-0"><?= $icone ?></p>
                <p class="text-primary fw-bold mb-0"><?= ucfirst($nomePagina) ?></p>
              </div>
              <p class="fw-bold fs-5 mb-2"><?= $acessos ?> Acessos</p>
              <form method="POST" onsubmit="return confirmarAcao('Tem certeza que deseja apagar os dados de <?= ucfirst($nomePagina) ?>?', this);">
                <input type="hidden" name="limparPagina" value="<?= $pagina ?>">
                <button type="submit" class="btn btn-outline-primary w-100">Limpar</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div>
        <div class="d-flex justify-content-center mx-auto w-100">
          <p class="fs-5">🧮</p>
          <p class="fw-bold ms-1 me-1 fs-5">Total de Acessos: </p>
          <p class="text-primary fw-bold fs-5"><?= $totalAcessos ?></p>
        </div>

        <div class="d-flex justify-content-center">
          <form method="POST" onsubmit="return confirmarAcao('Tem certeza que deseja apagar todos os contadores de acesso?', this);">
            <button type="submit" name="limparTodos" class="btn btn-danger d-flex align-items-center">
              🗑️ Limpar todos os acessos
            </button>
          </form>
        </div>

        <?php if (isset($_SESSION['mensagem'])) : ?>
          <div id="mensagemAlerta" class="alert alert-success text-center w-25">
            <?= $_SESSION['mensagem']; ?>
          </div>
          <?php unset($_SESSION['mensagem']); ?>
        <?php endif; ?>


        <hr>
        <?php foreach ($logEntries as $log) : ?>
          <p class="mb-1"><?= $log ?></p>
        <?php endforeach; ?>

        <div class="d-flex justify-content-center pb-2">
          <form method="POST" onsubmit="return confirmarAcao('Tem certeza que deseja apagar todos os logs?', this);">
            <button type="submit" name="limparLogs" class="btn btn-danger d-flex align-items-center">
              🗑️ Limpar Log
            </button>
          </form>
        </div>
      </div>
    </div>


  </div>

  <?php include './core/ui/footer.php'; ?>

</body>

</html>