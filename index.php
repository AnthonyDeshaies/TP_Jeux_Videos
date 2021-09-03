<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TP Jeux Vidéos</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
	integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/50b4ed0339.js" crossorigin="anonymous"></script>
</head>
<body>
	<section class="container">
		<div class="row my-5">
			<div class="col-md-6">
				<h1>TP - Jeux Vidéos</h1>
			</div>
			<div class="col-md-6 text-right"><a href="login.php">Connexion</a></div>
		</div>
		<div class="row">
			<div class="form_box">
				<form action="insertJeuxVideos.php" method="post">
					<input type="text" name="nom" placeholder="Entrez le nom du jeu">
					<input type="text" name="possesseur" placeholder="Entrez le prenom du possesseur">
					<input type="text" name="console" placeholder="Entrez la console">
					<input type="text" name="prix" placeholder="Entrez le prix du jeu">
					<input type="text" name="max" placeholder="Nombre de joueur max">
					<input type="text" name="commentaires" placeholder="Entrez un commentaire">
					<input type="submit" value="Valider" name="submit">
				</form>
			</div>
		</div>
	</section>

	<section class="container">
		<div class="row my-5">
			<table class="table table-dark table-striped">
				<thead>
					<tr>
						<th>Nom du Jeu</th>
						<th>Possesseur du Jeu</th>
						<th>Console de support</th>
						<th>Prix du jeu</th>
						<th>Nombre de joueur max</th>
						<th>Commentaire</th>
						<th>Modification</th>
						<th>Suppression</th>
					</tr>
				</thead>
				<?php

				try
				{
					$pdo = new PDO('mysql:host=localhost;dbname=jeux_videos;port=3306', 'root', '0f78dhch');
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		               	/*Sélectionne les valeurs dans les colonnes prenom et mail de la table
		                *users pour chaque entrée de la table*/
		               	$sth = $pdo->prepare("SELECT * FROM jeux_video");
		               	$sth->execute();

		               	/*Retourne un tableau associatif pour chaque entrée de notre table
		                *avec le nom des colonnes sélectionnées en clefs*/
		               	$resultat = $sth->fetchAll();

		               	/*J'affiche mes données*/
		               	foreach ($resultat as $key => $value) 
		               	{
		               		?>	

		               		<tbody>
		               			<tr>
		               				<td><?php echo $value['nom']?></td>
		               				<td><?php echo $value['possesseur'];?></td>
		               				<td><?php echo $value['console'];?></td>
		               				<td><?php echo $value['prix'];?></td>
		               				<td><?php echo $value['nbre_joueurs_max'];?></td>
		               				<td><?php echo $value['commentaires'];?></td>
		               				<td>
		               					<a href="updateJeuxVideo.php?id=<?php echo $value['ID'];?>">Modifier</a>
		               				</td>
		               				<td>
		               					<a href="deleteJeuxVideos.php?id=<?php echo $value['ID'];?>">Supprimer</a>
		               				</td>
		               			</tr>

		               			<?php
		               		}
		               	}

		               	catch(PDOException $e)
		               	{
		               		echo "Erreur : " . $e->getMessage();
		               	}
		               	?>
		               </tbody>
		           </table>
		       </div>
		   </section>

		   <!------------------------------ SCRYPT ------------------------------->

		   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		</body>
		</html>