<?php
session_start();

if (!isset($_SESSION['user'])) {
    http_response_code(401); exit(401);
}

require_once('templates/header.php');
require_once('controller/pokemon/getUserPokemon.php');
?>

<div class="row">
    <?php foreach ($pokemons as $pokemon): ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $pokemon['name'] ?></h5>
                    <p class="card-text"><?= $pokemon['description'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($pokemon['type'] as $type): ?>
                        <li class="list-group-item"><?= $type ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once('templates/footer.php') ?>

