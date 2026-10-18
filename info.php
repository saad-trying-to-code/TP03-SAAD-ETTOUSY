<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Traitement du formulaire GET

$nom = isset($_GET['nom']) ? $_GET['nom'] : '';
$prenom = isset($_GET['prenom']) ? $_GET['prenom'] : '';
$sexe = isset($_GET['sexe']) ? $_GET['sexe'] : '';

if ($sexe == 'M') {
    echo "Bonjour Monsieur " . $prenom . " " . $nom;
} elseif ($sexe == 'F') {
    echo "Bonjour Madame " . $prenom . " " . $nom;
} else {
    echo "Bonjour " . $prenom . " " . $nom;
}
