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
	?>
	
	<?php
	if ($_SESSION['suspension'] == 1)
	{
	?>
	
	<body>
	<?php include('header.html') ?>
		<div id="bloc_page">
			<div id = "fiche_membres">
				<?php
					while ($donnees = $fiche_personne->fetch())
					{
				?>
					<p>Pseudo : <?php echo $donnees['pseudo']; ?></p>
					<p>Nom : <?php echo $donnees['nom']; ?></p>
					<p>Prenom : <?php echo $donnees['prenom']; ?></p>
					<p>Sexe : <?php echo $donnees['sexe']; ?></p>	
					<p>Né(e) le : <?php echo $donnees['date_naissance_fr']; ?></p>
					<p>Email : <?php echo $donnees['email']; ?></p>
					<p>Adresse : <?php echo $donnees['adress']; ?></p>
					<p>Date d'inscription : <?php echo $donnees['date_inscription']; ?></p>
					<p>Statut: <?php 
								if ($donnees['admin'] == 1) 
							    { 
									echo " Admin"; 
							    } 
								else 
								{ 
									echo " Blogger"; 
								} ?></p>
				<?php
					}
					$fiche_personne->closeCursor(); 
					?>
			</div>
			<div id="modif">
					<form action="modif_post.php" method="post">
							<label for="homme">Homme</label>
							<input type="radio" name="sexe" value="homme" id="homme" />
							
							<label for="femme">Femme</label>
							<input type="radio" name="sexe" value="femme" id="femme" /> 
						
							<label for="nom">Nom:</label>
							<input type="text" name="nom" id="nom" />
							
							<label for="prenom">Prenom:</label>
							<input type="text" name="prenom" id="prenom" />
							
							<label for="adress">Adresse:</label>
							<input type="text" name="adress" id="adress" />
						
							<label for="email">Email:</label>
							<input type="email" name="email" id="email" />
						
							<input type="submit" value="modifier" name="modif" />
							<input type="submit" value="DELET USER" name="supcompte" />
					</form>
			</div>
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