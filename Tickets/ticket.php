<?php
	function loadStrings($nom){ 
		$data="";

		$file = fopen($nom, "r") or saveStrings($nom,"");
		//Output a line of the file until the end is reached
		while(!feof($file))
		  {
		  $data.=fgets($file);
		  }
		fclose($file);
		return $data;
	}
	
	function saveStrings($nom,$data){
		$fp = fopen($nom, 'w');
		fwrite($fp, $data);
		fclose($fp);
	}

	$data=loadStrings($_POST['prenom'].$_POST['nom'].'.txt');
	$data.=$_POST['date'].';'.$_POST['heure'].';'.$_POST['commentaire'].';
%';
	saveStrings($_POST['prenom'].$_POST['nom'].'.txt',$data);
	
header ("Location: identifiant.php?prenom=".$_POST['prenom']."&nom=".$_POST['nom']."&img=".$_POST['img']."&nouveau=true");
?>