<?php
try 
{
	$pdo = new PDO('mysql:host=localhost;dbname=jeux_videos;port=3306', 'root', '0f78dhch',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(!empty($_POST))
	{
		$pseudo = $_POST['pseudo'];
	}

		//  Récupération de l'utilisateur et de son pass hashé
	$sth = $pdo->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo');
	$sth->execute(array(
		'pseudo' => $pseudo));
	$resultat = $sth->fetchall();

	foreach($resultat as $key => $value){
	// Comparaison du pass envoyé via le formulaire avec la base
		$isPasswordCorrect = password_verify($_POST['pass'], $value['pass']);

		if (!$resultat)
		{
			echo 'Mauvais identifiant ou mot de passe !';
		}
		else
		{
			if ($isPasswordCorrect) {
				session_start();
				$_SESSION['id'] = $value['id'];
				$_SESSION['pseudo'] = $pseudo;
				echo 'Vous êtes connecté !';
			}
			else {
				echo 'Mauvais identifiant ou mot de passe !';
			}
		}
	}
}

catch (PDOException $e) 
{
	echo "Erreur : " . $e->getMessage();
}
?>