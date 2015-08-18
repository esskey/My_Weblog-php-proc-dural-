<?php
session_start();
include_once('pdo_connect.php');

if (isset($_POST['valider']))
{
	if (isset($_SESSION['id']) AND !empty($_POST['commentaires']))
	{
		$req = $bdd->prepare('INSERT INTO blog_commentaires(id_membres, id_article, commentaires, date_commentaires) VALUES(:id_membres, :id_article, :commentaires, NOW())');
		$req->execute(array(
				'id_membres' => $_SESSION['id'],
				'id_article' => $_POST['id'],
				'commentaires' => $_POST['commentaires']));
				
				header('Location: blog.php');
				exit();
	}
	
	else if (!isset($_SESSION['id']) AND !empty($_POST['commentaires']) AND !empty($_POST['pseudo']))
	{
		$req = $bdd->prepare('INSERT INTO blog_commentaires(pseudo, id_article, commentaires, date_commentaires) VALUES(:pseudo, :id_article, :commentaires, NOW())');
		$req->execute(array(
				'pseudo' => $_POST['pseudo'],
				'id_article' => $_POST['id'],
				'commentaires' => $_POST['commentaires']));
				
				header('Location: index.php');
				exit();
	}
}

if (isset($_SESSION['id']) AND isset($_POST['supprimer']))
{
	$req = $bdd->prepare("DELETE FROM blog_commentaires WHERE id_com = :id_com AND id_membres = :session");
	$req->execute(array(
			'id_com' => $_POST['id_com'],
			'session' => $_SESSION['id']));
	
	header('Location: blog.php');
	exit();
}


?>