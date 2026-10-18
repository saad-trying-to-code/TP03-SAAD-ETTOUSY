<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Exportation et sérialisation des données en JSON et format PHP

require_once "config.php";
require "includes/entete_inc.php";
require "includes/menu_inc.php";

$chemin_csv = "data/notes.csv";
$resultats = [];

if (file_exists($chemin_csv)) {
    $f = fopen($chemin_csv, "r");
    if ($f) {
        while (($ligne = fgetcsv($f, 0, ";")) !== false) {
            if (count($ligne) >= 3) {
                $nom = $ligne[0];
                $note_info = (float) $ligne[1];
                $note_math = (float) $ligne[2];
                $moyenne = ($note_info + $note_math) / 2;

                $resultats[] = [
                    "nom" => $nom,
                    "notes" => [
                        "informatique" => $note_info,
                        "mathematiques" => $note_math
                    ],
                    "moyenne" => $moyenne
                ];
            }
        }
        fclose($f);
    }
}

if (!is_dir("data")) {
    mkdir("data");
}

$json_data = json_encode($resultats);
file_put_contents("data/notes.json", $json_data);

$json_lu = file_get_contents("data/notes.json");
$donnees_decodees = json_decode($json_lu, true);

echo "<h3>Données relues depuis notes.json avec json_decode</h3>";
echo "<pre>";
print_r($donnees_decodees);
echo "</pre>";

echo "<h3>Comparaison entre serialize() et json_encode()</h3>";
echo "<p>Format serialize() :</p>";
echo "<pre>" . htmlspecialchars(serialize($resultats)) . "</pre>";

echo "<p>Format json_encode() :</p>";
echo "<pre>" . htmlspecialchars($json_data) . "</pre>";

require "includes/pied_inc.php";
