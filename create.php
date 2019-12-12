<?php
session_start();

if (!isset($_SESSION['user'])) {
    http_response_code(401); exit(401);
}

require_once('templates/header.php');
require_once('controller/type/getAllTypes.php');
?>

<form class="jumbotron container" method="POST" action="controller/pokemon/createPokemon.php">
    <?php require_once('templates/pokemonForm.php'); ?>
    
    <div class="form-group d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Create!</button>
    </div>
</form>

<?php if (isset($_SESSION['PDOError'])): ?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['PDOError'] ?>
    </div>
<?php endif; ?>

<?php
require_once('templates/footer.php');