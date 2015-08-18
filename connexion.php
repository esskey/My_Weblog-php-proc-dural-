<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="my_style.css" />
		<script type="text/javascript" src="java_security.js"></script>
		<title>Connexion</title>
	</head>
	
	<body>
		<div id="bloc_page">
			<div id="connexion">
				<h1>Connexion</h1>
					<form action="connect_post.php" method="post">
							<label for="pseudo">pseudo :</label>
							<input required="required" type="text" name="pseudo" id="pseudo" placeholder="Ex : snake22" onblur="validate(id)" size="30" maxlength="20" />
							<div id="pseudo1"></div>
						
							<label for="pass">Le mot de passe :</label>
							<input required="required" type="password" name="pass" onblur="validate(id)" id="pass" /><br />
							<div id="pass1"></div>
						
							<input type="submit" value="Valider" />
					</form>
			</div>
			
			<div id="blog">
				<a href="inscription.php" title="s'inscrire">S'inscrire ici</a>
				<a href="index.php">Acceder au blog</a>
			</div>	
		</div>
	</body>
	
</html>