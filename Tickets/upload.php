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

$dossier = './';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 1000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.'); 
//Début des vérifications de sécurité...
echo "<meta charset=utf-8 />";
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectué avec succès !';
		  $data=loadStrings("identifiant.txt");
		 if (strlen($data)>10){
			$data.='
'.$_POST['nom'].' '.$_POST['prenom'].' '.$fichier;
		 }
		 else{
			$data.=$_POST['nom'].' '.$_POST['prenom'].' '.$fichier;
		 }
		  
		  saveStrings("identifiant.txt",$data);
     }
     else //Sinon (la fonction renvoie FALSE).
     {
		echo 'file:'.$_FILES['avatar']['tmp_name'];
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
header ("Location: index.php?nouveau=true");
?>