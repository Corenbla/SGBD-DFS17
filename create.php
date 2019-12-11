<?php
session_start();

if (!isset($_SESSION['user'])) {
    http_response_code(401); exit(401);
}

require_once('templates/header.php');
require_once('controller/type/getAllTypes.php');
?>

<form class="jumbotron container" method="POST" action="controller/pokemon/createPokemon.php">
    <div class="form-group">
        <label for="type1">Type 1:</label>
        <select class="form-control" id="type1" name="type_1">
            <?php foreach ($allTypes as $type):?>
                <option value="<?= $type['id'] ?>"><?= $type['type'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="type2">Type 2:</label>
        <select class="form-control" id="type2" name="type_2">
            <?php foreach ($allTypes as $type):?>
                <option value="<?= $type['id'] ?>"><?= $type['type'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>

    <input type="hidden" name="user" value="<?= $_SESSION['user']['id'] ?>">

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