<?php
include 'log_acessos.php';
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contato - Priston Tale</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
include './core/style/style.php';
?>

<body>
  <?php
  include './core/ui/navbar.php';
  ?>

  <div class="content card color-secundary container mt-3 border-black">
    <h1 class="pt-2">Contato</h1>
    <hr>
    <div class="d-flex">
      <div class="text-information">
        <p>Se você deseja entrar em contato conosco para suporte, dúvidas ou sugestões, estamos à disposição!</p>
        <p>Entre em contato com nossa equipe para obter suporte técnico, reportar problemas ou compartilhar suas ideias sobre como podemos melhorar sua experiência no Priston Tale.</p>
        <p>Você também pode nos seguir nas redes sociais para ficar por dentro das últimas atualizações, eventos e novidades do jogo. Estamos sempre prontos para ouvir a comunidade e trabalhar juntos para tornar o Priston Tale ainda mais incrível!</p>
        <h3>Informações de Contato</h3>
        <ul>
          <li><strong>Email:</strong> suporte@pristontale.com</li>
          <li><strong>Telefone:</strong> +55 (11) 1234-5678</li>
          <li><strong>Endereço:</strong> Rua dos Gamers, 123 - São Paulo, SP, Brasil</li>
        </ul>
        <h3>Redes Sociais</h3>
        <ul>
          <li><a href="https://facebook.com/pristontale" target="_blank">Facebook</a></li>
          <li><a href="https://twitter.com/pristontale" target="_blank">Twitter</a></li>
          <li><a href="https://instagram.com/pristontale" target="_blank">Instagram</a></li>
        </ul>
      </div>
      <div class="image-information">
        <img src="https://zenit.games/img/logo_01.png" alt="Contato Priston Tale" width="300" height="300">
      </div>
    </div>
  </div>

  <?php
  include './core/ui/footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>