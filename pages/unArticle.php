<?php require_once('../inc/header.php'); ?>
<?php require_once('../inc/config.php') ?>


<?php
// On vérifie que l'id est bien présent 
if (isset($_GET['id'])) {
    $r = $pdo->query("SELECT * FROM article WHERE id = '$_GET[id]' ");
    // var_dump($article);
    // on stock dans une variable les données sous forme de tableau
    $article = $r->fetch(PDO::FETCH_ASSOC);
    $titre = addslashes($article['titre']);
    $contenu = addslashes($article['contenu']);
    //var_dump($article);
}


?>

<div class="container">
    <div class="row text-center">
        <h1><?= $titre ?></h1>
        <img src="../photo/<?= $article['photo'] ?>" alt="">
        <p><?= $contenu ?></p>


    </div>




    <?php require_once('../inc/footer.php'); ?>