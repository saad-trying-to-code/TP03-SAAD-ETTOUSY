<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Manipulation des bases de PHP

// Commentaire sur une seule ligne avec double slash
# Commentaire sur une seule ligne avec dièse
/*
Commentaire sur plusieurs lignes
conforme aux directives du TP
*/

echo 'Hello PHP<br />';

// Exercice 1.1 : Noms de variables
// $x est valide car il commence par une lettre
// $_x est valide car il commence par un souligné
// $2x est invalide car il commence par un chiffre
// $x-y est invalide car le tiret est un opérateur arithmétique non autorisé
// $Prix_HT est valide car il est composé de lettres et de soulignés
// $prix ht est invalide car un espace est interdit dans un nom de variable
// $état est valide car PHP autorise les caractères accentués

$x = 10;
$_x = 20;
$Prix_HT = 60;
$état = "Actif";

$a = "valeur minuscule";
$A = "valeur MAJUSCULE";
echo $a . "<br />";
echo $A . "<br />";

// Exercice 1.2 : Constantes
require "config.php";

echo ETABLISSEMENT . "<br />";
echo NOTE_MIN . "<br />";
echo NOTE_MAX . "<br />";
echo SEUIL . "<br />";

var_dump(defined("SEUIL"));
var_dump(defined("INCONNUE"));

// Une constante non définie déclenche une exception Error sous les versions modernes de PHP
// const définit une constante au moment de la compilation alors que define est une fonction exécutée à l'exécution

// Exercice 1.3 : Calcul
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht * (1 + ($tva / 100));
echo "Le prix TTC du produit est de " . $prix_ttc . " €.<br />";

// Exercice 1.4 : Types et conversions
$test = 42;
$test = (string) $test;
var_dump($test);

var_dump((bool) 0);
var_dump((bool) 0.0);
var_dump((bool) "0");
var_dump((bool) "");
var_dump((bool) "abc");
var_dump((bool) []);
var_dump((bool) null);

var_dump((int) 3.9);
var_dump((int) "12abc");
var_dump((float) "1.5e3");
var_dump((int) true);

$dec = 255;
$hex = 0xFF;
$oct = 0377;
$bin = 0b11111111;
echo $dec . " " . $hex . " " . $oct . " " . $bin . "<br />";

// Exercice 1.5 : Chaînes de caractères
$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"<br />';
echo 'Voulez-vous supprimer C:\\*.*?<br />';
echo 'Ceci n\'affichera pas \n de nouvelle ligne<br />';
echo 'Les variables ne seront pas $traitees $ici<br />';
echo "Les variables seront $traitees $ici<br />";

$ch = "*Bonjour les développeurs*";
$ch = trim($ch, "*");

for ($i = 0; $i < strlen($ch); $i++) {
    echo $ch[$i] . "<br />";
}
