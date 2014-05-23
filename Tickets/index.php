<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Créateur de base de données</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<style type="text/css">
img { 
    width: 10%;
}
body {
background-color:#EEEEEE;
}
h1 {
background: #385C85;
color: #FFF;
padding: 10px;
padding-left: 20px;
margin-top: 0px;
text-align: center 
}
h2{
background: #385C85;
color: #FFF;
padding: 10px;
padding-left: 20px;
margin-top: 0px;
}
b{
text-decoration : underline;
}
p.red{
color: #F00;
}
p.green{
color: #090;
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
 p.green{
color: #090;
}
  </style>
</head>
<body>
<h1>Tickets</h1>
<center>
	<a href="../"><button type="button" class="button">Accueil</button></a>
</center>
<?php
	function loadStrings($nom){ 
		$data="";

		$file = fopen($nom, "r") or exit("Incapable de lire le fichier!");
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
	
	  
	  function formulaireNouveau(){
		return '<center>
			<form method="POST" action="upload.php" enctype="multipart/form-data">	
			Prénom: <input type="text" name="prenom">
			Nom: <input type="text" name="nom">
			 <!-- On limite le fichier à 100Ko -->
			 <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			 Fichier : <input type="file" name="avatar" class="button"></br>
			 <input type="submit" name="envoyer" class="button" value="Nouveau">
		</form>
		</center>';
	  }
	  
	  function afficherUtilisateur($nom){
		$data=loadStrings($nom);
		if (strlen($data)>10){
			echo "<center>";
			$lines=explode("\n",$data);
			foreach($lines as $i){
				$id=explode(" ",$i);
				echo '<a href="./identifiant.php?prenom='.$id[1].'&nom='.$id[0].'&img='.$id[2].'"><img src="'.$id[2].'" title="'.$id[0].' '.$id[1].'"></img></a>';
			}
			echo "</center>";
		}
	  }
	  
	  if(isset($_GET['nouveau'])) {
		echo '<p class="green">L\'utilisateur a était ajouter avec succés</p>';
	  }
	  
	  echo formulaireNouveau();
	  afficherUtilisateur("identifiant.txt");
?>

</body>
</html>