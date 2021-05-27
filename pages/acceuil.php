<?php require_once('../inc/config.php') ?>
<?php require_once('../inc/header.php'); ?>
<?php
// On récupère l'image
$r = $pdo->query("SELECT * FROM images");
// var_dump($donnees = $r->fetch(PDO::FETCH_ASSOC));
$content = '';
// var_dump($donnees);
// On affiche l'image
while ($donnees = $r->fetch(PDO::FETCH_ASSOC)) {
    foreach ($donnees as $indice => $value) {
        if ($indice == 'photo') {
            $content .= "<img class=\"card-img-top\" src= \"../photo/$value\" alt=\"Carte d'image\" \"<br>";
        }
        if ($indice == 'commentaires') {
            $content .= "<p class=\"card-text\"> $value </p>";
        }
    }
}
?>
<!-- Ajout de cartes affichant les photos et les commentaires -->
<div class="container">
    <div class="row">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <?= $content ?>
            </div>
        </div>
    </div>
</div> <?php require_once('../inc/footer.php'); ?>