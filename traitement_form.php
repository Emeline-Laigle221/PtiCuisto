<?php
	// E.Porcq : programme de test pour le projet Agile
	// 29/05/2022

	include_once "pdo/pdo_agile.php";
	include_once "pdo/param_connexion_etu.php";
	echo '<meta charset="utf-8"> ';
	//define ("MOD_BDD","MYSQL");
	define ("MOD_BDD","ORACLE");

	if (MOD_BDD == "MYSQL")
	{
		$db_username = $db_usernameMySQL;		
		$db_password = $db_passwordMySQL;
		$db = $dbMySQL;
	}
	else
	{
		$db_username = $db_usernameOracle;		
		$db_password = $db_passwordOracle;	
		$db = $dbOracle;
	}
	
	$conn = OuvrirConnexionPDO($db,$db_username,$db_password);
	
	afficherTab($_POST);
	
	
	if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["ville"]) && !empty($_POST["telephone"] && !empty($_POST["adresse_mail"]))) {
		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$ville = $_POST["ville"];
		$telephone = $_POST["telephone"];
		$adresse_mail = $_POST["adresse_mail"];
	}

	//POUR num_client
	$result1 = [];
	$sql_recherche_num_cli_max = "SELECT nvl(MAX(cli_num), 0) + 1 as cli_num  FROM vik_client";
	LireDonneesPDO2($conn, $sql_recherche_num_cli_max, $result1);
	$num_client = $result1[0]['CLI_NUM'];


	
	//POUR dep_num
	$result2 = [];
	$sql_recherche_dep_num = "SELECT dep_num FROM vik_commune WHERE com_nom = '$ville'";
	LireDonneesPDO3($conn, $sql_recherche_dep_num, $result2);
	$numero_departement_client = $result2[0]['DEP_NUM'];
	print_r($numero_departement_client);
	

	// num_client, typ_num, dep_num, pay_nom, pays_prenom, cli_ville, cli_telephone, cli_courriel, cli_nb_points_ec, cli_nb_points_tot, cli_date_connec, cli_mdp
	//$sql = "INSERT INTO vik_client VALUES ('$num_client', 1, '$nom', '.$prenom.','$ville','.$telephone.','.$adresse_mail.')";
	
	//majDonneesPDO($conn, $sql);

	function afficherTab($obj)
	{
		echo "<PRE>";
		print_r($obj);
		echo "</PRE>";
	}

	/*
	$sql = "select nvl(max(per_num),0) as maxi from personne";
	LireDonneesPDO2($conn,$sql,$donnee);  
	afficherTab($donnee);
	$per_num = $donnee[0]['MAXI'] + 1;
	
	if ($erreur = false)
	{
		$sql = "INSERT INTO personne VALUES ($per_num, '$nom', '".$prenom."','".$code."','".$genre."','".$pays."','"$gouts."')"
		afficherTab($sql);
		$res = majDonneesPDO($conn, $sql);
		echo "Résultat de la requête ",$res . "<br/>";
		afficherTab($res);
	}
	*/
	
 ?>
