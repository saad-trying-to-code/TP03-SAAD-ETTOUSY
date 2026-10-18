<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Traitement et enregistrement des notes dans le fichier CSV

require_once "config.php";

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

    if (
    isset($_POST['nom'], $_POST['note_info'], $_POST['note_math']) &&
    trim($_POST['nom']) !== '' &&
    is_numeric($_POST['note_info']) &&
    is_numeric($_POST['note_math'])
    ){
    $nom = trim($_POST['nom']);
    $note_info = (float) $_POST['note_info'];
    $note_math = (float) $_POST['note_math'];

    if ($note_info >= NOTE_MIN && $note_info <= NOTE_MAX && $note_math >= NOTE_MIN && $note_math <= NOTE_MAX) {
        $moyenne = ($note_info + $note_math) / 2;

        if (!is_dir("data")) {
            mkdir("data");
        }

        $fichier = fopen("data/notes.csv", "a");
        if ($fichier) {
            fputcsv($fichier, [$nom, $note_info, $note_math], ";");
            fclose($fichier);
        }

        echo "<h3>Récapitulatif des notes</h3>";
        echo "Nom : " . $nom . "<br />";
        echo "Note Informatique : " . $note_info . "<br />";
        echo "Note Mathématiques : " . $note_math . "<br />";
        echo "Moyenne : " . $moyenne . "<br />";
        echo "Mention : " . mention($moyenne) . "<br />";
        echo "<p>Enregistrement ajouté avec succès dans data/notes.csv</p>";
    } else {
        echo "<p>Erreur : Les notes doivent être comprises entre " . NOTE_MIN . " et " . NOTE_MAX . ".</p>";
    }
} else {
    echo "<p>Erreur : Tous les champs doivent être remplis.</p>";
}
?>
<p><a href="saisie.html">Saisir un autre apprenant</a> | <a href="liste.php">Voir la liste des apprenants</a></p>
