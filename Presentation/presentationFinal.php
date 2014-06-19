<!DOCTYPE html>

<!--
  Google HTML5 slide template

  Authors: Luke Mahé (code)
           Marcin Wichary (code and design)
           
           Dominic Mazzoni (browser compatibility)
           Charles Chen (ChromeVox support)

  URL: http://code.google.com/p/html5slides/
 
-->
<!--
  UUlm Style 

  Author: Benjamin Erb

  URL: https://github.com/berb/html5slides-uulm

-->

<html>



<head>
	<link href="lib/styles.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="lib/uulm/uulm.css" media="screen" rel="stylesheet" type="text/css" />
	
	<link href="presentation.css" media="screen" rel="stylesheet" type="text/css" />
	

	<script src='lib/slides.js'></script>

	<title>Pr&eacute;sentation TER (HTML 5)</title>

</head>

<body style='display: none'>

	<div class='slides layout-normal template-uulm-in'>
		<!-- 
			Your slides (<article>s) go here. You can group them using <section>s
			Every slide must be part of a section. If a section contains a <header>,
			its content will be used as TOC label. If you don't want to group your
			slides, just put all of your <article>s in a single <section>.
		-->

		<section>
			<article class='title-slide'>
				<h1 id="title">Cr&eacute;er des instruments virtuels � l'aide de l'API HTML5 WebAudio</h1>
				<h2 id="author">
					Porta Benjamin<br>
					Oliver Donovan<br>
					Wenzinger Quentin<br>
					Brunel emmanuel<br>
				</h2>
				<h2 id="subtitle">
					Coordinateur : Michel Buffa<br>
				</h2>
                <p>
                    <img id="title-header" src='img/audio2.png' height="150">
                    <img id="uulm-logo" src='img/logo.png'>
                </p>
			</article>
		
		</section>


