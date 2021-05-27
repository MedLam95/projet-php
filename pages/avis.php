<?php require_once('../inc/header.php'); ?>
<!-- On créé un compteur de vues sur notre site -->
<?php $handle = fopen("../counter/counter.txt", "r");
if (!$handle) {
    echo "fichier introuvable";
} else {
    $counter = (int) fread($handle, 20);
    fclose($handle);
    $counter++;
    echo " <strong> Vous êtes le visiteur numéro " . $counter . " </strong> ";
    $handle = fopen("../counter/counter.txt", "w");
    fwrite($handle, $counter);
    fclose($handle);
} ?>


<?php require_once('../inc/footer.php');
