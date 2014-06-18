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
  </style>
</head>
<body>


<h1>Accueil</h1>
	<center>
		<a href="BoiteARythme/"><button type="button" class="button">Boite à Rythme</button></a>
		<a href="Piano/"><button type="button" class="button">Piano</button></a>
		<a href="Son/"><button type="button" class="button">Lecteur Audio</button></a>
		<a href="Micro/"><button type="button" class="button">Micro</button></a>
		<a href="Divers/"><button type="button" class="button">Divers</button></a>
		<a href="Wiki/"><button type="button" class="button">Wiki</button></a>
		<a href="Tickets/"><button type="button" class="button">Tickets</button></a>
	</center>

<?php	
		$aff = '<div class = "Accueil">';
		$aff .=  '<center><H5>Nuage de Liens:</H5>';

	    //DEBUT DU NUAGE ICI, avec 2 css diff�rents, c'est plus joli
	    $param = '<param name=movie value="./Modules/Nuage/nuage.swf"  />';

        $aff .= "<object type=\"application/x-shockwave-flash\" data=\"./nuage.swf\"  width=\"400\" height=\"350\" />";
        $param .= "<param name=bgcolor value=\"#ffffff\" />";           
        $param .= "<param name=allowscriptaccess value=\"always\" />";
        $flashvars = "<param name=flashvars value=\"tcolor=0x00aaff&tcolor2=0x000000&hicolor=0x1874CD&tspeed=200&distr=true&mode=tags&tagcloud=<tags>";
        
        
        $param .= '<param name="wmode" value="transparent" />';
      
       
        //LISTE DE LIENS ICI
        $link =  "<a href='http://www.rivieraproject.fr/Piano/' style='10'>Piano</a>"; 
        $link .=  "<a href='http://www.rivieraproject.fr/Micro/' style='10'>Micro</a>";
        $link .=  "<a href='http://www.rivieraproject.fr/Son/' style='10'>lecture Son</a>";
        $link .=  "<a href='http://www.rivieraproject.fr/BoiteARythme/' style='10'>Boite a rythme</a>"; 
        $link .=  "<a href='http://www.rivieraproject.fr/Divers/Quizz/' style='10'>Quizz</a>";
        $link .=  "<a href='http://www.rivieraproject.fr/Wiki/' style='10'>Info</a>";
        $link .=  "<a href='http://www.rivieraproject.fr/BoiteARythme/notre.html' style='10'>Notre boite a rythme</a>";
        $link .=  "<a href='http://www.rivieraproject.fr/BoiteARythme/fun/index.php' style='10'>Notre boite (+echhantillon)</a>"; 
        $link .=  "<a href='http://skarn.fr/TER/Wiki/index.php?title=Accueil' style='10'>Wiki</a>";
        
        
        $res = $flashvars.urlencode($link)."</tags> \" />";
      
        //FIN DU NUAGE
        $aff .= $param.$res.'</object></center>';
		
		echo utf8_encode($aff);
		
?>


</body>

</html>