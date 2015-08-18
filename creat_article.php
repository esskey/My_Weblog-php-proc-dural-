<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="my_style.css"/>
		<script type="text/javascript" src="java_security.js"></script>
		<title>Panel utilisateur</title>
	</head>
	
	<?php 
		session_start();
		include_once('req.php');
	?>
			
	<body>
		<?php include_once('header.html'); ?>
		<div id="bloc_page">
				
			<div id="creat_article">
				<form action="article_post.php" method="post">
						<label for="titre">Titre</label>
						<input required="required" type="text" name="titre" id="titre" onblur="validate(id)" />
						<div id="titre1"></div>
						
						<label for="contents">Contenu</label>
						<textarea required="required" name="contents" id="contents"></textarea>
						
						<label for="tags">Tags (séparés par des virgules)</label>
						<input required="required" type="text" name="tags" id="tags"/>
						
						<?php 
							if (isset($_GET['id']))
							{
						?>
							<input type="submit" value="Modifier" name="modifier"/>
							<input type="hidden" name ="id" value=<?php echo $_GET['id']; ?>>
						<?php
							}
							else
							{
						?>
							<input type="submit" name="creer" value="Créer" />
						<?php
							}
						?>
				</form>
			</div>
		</div>
	</body>
</html>