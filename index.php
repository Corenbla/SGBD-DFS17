<?php require_once('templates/header.php'); ?>

<div class="container d-flex align-items-center justify-content-center" style="height: 90vh">
    <?php if (isset($_SESSION['user'])): ?>
        <a href="create.php" class="btn btn-primary">Create a new pokémon</a>
    <?php else: ?>
        <h1>
            <a href="/login.php" class="btn btn-primary btn-lg">Login</a>
        </h1>
    <?php endif ?>
</div>

<?php if (isset($_SESSION['user'])): ?>
    <div class="alert alert-success container fixed-bottom" role="alert">
        Welcome back, <?= $_SESSION['user']['username'] ?> !
    </div>
<?php endif; ?>

<?php require_once('templates/footer.php') ?>
