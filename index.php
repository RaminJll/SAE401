<?php
// index.php

require __DIR__ . '/bootstrap.php';
require_once 'src/Controller/Controller.class.php';

use Controller\Controller;

$controller = new Controller($entityManager);

// Si aucune page n'est spécifiée dans l'URL, rediriger vers la page d'accueil
if (!isset($_GET["page"])) {
    $_GET["page"] = "connexion";
}

$controller->main();


?>
