<?php require_once('../inc/config.php') ?>
<?php require_once('../inc/header.php'); ?> <div class='container'>
    <?php

    $r = $pdo->query("SELECT * FROM images");

    // var_dump($donnees = $r->fetch(PDO::FETCH_ASSOC));
    $content = '';
    // var_dump($donnees);
    while ($donnees = $r->fetch(PDO::FETCH_ASSOC)) {
        foreach ($donnees as $indice => $value) {
            if ($indice == 'photo') {
                $content  = "<img class=\"d-block w-100\" src= \"../photo/$value\" alt=\"First slide\" \"<br>";
            }
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 mx-5 my-5"> <?= $content ?> </div>
        </div>
    </div> <?php require_once('../inc/footer.php'); ?>