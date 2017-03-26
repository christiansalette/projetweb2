<?php

/**
 * Fichier controleur de la page jeux.php
 * Projet Web 2
 * @author Danny Labeaume, Christian Salette, Arnaud Martin
 * @version 2017-03-22
 */
//Chargement de la vue et du modèle
require_once('../vues/vue_jeux.php');
//require_once('../modeles/modele_jeux.php');

/**
 * Fonction permettant de construire la page du jeux de l'application
 * return void
 */
function afficherJeux() {
    //Récupérer les compositions avec le modele
    //l'envoyer à la vue et l'affciher
    getVueJeux("");
}
