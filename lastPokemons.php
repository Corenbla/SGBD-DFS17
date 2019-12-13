<?php
require_once('templates/header.php');
require_once('controller/pokemon/getLastPokemons.php');
?>
<link rel="stylesheet" href="css/pokemons.css">

<div class="container">
    <div class="row">
        <?php foreach ($lastPokemons as $pokemon): ?>
            <div class="col-sm-4 mb-5">
                <div class="card" style="border: 2px solid #<?= $pokemon['color'] ?>80">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between"><?= $pokemon['name'] ?><small><?= $pokemon['username'] ?></small></h5>
                        <p class="card-text"><?= $pokemon['description'] ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($pokemon['type'] as $type): ?>
                            <li class="list-group-item"><?= $type ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <footer class="blockquote-footer d-flex justify-content-end">Created <?= gmdate("D jS M Y ", $pokemon['created_at']) ?></footer>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once('templates/footer.php') ?>

                               