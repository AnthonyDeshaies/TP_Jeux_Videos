<?php 

try 
{
	$pdo = new PDO('mysql:host=localhost;dbname=jeux_videos;port=3306', 'root', '0f78dhch',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	if(!empty($_POST))
	{
		$pseudo = $_POST['pseudo'];
		$pass = $_POST['pass'];
	}
        // Vérification de la validité des informations

// Hachage du mot de passe
	$pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

// Insertion
	$sth = $pdo->prepare('INSERT INTO users(pseudo, pass) VALUES(:pseudo, :pass)');
	$sth->execute(array(
		'pseudo' => $pseudo,
		'pass' => $pass_hache));

	$count = $sth->rowCount();
	print('Mise à jour de ' .$count. ' entrée(s)');

}

catch (PDOException $e) 
{
	echo "Erreur : " . $e->getMessage();
}

//header('Location: index.php');
?>