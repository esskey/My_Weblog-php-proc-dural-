<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="my_style.css"/>
		<title>Panel blogger</title>
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
    
            <div id="profil">
                <h1>PROFIL</h1>
                    <div id="photo_profil">
                        <img src="images/user.png" alt="image d'un personnage" id="userDefaut">
                    </div>
                    
                    <?php
                        while ($donnees = $fiche_personne->fetch())
                        {
                    ?>
                            <ul>
                                <li><p>Membre N°: <?php echo $donnees['id_membres']; ?></p></li>
                                <li><p>Pseudo: <?php echo $donnees['pseudo']; ?></p></li>
                                <li><p>Email: <?php echo $donnees['email']; ?></p></li>
                            </ul>
                    <?php
                        }
                            $fiche_personne->closeCursor(); 
                    ?>
            </div>

            <div id="billets">
                <form method="get">
                    <p>
                        <label for="search">Rechercher dans mes articles: </label>
                        <input type="search" name="search" id="search" />
                        <input type="submit" value="Rechercher" />
                    </p>
                </form>
                <h1>Mes Articles</h1>
                <?php
                    while ($donnees = $aff_article_user->fetch())
                    {               
                ?>
                
                    <div class="formatBillet">

                        <h3>
                            <?php echo htmlspecialchars($donnees['titre']); ?>
                        </h3>
                        
						<p class="dateCreat">Crée le <?php echo $donnees['date_creation_fr']; ?></p>
                        <p>
                            <?php echo bbcodereplace(htmlspecialchars($donnees['contents']));?>
                        </p>
                            <a href="commentaires.php?id=<?php echo $donnees['id_articles']; ?>">Voir les commentaires</a>
                            <a href="creat_article.php?id=<?php echo $donnees['id_articles']; ?>">Modifier</a>
        
                        <p class="tags">TAGS #(<?php echo (htmlspecialchars($donnees['tags']));?>)</p>

                        <?php if ($donnees['date_modification_fr'] != 0000-00-00) 
                        { 
                        ?> 
                        <p class="dateModif">modifier le <?php echo $donnees['date_modification_fr']; ?></p>
                        <?php
                        }
                        ?>
		
                    </div>
                <?php
                    }
                        $aff_article_user->closeCursor();
                ?>
            </div>
            
            <?php
                if ($_SESSION['admin'] == 1)
                {
            ?>
           
            <?php
                }
            ?>

    </body>
    
    <?php
    }
    
    else
    {
        header('Location: deconnexion.php');
    }
    ?>
</html>