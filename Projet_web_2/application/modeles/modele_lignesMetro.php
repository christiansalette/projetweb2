<?php

/**
 * Fichier modele_lignesMetro.php
 * Projet Web 2
 * @author Danny Labeaume, Christian Salette, Arnaud Martin
 * @version 2017-03-25
 */
require_once '../../component/lib/TypeException.class.php';
require_once '../../component/lib/PDOLib.php';

/**
 * Retourne la liste des lignes de métro
 * @return array     Les lignes de métro
 */
function getLignesMetro() {
    // Connexion à la BDD
    try {
        $oPDO = connexionALaBDD();          // crée un objet PDO
    } catch (PDOeXCEPTION $uneVariable) {
        echo $uneVariable->getMessage();
    }

    // Requête SQL pour obtenir toutes les lignes de métro
    $sRequete = "SELECT *
                 FROM `pjt_lignes`
                ";

    // Préparer la requête SQL = mettre la requête dans un espace mémoire de MySQL
    $oPDOStatement = $oPDO->prepare($sRequete);

    // Exécuter la requête
    $bExecution = $oPDOStatement->execute(); /* pourrait retourner 'false' seulement si le serveur SQL tombe durant la requête car on aura testé les reuqêtes apriori ==> si on obtient 'false', vérifier la requête */

    // Récupérer les enregistrements
    if ($bExecution) {
        $aLignesMetro = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "<br>L'exécution de la requête dans la fonction '<b>getLignesMetro()</b>' a retourné 'FALSE'. Testez la requête dans phpMyAdmin.<br>";
    }

    return $aLignesMetro;
}
