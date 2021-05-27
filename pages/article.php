<?php require_once('../inc/header.php'); ?>
<?php
require_once("../inc/config.php"); ?>
<!-- On envoie l'article vers la bdd -->
<?php

if (!empty($_POST)) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $pdo->query("INSERT INTO article (titre, contenu) VALUES ('$_POST[title]', '$_POST[content]')");
}
?>
<form method="POST" action="../pages/article.php">
    <div class="mb-3">
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Contenue de l'article</label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>
<?php require_once('../inc/footer.php'); ?>