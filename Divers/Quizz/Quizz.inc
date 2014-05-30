<?php

/**
 *  Lire un fichier CSV et afficher les liens vers les musiques
 *  @param chemin: le chemin ou le nom du fichier (si repertoire courant) (sans le point ".csv")
 */
function searchCreateTab(){
	//on renseigne le chemin
	$chemin = "../Musiques/Musiques/";
	//on commence a la ligne 1 et on cree une variable texte pour enregistrer le texte
	$ligne = 1;
	$bool = 0;
	
	$tabSong = array();
	$i = 0;
	
	//on ouvre le fichier en mode lecture et on va lire champs apres champs et ligne apres ligne
	if (($fic = fopen($chemin."Musiques.csv", "r")) !== false) {
		while (($data = fgetcsv($fic, 1000, ",")) !== false) {
			//le nombre de champs par ligne
			$string ="";
			$num = count($data);
			$string .= $data[0];
			for ($case=1; $case < $num; $case++) {				
				$string .= " ".$data[$case];
			}
			array_push($tabSong,$string);
			$ligne++;

		}
	
	}
	
	//var_dump($tabSong);
				
	fclose($fic);	
	return $tabSong;
}


?>