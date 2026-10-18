<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Structures de contrôle et boucles

require "config.php";

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

echo "Note 17 : " . mention(17) . "<br />";
echo "Note 14 : " . mention(14) . "<br />";
echo "Note 12.5 : " . mention(12.5) . "<br />";
echo "Note 10 : " . mention(10) . "<br />";
echo "Note 8 : " . mention(8) . "<br />";

$numeroDeMois = date("m");
switch ($numeroDeMois) {
    case 1:
    case "01":
        $moisFrancaisActuel = "Janvier";
        break;
    case 2:
    case "02":
        $moisFrancaisActuel = "Février";
        break;
    case 3:
    case "03":
        $moisFrancaisActuel = "Mars";
        break;
    case 4:
    case "04":
        $moisFrancaisActuel = "Avril";
        break;
    case 5:
    case "05":
        $moisFrancaisActuel = "Mai";
        break;
    case 6:
    case "06":
        $moisFrancaisActuel = "Juin";
        break;
    case 7:
    case "07":
        $moisFrancaisActuel = "Juillet";
        break;
    case 8:
    case "08":
        $moisFrancaisActuel = "Août";
        break;
    case 9:
    case "09":
        $moisFrancaisActuel = "Septembre";
        break;
    case 10:
        $moisFrancaisActuel = "Octobre";
        break;
    case 11:
        $moisFrancaisActuel = "Novembre";
        break;
    case 12:
        $moisFrancaisActuel = "Décembre";
        break;
    default:
        $moisFrancaisActuel = "Inconnu";
        break;
}
echo "Nous sommes au mois de " . $moisFrancaisActuel . "<br />";

for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br />";
}

$k = 0;
while ($k <= 20) {
    if ($k == 10) {
        echo "<strong>" . $k . "</strong>";
    } else {
        echo $k;
    }
    echo "<br />";
    $k = $k + 2;
}

for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo $i . " ";
}
echo "<br />";

$i = 1;
while ($i <= 15) {
    switch ($i) {
        case 5:
            echo "At 5<br />";
            break;
        case 10:
            echo "At 10; quitting<br />";
            break 2;
    }
    $i++;
}

$k = 0;
do {
    if ($k == 10) {
        echo "<strong>" . $k . "</strong>";
    } else {
        echo $k;
    }
    echo "<br />";
    $k = $k + 2;
} while ($k <= 20);
