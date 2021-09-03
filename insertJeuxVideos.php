<?php
    try 
    {
        $pdo = new PDO('mysql:host=localhost;dbname=jeux_videos;port=3306', 'root', '0f78dhch',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(!empty($_POST))
        {
            $nom = $_POST['nom'];
            $possesseur = $_POST['possesseur'];
            $console = $_POST['console'];
            $prix = $_POST['prix'];
            $max = $_POST['max'];
            $commentaires = $_POST['commentaires'];
        }

        $sth = $pdo->prepare("
            INSERT INTO jeux_video(nom,possesseur,console,prix,nbre_joueurs_max,commentaires)
            VALUES (:nom, :possesseur, :console, :prix, :max, :commentaires)");

        $sth->execute(array(
            ':nom' => $nom,
            ':possesseur' => $possesseur,
            ':console' => $console,
            ':prix' => $prix,
            ':max' => $max,
            ':commentaires' => $commentaires));
    }

    catch (PDOException $e) 
    {
        echo "Erreur : " . $e->getMessage();
    }

    header('Location: index.php');
?>