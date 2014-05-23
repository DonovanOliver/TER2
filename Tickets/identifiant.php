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
table {
   border: 1px solid #003366;
}

th {
background: #385C85;
color: #FFF;
padding: 10px;
padding-left: 20px;
margin-top: 0px;
text-align: center 
}
  </style>
  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<h1>Identifiant</h1>
<center>
	<a href="../"><button type="button" class="button">Accueil</button></a>
</center>
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
	
		
		echo '<center><h2>'.$_GET['prenom'].' '.$_GET['nom'].'</h2>
		
		<form method="POST" action="ticket.php">
		<input type="hidden" name="prenom" value="'.$_GET['prenom'].'">
		<input type="hidden" name="nom" value="'.$_GET['nom'].'">
		<input type="hidden" name="img" value="'.$_GET['img'].'">
		<img src="'.$_GET['img'].'" title="'.$_GET['nom'].' '.$_GET['prenom'].'"></img></br>
		Date: <input type="date" name="date" value="2014-01-01"></br>
		Temps Humain(en heures): <input type="number" name="heure" min="0" max="10" value="1"></br>
		Commentaire: <textarea rows="4" cols="50" name="commentaire">
		Commentaire
		</textarea></br>
		<input type="submit" name="envoyer" class="button" value="Ticket">
		</form>
		</center>';
		
		$data=loadStrings($_GET['prenom'].$_GET['nom'].'.txt');
		if (strlen($data)>10){
			$lignes=explode("%",$data);
			$documents="";
			$somme=0;
			$documents.='<center>';
			foreach ($lignes as $i){
				$id=explode(";",$i);
				//echo '<p>date:'.$id[0].'heures:'.$id[1].'commentaire:'.$id[2].'</p>';
				if(sizeof($id)>=3){
					$documents.='<table style="width:80%" border="2px">
					<tr>
					  <th>Date</th>
					  <td>'.$id[0].'</td>
					</tr>
					<tr>
					  <th>Heures de Travail</th>
					  <td>'.$id[1].'</td>
					</tr>
					<tr>
					  <th>Commentaire</th>
					  <td>'.$id[2].'</td>
					</tr>
					</table></br>';
					$somme+=(int)$id[1];
				}
			}
			$documents.='</center>';
			echo '<center>
			<table style="width:300px" border="2px">
					<tr>
					  <th>Heures Total</th>
					  <td>'.$somme.'</td>
					</tr>
					</table></br>
				</center>';
					
			echo $documents;
			
		}
	
	if(isset($_GET['nouveau'])){
		echo '<p class="green">Le ticket a était ajouter avec succés</p>';
		
	}
?>

</body>
</html>