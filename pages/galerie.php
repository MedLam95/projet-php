<?php
include("../inc/config.php");

if (isset($_POST['but_upload'])) {
    $photo_bdd = '';
    //debug($_FILES);
    if ($_FILES['photo']['name']) {
        $nom_photo = $_FILES['photo']['name'];
        $photo_bdd = URL . "photo/$nom_photo";
        $photo_dossier = RACINE_SITE . "photo/$nom_photo";
        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
    $pdo->query("INSERT INTO images (photo) VALUES ('$photo_bdd')");
}

?>

<form method="post" action="" enctype='multipart/form-data'>
    <input type='file' name='photo' />
    <input type='submit' value='Save name' name='but_upload'>
</form>