<?php
include_once('pdo_connect.php');

if (!empty($_POST['pseudo']) AND !empty($_POST['pass']) AND ($_POST['pass'] == $_POST['confirm_pass']) AND !empty($_POST['email'])) // On a le pseudo le mot de pass et l'email
// Vérification de la validité des informations

{
// Hachage du mot de passe
$pass_hache = sha1($_POST['pass']);

// Insertion
$req = $bdd->prepare('INSERT INTO blog_membres(sexe, prenom, nom, adress, date_naissance, pseudo, pass, email, date_inscription) VALUES(:sexe, :prenom, :nom, :adress, :date_naissance, :pseudo, :pass, :email, CURDATE())');
$req->execute(array(
	'sexe' => $_POST['sexe'],
	'prenom' => $_POST['prenom'],
	'nom' => $_POST['nom'],
	'adress' => $_POST['adress'],
	'date_naissance' => $_POST['date_naissance'],
    'pseudo' => $_POST['pseudo'],
    'pass' => $pass_hache,
    'email' => $_POST['email']));
	
	header('Location: connexion.php');
	exit();
}

else
{
?>
	<script>alert('Mauvaise combinaison de mot de passe');</script>
<?php
}
?>