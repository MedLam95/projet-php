<?php

$photo_bdd = '';
//debug($_FILES);
if ($_FILES['photo']['name']) {
    $nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
    $photo_bdd = URL . "photo/$nom_photo";
    $photo_dossier = RACINE_SITE . "photo/$nom_photo";
    copy($_FILES['photo']['tmp_name'], $photo_dossier);
}
