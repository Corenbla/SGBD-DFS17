<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit(401);
}

require_once('/var/www/html/controller/type/getAllTypes.php');
if (isset($_POST['id'])) {
    require_once('/var/www/html/controller/pokemon/getOnePokemon.php');
}
?>
<div class="form-group">
    <label for="type1">Type 1:</label>
    <select class="form-control" id="type1" name="type_1">
        <?php foreach ($allTypes as $type): ?>
            <option value="<?= $type['id'] ?>" <?php if (isset($pokemon) && $pokemon['type_id'] == $type['id']) {
                echo 'selected';
            } ?>><?= $type['type'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="type2">Type 2:</label>
    <select class="form-control" id="type2" name="type_2">
        <?php foreach ($allTypes as $type): ?>
            <option value="<?= $type['id'] ?>" <?php if (isset($pokemon) && $pokemon['type2_id'] === $type['id']) {
                echo 'selected';
            } ?>><?= $type['type'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="name">Name:</label>
    <input class="form-control" type="text" id="name" name="name" value="<?= $pokemon['name'] ?? '' ?>">
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" name="description" id="description" rows="3"><?= $pokemon['description'] ?? '' ?></textarea>
</div>

<input type="hidden" name="user" value="<?= $_SESSION['user']['id'] ?>">