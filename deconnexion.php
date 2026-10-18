<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Déconnexion et destruction de la session
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
