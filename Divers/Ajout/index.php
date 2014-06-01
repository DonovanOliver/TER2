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
			<title>Ajout musiques/échantillons</title>
		</head>
		
		<body>
			<h1>Ajout musiques/&eacute;chantillons</h1>
			<center>
				<a href="../"><button type="button" class="button">Retour</button></a>
				<a href="../Musiques/"><button type="button" class="button">Ecouter les musiques</button></a>
				<a href="../Quizz/"><button type="button" class="button">Quizz  Musiques</button></a>
			
';
	
	
	
	//on affiche le contenu du Head
	echo utf8_encode($resAffHead);
	
	$resBody = "";
	
	if(isset($_POST["SendSongs"])){
				$start = 1;
	}else{
				$start = 0;
	}

	//on affiche le formulaire d'envoi
	if ($start == 0){
		
			if(isset($_POST['nb'])){
				$nb = $_POST['nb'];
			}else{
				$nb = 0;
			}
			
			$resBody .= "<div class = \"DeposerMusique\">";
			$resBody .= "<H5> D&eacute;poser  une/des musique(s) ou un/des &eacutechantillon(s) (2 MO max):</H5> <form method = 'post' action = '' enctype='multipart/form-data'>";
			$resBody .= "<input type=\"radio\" name=\"type\" value=\"musique\">musique<br>
						<input type=\"radio\" name=\"type\" value=\"echantillon\">&eacutechantillon<br/>";
			$resBody .= "<input type='file' name='nom0'/>";
			
			if(isset($_POST["getAnotherSong"])){
				$n = $nb;
				for( $i = 0; $i <= ($n); $i = $i + 1){
					$resBody .= "<br/><input type='file' name='nom".($i+1)."' >";
				}
				$nb = $nb + 1;
			}
			
			$resBody .= "<input type = 'submit' value = 'Send' name = 'SendSongs' class = 'menuSubmitRecherche'>";
			$resBody .= "<input type = 'submit' value = '&#8635;' name = 'getAnotherSong' class = 'menuSubmitRecherche'>";
			$resBody .= "<input type = 'hidden' value = 'Musique' name = 'putSong'>";
			$resBody .= "<input type = 'hidden' value = '".$nb."' name = 'nb'>";
			$resBody .= "<input type= 'hidden' name='MAX_FILE_SIZE' value='2097152'></form></div>";
				
	}
	

	//On étudie le formulaire
	if ($start == 1){
		if(isset($_POST['nb'])){
			$nb = $_POST['nb'];
		}else{
			$nb = 0;
		}
		
		//var_dump($nb);
		
		$resBody .= "<div class = \"LectureMusique\">";
		$resBody .= "<br/><br/><table>";
		$n = $nb;
		
		
		for( $i = 0; $i <= ($n); $i = $i + 1){
			
			$string = 'nom'.$i;
			
			//var_dump($string);
			//var_dump($_FILES);
			
			if ($_FILES[$string]['error'] != 0) {     
	          switch ($_FILES[$string]['error']){     
	                   case 1: // UPLOAD_ERR_INI_SIZE     
	                   echo"Le fichier depasse la limite autorisee par le serveur (fichier php.ini) !";     
	                   break;     
	                   case 2: // UPLOAD_ERR_FORM_SIZE     
	                   echo "Le fichier depasse la limite autorisee dans le formulaire HTML !"; 
	                   break;     
	                   case 3: // UPLOAD_ERR_PARTIAL     
	                   echo "L'envoi du fichier a ete interrompu pendant le transfert !";     
	                   break;     
	                   case 4: // UPLOAD_ERR_NO_FILE     
	                   echo "Le fichier que vous avez envoye a une taille nulle !"; 
	                   break;     
	          }     
			}else {     
	 			// $_FILES['nom_du_fichier']['error'] vaut 0 soit UPLOAD_ERR_OK     
				 // ce qui signifie qu'il n'y a eu aucune erreur     
				if ((isset($_FILES[$string]['tmp_name'])&&($_FILES[$string]['error'] == 0))) {
					if(isset($_POST['type'])){
						if ($_POST['type'] == 'musique'){
							//soit on ajoute une musique
							$chemin_destination = '../Musiques/Musiques/';
							move_uploaded_file($_FILES[$string]['tmp_name'], $chemin_destination.$_FILES[$string]['name']);
							$resBody .= "<tr><td>".$_FILES[$string]['name'].": la musique a &eacutet&eacute ajout&eacutee au serveur</td><td></tr>";
							$start = 2;
					
						}else if ($_POST['type'] == 'echantillon'){
							// soit on ajoute un echantillon
							$chemin_destination = '../Musiques/Echantillons/';
							move_uploaded_file($_FILES[$string]['tmp_name'], $chemin_destination.$_FILES[$string]['name']);
							$resBody .= "<tr><td>".$_FILES[$string]['name'].": l' &eacutechantillon a &eacutet&eacute ajout&eacute au serveur</td><td></tr>";
							$start = 3;     
					
						}
					}else{
						$resBody .= "<tr><td> Veuillez renseigner si vous souhaitez ajouter un &eacutechantillon ou une musique !</td><td></tr>"; 
					} 
				} 
			}
		}		
		
	}
	
	//On vient de recevoir des musiques, il faut les ajouter au fichier CSV
	if ($start == 2){
		
		//necessaire pour lire les annonce
		$cheminCSV = "../Musiques/Musiques/Musiques.csv";
		
		//on ouvre le fichier csv en ecriture a la fin
		$fichier_csv = fopen($cheminCSV, 'a+');
		
		for( $i = 0; $i <= ($n); $i = $i + 1){
			$string = 'nom'.$i;		
			
			//var_dump($_FILES[$string]['name']);
			fputs($fichier_csv, $_FILES[$string]['name']);
			fputs($fichier_csv, "\n");
		}
		
		fclose($fichier_csv);
		
	}
	
		//On vient de recevoir des musiques, il faut les ajouter au fichier CSV
	if ($start == 3){
		
		//necessaire pour lire les annonce
		$cheminCSV = "../Musiques/Echantillons/Echantillons.csv";
		
		//on ouvre le fichier csv en ecriture a la fin
		$fichier_csv = fopen($cheminCSV, 'a+');
		
		for( $i = 0; $i <= ($n); $i = $i + 1){
			$string = 'nom'.$i;		
			
			//var_dump($_FILES[$string]['name']);
			fputs($fichier_csv, $_FILES[$string]['name']);
			fputs($fichier_csv, "\n");
		}
		
		fclose($fichier_csv);
		
	}
	
	$resBody .= "</table></center></body></html>";
	//on affiche le contenu du Body
	echo utf8_encode($resBody);
?>