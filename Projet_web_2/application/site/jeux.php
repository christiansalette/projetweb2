<?php

/*
 * Page jeux du site
 * Projet Web 2
 * @author Danny Labeaume, Christian Salette, Arnaud Martin
 * @version 2017-03-22
 */

// Récupération du header, du controleur et du footer (meme chose pour toutes les pages)
require_once('../../component/header.php');
require_once('../controleur/controleur_jeux.php');
require_once('../../component/footer.php');

//Appel des fonctions
getHeader();
afficherJeux();
getFooter();
