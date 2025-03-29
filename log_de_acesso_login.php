<?php
session_start();

if (isset($_SESSION['pass']) || isset($_COOKIE['user_logged'])) {
  header("Location: log_de_acesso.php");
  exit();
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trabalho WEB</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Icone -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=error" />

  <?php
  include './core/style/style.php';
  ?>

</head>

<body>
  <?php include './core/ui/navbar.php'; ?>

  <div class="content">
    <div class="card color-secundary container mt-3 border border-danger" style="background-color:rgba(255, 200, 200, 0.5);">
      <h1 class="pt-2">Log de Acesso</h1>
      <hr>
      <div class="text-center">
        <p class="fw-bold fs-4">Access Key</p>
        <hr>
        <div class="d-flex justify-content-center w-25 pb-3 mx-auto">
          <form action="destino-login.php" method="post" class="d-flex">
            <input type="password" name="pass" class="form-control me-2" aria-label="Access Key" required>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>


        </div>
        <?php if (isset($_SESSION['erro'])) : ?>
          <div class='alert alert-danger d-flex align-items-center justify-content-center w-25 mx-auto bg-white' role='alert'>
            <span class='material-symbols-outlined text-danger me-2'>error</span>
            <div class='text-danger'>
              <?= $_SESSION['erro']; ?>
            </div>
          </div>
          <?php unset($_SESSION['erro']); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </div>

  <?php
  include './core/ui/footer.php';
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>


</html>