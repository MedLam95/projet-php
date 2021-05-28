<?php require_once('../inc/header.php'); ?>
<?php require_once("../inc/config.php"); ?>
<!-- On envoie l'article vers la bdd -->
<?php



if (isset($_POST['Ajout_article'])) {

    if ($_FILES['photo']['name']) {
        $nom_photo = $_FILES['photo']['name'];
        $photo_dossier = RACINE_SITE . "photo/$nom_photo";

        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
    $titre = addslashes($_POST['titre']);
    $contenu = addslashes($_POST['contenu']);

    $pdo->query("INSERT INTO article (photo, titre, contenu) VALUES ('$nom_photo', '$titre' , '$contenu)");
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
    $contenuSub = substr($donneesArticle['contenu'], 0, 15);

    $contentArticle .= "<div class=\"card mx-1 my-1\" style=\"width: 18rem; ;\"> <div class=\"card-body\">";

    $contentArticle .= "<img class=\"card-img-top\" src=\"../photo/$donneesArticle[photo]\" alt=\"Card image cap\">";

    $contentArticle .= "<h5 class=\"card-title\">$donneesArticle[titre]</h5>";

    $contentArticle .= "<p class=\"card-text\">$contenuSub...</p><a href=\"unArticle.php?id=$donneesArticle[id]\" class=\"btn btn-primary\">lire la suite...</a>
        </div>
        </div> ";
}

?>

<form method="post" action="" enctype='multipart/form-data'>
    <div class="mb-6">
        <label for="title" class="form-label">Titre de l'article</label>
        <input type="text" class="form-control" id="title" name="titre">
    </div>
    <div class="mb-6">
        <label for="content" class="form-label">Contenue de l'article</label>
        <textarea class="form-control" id="content" name="contenu"></textarea>
    </div>
    <div class="mb-6">
        <label for="photo" class="form-label">photo de l'article</label>
        <input type="file" name="photo">
    </div>
    <button class=" form-control mx-5" type='submit' name='Ajout_article'>Publier</button>
</form>

<div class="container">
    <div class="row">
        <?= $contentArticle ?>
    </div>
</div>

<?php require_once('../inc/footer.php'); ?>