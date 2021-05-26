<?php require_once('../inc/header.php'); ?>

<?php
require_once("../inc/config.php");

if (isset($_POST['but_upload'])) {
    $photo_bdd = '';
    //debug($_FILES);
    if ($_FILES['photo']['name']) {
        $nom_photo = $_FILES['photo']['name'];
        $photo_dossier = RACINE_SITE . "photo/$nom_photo";
        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
    $pdo->query("INSERT INTO images (photo) VALUES ('$nom_photo')");
}

?>

<form class="form-group d-flex align-items-start w-50 p-3" method="post" action="" enctype='multipart/form-data'>
    <input class="form-control" type='file' name='photo' />
    <button class="form-control" type='submit' name='but_upload'>Publier</button>
</form>

<?php require_once('../inc/footer.php'); ?>