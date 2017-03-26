<?php

/**
 * Fichier deboguer.php
 * Fonctions pour afficher le contenu des variables
 * pour aider à déboguer
 * @author Danny Labeaume
 * @version v1.0 - 2016-09-06
 * @copyright (c) 2016, Danny Labeaume
 * @version 2017-03-25
 */
// die(); // pour arrêter un script et voir l'affichage des variable.
//
//
// COULEURS
const bleu = "#00AAFF";
const bleup = "#add8e6";
const orange = "#FF4400";
const rose = "#FF00FF";
const rouge = "red";
const vert = "#00FF00";

/**
 * Affiche des informations lisibles pour une variable avec print_r
 * @param mixed $variable
 * @param string $label - optionnel
 * @return void
 */
function a($variable, $label = 'DÉBUT') { // 'a' pour afficher
    echo "<pre style='background-color: #F9F222; '>";
    echo "<span style='color: red; font-weight: bold;'>***   ";
    echo ( $label );
    echo "   ***</span><br>";
    print_r($variable);
    echo "<br><span style='font-weight: bold;'>___ fin";
    if ($label != 'DÉBUT')
        echo " de $label";
    echo " ___</span>";
    echo '</pre>';
}

/**
 * Affiche les informations d'une variable avec var_dump().
 * var_dump() affiche les informations structurées d'une variable, y compris son type et sa valeur. Les tableaux et les objets sont explorés récursivement, avec des indentations, pour mettre en valeur leur structure.
 * Comparé à print_r, var_dump affiche le type des variables et leur longueur
 * @param mixed $variable
 * @param string $label - optionnel
 * @return void
 */
function ad($variable, $label = 'DÉBUT') { // 'ad' pour afficher détails ou pour afficher _dump
    echo '<pre style="background-color: #F9F222;>';
    echo "---   ";
    echo ( $label );
    echo "   ---<br>";
    var_dump($variable);
    echo "<br>___ fin";
    if ($label != 'DÉBUT')
        echo " de $label";
    echo " ___";
    echo '</pre>';
}

/**
 *
 * @param string $label - optionnel
 * @return void
 */
function ae($label) { // 'a' pour afficher et 'e' pour étiquette
    echo '<pre style="background-color: #F9F222;" style="color: yellow;">';
    echo "---   ";
    echo ( $label );
    echo "   ---<br>";
    echo '</pre>';
}

/**
 * Retourne le code PHP utilisé pour générer une variable.
 * var_export() retourne des données structurées sur la variable donnée. C'est le même principe que var_dump() mais avec une exception :
 * le résultat retourné est du code PHP valide.
 * @param mixed $variable
 * @param string $label - optionnel
 * @return void
 */
/*
function ae( $variable, $label='DÉBUT ') { // 'a' pour afficher et 'e' pour export
    echo '<pre>';
    echo "---   ";
    echo ( $label );
    echo "   ---<br>";
    var_export( $variable );
    echo "<br>___ fin ___";
    echo '</pre>';
}
*/