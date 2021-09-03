<?php

try 
{
	$pdo = new PDO('mysql:host=localhost;dbname=jeux_videos;port=3306', 'root', '0f78dhch',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



	$id = $_GET["id"];

	$sql = "DELETE FROM jeux_video WHERE id =". $id;
	$sth = $pdo->prepare($sql);
	$sth->execute();

	$count = $sth->rowCount();
	print('Effacement de ' .$count. ' entrées.');


}

catch (PDOException $e) 
{
	echo "Erreur : " . $e->getMessage();
}

header('Location: index.php');
?>
