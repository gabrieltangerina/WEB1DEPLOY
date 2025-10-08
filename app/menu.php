<ul class="nav nav-pills">
    <li class="nav-item"><a href="contato.php" class="nav-link active" aria-current="page">Formulário</a></li>
    <li class="nav-item"><a href="listagem.php" class="nav-link">Listagem</a></li>
    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
        <li class="nav-item"><a href="logout.php" class="nav-link">Logout (<?= htmlspecialchars($_SESSION['user']) ?>)</a></li>
    <?php else: ?>
        <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
    <?php endif; ?>
</ul>
