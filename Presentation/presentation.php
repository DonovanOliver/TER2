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
	
	<meta charset='utf-8'>
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
                    <img id="title-header" src='img/audio2.png'>
                    <img id="uulm-logo" src='img/logo.png'>
                </p>
			</article>
		
		</section>


<section>

    <article class="smaller"> 
        <h3>Message Temporaire:</h3>
		<p>
		Cette page sera éffacée, elle permet de rendre compte de l'avancement de la présentation.
	 	Je terminerai la version finale lundi après le partiel de résolution (à partir de 12/13h) 
	 	en fonctions des différentes suggestions de chacun
		
		<br/>
		<br/>
		1 ère version: 14/06/2014<br/>
		Vous avez jusqu'à lundi 13h après je suis obligé de le finaliser.<br/>
		Mettez ici les idées/remarques:
		
		<br/>
		<br/>
		- Dans le dossier presentation, il y a presentation.css pour ceux qui se sentiraient d'en mettre sinon je le ferai à la fin
		<br/>
		<br/>
		- Je n'ai pas mis les images des boites à a rythmes car on les montrera durant la présentation, faites comme vous voulez pour la partie synthé
		<br/>
		<br/>
		- ....... 
		<br/>
		<br/>
		etc ...
		</p>

    </article>

    <article class="smaller"> 
        <h3>Sujet de notre TER</h3>
		<p>
		La librairie Web Audio permet de créer des applications audio de grande qualité, qui vont tourner dans le browser:
		 logiciels multipistes, lecteurs audio avancés (avec boucles, visualisations qui dansent en musique, etc), 
		 instruments virtuels (synthétiseurs, échantillonneurs), support midi, effets temps réel. 
		 Pour ceux qui connaissent un peu la Musique Assistée par Ordinateur (MAO), 
		 on a l'équivalent des VSTs et des VSTis directement accessibles en JavaScript.
		 Cette API est très récente et tourne depuis peu dans tous les navigateurs sauf IE (à venir pour la version 12). 
		 Le but de ce TER consiste à développer des instruments virtuels et des effets qui pourront être intégrés dans un lecteur audio 
		 multipiste écrit par Michel Buffa et ses étudiants, destiné aux musiciens amateurs désirant travailler leur instruments en jouant 
		 par dessus des "backtracks", des pistes daccompagnement. Il est aussi possible de faire ses propres effets. Si je suis pianiste nomade, 
		 j'ai peut être envie d'utiliser un instrument virtuel, un orgue, un piano virtuel, un synthé... Dans ce cas sur mon ipad, 
		 je dessine un clavier, et je veux jouer dessus, ou bien je branche un vrai clavier midi sur mon ipad ou sur mon PC et je veux 
		 que les évènements midi entrant se transforment en sons générés par l'ordinateur. Et je veux toujours pouvoir enregistrer le résultat. 
		 Etc... Bien sûr, tout cela sans RIEN installer sur son ordinateur, juste avec une appli web écrite en HTML5! Bien sûr, 
		 nous ne proposerions pas ce sujet si tout cela n'était pas possible. Le sujet du TER consiste donc à explorer cette nouvelle API, 
		 développer quelques effets et instruments virtuels, intégrer le tout dans le lecteur audio multipiste. 
		</p>

    </article>
    
    
    
    <article>
        <h3>Sommaire:</h3>
        	<br/>
        	<ul>
	       		<p>Introduction</p>
	       		<p>Principes</p>
	       		<p>Web Audio</p>
	       		<p>Démos</p>
	       		<p>Conclusion</p>
       		</ul>
        
    </article>
    
    
    <article class="smaller">
        <h3>Introduction	(1/2)</h3>
        
        <br/><br/>
        
        <p> 
        Ce TER traite de l'intégration de plusieurs instruments virtuels dans une application, nous n'avions que très peu de connaissances 
        dans ce domaine. Pour la petite histoire, le monde du web s'est considérablement amélioré depuis son orgine, au début, 
        le web ne ressemblait pas à ce que 	l'on connait, l'affichage était rudimentaire mais avec l'avènement de NCSA Mosaic en 1993 qui 
        est le premier navigateur à avoir affiché les images (GIF et XBM) dans les pages web elles-mêmes, puis à supporter les formulaires 
        interactifs dans les pages. Il a causé une 	augmentation exponentielle de la popularité du World Wide Web.
        </p>
        
        <br/>
        
        <p>
        La gestion de l'Audio sur le Web était assez primitive jusqu'à très récemment (grâce à des 	plugins tels que Flash et QuickTime). 
        L'introduction de  la balise &lt;audio&gt; en  HTML5 est très importante, elle permet la lecture audio de base en continu . 
        Mais, elle n'est pas assez 	puissante pour gérer les applications audio plus complexes 
        </p>
        
    </article>
    
    
    <article class="smaller">
        <h3>Introduction	(2/2)</h3>
        
        <br/><br/>
        
        <p> 
        Ce qui nous amène à une des toutes dernières innovations du web, l'API Web Audio qui introduit une variété de nouvelles 
        fonctionnalités audio à la plate-forme web. L'API est capable de positionner de façon dynamique ou spatiale et de mélanger 
        plusieurs sources sonores dans l'espace tridimensionnel. Elle dispose d'un puissant système modulaire de routage, effets à l'appui, 
        un moteur de convolution pour simulation de la pièce, plusieurs départs, mixages, etc... la lecture du son horaire fixe est assuré pour 
        les applications musicales nécessitant un haut degré de précision rythmique. Étayer l'analyse en temps réel / de visualisation et 
        le traitement direct de JavaScript est également pris en charge. 
        </p>
        
        <br/>
        
        <p>
        Nous allons étudier cette API dans le but de développer nos propres instruments de musique 	dans le cadre de ce TER.        
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
				<p>Le son est représenté par un signal analogique. Pour le numériser, on l'échantillonne :</p>
	
					<li>Échantillonnage temporel : on prend la mesure du signal à intervalle régulier(fréquence d'échantillonnage).</li>
	
					<li>Échantillonnage numérique : la valeur analogique est convertie en valeur numérique sur un nombre limité de bits.</li>
	
				<p>Le signal est enregistré sous forme numérique selon deux principales méthodes :</p>
	
				<li>Méthode temporelle : chaque échantillon temporel est enregistré (formats wave, au, ...).</li>
	
				<li>Méthode fréquentielle : on décompose le signal par transformée de Fourier (formats MP3, ...).</li>

			</ul>
        </details>
        
        <details>
            <summary>Échantillon :</summary>
			<ul>
				<p>
				Un échantillon (sample en anglais) est un extrait de musique ou un son réutilisé dans une nouvelle composition musicale, 
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
				La synthèse sonore est un ensemble de techniques permettant la génération de signaux sonores.
				</p>
				
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
				La musique assistée par ordinateur (MAO) regroupe l'ensemble des utilisations de l'informatique comme outil associé à la chaîne 
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
				VST (sigle de Virtual Studio Technology) est l'un des protocoles pour les plug-in audio existant dans le monde des logiciels.
				</li>
				
				<li>
				Instruments VST (VSTi). Ces plugins sont des instruments de musique virtuels pilotés en midi, à l'instar des machines "hardware". 
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
        Avant de se familiariser avec l'API Web audio, il serait intéressant de montrer ce que l'on peut faire avec le tag &lt;audio&gt; 
        de l'API audio de base en html5. Elle gère le streaming, c'est un objet du DOM avec propriétés, évènements et méthodes. 
        Mais peu adapté pour des applications telles que séquenceur, instruments virtuels, ..., en bref, pour la MAO professionnelle.
        </p>
        
        <iframe src="http://www.annodex.net/~silvia/itext/elephant_separate_audesc_dub.html"></iframe>

    </article>
    
    <article class="smaller">
        <h3>Web Audio	(2/4)</h3>
        
        <p>
        L'API a été conçue pour permettre le routage modulaire. Les opérations de base sont réalisées avec des noeuds audio qui sont liés 
        ensemble pour former des graphes de routage audio. Plusieurs sources, avec différents types de canaux sont pris en 
        charge, même dans un contexte unique. Cette conception modulaire permet la souplesse nécessaire pour créer des fonctions audio 
        complexes avec des effets dynamiques.
        </p>
        
        <br/>
        
        <center>
        
        <p>
        Exemple d'un routage simple:
        </p>
        
        <img src='img/sourceD.png' height='140'>
              
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
        Les Noeuds sont reliés par leurs entrées et sorties. Chaque entrée ou sortie est constitué de plusieurs canaux, toute structure 
        de canal discret est pris en charge, y compris les mono, stéréo, quad, 5.1, etc...
        </p>
        
        <p>
        Les sources audio peuvent provenir de plusieurs endroits: directement générés par JavaScript par un noeud audio (comme un oscillateur), 
        créé à partir de données PCM brut (le contexte audio a des méthodes pour décoder les formats audio pris en charge), liée à des éléments 
        de médias HTML (comme les balises &lt;video&gt; ou &lt;audio&gt;), ou il peut provenir d'un MediaStream WebRTC (comme une webcam ou un autre ordinateur).
        </p>
        
        <p>
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
        Mais comme rien ne vaut une démo pour expliquer:
        </p>
        
        <iframe src="http://webaudioplayground.appspot.com/"></iframe>

   
    </article>
    
    <article class="smaller">
        <h3>Démos	(1/N)</h3>
        
        <h5>Boîte à Rythmes (1/3)</h5>
        
        <p>
        Une boîte à rythmes est un instrument de musique électronique imitant une batterie ou des instruments de percution.<br/><br/>
        À la différence d'un séquenceur conventionnel, la boîte à rythmes est basée sur la programmation de patterns, 
        qui sont des groupes finis de mesures reproduits de façon cyclique.<br/><br/>
        La programmation se fait entrant les notes une à une 
        sur un graphique de pattern, divisé en mesures, elles-mêmes subdivisées selon un choix préalable de l'utilisateur 
        (en noires, croches, etc.).<br/><br/>
        Une autre différence réside dans le fait que dans une boîte à rythme le concept  de durée d'une 
        note n'existe pas, chaque son étant toujours reproduit en totalité. 
        </p>
        
		<ul>
		2 versions:
		<br/>
		
		<center>
			<li>
			<a href="../BoiteARythme/"> Démo implémentée </a>
			</li>
			
			<li>
			<a href="../BoiteARythme/"> Notre Boîte à Rythmes </a>
			</li>
		</center>
		
		</ul>
   
    </article>
    
    <article class="smaller">
        <h3>Démos	(2/N)</h3>
        
        <h5>Boîte à Rythmes (2/3)</h5>
        
        <p>
        Concernant notre boîte à rythmes:<br/><br/>
        Pour commencer, les cases on été dessinées, puis la ligne qui parcours la piste (<b>BPS * largeurPixelsUnBeat = 1 seconde</b>). 
        La boîte à rythme contient six sons de base( Pom1, Pom2, Pom3, Chapeau, Caisse, Pied ), on crée un noeud web audio qui sera la source 
        du graphe, on connecte la source (sample) au noeud de destination (speakers) et on joue.
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
        L'ajout d'un filtre est assez simple à réaliser:
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
    
   <article class="smaller">
        <h3>Conclusion	(1/N)</h3>
        <br/>
        
        <p>
        Au travers de ces différentes applications, nous avons ainsi montré que l'API web audio fournit un panel d'outils très interessants 
        et innovants pour gérer le traitement de sons de manière interractive.
        <br/><br/>(précision au millionnième de seconde, 12 noeuds prédéfinis, delay, reverb, distorsion, filtres, volumes/gain, panning/stereo, visualiseurs de fréquences, générateurs d'ondes et oscillateurs)
        <br/><br/>
        En effet, il est possible de construire un expérience audio de manière très pécise et le tout depuis le navigateur web.
        <br/><br/>
        D'un point de vue pratique, nous avons appris les rudiments de la base en ce qui concerne l' API web audio, mais également en ce qui 
        conserne l'audio en général (notament le fonctionnement d'instruments comme le synthétiseur, la boîte à rythme et les techniques de 
        traitement employées pour analyser et modifier les sons), cela nous a permit de nous former à ces nouvelles possibilités qui seront 
        probablement d'un impact majeur dans le web de demain.
        </p>
        <br/>
        
    </article>
    
    
    
    

</section>


	</div>

</body>
</html>
