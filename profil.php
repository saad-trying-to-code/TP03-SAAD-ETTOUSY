<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Affichage du profil utilisateur authentifié
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require "includes/entete_inc.php";
require "includes/menu_inc.php";

echo "<h2>Page de Profil</h2>";
echo "<p>Bienvenue " . htmlspecialchars($_SESSION['login']) . " !</p>";
echo '<p><a href="deconnexion.php">Se déconnecter</a></p>';

require "includes/pied_inc.php";