<section>



    <article class="smaller"> 
        <h3>Sujet du TER</h3>

		<br/>

		<p>
		HTML5 propose un nouvel �l�ment, la balise HTML &lt;audio&gt;, mais pour de l'audio stream�.   
		</p>
		  
		<p>
		Les applications musicales (MAO) et les jeux ont des besoins diff�rents : faible latence, effets sp�ciaux, pr�cision du timing, etc...
		</p>
		  
		<p>
		L'API HTML5 Web Audio r�pond � ces besoins � l'aide d'une API JavaScrip, une des plus compl�te/complexe propos�e par la sp�cification HTML5.
		</p>
		
		<br/>
		
		<p>
		<b>Notre travail :</b> 
			<ul>
		        <li>R�aliser des instruments virtuels � l'aide de cette librairie</li>
		        <li>Essayer de faire une abstraction pour pouvoir manipuler plusieurs instruments dans une application musicale</li>
		  	</ul>
		</p>

    </article>
    
    
    
    <article class="smaller">
        <h3>Principes de WebAudio	(1/2)</h3>    
        	
			<p>
			Concept principal : le graphe audio, compos� de noeuds (�chantillons musicaux, effets, controle de volume, de st�r�o, reverb�ration, distorsion, mais aussi g�n�rateurs d'ondes, oscillateurs, modulation de fr�quence, etc.)
			</p>
			  
			<br/>
			  
			<img class="centered" src="./img/modular-routing2.png" alt="" />

    </article>
  
    <article class="smaller">
        <h3>Principes de WebAudio	(2/2)</h3>    
        
        <p>
        <b>Mais comme rien ne vaut une d�mo pour expliquer:</b>
        </p>
        
        <br/>
        
        <iframe src="http://webaudioplayground.appspot.com/"></iframe>

   
    </article>
    
	<article>
	
	  <h3>
	    Exemples d'instruments virtuels Web Audio	(1/2)
	  </h3>
	  
	  <br/><br/>
	  
	  <img class="centered" src="./img/tumblr_lymd99z2KT1qbis4g.png" alt=""  height="220"/><br/>
	  
	  <br/>
	  
	  <img class="centered" src="./img/moogdoodle.jpg" alt="" height="150"/>
	
	</article>

	<article>
	  <h3>
	  Exemples d'instruments virtuels Web Audio		(2/2)
	  </h3>
	  
	  <br/>
	    
	  <img class="centered" src="./img/drumbox.png" width=500 height="220" alt="" /><br/>
	  <img class="centered" src="./img/RolandVPiano_02.jpg" width=300  height="220" alt="" />
	    
	</article>

	<article class="smaller">	
		<h3>
		Premi�re partie de notre travail
		</h3>
		
		<ul>
			<li>Etudier la librairie Web Audio et les principes de cr�ation / manipulation du graphe audio</li>
		
			<ul>
		        <li>Lecture, �tude de d�mos et tutoriaux</li>
		        <li>Compr�hension des principes de la synth�se sonore analogique (� base de g�n�rateurs d'ondes)</li>
		        <li>Ecriture de nombreuses petites d�mos:</li>
		        <table>
		        <ul>
		        
		        	<tr>
		        	<td><b>G�n�ration de son</b></td><td> <img class="centered" src="./img/micro.png" width=300 height="100" alt="" /> </td>
		        	</tr>
		        	
		        	<tr>
		        	<td><b>Lecteur audio avec fr�quences</b></td><td> <img class="centered" src="./img/lecteur.png" width=300 height="100" alt="" /> </td>
		        	</tr>
		        	
		        	<tr>
		        	<td><b>Playground</b></td><td> <img class="centered" src="./img/playground.png" width=300 height="100" alt="" /> </td>
		        	</tr>
		        	
		        </ul>
		        </table>
		    </ul>

		</ul>

	</article>
	
	<article>
	
		<h3>
		Cas du synth�tiseur
		</h3>
		
		<br/>
		<img class="centered" src="./img/synthe.png" width=750  alt="" /> 
	</article>


	<article>
	
		<h3>
		Explications de ce qu'on a compris
		</h3>
		
		<br/>
		  
		<ul>
		    <li>Comment on fait un son (ondes + oscillateurs)</li>
		    <li>Comment on alt�re un son (modulation, filtres, etc)</li>
		    <li>La GUI c'est aussi assez compliqu� (composants sp�cifiques)</li>
		    <li>etc...</li>
		    
		    <br/>
		    
		    <p>
		    On a pu ensuite en �crire un "� nous" pour bien comprendre
		    </p>
		    
		</ul>
  
	</article>

	<article>
	
		<h3>
		Notre synth�tiseur
		</h3>
		
		<p>
		<iframe src="http://jsbin.com/gokukazo/22"></iframe>
		</p>

	</article>
	
		<article>
		<h3>
		Cas de la bo�te � rythmes
		</h3>
		<iframe src="http://www.rivieraproject.fr/BoiteARythme/"></iframe>
	</article>


	<article>
	
		<h3>
		Explications de ce qu'on a compris
		</h3>
		  
		<ul>
		
			<br/>
		
		    <li>fonctionne avec des �chantillons</li>
		    
		    <li>Chaque son est toujours reproduit en totalit� et de fa�on cyclique</li>
		    
		    <li>Alt�ration du son gr�ce � des effets (filtres, ...)</li>
		    
		    <li>la ligne repr�sente le temps parcouru sur le cycle</li>
		    
		    <br/>
		    
		    <p>
		    On a pu ensuite en �crire un "� nous" pour bien comprendre
		    </p>
		    
		</ul>
  
	</article>

	<article>
	
		<h3>
		Notre bo�te � rythmes
		</h3>
		
		<br/>
		<img class="centered" src="./img/boite.png" width=750  alt="" /> 
		

	</article>
	
	<article>
	
		<h3>
		Probl�mes diff�rents ici...
		</h3>
		  
		<br/>
		  
		<ul>
			<li>N�cessit� de bien comprendre les concepts de mesures / temps, BPMs</li>
		    <li>Chargement asynchones des �chantillons</li>
		    <li>L'animation doit �tre synchronis�e (elle est � 60 im/s), et mesure du temps tr�s pr�cise n�cessaire (au millioni�me de seconde).</li>
		    <li>Ajout de filtres, analyzer</li>
		
		</ul>

	</article>

	<article>
	
		<h3>
		Points communs et abstraction
		</h3>
		  
		<p>
		Points communs : initialisation du contexte audio, filtres, controles de volume / gain, connexion finale du graphe aux hauts parleur.
		</p>
			
		<p>
		C'est cette partie qu'on a d� factoriser. 
		</p>
		  
		<p>
		Deux instruments = deux graphes s�par�s mais qui se rejoignent vers les HPs et qui partagent le m�me contexte d'utilisation.
		</p>
		
		<br/>
		
		<img class="centered" src="./img/g.png" height="200"  alt="" /> 

	</article>
	
	<article>
	
		<h3>
		Exemple d'application joignant les deux instruments
		</h3>
		
		<p>insertion de la vid�o ici (30 secondes)</p>

	</article>

	
	<article>
	
		<h3>
		Gestion de projet : qui a fait quoi, mise en oeuvre, outils, etc.
		</h3>
		
		<ul>
		    <li>Repository Git</li>
		    <li>Gestionnaire de tickets</li>
		    <li>Wiki pour la documentation</li>
		    <li>R�unions r�guli�res et partage du travail</li>
		</ul>
  
  		<br/>
  
  		<img class="centered" src="./img/wiki.png" height="50"  alt="" /> 
  		<img class="centered" src="./img/github.png" height="200"  alt="" /> 
	</article>
	
	<article>
	
		<h3>
		Points forts / faibles, difficult�s rencontr�es...
		</h3>
		
		<br/>
		
		<ul>
		  <li>Manque de temps</li>
		  <li>JavaScript</li>
		  <li>WebAudio = grosse API, concepts peu �vidents</li>
		  <li>Nous ne sommes pas musiciens</li>
		  <li>Gestion du temps du graphe (pas de stop/pause, on casse et on reconstruit le graphe � chaue fois, on avait pas compris au d�but)</li>
		</ul>

	</article>
	
	
	<article>
	
		<h3>
		Perspectives et conclusion
		</h3>
		
		
		<ul>
		  <li>On a eu des difficult�s mais on pense qu'on a bien compris comment marchait WebAudio maintenant, pour la partie "instruments",</li>
		  <li>Monsieur Buffa nous pousse a finaliser le projet pour �ventuellement pr�parer des d�mos pour la premi�re conf�rence sur Web Audio qui se tiendra � l'IRCAM en Janvier 2015</li>
		  <li>Assez mauvaise gestion de projet au d�but, on ne connaissait pas Github, on a beaucoup appris de cette exp�rience (dans la douleur parfois)</li>
		  <li>Gros progr�s en JavaScript !</li>
		  <lI>On a envie de continuer le projet...</lI>
		</ul>
		
	</article>
    
  
    
    
    

</section>


	</div>

</body>
</html>
