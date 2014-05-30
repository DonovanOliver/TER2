<?php

		//TODO Fonction recherche reponse
		function verifierReponseQuizz($repU,$rep){
			
		if((!empty($rep))&&(!empty($repU))){
        //reponse de la fonction
		$bool = false;
		
		// $cpt le compteur de mots de la reponse
		$cpt = 0;
		// $cptU le compteur de mots de la reponse utilisateur
		$cptU = 0;
		// le compteur de mots similaires entre les deux réponses
		$cptUG = 0;
		
		//on supprime les "_", "," et "."
		$car = array("_", ",", ".");
		$str = str_replace($car, " ", $rep);
		$strU = str_replace($car, " ", $repU);
		
		//echo"<br/> str et strU:";
		//var_dump($str);
		//var_dump($strU);
		// on compare toutes les strings
		$pieces = explode(" ", $str);
		$piecesU = explode(" ", $strU);

		
		echo "<br/>";
		//var_dump($pieces);
		//echo "<br/>";
		//var_dump($piecesU);
		echo "<br/>";
		
		//si la reponse est contenue et que l'on a au moins la moitie du mot ( + ou - )
		for($i = 0; $i < sizeof($pieces); $i++){
			if(($pieces[$i] === " ") || ($pieces[$i] === "") || ($pieces[$i] === "mp3") || empty($pieces[$i]) ){
				continue;
			}else{
				$cpt = $cpt + 1;
			}
				for($j = 0; $j < sizeof($piecesU); $j++){
					if(($piecesU[$j] === " ") || ($piecesU[$j] === "") || ($piecesU[$j] === "mp3") || empty($piecesU[$j])){
						continue;
					}else{
						$cptU = $cptU + 1;
					}
				if( soundex($pieces[$i]) == soundex($piecesU[$j]) ){
					$cptUG++;
				}
			}
		}
		

		//var_dump($cptUG);
		//var_dump($cpt);
		//on calcule l'efficacite de la reponse
		// nombre de mots corrects doit être supérieur au nombre de mots de la réponse divisé par deux
		if( $cptUG > ($cpt / 2)){
			$bool = true;
		}
			
		return $bool;
		}
	}
	
	function SelectRandomQuestion($questions, $tabQuestionVisite, $random){
		$retour = false;
		
		//var_dump($random);

			
		if (isset($_GET["reponse"])){
			//var_dump($_GET["reponse"]);
			$b = verifierReponseQuizz($_GET["reponse"],$questions[$random]);
			if($b == true){
				echo "<p> Bonne R&eacuteponse !</p>";
			}else{
				echo "<p> Mauvaise R&eacuteponse !</p>";						
				echo "<p> Réponse : ".$questions[$random]."</p>";		
			}
			
			$_GET["reponse"] = "";
			$tabQuestionVisite[$random] = 1;
			$retour = true;
							
		}else{
			
			echo "<p> Entrez une R&eacuteponse:</p>";
		}
		
		return $retour;
		
	}
	
	
?>