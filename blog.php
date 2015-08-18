<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="my_style.css"/>
		<title>Panel utilisateur</title>
	</head>
	
	<?php 
	session_start();
	include_once('req.php');
	include_once('func_code.php');
	?>
	
	<?php
	if ($_SESSION['suspension'] == 1)
	{
	?>
	
	<body>
	<?php include_once('header.html'); ?>
		<div id="billet">
			<form method="get">
				<p>
					<label for="search_blog">Rechercher dans les articles: </label>
					<input type="search" name="search_blog" id="search_blog" />
					<input type="submit" value="Rechercher" />
				</p>
			</form>
			
			<?php
				while ($donnees = $aff_article->fetch())
				{				
			?>
				<div class="formatBilletUser">
					<h3>
						<?php echo htmlspecialchars($donnees['titre']); ?>
						
					</h3>
					<p class="dateCreat">Crée par <span class="auteur"><?php echo $donnees['pseudo']; ?></span> le <?php echo $donnees['date_creation_fr']; ?> </p>
					<p>
						<?php echo (htmlspecialchars($donnees['contents']));?>
					</p>
						<a href="commentaires.php?id=<?php echo $donnees['id_articles']; ?>">Voir les commentaires</a>
		
					<p class="tags">TAGS #(<?php echo (htmlspecialchars($donnees['tags']));?>)</p>
		
					<?php if ($donnees['date_modification_fr'] != 0000-00-00) 
					{ 
					?>
		
					<p class="dateModif">Modifié le <?php echo $donnees['date_modification_fr']; ?></p>
						<?php
						}
						?>
					<p>
					<?php
					if (isset($_SESSION['id']) AND ($_SESSION['admin'] == 1))
					{
					?>
					<form method="post"><input type="hidden" name ="id_articles" value=<?php echo $donnees['id_articles']; ?>><input type="submit" value="Supprimer" name="delet"/></form>
					<?php
					}
					?>	
				</div>
		
			<?php
				}
					$aff_article->closeCursor();
			?>
		</div>
	</body>
	
	<?php
	}
	
	else
	{
		header('Location: deconnexion.php');
	}
	?>
</html>