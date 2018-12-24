<?php

// Contrôler principal
// Contrôle l'affichage des pages à partir des données récupérées dans index.php
class MainController {

    // Affiche la page demandée
    function render($name) {
        include __DIR__ . "/../views/header.php";
        include __DIR__ . "/../views/". $name .".php";
        include __DIR__ . "/../views/footer.php";
    }

}

