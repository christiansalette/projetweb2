<?php

/**
 * Fichier PDOLib.php
 * Component du framework
 * pour le cours 582-P21-MA Programmation Web Dynamique II
 * @author Caroline Martin
 * @version 2016-06-22
 */
define("HOST", "127.0.0.1");
define("USER", "root");
define("PWD", "");
define("BDD", "bdd_projetweb2");
define("PILOTE_BDD", "mysql");
define("CHARSET", "utf8");
define("MODE_ERREUR", "ERRMODE_EXCEPTION");

/**
 *
 * Vérifier la valeur passée en paramètre
 * @param string $sHost
 */
function setsHost($sHost) {
    TypeException::estVide($sHost);
    TypeException::estChaineDeCaracteres($sHost);
}

/**
 *
 * Vérifier la valeur passée en paramètre
 * @param string $sUser
 */
function setsUser($sUser) {
    TypeException::estVide($sUser);
    TypeException::estChaineDeCaracteres($sUser);
}

/**
 *
 * Vérifier la valeur passée en paramètre
 * @access public
 * @param string $sPwd
 */
function setsPwd($sPwd) {

}

/**
 *
 * Vérifier la valeur passée en paramètre
 *
 * @param string $sPiloteBdd
 *
 * CUBRID (PDO) — CUBRID Functions (PDO_CUBRID)
 * MS SQL Server (PDO) — Microsoft SQL Server and Sybase Functions (PDO_DBLIB)
 * Firebird (PDO) — Firebird Functions (PDO_FIREBIRD)
 * IBM (PDO) — IBM Functions (PDO_IBM)
 * Informix (PDO) — Informix Functions (PDO_INFORMIX)
 * MySQL (PDO) — MySQL Functions (PDO_MYSQL)
 * MS SQL Server (PDO) — Microsoft SQL Server Functions (PDO_SQLSRV)
 * Oracle (PDO) — Oracle Functions (PDO_OCI)
 * ODBC and DB2 (PDO) — ODBC and DB2 Functions (PDO_ODBC)
 * PostgreSQL (PDO) — PostgreSQL Functions (PDO_PGSQL)
 * SQLite (PDO) — SQLite Functions (PDO_SQLITE)
 * 4D (PDO) — 4D Functions (PDO_4D)
 *
 * Pour vérifier quels sont les pilotes installés : print_r(PDO::getAvailableDrivers());
 */
function setsPiloteBdd($sPiloteBdd) {
    TypeException::estVide($sPiloteBdd);
    TypeException::estChaineDeCaracteres($sPiloteBdd);
    $aPilotesBdd = array("cubrid", "mssql", "mysql", "sybase", "sqlite");

    if (in_array($sPiloteBdd, $aPilotesBdd) == false) {
        throw new Exception("ERR_PDO_PILOTE_BDD");
    }
}

/**
 * Vérifier la valeur passée en paramètre
 * @param string $sBdd
 */
function setsBdd($sBdd) {
    TypeException::estVide($sBdd);
    TypeException::estChaineDeCaracteres($sBdd);
}

/**
 *
 * Vérifier la valeur passée en paramètre
 * @param string $sCharset
 */
function setsCharset($sCharset) {
    TypeException::estVide($sCharset);
    TypeException::estChaineDeCaracteres($sCharset);

    $aCharsets = array("utf8", "iso8859-1");
    if (in_array($sCharset, $aCharsets) == false) {
        throw new Exception("ERR_PDO_CHARSET");
    }
}

/**
 *
 * Vérifier la valeur passée en paramètre
 * @param string $sModeErreur
 * PDO::ERRMODE_SILENT c'est le mode par défaut de PHP,
 * PDO::ERRMODE_WARNING : This mode will issue a standard PHP warning, and allow the program to continue execution. It's useful for debugging.
 * PDO::ERRMODE_EXCEPTION : This is the mode you should want in most situations. It fires an exception, allowing you to handle errors gracefully
 *  and hide data that might help someone exploit your system. Here's an example of taking advantage of exceptions
 */
function setsModeErreur($sModeErreur) {
    TypeException::estVide($sModeErreur);
    $aModesErreurs = array("ERRMODE_SILENT", "ERRMODE_WARNING", "ERRMODE_EXCEPTION");

    if (in_array($sModeErreur, $aModesErreurs) == false) {
        throw new Exception("ERR_PDO_ERRMODE");
    }
}

/**
 * Ouvrir une connexion sur la base de données
 * @param string $sHost
 * @param string $sUser
 * @param string $sPwd
 * @param string $sBdd
 * @param string $sPiloteBdd
 * @param string $sCharset
 * @param string $sModeErreur
 * @return PDO objet PDO
 */
function connexionALaBDD($sHost = HOST, $sUser = USER, $sPwd = PWD, $sBdd = BDD, $sPiloteBdd = PILOTE_BDD, $sCharset = CHARSET, $sModeErreur = MODE_ERREUR) {
    //Affectation
    setsHost($sHost);
    setsUser($sUser);
    setsPwd($sPwd);
    setsBdd($sBdd);
    setsPiloteBdd($sPiloteBdd);
    setsCharset($sCharset);
    setsModeErreur($sModeErreur);

    $sDsn = $sPiloteBdd
            . ":dbname=" . $sBdd . ";"
            . "host=" . $sHost . ";"
            . "charset=" . $sCharset;

    //Crée un objet PDO = connexion au SGBD mysql
    $oPDO = new PDO($sDsn, $sUser, $sPwd);
    return $oPDO;
}

//fin de la fonction

/**
 * récupérer tous les enregistrements
 * obtenus à partir d'un SELECT
 * sur la base de données
 * @param PDOStatement $oPDOStatement
 * @return array
 */
function recupererTousLesEnregistrements(PDOStatement $oPDOStatement) {
    $aEnregs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);

    return $aEnregs;
}

//fin de la fonction

/**
 * récupérer un enregistrement obtenu à partir d'un SELECT
 * sur la base de données
 * @param PDOStatement $oPDOStatement
 * @return array
 */
function recupererUnEnregistrement(PDOStatement $oPDOStatement) {
    $aEnregs = $oPDOStatement->fetch(PDO::FETCH_ASSOC);

    return $aEnregs;
}

//fin de la fonction
