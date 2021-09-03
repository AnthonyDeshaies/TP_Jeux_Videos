<?php

	try 
	{
		$pdo = new PDO('mysql:host=localhost;dbname=jeux_videos;port=3306', 'root', '0f78dhch',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		if(!empty($_POST))
        {
            $nom = strval($_POST['nom']);
            $possesseur = strval($_POST['possesseur']);
            $console = strval($_POST['console']);
            $prix = strval($_POST['prix']);
            $max = strval($_POST['max']);
            $commentaires = strval($_POST['commentaires']);
            $id = strval($_POST["id"]);
        }

		$sth = $pdo->prepare("
			UPDATE jeux_video
			SET nom=:nom, possesseur=:possesseur, console=:console, prix=:prix, nbre_joueurs_max=:max, commentaires=:commentaires
			WHERE ID=$id ");

		$sth->execute(array(
            ':nom' => $nom,
            ':possesseur' => $possesseur,
            ':console' => $console,
            ':prix' => $prix,
            ':max' => $max,
            ':commentaires' => $commentaires));

                  //On affiche le nombre d'entrées mise à jour
		$count = $sth->rowCount();
		print('Mise à jour de ' .$count. ' entrée(s)');
		header('Location: index.php');
	}

	catch (PDOException $e) 
	{
		echo "Erreur : " . $e->getMessage();
	}
	header('Location: index.php');
?>