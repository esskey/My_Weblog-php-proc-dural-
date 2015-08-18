<?php
	include_once('pdo_connect.php');
	session_start();
	
	if (isset($_SESSION['id']) AND isset($_POST['modif']))
	{
		if (isset($_POST['nom']) AND !empty($_POST['nom']))
		{
			$req = $bdd->query("UPDATE blog_membres SET nom = UPPER('".$_POST['nom']."') WHERE id_membres = ".$_SESSION['id']);
			header('Location: profil.php');
			exit();
		}
		if (isset($_POST['prenom']) AND !empty($_POST['prenom']))
		{
			$req = $bdd->query("UPDATE blog_membres SET prenom = '".$_POST['prenom']."' WHERE id_membres = ".$_SESSION['id']);
			header('Location: profil.php');
			exit();
		}
		if (isset($_POST['sexe']) AND !empty($_POST['sexe']))
		{
			$req = $bdd->query("UPDATE blog_membres SET sexe = '".$_POST['sexe']."' WHERE id_membres = ".$_SESSION['id']);
			header('Location: profil.php');
			exit();
		}
		if (isset($_POST['adress']) AND !empty($_POST['adress']))
		{
			$req = $bdd->query("UPDATE blog_membres SET adress = '".$_POST['adress']."' WHERE id_membres = ".$_SESSION['id']);
			header('Location: profil.php');
			exit();
		}
		if (isset($_POST['email']) AND !empty($_POST['email']))
		{
			$req = $bdd->query("UPDATE blog_membres SET email = '".$_POST['email']."' WHERE id_membres = ".$_SESSION['id']);
			header('Location: profil.php');
			exit();
		}
	}
	
	if (isset($_SESSION['id']) AND isset($_POST['supcompte']))
	{
		$req = $bdd->prepare("DELETE FROM blog_membres WHERE id_membres = :session");
		$req->execute(array(
			'session' => $_SESSION['id']));
		
		$req = $bdd->prepare("DELETE FROM blog_articles WHERE id_membres = :session");
		$req->execute(array(
			'session' => $_SESSION['id']));
			
		$req = $bdd->prepare("DELETE FROM blog_commentaires WHERE id_membres = :session");
		$req->execute(array(
			'session' => $_SESSION['id']));
			
	header('Location: deconnexion.php');
	exit();
	}

?>