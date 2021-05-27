<?php require_once('../inc/header.php'); ?>

<?php
require_once("../inc/config.php");

if (isset($_POST['but_upload'])) {
    $photo_bdd = '';
    $commentaire_bdd = '';
    //debug($_FILES);
    if ($_FILES['photo']['name']) {
        $nom_photo = $_FILES['photo']['name'];
        $photo_dossier = RACINE_SITE . "photo/$nom_photo";
        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
    // On envoie photo et commentaires vers la bdd
    $pdo->query("INSERT INTO images (photo, commentaires) VALUES ('$nom_photo', '$_POST[commentaire]')");
}

?>
<!-- Formulaire permettant d'envoyer une photo et un commentaire -->
<div class="container">
    <div class="row">
        <form class="form-group d-flex align-items-start w-90 p-3 mx-5" method="post" action="" enctype='multipart/form-data'>
            <input class="form-control mx-5" type='file' name='photo' />
            <textarea class="form-control mx-5" style="height: 25px;" type='text' name='commentaire'>Laissez un commentaire</textarea>
            <button class=" form-control mx-5" type='submit' name='but_upload'>Publier</button>
        </form>
    </div>
</div>


<?php require_once('../inc/footer.php'); ?>