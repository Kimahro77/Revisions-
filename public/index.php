<?php
// Charger les dépendances avec Composer
require "../vendor/autoload.php";
// Charger les classes du projet
require __DIR__ . "/../app/controllers/MainController.php";

$router = new AltoRouter;
// Retenir l'URL de base à partir de laquelle calculer les nouvelles URL
$router->setBasePath($_SERVER["BASE_URI"]);


// Méthode map: sert à définir les routes
// - méthode GET ou POST
// - URL que l'on souhaite capturer
// - fonction que l'on souhaite exécuter
// - Nom de la règle

// Route de la page d'accueil
$router->map("GET", "/", function() {
    $controller = new MainController;
    $controller->render("accueil");
}, "home");

// Route de la page présentation
$router->map("GET", "/presentation", function() {
    $controller = new MainController;
    $controller->render("presentation");
}, "presentation");

// Route de la page produits
$router->map("GET", "/produits", function() { 
    $controller = new MainController;
    $controller->render("produits");
}, "produits");

// Route de la page produits
$router->map("GET", "/produit/[i:id]", function($params) { 
    $controller = new MainController;
    $controller->render("produit", $params);
}, "produit");


// Méthode match: cherche une correspondance entre l'URL donnée et les routes définies
// Renvoie les informations de la route trouvée ou FALSE si rien n'est trouvé

// On demande à AltoRouter de trouver une concordance entre l'URL donnée et les routes définies
$match = $router->match();

// Si aucune correspondance n'a été trouvée
if ($match === FALSE) {
    echo "Page non trouvée";
// Sinon, lancer la fonction qui permet d'afficher la page correspondante    
} else {
    call_user_func( $match['target'], $match['params']);
}
