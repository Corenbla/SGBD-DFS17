<?php require_once('templates/header.php') ?>

<div class="container d-flex h-100 align-items-center justify-content-center">
    <?php if (isset($_SESSION['user'])): ?>
        <div class="field d-flex align-items-center justify-content-center">
            <div class="pokemon">
<!--                <img src="--><?//= $pokemonImage ?><!--" alt="pokémon">-->
            </div>
        </div>
    <?php else: ?>
        <h1>
            <a href="/login.php">Login</a>
        </h1>
    <?php endif ?>
</div>

<?php require_once('templates/footer.php') ?>
