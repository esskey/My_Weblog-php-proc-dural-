<?php
	include_once('pdo_connect.php');
	
	if (isset($_SESSION['id']))
	{
	$fiche_personne = $bdd->query('SELECT id_membres, pseudo, email, date_inscription, suspension, admin, sexe, adress, nom, prenom, DATE_FORMAT(date_naissance, \'%d/%m/%Y\') AS date_naissance_fr FROM blog_membres WHERE id_membres = '.$_SESSION['id']);
	
	//*AFFICHAGE DE TT LES ARTICLES DE TT LMONDE QUAND SESSION*//
	$aff_article = $bdd->query('SELECT blog_membres.pseudo AS pseudo, blog_articles.id_articles, blog_articles.titre, blog_articles.contents, blog_articles.tags, DATE_FORMAT(blog_articles.date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, DATE_FORMAT(blog_articles.date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr 
								FROM blog_articles 
								LEFT JOIN blog_membres ON blog_articles.id_membres = blog_membres.id_membres
								WHERE blog_membres.id_membres != '.$_SESSION['id']. ' ORDER BY date_creation DESC');
	
	//*AFFICHAGE DE TT LES ARTICLES DU BLOGGER*//
	$aff_article_user = $bdd->query('SELECT id_articles, titre, contents, tags, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, DATE_FORMAT(date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr FROM blog_articles WHERE id_membres=' . $_SESSION['id'] . ' ORDER BY date_creation DESC');
	
	}
	
	//*AFFICHAGE DE TT LES ARTICLES DE TT LMONDE*//
	$aff_articles = $bdd->query('SELECT blog_membres.pseudo AS pseudo, blog_articles.id_articles, blog_articles.titre, blog_articles.contents, blog_articles.tags, DATE_FORMAT(blog_articles.date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, DATE_FORMAT(blog_articles.date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr 
								FROM blog_articles
								LEFT JOIN blog_membres ON blog_articles.id_membres = blog_membres.id_membres
								ORDER BY blog_articles.date_creation DESC');
	
	
	//*AFFICHAGE D'UN ARTICLE ET DE SES COMMENTAIRES BLOGGER*//
	if (isset($_GET['id']))
	{
		$aff_article_user_spe = $bdd->query('SELECT id_articles, titre, contents, tags, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, DATE_FORMAT(date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr FROM blog_articles WHERE id_articles = '. $_GET['id']);

		$aff_article_user_com = $bdd->query('SELECT blog_commentaires.id_com, blog_commentaires.pseudo AS pseudo_anonym, blog_membres.id_membres AS MEMBRES, blog_commentaires.commentaires, blog_membres.pseudo
											FROM blog_commentaires 
											LEFT JOIN blog_articles ON blog_articles.id_articles = blog_commentaires.id_article
											LEFT JOIN blog_membres ON blog_commentaires.id_membres = blog_membres.id_membres
											WHERE blog_commentaires.id_article = '. $_GET['id']);			

	}

	//*RECHERCHE PAR #TAGS*//
	
	if (isset($_GET['search']) AND !empty($_GET['search']))
	{
	$aff_article_user = $bdd->query('SELECT id_articles, titre, contents, tags, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, DATE_FORMAT(date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr FROM blog_articles WHERE id_membres=' . $_SESSION['id'] . ' AND tags LIKE "%'. $_GET['search'] . '%" ORDER BY date_creation DESC');
	}
	
	if (isset($_SESSION['id']))
	{
		if (isset($_GET['search_blog']) AND !empty($_GET['search_blog']))
		{
		$aff_article = $bdd->query('SELECT blog_membres.pseudo AS pseudo, blog_articles.id_articles, blog_articles.titre, blog_articles.contents, blog_articles.tags, DATE_FORMAT(blog_articles.date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, DATE_FORMAT(blog_articles.date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr 
									FROM blog_articles
									LEFT JOIN blog_membres ON blog_articles.id_membres = blog_membres.id_membres 
									WHERE blog_membres.id_membres != '.$_SESSION['id'].' AND blog_articles.tags LIKE "%'. $_GET['search_blog'] . '%" ORDER BY date_creation DESC');
		}
	}

	if (isset($_GET['search_blog']) AND !empty($_GET['search_blog']))
	{
	$aff_articles = $bdd->query('SELECT blog_membres.pseudo AS pseudo, blog_articles.id_articles, blog_articles.titre, blog_articles.contents, blog_articles.tags, DATE_FORMAT(blog_articles.date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr, DATE_FORMAT(blog_articles.date_modification, \'%d/%m/%Y à %Hh%imin%ss\') AS date_modification_fr 
								FROM blog_articles
								LEFT JOIN blog_membres ON blog_articles.id_membres = blog_membres.id_membres 
								WHERE blog_articles.tags LIKE "%'. $_GET['search_blog'] . '%" ORDER BY date_creation DESC');
	}
	
	
	//*AFFICHAGE DE TT LES MEMBRES DU BLOG*//
	if (isset($_SESSION['id']))
	{
	$aff_membres = $bdd->query('SELECT id_membres, pseudo FROM blog_membres WHERE id_membres != '.$_SESSION['id'].' ORDER BY pseudo');
	}
	
	//*SUSPENSION DUN COMPTE BLOGGER* PAR LADMIN//
	
	if (isset($_SESSION['id']) AND ($_SESSION['admin'] == 1) AND isset($_GET['id']) AND ($_GET['id'] > 0) AND isset($_GET['suspendre']))
	{
		$req = $bdd->query('UPDATE blog_membres SET suspension = 0 WHERE id_membres = '.$_GET['id']);
	}
	
	if (isset($_SESSION['id']) AND ($_SESSION['admin'] == 1) AND isset($_GET['id']) AND ($_GET['id'] > 0) AND isset($_GET['reactiver']))
	{
		$req = $bdd->query('UPDATE blog_membres SET suspension = 1 WHERE id_membres = '.$_GET['id']);
	}
	
	//*GRADE*//
	if (isset($_SESSION['id']) AND ($_SESSION['admin'] == 1) AND isset($_GET['id']) AND ($_GET['id'] > 0) AND isset($_GET['up']))
	{
		$req = $bdd->query('UPDATE blog_membres SET admin = 1 WHERE id_membres = '.$_GET['id']);
	}
	
	if (isset($_SESSION['id']) AND ($_SESSION['admin'] == 1) AND isset($_GET['id']) AND ($_GET['id'] > 0) AND isset($_GET['down']))
	{
		$req = $bdd->query('UPDATE blog_membres SET admin = 0 WHERE id_membres = '.$_GET['id']);
	}
	
	//*AFFICHAGE FICHE MEMBRES*//
	if (isset($_GET['id']))
	{
		$fiche_membres = $bdd->query('SELECT id_membres, pseudo, email, date_inscription, suspension, admin FROM blog_membres WHERE id_membres = '.$_GET['id']);
	}
	
	//*SUPPRESSiON ARTICLE ET DES COMMENTAIRES DE LARTICLE PAR UN ADMIN**//
	if (isset($_SESSION['id']) AND ($_SESSION['admin'] == 1) AND (isset($_POST['delet'])))
	{
		$req = $bdd->prepare("DELETE FROM blog_articles WHERE id_articles = :id_articles");
		$req->execute(array(
			'id_articles' => $_POST['id_articles']));
			
		$req = $bdd->prepare("DELETE FROM blog_commentaires WHERE id_articles = :id_articles");
		$req->execute(array(
			'id_articles' => $_POST['id_articles']));
		
		header('Location: blog.php');
		exit();
	}
?>