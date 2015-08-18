<?php
session_start();
include_once('pdo_connect.php');

	if (!empty($_POST['titre']) AND !empty($_POST['contents']) AND !empty($_POST['tags']))
	{
		if (isset($_POST['creer']))
		{
			$req = $bdd->prepare('INSERT INTO blog_articles(titre, contents, tags, date_creation, id_membres) VALUES(:titre, :contents, :tags, NOW(), :id_membres)');
			$req->execute(array(
				'id_membres' => $_SESSION['id'],
				'titre' => $_POST['titre'],
				'contents' => $_POST['contents'],
				'tags' => $_POST['tags']));
	
			header('Location: user.php');
			exit();
		}

		if (isset($_POST['modifier']))
		{
			$sql = "UPDATE blog_articles SET titre = '".$_POST['titre']."', contents = '".$_POST['contents']."', tags = '".$_POST['tags']."', date_modification = NOW() WHERE id_articles = ".$_POST['id'];
			$req = $bdd->query($sql);
			
			header('Location: user.php');
			exit();
		}
	}
?>