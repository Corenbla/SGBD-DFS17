<?php require_once('templates/header.php') ?>
<?php if (isset($_SESSION['user'])): ?>
    <div class="alert alert-success container fixed-bottom" role="alert">
        Welcome back, <?= $_SESSION['user']['username'] ?> !
    </div>
<?php endif; ?>
<div class="container d-flex h-100 align-items-center justify-content-center">
    <?php if (isset($_SESSION['user'])): ?>
        <?php require('pokedex.php'); ?>
    <?php else: ?>
        <h1>
            <a href="/login.php">Login</a>
        </h1>
    <?php endif ?>
</div>

<?php require_once('templates/footer.php') ?>
