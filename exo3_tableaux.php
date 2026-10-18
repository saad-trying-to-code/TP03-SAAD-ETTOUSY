<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Manipulation des tableaux et inclusions de fichiers

require_once "config.php";
require "includes/entete_inc.php";
require "includes/menu_inc.php";

if (!function_exists('mention')) {
    function mention($note) {
        if ($note >= 16) {
            return "Très bien";
        } elseif ($note >= 14) {
            return "Bien";
        } elseif ($note >= 12) {
            return "Assez bien";
        } elseif ($note >= SEUIL) {
            return "Passable";
        } else {
            return "Ajourné";
        }
    }
}

// Exercice 3.1 : Création
$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

$modules = ["Programmation Web", "Bases de données", "Réseaux"];

echo "<h3>Affichage du tableau modules avec foreach</h3>";
foreach ($modules as $mod) {
    echo $mod . "<br />";
}

echo "<h3>Affichage du tableau modules avec boucle for et indice</h3>";
for ($i = 0; $i < count($modules); $i++) {
    echo $modules[$i] . "<br />";
}

// Exercice 3.2 : Affichage HTML
echo "<h3>Tableau des notes des apprenants</h3>";
echo '<table border="1">';
echo '<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>';
foreach ($notes as $nom => $note) {
    if ($note < SEUIL) {
        echo '<tr style="color:red;">';
    } else {
        echo '<tr>';
    }
    echo '<td>' . $nom . '</td>';
    echo '<td>' . $note . '</td>';
    echo '<td>' . mention($note) . '</td>';
    echo '</tr>';
}
echo '</table>';

// Exercice 3.3 : Statistiques
$somme = 0;
$nb = 0;
$max = null;
$min = null;

foreach ($notes as $nom => $note) {
    $somme += $note;
    $nb++;
    if ($max === null || $note > $max) {
        $max = $note;
    }
    if ($min === null || $note < $min) {
        $min = $note;
    }
}

$moyenne = $somme / $nb;
echo "<p>Somme : " . $somme . "</p>";
echo "<p>Moyenne : " . $moyenne . "</p>";
echo "<p>Meilleure note : " . $max . "</p>";
echo "<p>Plus faible note : " . $min . "</p>";

echo "<p>Vérification avec array_sum : " . array_sum($notes) . "</p>";
echo "<p>Vérification avec count : " . count($notes) . "</p>";
echo "<p>Vérification avec max : " . max($notes) . "</p>";
echo "<p>Vérification avec min : " . min($notes) . "</p>";

$effectifs = [];
foreach ($notes as $nom => $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}

echo "<h3>Effectifs par mention</h3>";
echo "<ul>";
foreach ($effectifs as $m => $count) {
    echo "<li>" . $m . " : " . $count . "</li>";
}
echo "</ul>";

// Exercice 3.4 : Tri
function afficher($tab) {
    echo '<table border="1">';
    echo '<tr><th>Nom</th><th>Note</th></tr>';
    foreach ($tab as $nom => $note) {
        echo '<tr><td>' . $nom . '</td><td>' . $note . '</td></tr>';
    }
    echo '</table>';
}

$t1 = $notes;
ksort($t1);
echo "<h3>Tableau trié par ordre croissant selon les clés (ksort)</h3>";
afficher($t1);

$t2 = $notes;
arsort($t2);
echo "<h3>Tableau trié par ordre décroissant selon les valeurs (arsort)</h3>";
afficher($t2);

$t3 = $notes;
krsort($t3);
echo "<h3>Tableau trié par ordre décroissant selon les clés (krsort)</h3>";
afficher($t3);

$t4 = $notes;
asort($t4);
echo "<h3>Tableau trié par ordre croissant selon les valeurs (asort)</h3>";
afficher($t4);

// Exercice 3.5 : Opérateurs de tableaux
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

echo "<h3>Opérateurs de tableaux</h3>";
var_dump($a + $b);
var_dump($a == $b);
var_dump($a === $b);

// Exercice 4.1 : Expériences d'inclusion
// Experience 1 avec un fichier inexistant :
// include affiche une alerte Warning et la suite du script continue a s executer
// require declenche une erreur fatale Fatal Error et arrete immediatement l execution

// Experience 2 : inclusion repetee
include "includes/menu_inc.php";
include_once "includes/menu_inc.php";

require "includes/pied_inc.php";
