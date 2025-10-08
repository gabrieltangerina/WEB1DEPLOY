<?php
require 'header.php';

// Simple login form
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <?php if (isset($_SESSION['login_error'])): ?>
                        <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['login_error']) ?></div>
                        <?php unset($_SESSION['login_error']); ?>
                    <?php endif; ?>
                    <form action="login_process.php" method="POST">
                        <div class="mb-3">
                            <label for="user" class="form-label">Usuário</label>
                            <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'footer.php'; ?>
