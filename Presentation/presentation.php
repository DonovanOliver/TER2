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
			Familiarisation � la librairie Web Audio
			</li>


				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Context</p>
	
		
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Noeud et Destination</p>

				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Effet</p>
		
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Filtre</p>
		
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;&nbsp;&nbsp;&nbsp;Analyseur</p>

			
			<br/>
			
			<li>
			D�velopper des instruments virtuels (VSTis)
			</li>
			
			<br/>
			
			<li>
			Int�grer plusieurs instruments dans une application 
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
	       		<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#12"><b>D�mos..................................................12</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#17"><b>Fusion de deux instruments..............17</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#19"><b>Probl�mes rencontr�s........................19</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#20"><b>Points forts..........................................20</b></a></p>
				<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#21"><b>Points faibles.......................................21</b></a></p>
	       		<p>&nbsp;&nbsp;&nbsp;&#x2326;&nbsp;&nbsp;<a href="./presentation.php#22"><b>Conclusion...........................................22</b></a></p>
       		</ul>

    </article>

    
    
    <article class="smaller">
        <h3>Introduction	(1/2)</h3>
        
        <br/><br/>
        
        <p> 
        Pour la petite histoire, le monde du web s'est consid�rablement am�lior� depuis son orgine, au d�but, 
        le web ne ressemblait pas � ce que l'on connait, l'affichage �tait rudimentaire mais avec l'av�nement de NCSA Mosaic en 1993 qui 
        est le premier navigateur � avoir affich� les images (GIF et XBM) dans les pages web, puis � supporter les formulaires 
        interactifs dans les pages. Il a caus� une augmentation exponentielle de la popularit� du World Wide Web.
        </p>
        
        <br/>
        
        <p>
        La gestion de l'Audio sur le Web �tait assez primitive jusqu'� tr�s r�cemment (gr�ce � des plugins tels que Flash et QuickTime). 
        L'introduction de  la balise &lt;audio&gt; en  HTML5 est tr�s importante, elle permet la lecture audio de base en continu . 
        Mais, elle n'est pas assez puissante pour g�rer les applications audio plus complexes 
        </p>
        
    </article>
    
    
    <article class="smaller">
        <h3>Introduction	(2/2)</h3>
        
        <br/><br/>
        
        <p> 
        Ce qui nous am�ne � l'une des toutes derni�res innovations, l'API Web Audio qui introduit de nouvelles 
        fonctionnalit�s audio � la plate-forme web. L'API est capable de positionner de fa�on dynamique ou spatiale et de m�langer 
        plusieurs sources sonores dans l'espace tridimensionnel. Elle dispose d'un puissant syst�me modulaire de routage, effets � l'appui, 
        un moteur de convolution pour simulation de la pi�ce, plusieurs d�parts, mixages, etc... la lecture du son horaire fixe est assur� pour 
        les applications musicales n�cessitant un haut degr� de pr�cision rythmique. �tayer l'analyse en temps r�el de visualisation et 
        le traitement direct de JavaScript est �galement pris en charge. 
        </p>
        
        <br/>
        
        <p>
        Nous allons �tudier cette API dans le but de d�velopper nos propres instruments de musique dans le cadre de ce TER.        
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
				<p>Le son est un <b>signal analogique</b>. Pour le num�riser, on l'<b>�chantillonne</b> :</p><br/>
	
					<li><b>�chantillonnage temporel :</b> on prend la mesure du signal � intervalle r�gulier(fr�quence d'�chantillonnage).</li>
	
					<li><b>�chantillonnage num�rique :</b> la valeur analogique est convertie en valeur num�rique sur un nombre limit� de bits.</li>
	
				<p>Le signal peut �tre enregistr� sous <b>forme num�rique</b> via deux m�thodes :</p><br/>
	
				<li><b>M�thode temporelle :</b> chaque �chantillon temporel est enregistr� (formats wave, au, ...).</li>
	
				<li><b>M�thode fr�quentielle :</b> on d�compose le signal par transform�e de Fourier (formats MP3, ...).</li>

			</ul>
        </details>
        
        <details>
            <summary>�chantillon :</summary>
			<ul>
				<p>
				Un �chantillon (<b>sample</b> en anglais) est un extrait de musique ou un son r�utilis� dans une nouvelle composition musicale, 
				souvent jou� en boucle. L'extrait original peut �tre une note, un motif musical ou sonore quelconque. Il peut �tre original 
				ou r�utilis� en dehors de son contexte d'origine. 
				</p>

			</ul>
			<br/>
        </details>
        
        <details>
            <summary>Synth�se sonore :</summary>
			<ul>
				<p>
				C'est un ensemble de techniques pour la <b>g�n�ration de signaux sonores</b>.
				</p>
				
				<br/>
				
				<li>
				Au niveau musical, elle permet de cr�er de nouveaux objets sonores. Dans ce contexte, le but n�est pas de reproduire 
				des sons existants mais plut�t d�en inventer de nouveaux.
				</li>
				<li>
				Au niveau des t�l�communications, elle permet de r�duire la quantit� d�informations lors de la transmission d�un message 
				audio : celui-ci est alors d�crit par ses param�tres de synth�se qui sont les seules donn�es transmises.
				</li>
				<li>
				Au niveau de la r�alit� virtuelle et des jeux vid�o, la synth�se sonore permet d�augmenter la sensation de pr�sence de 
				l�auditeur-acteur en g�rant les interactions entre l�acteur et son environnement sonore. L'acteur agit de fa�on directe ou 
				indirecte sur les param�tres de synth�se.
				</li>

			</ul>
        </details>
        
        <br/>
        
        <details>
            <summary>MAO</summary>
			<ul>
			
				<p>
				La <b>musique assist�e par ordinateur</b> (MAO) regroupe l'ensemble des utilisations de l'informatique comme outil associ� � la cha�ne 
				de cr�ation musicale depuis la composition musicale jusqu'� la diffusion des �uvres, en passant par la formation p�dagogique 
				au solf�ge ou aux instruments.
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
				<b>Instruments VST</b> (VSTi). Ces plugins sont des instruments de musique virtuels pilot�s en midi, � l'instar des machines "hardware". 
				Les sons sont calcul�s et g�n�r�s par le processeur de l'ordinateur, ou lus � partir de banques sonores. Ces "VST Instruments" 
				permettent de simuler de vrais appareils comme un synth�tiseur, un sampler ou une bo�te � rythmes.
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
        de l'API audio de base en html5. Elle g�re le streaming, c'est un objet du <b>DOM</b> avec propri�t�s, �v�nements et m�thodes. 
        Mais peu adapt� pour des applications telles que s�quenceur, instruments virtuels ...
        </p>
	
	<br/>
        
        <iframe src="http://www.annodex.net/~silvia/itext/elephant_separate_audesc_dub.html"></iframe>

    </article>
    
    <article class="smaller">
        <h3>Web Audio	(2/4)</h3>
        
        <p>
        L'API a �t� con�ue pour permettre le <b>routage modulaire</b>. Les op�rations de base sont r�alis�es avec des <b>noeuds audio</b> qui sont li�s 
        ensemble pour former des <b>graphes de routage audio</b>. Plusieurs sources, avec diff�rents types de canaux sont pris en 
        charge, m�me dans un contexte unique. Cette conception modulaire permet la souplesse n�cessaire pour cr�er des fonctions audio 
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
				G�n�r�es par JavaScript par un <b>noeud audio</b> (comme un oscillateur)
				</li>
				
				<li>
				A partir de donn�es PCM brut
				</li>
				
				<li>
				Via des �l�ments de m�dias HTML (comme les balises &lt;video&gt; ou &lt;audio&gt;)
				</li>
				
				<li>
				D'un MediaStream <b>WebRTC</b> (comme une webcam).
				</li>
				
				<li>
				A l'aide du plugin <b>Recorder.js</b>, pour enregistrer/exporter la sortie des noeuds web audio, 
				gr�ce � ses m�thodes:<br/><br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;<b>rec.record()</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;<b>rec.stop()</b> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;<b>rec.clear() </b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rArr;etc...
				
				</li>
			</ul>
        </p>
        
        <p><br/><br/>
        Le temps est contr�l� avec pr�cision, une faible latence, avec la possibilit� de cibler des �chantillons sp�cifiques, m�me � un taux 
        d'�chantillonnage �lev�.
        </p>
        
        <p>
        L'API Web Audio permet �galement de contr�ler la mani�re dont l'audio sont spatialis�.  Elle traite de l'att�nuation induite par la 
        distance ou le d�calage Doppler induit par une source mobile (ou l'auditeur en mouvement).
        </p>

    
    </article>


    
    <article class="smaller">
        <h3>Web Audio	(4/4)</h3>
        
        <p>
        <b>Mais comme rien ne vaut une d�mo pour expliquer:</b>
        </p><br/>
        
        <iframe src="http://webaudioplayground.appspot.com/"></iframe>

   
    </article>
    
    <article>
    
	<h3>Gestion de projet</h3>
	
	<h5>
	Travail r�alis� par l'�quipe:
	</h5>
	
	<ul>
	
		<li>
		<b>Serveur repository GitHub avec gestionnaire de tickets</b>
		</li>
		
		<li>
		<b>Wikip�dia pour h�berger la doc et minis tutoriaux</b>
		</li>
		
		<li>
		<b>R�unions r�guli�res avec Monsieur BUFFA</b>
		</li>
		
		<li>
		<b>Nombreuses petites d�mos r�alis�es au cours du projet pour valider nos acquis ( &asymp; 10 )</b>
		</li>
		
		<li>
		<b>2 applications plus importantes:</b><br/><br/>
		<center>
		<b>Bo�te � Rythmes<br/><br/>
		Synth�tiseur</b>
		</center>

		</li>
		
		
	
	</ul>
    
    </article>
    
    <article>
        <h3>D�mos	(1/N)</h3>
        
        <h5>Bo�te � Rythmes (1/3)</h5>
        
        <p>
        <b>Une bo�te � rythmes est un instrument de musique �lectronique imitant une batterie ou des instruments de percution.</b><br/>
	<ul>
		<li>
		<b>Programmation de patterns reproduits de fa�on cyclique</b>
		</li>
		
		<li>
		<b>Notes entr�es une � une (pas de dur�e)</b>
		</li>
		
		<li>
		<b>Chaque son est toujours reproduit en totalit�</b>
		</li>
        </p>
	</ul>

        
		<ul>
		Lien: <a href="../BoiteARythme/fun/indexV2.php"> <b>Notre Bo�te � Rythmes</b> </a>

		
		</ul>
   
    </article>
    
    <article class="smaller">
        <h3>D�mos	(2/N)</h3>
        
        <h5>Bo�te � Rythmes (2/3)</h5>
        
        <p>
        <b>Concernant notre bo�te � rythmes:<br/><br/>
        Pour commencer, les cases on �t� dessin�es, puis la ligne qui parcours la piste (<b>BPS * largeurPixelsUnBeat = 1 seconde</b>). 
        La bo�te � rythme contient six sons de base( Pom1, Pom2, Pom3, Chapeau, Caisse, Pied ), on cr�e un noeud web audio qui sera la source 
        du graphe, on connecte la source (sample) au noeud de destination (speakers) et on joue.</b>
        </p>
        
        <br/><br/>
        
        <center>
        <img src='img/noeud.jpg' height='220'>
        </center>
   
    </article>
    
   <article class="smaller">
        <h3>D�mos	(3/N)</h3>
        
        <h5>Bo�te � Rythmes (3/3)</h5>
        
        <p>
        <b>L'ajout d'un filtre est assez simple � r�aliser:</b>
        </p>
        
        <pre>//Modifier la Qualit�
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
        <h3>D�mos	(4/N)</h3>
        
        <h5>Synth�tiseur (1/N)</h5>
        
        <p>
        Un synth�tiseur, ou synth�, est un instrument de musique capable de cr�er et de manipuler des sons �lectroniques au moyen de 
        tables d'ondes, d'�chantillons ou d'oscillateurs �lectroniques produisant des formes d'ondes que l'on modifie � l'aide de circuits 
        compos�s de filtres, de modulateurs d'amplitude, de g�n�rateurs d'enveloppe. 
        </p>
        <br/>
        
        <center>
        <img src='img/synthe.png' height='300'>
        </center>
        
    </article>
    
    <article class="smaller">
        <h3>D�mos	(5/N)</h3>
        
        <h5>Synth�tiseur (2/N)</h5>
        
        <p>
		.................A COMPLETER.........................
        </p>
        <br/>
        
    </article>
    
    <article>
	<h3>Fusion de deux instruments	(1/2)</h3>
	
	<br/>
	
	<p><b>Nous n'avons pour l'instant pas r�ussi � int�grer deux instruments virtuels sur la m�me page.</b></p><br/>
	
	<p><b>Si trop de "context", l'API r�le assez vite.</b></p><br/>
	
	<p><b>Cependant, nous avons trouv� une petite combine afin de charger un instrument sans en subir ses contraintes. Il faut utiliser la balise &lt;iframe&gt;:</b></p>
	
	<pre>&lt;iframe src="../Piano/indexIFrame.html" 
	style="width:1000px;height:700px;" scrolling="no" 
	marginwidth="0" marginheight="0" frameborder="0"&gt;&lt;/iframe&gt;</pre>
	
    </article>
    
    <article>
	<h3>Fusion de deux instruments	(2/2)</h3>
	
	<h5>Vid�o de d�monstration</h5>
	
	<p>//!\\<br/>Int�grer ici la vid�o o� il y aura la bo�te � rythmes en haut ainsi que le synth�tiseur en dessous, ainsi sur la vid�o la bo�te � rythmes jouera une s�quence choisie et un utilisateur pourra jouer en m�me temps du synth�tiseur en dessous, sur la m�me page !!!</p>
	
    </article>
    
    
    <article>
	<h3>Probl�mes rencontr�s</h3>
	
		<ul>
		
			<li>
			<b>Mauvaise organisation au tout d�but</b>
			</li>
			
			<li>
			<b>Manque de temps</b>
			</li>
			
			<li>
			<b>La pause casse le graphe de noeuds</b>
			</li>
			
			<li>
			<b>Echec pour changer le filtre dynamiquement sur la bo�te � rythmes</b>
			</li>
			
			<li>
			<b>L�ger probl�mes de raffraichissements pour les courbes de la bo�te � rythmes (devrait s'appliquer � un noeud, mais appliqu� sur un graphe de noeuds)</b>
			</li>
		
		</ul>
	
    </article>
    
    <article>
	<h3>Points forts</h3>
	
		<ul>
		
			<li>
			<b>Application de filtres avec succ�s</b>
			</li>
			
			<li>
			<b>Correction de la courbe des fr�quences pour ne pas raffraichir la courbe lorsque l'on est entre deux sons</b>
			</li>
			
			<li>
			<b>Possibilit� d'avoir deux instruments sur une seule page web</b>
			</li>
			
		
		</ul>
	
    </article>
    
    <article>
	<h3>Points faibles</h3>
	
		<ul>
		
			<li>
			<b>Probl�me de raffraichissement de la courbe des "wave"</b>
			</li>
			
			<li>
			<b>Application assez lourde � charger (surtout si des applications ouvertes sur d'autres onglets)</b>
			</li>
			
			<li>
			<b>Possibilit� d'avoir deux instruments sur une seule page web</b>
			</li>
			
			<li>
			<b>La pause casse le graphe de noeuds</b>
			</li>
			
		
		</ul>
	
    </article>
    
   <article class="smaller">
        <h3>Conclusion	(1/2)</h3>
        
        <p><b>
        Au travers de ces diff�rentes applications, nous avons ainsi montr� que l'API web audio fournit un panel d'outils tr�s interessants 
        et innovants pour g�rer le traitement de sons de mani�re interractive.</b></p>
        
			<ul>
				<li>
				Pr�cision au millionni�me de seconde
				</li>
				
				<li>
				Plusieurs noeuds pr�d�finis
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
				&Theta; G�n�rateurs d'ondes &nbsp;&nbsp;&nbsp &Theta; Visualiseurs de fr�quences <br/>
				&Theta; Oscillateurs &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &Theta; etc...
			</ul>
			
			<br/>

        <p><b>D'un point de vue pratique, nous avons appris les rudiments de la base en ce qui concerne l' API web audio, mais �galement en ce qui 
        conserne l'audio en g�n�ral (notament le fonctionnement d'instruments comme le synth�tiseur, la bo�te � rythme et les techniques de 
        traitement employ�es pour analyser et modifier les sons), cela nous a permit de nous former � ces nouvelles possibilit�s qui seront 
        probablement d'un impact majeur dans le web de demain.</b>
        </p>
        <br/>
        
    </article>
    
    <article class="smaller">
        <h3>Conclusion	(2/2)</h3>

	<h5>Perspectives</h5>

	<p>
	<b>Notre application a vocation � �tre d�velopp�e afin de cr�er un instrument complet de type MAO tel que ce que l'on peut trouver sur le march�.<br/><br/>
	Voici un aper�u d'un instrument de type MAO que l'on peut trouver en vente sur internet: (149 �)</b><br/><br/>
	</p>
	<center>
	<img src='./img/mao.jpg' height='300'>
	</center>
	
        

        
    </article>
    
    
    
    

</section>


	</div>

</body>
</html>
