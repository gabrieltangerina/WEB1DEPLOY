<?php
include 'log_acessos.php';
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trabalho WEB</title>
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
    <h1 class="pt-2">Bem-vindo ao Mundo de Priston</h1>
    <hr>
    <div class="d-flex">
      <div class="text-information">
        <p>Priston Tale é um MMORPG clássico que conquistou jogadores ao redor do mundo com sua jogabilidade envolvente e gráficos nostálgicos. Explore um vasto mundo cheio de aventuras, monstros desafiadores e missões emocionantes.</p>
        <p>Escolha entre diversas classes, como Lutador, Mago, Arqueiro e mais, cada uma com habilidades únicas para enfrentar os desafios do mundo de Priston. Forme grupos com amigos, participe de batalhas épicas e conquiste territórios.</p>
        <p>Prepare-se para mergulhar em uma experiência única, onde a estratégia e o trabalho em equipe são essenciais para alcançar a vitória. Junte-se à comunidade de Priston e viva momentos inesquecíveis!</p>
        <h2>Mais sobre Priston Tale</h2>
        <p>Priston Tale foi lançado em 2001 pela desenvolvedora sul-coreana Yedang Online. O jogo rapidamente ganhou popularidade devido à sua jogabilidade dinâmica e gráficos 3D inovadores para a época.</p>
        <p>O jogo é ambientado em um mundo de fantasia dividido em dois continentes principais, onde os jogadores podem explorar diversas regiões, enfrentar monstros e completar missões. Além disso, o sistema de evolução de personagens e habilidades permite uma personalização única para cada jogador.</p>
        <p>Priston Tale também é conhecido por seus eventos sazonais e pela forte comunidade de jogadores, que mantém o jogo ativo e vibrante até os dias de hoje. Ele continua sendo um marco na história dos MMORPGs, sendo lembrado com carinho por fãs ao redor do mundo.</p>
      </div>
      <div class="image-information">
        <img src="https://zenit.games/priston/img/guia/imgGuiaMundoPriston.png" alt="Logo Priston Tale" width="300" height="300">
      </div>
    </div>
  </div>

  <?php
  include './core/ui/footer.php';
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>