<?php
session_start();
header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
header('Content-Type: text/html; charset=utf-8');

// Chargement des dépendances

require_once 'module/recuperationUrl.class.php';
require_once 'module/routeur.class.php';
require_once 'module/securite.class.php';


// Espaces de nom utilisés

use module\RecuperationUrl;
use module\Routeur;
use module\Securite;


// Initialisation des valeurs

//parametres page
$vueCourante            = '';
$parametres             = array();
$parametres['page']     = '';


//Initialisation classes a utiliser
$chargementUrl       = new RecuperationUrl();
$filtreUrl           = new Securite();



/**
 * Gestion parametres[]
 */



    // traitement des parametres et verification du client à qui l'on transmet les infos
    if (!is_null( $chargementUrl->recuperationUrl())) {
        $parametres = $chargementUrl->getParametres();
    }

    $urlRouter = new Routeur($parametres);
    $routeur = $urlRouter->resolutionRoute();

    /**
     * Appel à la vue correspondante
     */
    $fichierVue = 'vue/' . $filtreUrl->securiteUrl( $routeur['vue']) . '.vue.php';
    if (file_exists($fichierVue) && $fichierVue != 'index.php') {
        include $fichierVue;
    }
