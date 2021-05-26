<?php

$pdo = new PDO('mysql:host=localhost;dbname=php-projet', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/projet-php/');
define("URL", 'http://localhost/projet-php/');
