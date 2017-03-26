<?php

/**
 * Fichier test_lignesMetro.php
 * @author Danny Labeaume
 * @version 2017-03-25
 */
require_once '../../component/lib/deboguer.php';
require_once '../../application/modeles/modele_lignesMetro.php';

/**
 * test de la fonction getLignesMetro()
 */
// valide
try {
    a(getLignesMetro(), 'getLignesMetro()');
} catch (Exception $oErreur) {
    echo "<p style=\"color:red;\">" . $oErreur->getMessage() . "</p>";
}
