<?php
include_once('pdo_connect.php');

// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);

// Vérification des identifiants
if (!empty($_POST['pseudo']) AND is_string($_POST['pseudo']) AND !empty($pass_hache) AND is_string($pass_hache))
{
	$req = $bdd->prepare('SELECT id_membres, suspension, admin FROM blog_membres WHERE pseudo = :pseudo AND pass = :pass');
	$req->execute(array(
		'pseudo' => $_POST['pseudo'],
		'pass' => $pass_hache));
	
	$resultat = $req->fetch();
}

if (!$resultat)
{
	echo 'Mauvais identifiant ou mot de passe !';
}

else
{
    session_start();
    $_SESSION['id'] = $resultat['id_membres'];
    $_SESSION['pseudo'] = $_POST['pseudo'];	
	$_SESSION['suspension'] = $resultat['suspension'];
	$_SESSION['admin'] = $resultat['admin'];
	
	header('Location: user.php');
	exit();
}
?>