<?php
include 'log_acessos.php';
?>

<!doctype html>
<html lang="en">

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

  <div class="content card color-secundary container mt-3 ">
    <h1 class="pt-2">Sobre o Jogo Priston</h1>
    <hr>
    <div class="d-flex">
      <div class="text-information">
        <p>Priston Tale é um MMORPG clássico que conquistou uma legião de fãs ao longo dos anos. Ambientado em um mundo de fantasia, o jogo oferece uma experiência imersiva com gráficos 3D, combates dinâmicos e uma rica história.</p>
        <p>Os jogadores podem escolher entre diversas classes, como Lutadores, Magos e Arqueiros, cada uma com habilidades únicas. O objetivo principal é evoluir seu personagem, enfrentar monstros desafiadores e participar de batalhas épicas em grupo.</p>
        <p>Além disso, o jogo conta com sistemas de clãs, comércio entre jogadores e eventos especiais que tornam a experiência ainda mais envolvente. Priston Tale é uma aventura que combina nostalgia e diversão para os amantes de MMORPGs.</p>
      </div>
      <div class="image-information">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgtXj5LoftA97ii6cRIwm12Q6bY8TR3HDVvwT76HJ5iS8b-375o0Drb0anA9-jjkfI5nxTDd6JE_WNugKU7jenyo-wY4_Scn7n_USwSBbfoUv3s20Cz5yG69yON3mUfkwA4G0CbxO3aNtM/w1200-h630-p-k-no-nu/Lago.jpg" alt="Mapa do priston " width="300" height="300">
      </div>
    </div>
    <hr>
    <h2>Mapa</h2>
    <p>O mundo de Priston Tale é composto por diversos mapas interconectados, cada um com sua própria temática e desafios. Desde florestas densas até desertos áridos e montanhas geladas, os jogadores podem explorar uma grande variedade de cenários enquanto enfrentam monstros e descobrem segredos escondidos.</p>
    <h2>Classes</h2>
    <p>Priston Tale oferece uma ampla gama de classes para os jogadores escolherem, cada uma com habilidades e estilos de jogo únicos:</p>
    <ul>
      <li><strong>Lutador:</strong> Especialista em combate corpo a corpo, com alta resistência e força física.</li>
      <li><strong>Mago:</strong> Mestre das artes mágicas, capaz de lançar feitiços devastadores.</li>
      <li><strong>Arqueiro:</strong> Perito em ataques à distância, com alta precisão e agilidade.</li>
      <li><strong>Assassino:</strong> Focado em ataques rápidos e furtivos.</li>
      <li><strong>Sacerdote:</strong> Suporte essencial, com habilidades de cura e buffs.</li>
    </ul>
    <h2>Cidades</h2>
    <p>As cidades em Priston Tale são os principais pontos de encontro para os jogadores. Elas oferecem serviços como lojas, ferreiros e áreas de comércio. Algumas das cidades mais conhecidas incluem:</p>
    <ul>
      <li><strong>Pilai:</strong> Uma cidade inicial para novos jogadores, com um ambiente acolhedor e seguro.</li>
      <li><strong>Ricarten:</strong> O coração do mundo de Priston, onde os jogadores podem encontrar missões e interagir com outros aventureiros.</li>
      <li><strong>Navisko:</strong> Uma cidade misteriosa localizada em uma área mais avançada, cercada por desafios perigosos.</li>
    </ul>
  </div>

  <?php
  include './core/ui/footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>