<?php

	$resAffHead = '';
	$resAffHead .= '
<!DOCTYPE HTML>
	<html>
		<head>
			<style>
			
				h1 {
					background: #385C85;
					color: #FFF;
					padding: 10px;
					padding-left: 20px;
					margin-top: 0px;
					text-align: center 
				}
				
				.button {
				   border-top: 1px solid #96d1f8;
				   background: #65a9d7;
				   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
				   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
				   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
				   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
				   background: -o-linear-gradient(top, #3e779d, #65a9d7);
				   padding: 5px 10px;
				   -webkit-border-radius: 8px;
				   -moz-border-radius: 8px;
				   border-radius: 8px;
				   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
				   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
				   box-shadow: rgba(0,0,0,1) 0 1px 0;
				   text-shadow: rgba(0,0,0,.4) 0 1px 0;
				   color: white;
				   font-size: 14px;
				   font-family: Georgia, serif;
				   text-decoration: none;
				   vertical-align: middle;
				}
				
				.button:hover {
				   border-top-color: #28597a;
				   background: #28597a;
				   color: #ccc;
				}
				
				.button:active {
				   border-top-color: #1b435e;
				   background: #1b435e;
				}
			</style>
			<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<meta name="description" content="Create custom drum beats with a few clicks.  Choose from 15 drum kits and 26 effects, and adjust the pitch of each drum.  Save and share your beats… rock on!">
			<title>Liste des musiques</title>
		</head>
		
		<body>
			<h1>Quizz</h1>
			<center>
';
	
	if(isset($_GET["reponse"])){
	$resAffHead .= '<a href="../"><button type="button" class="button">Retour</button></a>
					<a href="./"><button type="button" class="button">Question suivante</button></a>
					<br/><br/>
					';
	}else{
			$resAffHead .= '<a href="../"><button type="button" class="button">Retour</button></a>
					<br/><br/>
					';
	}
	
	
	
	//on affiche le contenu du Head
	echo utf8_encode($resAffHead);

			
	echo "<br/> INFO: Prend le titre d'une musique du dossier Musiques, on test avec Soundex si le titre est correct";
			
	include "Quizz.inc";
	include "Utilities.inc";
	
	//un tableau pour savoir si on a deja posé cette question
	$tabQuestionVisite = array();
	
	//le tableau contenant le titre de toutes les chansons
	$tabSong = searchCreateTab();
			
			
	// on met le tableau de visite a 0
	for($i = 0; $i < sizeof($tabSong); $i++){
		$tabQuestionVisite[$i] = 0;
	}
		
	echo "<br/>";
		
	$size = sizeof($tabSong);
	
	if(isset($_SESSION['num'])){
		
		$_GET["random"] = $_SESSION['num'] + 1;
		
		//on remet a jour
		if($_SESSION['num'] == (sizeof($tabSong))){
			
			$_SESSION['num']= $_SESSION['num']%sizeof($tabSong);
		}
		
	}
		
	//faire ici un random
	if(!isset($_GET["random"])){
		$random = rand(0,($size - 1));
	}else{
		$random = $_GET["random"];
	}
			

			
	//Si la question n'est pas déjà traitée
	if(($tabQuestionVisite[$random] == 0)){
		//on affiche la question
		if(!isset($_GET["reponse"])){
			echo "<audio src=\"../Musiques/Musiques/".$tabSong[$random]."\" autoplay></audio>";
		}
		$test = SelectRandomQuestion($tabSong, $tabQuestionVisite,$random);
		echo "<p> Question num&eacutero".($random+1)." : Quel est le titre de cette musique?</p><br/>";
		$_SESSION['num']= $random;
	}else{
		//on passe aux autres questions
		if($random < ($size-1)){
			$random++;
		}else{
			$random = $random%$size;
		}
	}
			

	//on attend la réponse ici sinon on affiche le formulaire si pas de reponse
	if(!isset($_GET["reponse"])){
		echo "<form method = 'get'><input type='text' name='reponse'>
			<input type='hidden' name='Quizz'>
			<input type='hidden' name='random' value='".$random."'>
			<input type='submit' name='boutonReponse' value='Envoyer' class = 'compteSubmit'></form>";
			//sleep(10);
	}
	
	
	echo '</center></body></html>';
			
			
		
		
?>