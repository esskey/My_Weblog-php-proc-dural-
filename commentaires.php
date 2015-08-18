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
	include_once('func_code.php')
	?>
	
	
	<body>
		<header>
			<h1><a href="user.php"><img src="images/logo.png" alt="Logo du site" id="logo"/></a></h1>
		</header>

	   <nav>
	       	<ul><?php if (isset($_SESSION['id'])) 
				{ 
				?>
				<li><a href="user.php">Accueil</a></li>
		        <li><a href="blog.php">Mon blog</a></li>
		        <li><a href="profil.php">Mes infos</a></li>
		        <li><a href="creat_article.php">Créer un article</a></li>
		        <li><a href="contact.php">Contact</a></li>
		        <li><a href="deconnexion.php">Déconnexion</a></li>
				<?php 
				}
				?>
				<?php if (!isset($_SESSION['id'])) 
				{ 
				?>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="contact.php">Contact</a></li>
				<li><a href="inscription.php" title="s'inscrire">S'inscrire</a></li>
				<li><a href="connexion.php" title="se connecter">Se connecter</a></li>
				<?php 
				}
				?>
			</ul>
	   </nav>

			<div id="billets">
				<?php
					while ($donnees = $aff_article_user_spe->fetch())
					{				
				?>
					<div class="formatBilletCom">

						<h3>
							<?php echo htmlspecialchars($donnees['titre']); ?>
						</h3>
						
						<p class="dateCreat">Crée le <?php echo $donnees['date_creation_fr']; ?> </p>
						<p>
							<?php echo bbcodereplace(htmlspecialchars($donnees['contents']));?>
						</p>
							
							<a href="commentaires.php?id=<?php echo $donnees['id_articles']; ?>">Voir les commentaires</a>
		
						<p class="tags">TAGS #(<?php echo (htmlspecialchars($donnees['tags']));?>)</p>

						<?php if ($donnees['date_modification_fr'] != 0000-00-00) 
						{ 
						?>

						<p class="dateModif">modifier le <?php echo $donnees['date_modification_fr']; ?></p>
							<?php
							}
							?>
						<p>
							
					</div>
				<?php
					}
					$aff_article_user_spe->closeCursor();
				?>
					
					<h4>
						COMMENTAIRES
					</h4>
				
				<?php
					while ($donnees = $aff_article_user_com->fetch())
					{				
				?>
					<p>
						<?php echo (htmlspecialchars($donnees['pseudo'])); if ($donnees['MEMBRES'] == NULL) { echo (htmlspecialchars($donnees['pseudo_anonym'])) ; }?> : <?php echo htmlspecialchars($donnees['commentaires']); ?><?php
							if (isset($_SESSION['id']) AND $_SESSION['id'] == $donnees['MEMBRES'])
							{
						?>	
						<form action="comment_post.php" method="post"><input type="hidden" name ="id_com" value=<?php echo $donnees['id_com']; ?>><input type="submit" value="Supprimer" name="supprimer"/></form>
						<?php
							}
						?>
					</p>
				<?php
					}
					$aff_article_user_com->closeCursor();
				?>
					
				<form action="comment_post.php" method="post">
					<input type="hidden" name ="id" value=<?php echo $_GET['id']; ?>>
					
					<p>
						<?php
							if (!isset($_SESSION['id']))
							{
						?>
						<label for="pseudo">Pseudo :</label>
						<input type="text" name="pseudo" id="pseudo" placeholder="Ex : snake22" onblur="validate(id)" size="30" maxlength="20" />
						<?php
							}
						?>
							
						<label for="commentaires">Votre commentaires</label>
						<input type="text" name="commentaires" id="commentaires" />
					</p>	
						<input type="submit" value="Valider" name="valider" />
				</form>
			</div>

	</body>
</html>