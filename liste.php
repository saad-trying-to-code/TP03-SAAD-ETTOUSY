<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Lecture et affichage des notes depuis le fichier CSV

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

$chemin_csv = "data/notes.csv";

echo "<h2>Exercice 5.2 : Lecture avec fgetcsv()</h2>";

if (!file_exists($chemin_csv)) {
    echo "<p>Le fichier " . $chemin_csv . " n'existe pas encore.</p>";
} else {
    $f = fopen($chemin_csv, "r");
    if (!$f) {
        echo "<p>Erreur lors de l'ouverture du fichier.</p>";
        exit;
    }

    echo '<table border="1">';
    echo '<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>';

    $total_moyennes = 0;
    $nombre_lignes = 0;

    while (($ligne = fgetcsv($f, 0, ";")) !== false) {
        if (count($ligne) >= 3) {
            $nom = htmlspecialchars($ligne[0]);
            $note_info = (float) $ligne[1];
            $note_math = (float) $ligne[2];
            $moyenne = ($note_info + $note_math) / 2;

            $total_moyennes += $moyenne;
            $nombre_lignes++;

            echo '<tr>';
            echo '<td>' . $nom . '</td>';
            echo '<td>' . $note_info . '</td>';
            echo '<td>' . $note_math . '</td>';
            echo '<td>' . $moyenne . '</td>';
            echo '<td>' . mention($moyenne) . '</td>';
            echo '</tr>';
        }
    }
    echo '</table>';
    fclose($f);

    if ($nombre_lignes > 0) {
        $moyenne_generale = $total_moyennes / $nombre_lignes;
        echo "<p><strong>Moyenne générale de la classe : " . $moyenne_generale . "</strong></p>";
    }
}

echo "<h2>Exercice 5.3 : Lecture avec fgets(), feof() et explode()</h2>";

if (file_exists($chemin_csv)) {
    $f2 = fopen($chemin_csv, "r");
    if (!$f2) {
        echo "<p>Erreur d'ouverture du fichier.</p>";
        exit;
    }

    echo "<ul>";
    while (!feof($f2)) {
        $ligne_texte = fgets($f2);
        if ($ligne_texte !== false && trim($ligne_texte) !== "") {
            $elements = explode(";", trim($ligne_texte));
            if (count($elements) >= 3) {
                echo "<li>Nom : " . htmlspecialchars($elements[0]) . ", Info : " . $elements[1] . ", Math : " . $elements[2] . "</li>";
            }
        }
    }
    echo "</ul>";
    fclose($f2);
}

require "includes/pied_inc.php";
