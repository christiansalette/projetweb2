<?php

/**
 * Fichier footer.php
 * Projet Web 2
 * @author Danny Labeaume, Christian Salette, Arnaud Martin
 * @version 2017-03-22
 */

/**
 * Fonction permettant de construire le haut de page de l'application (pourrait avoir des variables pour le titre, etc)
 */
function getHeader() {
    echo'
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <title>projet Web 2 - jeux</title>
                    <link rel="stylesheet" href="../../public/css/style.css">
                    <script src="../../public/javascript/projet.js"></script>
                    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                </head>
                <body>
                    <header>
                        <nav></nav>
                    </header>

        ';
}
