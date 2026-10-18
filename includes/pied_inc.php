<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Pied de page et manipulation des dates
$date_jour = date("d/m/Y");
$date_actuelle = new DateTime();
$date_fin = new DateTime("2026-12-31");
$interval = $date_actuelle->diff($date_fin);
$jours_restants = $interval->format("%a");
$date_valide = checkdate(10, 14, 2026);
?>
<hr />
<footer>
    <p>Date du jour : <?php echo $date_jour; ?></p>
    <p>Nombre de jours restants avant fin de semestre : <?php echo $jours_restants; ?> jours</p>
    <p>Validation date 14/10/2026 : <?php echo $date_valide ? "Valide" : "Invalide"; ?></p>
</footer>
</body>
</html>
