<?php
session_start();

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit(401);
}

require_once('templates/header.php');
require_once('controller/pokemon/getUserPokemon.php');
?>
<link rel="stylesheet" href="css/pokemons.css">

<div class="container">
    <div class="row" id="js-list">
        <?php foreach ($pokemons as $pokemon): ?>
            <div class="col-sm-4 mb-5">
                <div class="card" style="border: 2px solid #<?= $pokemon['color'] ?>80">
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
                    <footer class="blockquote-footer d-flex justify-content-end">Created <?= gmdate("D jS M Y ", $pokemon['created_at']) ?></footer>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="d-flex justify-content-center container align-items-center flex-column h-25">
    <a class="btn btn-primary mb-1" href="create.php">Create a new pokémon</a>
    <?php if (isset($_SESSION['PDOError'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['PDOError'] ?>
        </div>
    <?php endif; ?>
</div>

<script src="js/deletePokemonAjax.js"></script>
<script src="js/editPokemonAjax.js"></script>
<?php require_once('templates/footer.php') ?>

