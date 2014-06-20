<!DOCTYPE html>

<!--
  Google HTML5 slide template

  Authors: Luke MahÃ© (code)
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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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
				<h1 id="title">Cr&eacute;er des instruments virtuels à l'aide de l'API HTML5 WebAudio</h1>
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
		HTML5 propose un nouvel élément, la balise HTML &lt;audio&gt;, mais pour de l'audio streamé.   
		</p>

		<p>
		Les applications musicales (MAO) et les jeux ont des besoins différents : faible latence, effets spéciaux, précision du timing, etc...
		</p>

		<p>
		L'API HTML5 Web Audio répond à ces besoins à l'aide d'une API JavaScrip, une des plus complète/complexe proposée par la spécification HTML5.
		</p>
		
		<br/>
		
		<p>
		<b>Notre travail :</b> 
			<ul>
		        <li>Réaliser des instruments virtuels à l'aide de cette librairie</li>
		        <li>Essayer de faire une abstraction pour pouvoir manipuler plusieurs instruments dans une application musicale</li>
		  	</ul>
		</p>

    </article>
    
    
    
    <article class="smaller">
        <h3>Principes de WebAudio	(1/2)</h3>    
        	
			<p>
			Concept principal : le graphe audio, composé de noeuds (échantillons musicaux, effets, controle de volume, de stéréo, reverbération, distorsion, mais aussi générateurs d'ondes, oscillateurs, modulation de fréquence, etc.)
			</p>
			  
			<br/>
			  
			<img class="centered" src="./img/modular-routing2.png" alt="" />

    </article>
  
    <article class="smaller">
        <h3>Principes de WebAudio	(2/2)</h3>    
        
        <p>
        <b>Mais comme rien ne vaut une démo pour expliquer:</b>
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
		Première partie de notre travail
		</h3>
		
		<ul>
			<li>Etudier la librairie Web Audio et les principes de création / manipulation du graphe audio</li>
		
			<ul>
		        <li>Lecture, étude de démos et tutoriaux</li>
		        <li>Compréhension des principes de la synthèse sonore analogique (à base de générateurs d'ondes)</li>
		        <li>Ecriture de nombreuses petites démos:</li>
		        <table>
		        <ul>

		        	<tr>
		        	<td><b>Génération de son</b></td><td> <img class="centered" src="./img/micro.png" width=300 height="100" alt="" /> </td>
		        	</tr>

		        	<tr>
		        	<td><b>Lecteur audio avec fréquences</b></td><td> <img class="centered" src="./img/lecteur.png" width=300 height="100" alt="" /> </td>
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
		Cas du synthétiseur
		</h3>

		<br/>
		<img class="centered" src="./img/synthe.png" width=750  alt="" /> 
	</article>


	<article class="smaller">

		<h3>
		Ce que nous a apporté l'analyse du synthétiseur :
		</h3>
		
		<br/>
		  
		<ul>
		    <li>Compréhension de son fonctionnement général. (oscillos, filtres)</li>
		    <li>Etude de l'addition de signaux des oscillateurs pour créer un nouveau signal.
		    <li>Compréhension du fonctionnement des filtres (Q, attaque, mélange, volume, forme d'ondes, ... )</li>
		    <li>Compréhension de diverses notions de musiques. (octaves, solfèges, ...) </li>
		    <li>La GUI comme les différentes notions sont maintenant clair pour nous, elles étaient assez obscur au début.</li>

		    <br/>

		    <p>
		    On a pu ensuite écrire le notre une fois que nous avions compris les notions nécessaire.
		    </p>

		</ul>
  
	</article>

	<article>

		<h3>
		Notre synthétiseur
		</h3>

		<p>
		<iframe src="http://jsbin.com/gokukazo/24"></iframe>
		</p>

	</article>

		<article>
		<h3>
		Cas de la boîte à rythmes
		</h3>
		<iframe src="http://www.rivieraproject.fr/BoiteARythme/"></iframe>
	</article>


	<article>

		<h3>
		Explications de ce qu'on a compris
		</h3>
		  
		<ul>
		
			<br/>
		
		    <li>fonctionne avec des échantillons</li>
		    
		    <li>Chaque son est toujours reproduit en totalité et de façon cyclique</li>
		    
		    <li>Altération du son grâce à des effets (filtres, ...)</li>
		    
		    <li>la ligne représente le temps parcouru sur le cycle</li>
		    
		    <br/>
		    
		    <p>
		    On a pu ensuite en écrire un "à nous" pour bien comprendre
		    </p>
		    
		</ul>
  
	</article>

	<article>
	
		<h3>
		Notre boîte à rythmes
		</h3>
		
		<br/>
		<img class="centered" src="./img/boite.png" width=750  alt="" /> 
		

	</article>
	
	<article>
	
		<h3>
		Problèmes différents ici...
		</h3>
		  
		<br/>
		  
		<ul>
			<li>Nécessité de bien comprendre les concepts de mesures / temps, BPMs</li>
		    <li>Chargement asynchones des échantillons</li>
		    <li>L'animation doit être synchronisée (elle est à 60 im/s), et mesure du temps très précise nécessaire (au millionième de seconde).</li>
		    <li>Ajout de filtres, analyzer</li>

		</ul>

	</article>

	<article>

		<h3>
		Points communs et abstraction
		</h3>

		<p>
		Points communs : initialisation du contexte audio, filtres, controles de volume / gain, connexion finale du graphe aux hauts parleurs.
		</p>

		<p>
		C'est cette partie qu'on a dû factoriser. 
		</p>

		<p>
		Deux instruments = deux graphes séparés mais qui se rejoignent vers les hauts parleurs et qui partagent le même contexte d'utilisation.
		</p>
		
		<br/>
		
		<img class="centered" src="./img/g.png" height="200"  alt="" /> 

	</article>
	
	<article>
	
		<h3>
		Exemple d'application joignant les deux instruments
		</h3>

		<br/>
		
		<a href="https://www.youtube.com/watch?v=-_KpW0rKqEk&feature=youtu.be">Lien vers la vidéo de démo</a>
		
		<br/><br/>
		<img class="centered" src="./img/screen.png" height="300"  alt="" /> 
	</article>


	<article>

		<h3>
		Gestion de projet : qui a fait quoi, mise en oeuvre, outils, etc.
		</h3>

		<ul>
		    <li>Repository Git</li>
		    <li>Gestionnaire de tickets</li>
		    <li>Wiki pour la documentation</li>
		    <li>Réunions régulières et partage du travail</li>
		</ul>
  
  		<br/>
  
  		<img class="centered" src="./img/wiki.png" height="50"  alt="" /> 
  		<img class="centered" src="./img/github.png" height="200"  alt="" /> 
	</article>

	<article>

		<h3>
		Points forts / faibles, difficultés rencontrées...
		</h3>

		<br/>

		<ul>
		  <li>Mauvaise organistation au début</li>
		  <li>JavaScript</li>
		  <li>WebAudio = grosse API, concepts peu évidents</li>
		  <li>Nous ne sommes pas musiciens</li>
		  <li>Gestion du temps du graphe (pas de stop/pause, on casse et on reconstruit le graphe à chaque fois, on avait pas compris au début)</li>
		</ul>

	</article>


	<article>

		<h3>
		Perspectives et conclusion
		</h3>


		<ul>
		  <li>On a eu des difficultés mais on pense qu'on a bien compris comment marchait WebAudio maintenant, pour la partie "instruments",</li>
		  <li>On ne connaissait pas Github également... on a beaucoup appris de cette expérience (dans la douleur parfois)</li>
		  <li>Gros progrès en JavaScript !</li>
		  <li>Monsieur Buffa nous pousse a finaliser le projet pour éventuellement préparer des démos pour la première conférence sur Web Audio qui se tiendra à l'IRCAM en Janvier 2015</li>
		  <li>On a envie de continuer le projet...</li>
		</ul>

	</article>
    
  
    
    
    

</section>


	</div>

</body>
</html>