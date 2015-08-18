<form action="inscri_post.php" method="post">
							<label for="homme">Homme</label>
							<input type="radio" name="sexe" value="homme" id="homme" />
							
							<label for="femme">Femme</label>
							<input type="radio" name="sexe" value="femme" id="femme" /> 
						
							<label for="nom">Nom:</label>
							<input required="required" type="text" name="nom" id="nom" onblur="validate(id)" />
							<div id="nom1"></div>
							
							<label for="prenom">Prenom:</label>
							<input required="required" type="text" name="prenom" id="prenom" onblur="validate(id)" />
							<div id="prenom1"></div>
							
							<label for="date_naissance">date de naissance:</label>
							<input required="required" type="date" name="date_naissance" id="date_naissance" onblur="validate(id)" />
							<div id="date_naissance1"></div>
							
							<label for="pseudo">Pseudo:</label>
							<input required="required" type="text" name="pseudo" id="pseudo" placeholder="Ex : snake22" onblur="validate(id)" />
							<div id="pseudo1"></div>	
						
							<label for="pass">Le mot de passe:</label>
							<input required="required" type="password" name="pass" onblur="validate(id)" id="pass" />
							<div id="pass1"></div>
						
							<label for="confirm_pass">Confirmez le mot de passe:</label>
							<input required="required" type="password" name="confirm_pass" onblur="validate(id)" id="confirm_pass" />
							<div id="confirm_pass1"></div>
							
							<label for="adress">Adresse:</label>
							<input required="required" type="text" name="adress" id="adress" onblur="validate(id)" />
							<div id="adress1"></div>
						
							<label for="email">Email:</label>
							<input required="required" type="email" name="email" onblur="validate(id)" id="email" />
							<div id="email1"></div>
						
							<input type="submit" value="Valider" />
					</form>