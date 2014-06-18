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
				<h1 id="title">D&eacute;velopper des instruments virtuels</h1>
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
                    <img id="uulm-logo" src='img/logo.png'>
                    <img id="title-header" src='img/audio2.png'>
                </p>
			</article>
		
		</section>


<section>



    <article> 
        <h3>Sujet de notre TER</h3>
		<p>
		<ul>
			<li>
			Familiarisation à la librairie Web Audio
			</li>


				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Context</p>
	
		
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Noeud et Destination</p>

				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Effet</p>
		
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Filtre</p>
		
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Analyseur</p>

			
			<br/>
			
			<li>
			Développer des instruments virtuels (VSTis)
			</li>
			
			<br/>
			
			<li>
			Intégrer plusieurs instruments dans une application 
			</li>
		</ul>
		</p>

    </article>
    
    
    
    <article class="smaller">
        <h3>Sommaire:</h3>
        
        	<br/>
        	

        	
        	<ul>
	       		<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#4"><b>Introduction..........................................4</b></a></p>
	       		<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#6"><b>Principes................................................6</b></a></p>
	       		<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#7"><b>Web Audio.............................................7</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#11"><b>Gestion de projet................................11</b></a></p>
	       		<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#12"><b>Démos..................................................12</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#17"><b>Fusion de deux instruments..............17</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#19"><b>Problèmes rencontrés........................19</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#20"><b>Points forts..........................................20</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#21"><b>Points faibles.......................................21</b></a></p>
	       		<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#22"><b>Conclusion...........................................22</b></a></p>
       		</ul>

    </article>

    
    
    <article class="smaller">
        <h3>Introduction	(1/2)</h3>
        
        <br/><br/>
        
        <p> 
        Pour la petite histoire, le monde du web s'est considérablement amélioré depuis son orgine, au début, 
        le web ne ressemblait pas à ce que l'on connait, l'affichage était rudimentaire mais avec l'avènement de NCSA Mosaic en 1993 qui 
        est le premier navigateur à avoir affiché les images (GIF et XBM) dans les pages web, puis à supporter les formulaires 
        interactifs dans les pages. Il a causé une augmentation exponentielle de la popularité du World Wide Web.
        </p>
        
        <br/>
        
        <p>
        La gestion de l'Audio sur le Web était assez primitive jusqu'à très récemment (grâce à des plugins tels que Flash et QuickTime). 
        L'introduction de  la balise &lt;audio&gt; en  HTML5 est très importante, elle permet la lecture audio de base en continu . 
        Mais, elle n'est pas assez puissante pour gérer les applications audio plus complexes 
        </p>
        
    </article>
    
    
    <article class="smaller">
        <h3>Introduction	(2/2)</h3>
        
        <br/><br/>
        
        <p> 
        Ce qui nous amène à l'une des toutes dernières innovations, l'API Web Audio qui introduit de nouvelles 
        fonctionnalités audio à la plate-forme web. L'API est capable de positionner de façon dynamique ou spatiale et de mélanger 
        plusieurs sources sonores dans l'espace tridimensionnel. Elle dispose d'un puissant système modulaire de routage, effets à l'appui, 
        un moteur de convolution pour simulation de la pièce, plusieurs départs, mixages, etc... la lecture du son horaire fixe est assuré pour 
        les applications musicales nécessitant un haut degré de précision rythmique. Étayer l'analyse en temps réel de visualisation et 
        le traitement direct de JavaScript est également pris en charge. 
        </p>
        
        <br/>
        
        <p>
        Nous allons étudier cette API dans le but de développer nos propres instruments de musique dans le cadre de ce TER.        
        </p>

       
    </article>
    
    
    <article class="smaller">
        <h3>Principes</h3>
        

        
        <style>
            details {
                display:block;
                width:100%;
                margin:10px 0;
            }
            summary {
                display:block;
                background:#83A697;
                color:white;
                border-radius:5px;
                padding:5px;
                cursor:pointer;font-weight:bold;
            }
        </style>
        
        <details>
            <summary>Abstraction :</summary>
			<ul>
				<p>Le son est un <b>signal analogique</b>. Pour le numériser, on l'<b>échantillonne</b> :</p><br/>
	
					<li><b>Échantillonnage temporel :</b> on prend la mesure du signal à intervalle régulier(fréquence d'échantillonnage).</li>
	
					<li><b>Échantillonnage numérique :</b> la valeur analogique est convertie en valeur numérique sur un nombre limité de bits.</li>
	
				<p>Le signal peut être enregistré sous <b>forme numérique</b> via deux méthodes :</p><br/>
	
				<li><b>Méthode temporelle :</b> chaque échantillon temporel est enregistré (formats wave, au, ...).</li>
	
				<li><b>Méthode fréquentielle :</b> on décompose le signal par transformée de Fourier (formats MP3, ...).</li>

			</ul>
        </details>
        
        <details>
            <summary>Échantillon :</summary>
			<ul>
				<p>
				Un échantillon (<b>sample</b> en anglais) est un extrait de musique ou un son réutilisé dans une nouvelle composition musicale, 
				souvent joué en boucle. L'extrait original peut être une note, un motif musical ou sonore quelconque. Il peut être original 
				ou réutilisé en dehors de son contexte d'origine. 
				</p>

			</ul>
			<br/>
        </details>
        
        <details>
            <summary>Synthèse sonore :</summary>
			<ul>
				<p>
				C'est un ensemble de techniques pour la <b>génération de signaux sonores</b>.
				</p>
				
				<br/>
				
				<li>
				Au niveau musical, elle permet de créer de nouveaux objets sonores. Dans ce contexte, le but n’est pas de reproduire 
				des sons existants mais plutôt d’en inventer de nouveaux.
				</li>
				<li>
				Au niveau des télécommunications, elle permet de réduire la quantité d’informations lors de la transmission d’un message 
				audio : celui-ci est alors décrit par ses paramètres de synthèse qui sont les seules données transmises.
				</li>
				<li>
				Au niveau de la réalité virtuelle et des jeux vidéo, la synthèse sonore permet d’augmenter la sensation de présence de 
				l’auditeur-acteur en gérant les interactions entre l’acteur et son environnement sonore. L'acteur agit de façon directe ou 
				indirecte sur les paramètres de synthèse.
				</li>

			</ul>
        </details>
        
        <br/>
        
        <details>
            <summary>MAO</summary>
			<ul>
			
				<p>
				La <b>musique assistée par ordinateur</b> (MAO) regroupe l'ensemble des utilisations de l'informatique comme outil associé à la chaîne 
				de création musicale depuis la composition musicale jusqu'à la diffusion des œuvres, en passant par la formation pédagogique 
				au solfège ou aux instruments.
				</p>

			</ul>
			<br/>
        </details>
        
        <details>
            <summary>VST</summary>
			<ul>
				<li>
				VST (sigle de <b>Virtual Studio Technology</b>) est l'un des protocoles pour les plug-in audio existant dans le monde des logiciels.
				</li>
				
				<li>
				<b>Instruments VST</b> (VSTi). Ces plugins sont des instruments de musique virtuels pilotés en midi, à l'instar des machines "hardware". 
				Les sons sont calculés et générés par le processeur de l'ordinateur, ou lus à partir de banques sonores. Ces "VST Instruments" 
				permettent de simuler de vrais appareils comme un synthétiseur, un sampler ou une boîte à rythmes.
				</li>

			</ul>
        </details>
        
        <br/>
        <br/>
        
        <center>
        <img id="uulm-logo" src='img/livre.png' height='150'>
        </center>

    </article>
    
    <article class="smaller">
        <h3>Web Audio	(1/4)</h3>
        
        <p>
        Avant de se familiariser avec l'API Web audio, nous nous devons de montrer ce que l'on peut faire avec le <b>tag &lt;audio&gt; </b>
        de l'API audio de base en html5. Elle gère le streaming, c'est un objet du <b>DOM</b> avec propriétés, évènements et méthodes. 
        Mais peu adapté pour des applications telles que séquenceur, instruments virtuels ...
        </p>
	
	<br/>
        
        <iframe src="http://www.annodex.net/~silvia/itext/elephant_separate_audesc_dub.html"></iframe>

    </article>
    
    <article class="smaller">
        <h3>Web Audio	(2/4)</h3>
        
        <p>
        L'API a été conçue pour permettre le <b>routage modulaire</b>. Les opérations de base sont réalisées avec des <b>noeuds audio</b> qui sont liés 
        ensemble pour former des <b>graphes de routage audio</b>. Plusieurs sources, avec différents types de canaux sont pris en 
        charge, même dans un contexte unique. Cette conception modulaire permet la souplesse nécessaire pour créer des fonctions audio 
        complexes avec des effets dynamiques.
        </p>
        
        <br/>
        
        <center>
        
        <p>
        <b>Exemple d'un routage simple:</b>
        </p>

        <img src='img/sourceD.png' height='120'>
              
        </center>
        
        <pre>
        		var context = new AudioContext();
			function playSound() {
		    		var source = context.createBufferSource();
		    		source.buffer = dogBarkingBuffer;
		    		source.connect(context.destination);
		    		source.start(0);
			}</pre>
    
    </article>
    
        <article class="smaller">
        <h3>Web Audio	(3/4)</h3>
        
        <p>
        Les <b>sources audio</b> peuvent provenir de plusieurs endroits:<br/>
			<ul>
				<li>
				Générées par JavaScript par un <b>noeud audio</b> (comme un oscillateur)
				</li>
				
				<li>
				A partir de données PCM brut
				</li>
				
				<li>
				Via des éléments de médias HTML (comme les balises &lt;video&gt; ou &lt;audio&gt;)
				</li>
				
				<li>
				D'un MediaStream <b>WebRTC</b> (comme une webcam).
				</li>
				
				<li>
				A l'aide du plugin <b>Recorder.js</b>, pour enregistrer/exporter la sortie des noeuds web audio, 
				grâce à ses méthodes:<br/><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;<b>rec.record()</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;<b>rec.stop()</b> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;<b>rec.clear() </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;etc...
				
				</li>
			</ul>
        </p>
        
        <p><br/><br/>
        Le temps est contrôlé avec précision, une faible latence, avec la possibilité de cibler des échantillons spécifiques, même à un taux 
        d'échantillonnage élevé.
        </p>
        
        <p>
        L'API Web Audio permet également de contrôler la manière dont l'audio sont spatialisé.  Elle traite de l'atténuation induite par la 
        distance ou le décalage Doppler induit par une source mobile (ou l'auditeur en mouvement).
        </p>

    
    </article>


    
    <article class="smaller">
        <h3>Web Audio	(4/4)</h3>
        
        <p>
        <b>Mais comme rien ne vaut une démo pour expliquer:</b>
        </p><br/>
        
        <iframe src="http://webaudioplayground.appspot.com/"></iframe>

   
    </article>
    
    <article>
    
	<h3>Gestion de projet</h3>
	
	<h5>
	Travail réalisé par l'équipe:
	</h5>
	
	<ul>
	
		<li>
		<b>Serveur repository GitHub avec gestionnaire de tickets</b>
		</li>
		
		<li>
		<b>Wikipédia pour héberger la doc et minis tutoriaux</b>
		</li>
		
		<li>
		<b>Réunions régulières avec Monsieur BUFFA</b>
		</li>
		
		<li>
		<b>Nombreuses petites démos réalisées au cours du projet pour valider nos acquis ( &asymp; 10 )</b>
		</li>
		
		<li>
		<b>2 applications plus importantes:</b><br/><br/>
		<center>
		<b>Boîte à Rythmes<br/><br/>
		Synthétiseur</b>
		</center>

		</li>
		
		
	
	</ul>
    
    </article>
    
    <article>
        <h3>Démos	(1/N)</h3>
        
        <h5>Boîte à Rythmes (1/3)</h5>
        
        <p>
        <b>Une boîte à rythmes est un instrument de musique électronique imitant une batterie ou des instruments de percution.</b><br/>
	<ul>
		<li>
		<b>Programmation de patterns reproduits de façon cyclique</b>
		</li>
		
		<li>
		<b>Notes entrées une à une (pas de durée)</b>
		</li>
		
		<li>
		<b>Chaque son est toujours reproduit en totalité</b>
		</li>
        </p>
	</ul>

        
		<ul>
		Lien: <a href="../BoiteARythme/fun/indexV2.php"> <b>Notre Boîte à Rythmes</b> </a>

		
		</ul>
   
    </article>
    
    <article class="smaller">
        <h3>Démos	(2/N)</h3>
        
        <h5>Boîte à Rythmes (2/3)</h5>
        
        <p>
        <b>Concernant notre boîte à rythmes:<br/><br/>
        Pour commencer, les cases on été dessinées, puis la ligne qui parcours la piste (<b>BPS * largeurPixelsUnBeat = 1 seconde</b>). 
        La boîte à rythme contient six sons de base( Pom1, Pom2, Pom3, Chapeau, Caisse, Pied ), on crée un noeud web audio qui sera la source 
        du graphe, on connecte la source (sample) au noeud de destination (speakers) et on joue.</b>
        </p>
        
        <br/><br/>
        
        <center>
        <img src='img/noeud.jpg' height='220'>
        </center>
   
    </article>
    
   <article class="smaller">
        <h3>Démos	(3/N)</h3>
        
        <h5>Boîte à Rythmes (3/3)</h5>
        
        <p>
        <b>L'ajout d'un filtre est assez simple à réaliser:</b>
        </p>
        
        <pre>//Modifier la Qualité
			this.changeQuality = function(element) {
				  this.filter.Q.value = element.value * QUAL_MUL;
			};</pre>
			
		<pre>			this.filter = contextSound.createBiquadFilter();
		     	this.filter.type = 0; // LOWPASS
		     	this.filter.frequency.value = 5000;

		     	//on applique les filtres
		     	this.changeFrequency(document.getElementById("freq"));
		     	this.changeQuality(document.getElementById("qual"));
		     	 };
		
		    	// Finally: tell the source when to start
		    	this.play = function(delay)
		    	...</pre>
   
    </article>
    
   <article class="smaller">
        <h3>Démos	(4/N)</h3>
        
        <h5>Synthétiseur (1/N)</h5>
        
        <p>
        Un synthétiseur, ou synthé, est un instrument de musique capable de créer et de manipuler des sons électroniques au moyen de 
        tables d'ondes, d'échantillons ou d'oscillateurs électroniques produisant des formes d'ondes que l'on modifie à l'aide de circuits 
        composés de filtres, de modulateurs d'amplitude, de générateurs d'enveloppe. 
        </p>
        <br/>
        
        <center>
        <img src='img/synthe.png' height='300'>
        </center>
        
    </article>
    
    <article class="smaller">
        <h3>Démos	(5/N)</h3>
        
        <h5>Synthétiseur (2/N)</h5>
        
        <p>
		.................A COMPLETER.........................
        </p>
        <br/>
        
    </article>
    
    <article>
	<h3>Fusion de deux instruments	(1/2)</h3>
	
	<br/>
	
	<p><b>Nous n'avons pour l'instant pas réussi à intégrer deux instruments virtuels sur la même page.</b></p><br/>
	
	<p><b>Si trop de "context", l'API râle assez vite.</b></p><br/>
	
	<p><b>Cependant, nous avons trouvé une petite combine afin de charger un instrument sans en subir ses contraintes. Il faut utiliser la balise &lt;iframe&gt;:</b></p>
	
	<pre>&lt;iframe src="../Piano/indexIFrame.html" 
	style="width:1000px;height:700px;" scrolling="no" 
	marginwidth="0" marginheight="0" frameborder="0"&gt;&lt;/iframe&gt;</pre>
	
    </article>
    
    <article>
	<h3>Fusion de deux instruments	(2/2)</h3>
	
	<h5>Vidéo de démonstration</h5>
	
	<p>//!\\<br/>Intégrer ici la vidéo où il y aura la boîte à rythmes en haut ainsi que le synthétiseur en dessous, ainsi sur la vidéo la boîte à rythmes jouera une séquence choisie et un utilisateur pourra jouer en même temps du synthétiseur en dessous, sur la même page !!!</p>
	
    </article>
    
    
    <article>
	<h3>Problèmes rencontrés</h3>
	
		<ul>
		
			<li>
			<b>Mauvaise organisation au tout début</b>
			</li>
			
			<li>
			<b>Manque de temps</b>
			</li>
			
			<li>
			<b>La pause casse le graphe de noeuds</b>
			</li>
			
			<li>
			<b>Echec pour changer le filtre dynamiquement sur la boîte à rythmes</b>
			</li>
			
			<li>
			<b>Léger problèmes de raffraichissements pour les courbes de la boîte à rythmes (devrait s'appliquer à un noeud, mais appliqué sur un graphe de noeuds)</b>
			</li>
		
		</ul>
	
    </article>
    
    <article>
	<h3>Points forts</h3>
	
		<ul>
		
			<li>
			<b>Application de filtres avec succès</b>
			</li>
			
			<li>
			<b>Correction de la courbe des fréquences pour ne pas raffraichir la courbe lorsque l'on est entre deux sons</b>
			</li>
			
			<li>
			<b>Possibilité d'avoir deux instruments sur une seule page web</b>
			</li>
			
		
		</ul>
	
    </article>
    
    <article>
	<h3>Points faibles</h3>
	
		<ul>
		
			<li>
			<b>Problème de raffraichissement de la courbe des "wave"</b>
			</li>
			
			<li>
			<b>Application assez lourde à charger (surtout si des applications ouvertes sur d'autres onglets)</b>
			</li>
			
			<li>
			<b>Possibilité d'avoir deux instruments sur une seule page web</b>
			</li>
			
			<li>
			<b>La pause casse le graphe de noeuds</b>
			</li>
			
		
		</ul>
	
    </article>
    
   <article class="smaller">
        <h3>Conclusion	(1/2)</h3>
        
        <p><b>
        Au travers de ces différentes applications, nous avons ainsi montré que l'API web audio fournit un panel d'outils très interessants 
        et innovants pour gérer le traitement de sons de manière interractive.</b></p>
        
			<ul>
				<li>
				Précision au millionnième de seconde
				</li>
				
				<li>
				Plusieurs noeuds prédéfinis
				</li>
				
				&Theta; Delay &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &Theta; Reverb 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp; &Theta; Distorsion <br/>
				&Theta; Filtres &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &Theta; Volumes/Gain &nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&Theta; Panning/Stereo <br/>
				&Theta; Générateurs d'ondes &nbsp;&nbsp;&nbsp &Theta; Visualiseurs de fréquences <br/>
				&Theta; Oscillateurs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &Theta; etc...
			</ul>
			
			<br/>

        <p><b>D'un point de vue pratique, nous avons appris les rudiments de la base en ce qui concerne l' API web audio, mais également en ce qui 
        conserne l'audio en général (notament le fonctionnement d'instruments comme le synthétiseur, la boîte à rythme et les techniques de 
        traitement employées pour analyser et modifier les sons), cela nous a permit de nous former à ces nouvelles possibilités qui seront 
        probablement d'un impact majeur dans le web de demain.</b>
        </p>
        <br/>
        
    </article>
    
    <article class="smaller">
        <h3>Conclusion	(2/2)</h3>

	<h5>Perspectives</h5>

	<p>
	<b>Notre application a vocation à être développée afin de créer un instrument complet de type MAO tel que ce que l'on peut trouver sur le marché.<br/><br/>
	Voici un aperçu d'un instrument de type MAO que l'on peut trouver en vente sur internet: (149 €)</b><br/><br/>
	</p>
	<center>
	<img src='./img/mao.jpg' height='300'>
	</center>
	
        

        
    </article>
    
    
    
    

</section>


	</div>

</body>
</html>
