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
			<h1>Liste des musiques</h1>
			<center>
				<a href="../"><button type="button" class="button">Retour</button></a>
				<a href="../Quizz/"><button type="button" class="button">Quizz  Musiques</button></a>
				<br/><br/>
			
';
	
	
	
	//on affiche le contenu du Head
	echo utf8_encode($resAffHead);

/**
 *  Lire un fichier CSV et afficher les liens vers les musiques
 *  @param chemin: le chemin ou le nom du fichier (si repertoire courant) (sans le point ".csv")
 */
function searchAndRead($chemin){
	//on commence a la ligne 1 et on cree une variable texte pour enregistrer le texte
	$ligne = 1;
	$texte = "";
	$tmpTxt = "";
	$bool = 0;
	
	//lien vers les musiques
	$lien = "./";
	
	//on ouvre le fichier en mode lecture et on va lire champs apres champs et ligne apres ligne
	if (($fic = fopen($chemin."Musiques.csv", "r")) !== false) {
		while (($data = fgetcsv($fic, 1000, ",")) !== false) {
			//le nombre de champs par ligne
			$num = count($data);
			$texte .= "<A HREF=\"".$lien."file.php?song=";
			for ($case=0; $case < $num; $case++) {
				//$data[$case] = str_replace(" ","",$data[$case]);
				//on affiche le lien
				$texte .= $data[$case];
				$tmpTxt .= $data[$case];
			}
			$texte .= "\">".$tmpTxt."</A><br/>";
			$ligne++;
			//on clean le texte temporaire pour le lien
			$tmpTxt = "";
		}
	
	}else{
	 //on fixe le booleen a 1 pour indiquer que l'operation s'est bien deroulee
		$bool = 1;
	}
	
	echo $texte;
				
	fclose($fic);	
	return $bool;
}

//on renseigne le chemin
$chemin = "./Musiques/";

$musiques = searchAndRead($chemin);

echo '</center></body></html>';

?>