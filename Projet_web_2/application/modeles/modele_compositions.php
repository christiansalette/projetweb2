<?php

/**
 * Fichier modele_compositions.php
 * Projet Web 2
 * @author Danny Labeaume, Christian Salette, Arnaud Martin
 * @version 2017-03-25
 */
require_once '../../component/lib/TypeException.class.php';
require_once '../../component/lib/PDOLib.php';

/**
 * Retourne les compositions selon la lignes de métro passé en paramètre
 * L'ordre des compositions sera différente à chaque requête dû au ORDER BY RND() dans la requête.
 *
 * @param string (numeric) $idLigne    Le id de la ligne de métro
 * @return array                       Les compositions
 */
function getCompositions($idLigne) {

    // Connexion à la BDD
    try {
        $oPDO = connexionALaBDD();          // crée un objet PDO
    } catch (PDOeXCEPTION $uneVariable) {
        echo $uneVariable->getMessage();
    }

    // Requête SQL pour obtenir toutes les compositions associées à une lignes de métro
    $sRequete = "SELECT *
                FROM `pjt_compositions`
                WHERE `idStation` IN (
                                        SELECT `pjt_stations`.`idStation`
                                        FROM `pjt_stations`
                                        INNER JOIN `pjt_lignes_stations`
                                        ON `pjt_lignes_stations`.`idStation` = `pjt_stations`.`idStation`
                                        WHERE `pjt_lignes_stations`.`idLigne` = :idLigne
                                      )
                ORDER BY RAND()
                ";

    // Préparer la requête SQL = mettre la requête dans un espace mémoire de MySQL
    $oPDOStatement = $oPDO->prepare($sRequete);

    // Lier les paramètres aux valeurs
    $oPDOStatement->bindValue(":idLigne", $idLigne, PDO::PARAM_STR);

    // Exécuter la requête
    $bExecution = $oPDOStatement->execute(); /* pourrait retourner 'false' seulement si le serveur SQL tombe durant la requête car on aura testé les reuqêtes apriori ==> si on obtient 'false', vérifier la requête */

    // Récupérer les enregistrements
    if ($bExecution) {
        $aCompositions = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "<br>L'exécution de la requête dans la fonction '<b>getCompositions()</b>' a retourné 'FALSE'. Testez la requête dans phpMyAdmin.<br>";
    }

    return $aCompositions;
}
