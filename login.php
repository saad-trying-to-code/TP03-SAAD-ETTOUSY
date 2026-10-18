<?php
// Auteur : Ettousy Saad, Groupe : TP 04, Date : 18/10/2026, Objectif : Connexion utilisateur avec session et cookies
session_start();

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = isset($_POST['login']) ? trim($_POST['login']) : '';
    if (!empty($login)) {
        $_SESSION['login'] = $login;
        setcookie("dernier_login", $login, time() + 86400, "/");

        $infos_connexion = [
            "login" => $login,
            "date" => date("d/m/Y H:i:s")
        ];
        setcookie("infos_connexion", json_encode($infos_connexion), time() + 86400, "/");

        header("Location: profil.php");
        exit;
    }
}

$valeur_login = isset($_COOKIE['dernier_login']) ? $_COOKIE['dernier_login'] : '';

require "includes/entete_inc.php";
require "includes/menu_inc.php";
?>
<h2>Formulaire de connexion</h2>
<form method="post" action="login.php">
    <p>Login : <input type="text" name="login" value="<?php echo htmlspecialchars($valeur_login); ?>" /></p>
    <p><input type="submit" value="Se connecter" /></p>
</form>

<?php
if (isset($_COOKIE['infos_connexion'])) {
    $infos = json_decode($_COOKIE['infos_connexion'], true);
    if (is_array($infos)) {
        echo "<p>Dernier utilisateur connecté : " . htmlspecialchars($infos['login']) . " le " . htmlspecialchars($infos['date']) . "</p>";
    }
}

require "includes/pied_inc.php";
