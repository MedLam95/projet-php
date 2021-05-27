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
            $content .= "<div class=\"card\" style=\"width: 18rem;\"><img class=\"card-img-top\" src= \"../photo/$value\" alt=\"Carte d'image\" \"<br>";
        }
        if ($indice == 'commentaires') {
            $content .= "<div class=\"card-body\"><p class=\"card-text\"> $value </p></div>
            </div>";
        }
    }
}
?>
<!-- Ajout de cartes affichant les photos et les commentaires -->
<div class="container">
    <div class="row">
        <?= $content ?>
    </div>


</div>
<!-- On créé un compteur de vues sur notre site -->
<?php $handle = fopen("../counter/counter.txt", "r");
if (!$handle) {
    echo "fichier introuvable";
} else {
    $counter = (int) fread($handle, 20);
    fclose($handle);
    $counter++;
    echo " <strong class=\"visite\"> Vous êtes le visiteur numéro " . $counter . " </strong> ";
    $handle = fopen("../counter/counter.txt", "w");
    fwrite($handle, $counter);
    fclose($handle);
} ?><?php require_once('../inc/footer.php'); ?>