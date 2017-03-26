<?php

/**
 * Fichier test_compositions.php
 * @author Danny Labeaume
 * @version 2017-03-25
 */
require_once '../../component/lib/deboguer.php';
require_once '../../application/modeles/modele_compositions.php';


/**
 * test de la fonction getCompositions($idLignes)
 */
// NON VALIDE : $idLignes =
try {
    a(getCompositions(), 'getCompositions($idLignes)');
} catch (Exception $oErreur) {
    echo "<p style=\"color:red;\">" . $oErreur->getMessage() . "</p>";
}

// NON VALIDE : $idLignes = 7
try {
    a(getCompositions(7), 'getCompositions($idLignes)');
} catch (Exception $oErreur) {
    echo "<p style=\"color:red;\">" . $oErreur->getMessage() . "</p>";
}

// valide : $idLignes = 2
try {
    a(getCompositions(2), 'getCompositions($idLignes)');
} catch (Exception $oErreur) {
    echo "<p style=\"color:red;\">" . $oErreur->getMessage() . "</p>";
}
