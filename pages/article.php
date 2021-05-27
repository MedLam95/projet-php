<?php require_once('../inc/header.php'); ?>
<?php require_once("../inc/config.php"); ?>
<!-- On envoie l'article vers la bdd -->
<?php

if (!empty($_POST)) {
    $title = $_POST['titre'];
    $content = $_POST['contenu'];

    $pdo->query("INSERT INTO article (titre, contenu, photo) VALUES ('$_POST[titre]', '$_POST[contenu]', '$_POST[photo]')");
}


?>
<?php
// On récupère l'article
$a = $pdo->query("SELECT * FROM article");
// var_dump($donnees = $r->fetch(PDO::FETCH_ASSOC));
$contentArticle = '';
// var_dump($donnees);
// On affiche l'article
while ($donneesArticle = $a->fetch(PDO::FETCH_ASSOC)) {

    $contentArticle .= "<div class=\"card mx-1 my-1\" style=\"width: 18rem;\"> <div class=\"card-body\">";

    $contentArticle .= "<img class=\"card-img-top\" src=\"../photo/$donneesArticle[photo]\" alt=\"Card image cap\">";

    $contentArticle .= "<h5 class=\"card-title\">$donneesArticle[titre]</h5>";

    $contentArticle .= "<p class=\"card-text\">$donneesArticle[contenu]</p><a href=\"?id=$donneesArticle[id]\" class=\"btn btn-primary\">lire la suite...</a>
        </div>
        </div> ";
}

?>

<form method="POST" action="../pages/article.php">
    <div class="mb-6">
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" class="form-control" id="title" name="titre">
    </div>
    <div class="mb-6">
        <label for="content" class="form-label">Contenue de l'article</label>
        <textarea class="form-control" id="content" name="contenu"></textarea>
    </div>
    <div class="mb-6">
        <label for="content" class="form-label">photo de l'article</label>
        <input type="file" class="form-control" id="content" name="photo">
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>

<div class="container">
    <div class="row">
        <?= $contentArticle ?>
    </div>
</div>

<?php require_once('../inc/footer.php'); ?>