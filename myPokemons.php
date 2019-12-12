<?php
session_start();

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit(401);
}

require_once('templates/header.php');
require_once('controller/pokemon/getUserPokemon.php');
?>

<div class="row" id="js-list">
    <?php foreach ($pokemons as $pokemon): ?>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title js-name"><?= $pokemon['name'] ?></h5>
                        <button class="btn btn-danger btn-sm js-delete-pokemon" data-id="<?= $pokemon['id'] ?>" data-username="<?= $pokemon['username'] ?>">Release</button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="card-text js-description"><?= $pokemon['description'] ?></p>
                        <button class="btn btn-warning btn-sm js-edit-pokemon" data-id="<?= $pokemon['id'] ?>" data-username="<?= $pokemon['username'] ?>">Modify</button>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <?php foreach ($pokemon['type'] as $key => $type): ?>
                        <li class="list-group-item js-type<?= $key + 1 ?>"><?= $type ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="d-flex justify-content-center container align-items-center h-25">
    <a class="btn btn-primary" href="create.php">Create a new pokémon</a>
</div>

<script src="js/deletePokemonAjax.js"></script>
<script src="js/editPokemonAjax.js"></script>
<?php require_once('templates/footer.php') ?>

