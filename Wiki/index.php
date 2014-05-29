<?php

	$affichage = '';
	$affichage .= '
	<!DOCTYPE html>
		<html lang="fr">
			<head>
			
				<meta charset="UTF-8" />
				<title>WebAudioPédia</title>
        		
				<!-- CSS du bouton lateral -->
				<link rel="stylesheet" href="Css/WikiBouton.css" type="text/css" />
        		<script type="text/javascript" src="jquery-1.3.2.js"></script>
				
				<style type="text/css">
					ul li { margin: 20px 0 }
					ol li { margin: 50px 0 }
				</style>
				
			</head>
			
			<body>
		
				<H1> WebAudioPédia </H1>
			
			<center><a href=".."><button type="button" class="button">Accueil</button></a></center>
			<center><a href="http://skarn.fr/TER/Wiki/index.php?title=Accueil"><button type="button" class="button">Wiki Professionnel</button></a></center>
				
				<div class="description">
				
					<H3> Description du sujet: </H3>
				
					<p>La librairie Web Audio permet de créer des applications audio de grande qualité, qui vont
						tourner dans le browser : logiciels multipistes, lecteurs audio avancés (avec boucles, visualisations
						qui dansent en musique, etc), instruments virtuels (synthétiseurs, échantillonneurs), support
						midi, effets temps réel. Pour ceux qui connaissent un peu la Musique Assistée par Ordinateur
						(MAO), on a l’équivalent des VSTs et des VSTis directement accessibles en JavaScript. Cette
						API est très récente et tourne depuis peu dans tous les navigateurs sauf IE (à venir pour la
						version 12).
						Le but de ce TER consiste à développer des instruments virtuels et des effets qui pourront
						être intégrés dans un lecteur audio multipiste écrit par Michel Buffa et ses étudiants, destiné aux
						musiciens amateurs désirant travailler leur instruments en jouant par dessus des "backtracks",
						des pistes d’accompagnement. Par exemple : je prends une chanson des Guns and Roses ou
						d’ACDC, la vraie chanson, j’enlève la guitare solo et c’est moi qui joue par dessus. Dans ce cas,
						si je veux enregistrer le mix de ma guitare + la backtrack, je dois brancher ma guitare dans une
						entrée audio de l’ordinateur, Web Audio le supporte. Mais j’aimerais aussi avoir le son d’Angus
						Young ou de Slash. Là il me faut de la distorsion, un peu de compression, égaliser les fréquences,
						etc Ca tombe bien, on a ça aussi tout fait dans Web Audio. Il est aussi possible de faire ses
						propres effets. Si je suis pianiste nomade, j’ai peut être envie d’utiliser un instrument virtuel,
						un orgue, un piano virtuel, un synthé... Dans ce cas sur mon ipad, je dessine un clavier, et je
						veux jouer dessus, ou bien je branche un vrai clavier midi sur mon ipad ou sur mon PC et je
						veux que les evenements midi entrant se transforment en sons générés par l’ordinateur. Et je
						veux toujours pouvoir enregistrer le résultat. Etc...
						Bien sûr, tout cela sans RIEN installer sur son ordinateur, juste avec une appli web écrite
						en HTML5!
						Bien sûr, nous ne proposerions pas ce sujet si tout cela n’était pas possible.
						Le sujet du TER consiste donc à explorer cette nouvelle API, développer quelques effets et
						instruments virtuels, intégrer le tout dans le lecteur audio multipiste (pour s’accompagner et
						enregistrer nos performances).
					</p>
				</div>
				
				
				<div class="definition">
				
					<H3> Définition des mots-clés: </H3>
				
					<ul> 
					
						<li><b>Instrument de musique:</b> C\'est un objet pouvant produire un son contrôlé par un musicien — que cet objet soit conçu dans
							cet objectif, ou bien qu\'il soit modifié ou écarté de son usage premier. La voix ou les mains, même si elles
							ne sont pas des objets à proprement parler, sont considérées comme des instruments de musique dès lors qu\'elles
							participent à une œuvre musicale.</li>
							
						<li><b>Instruments de synthèse:</b> Un synthétiseur, ou trivialement synthé, est un instrument de musique capable de
							créer et de manipuler des sons électroniques au moyen de tables d\'ondes, d\'échantillons ou d\'oscillateurs 
							électroniques produisant des formes d\'ondes que l\'on modifie à l\'aide de circuits composés de filtres, 
							de modulateurs d\'amplitude, de générateurs d\'enveloppe.</li>
							
 						<li><b>Échantillon:</b> Un échantillon (sample en anglais) est un extrait de musique ou un son réutilisé dans une nouvelle
 							composition musicale, souvent joué en boucle. L\'extrait original peut être une note, 
 							un motif musical ou sonore quelconque. Il peut être original ou réutilisé en dehors de son contexte d\'origine.</li>
 							
 						<li><b>Son analogique:</b> Le son analogique est un signal électrique continu pour lequel il existe une valeur de tension
 							en concordance avec la variation de la pression de l\'air. Analogique vient du mot "analogue" ce qui signifie "ressemblance".
 							En effet, un son analogique est enregistré de façon analogue à l’onde sonore qu’elle produit. Un son est une pression d’air 
 							qui vibre en fonction du temps. Cette pression est captée par un microphone et transforme cette pression en tension. </li>
 							
						<li><b>Son harmonique:</b> En musique, un harmonique est un composant à part entière d’un son musical (et plus généralement d\'une onde),
 							qui possède une fréquence multiple de la fréquence fondamentale.
							<br/>Par exemple, si on appelle « ƒ0 » la fréquence fondamentale, les harmoniques auront des fréquences égales à : 2ƒ0, 3ƒ0 etc.
 							En prenant comme note fondamentale le « la3 » (440 Hz) du piano, les harmoniques sont toutes les notes ayant pour fréquence 
 							un multiple de 440. Les harmoniques d’une note sont donc forcément plus aigus que cette note et s\'appelent harmoniques supérieurs.</li>
 							
 						<li><b>Abstraction :</b> Le son est représenté par un signal analogique. Pour le numériser, on l\'échantillonne :<br/>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Échantillonnage temporel : on prend la mesure du signal à intervalle régulier (fréquence d\'échantillonnage).<br/>
    						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Échantillonnage numérique : la valeur analogique est convertie en valeur numérique sur un nombre limité de bits.<br/>
							Le signal est enregistré sous forme numérique selon deux principales méthodes :<br/>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Méthode temporelle : chaque échantillon temporel est enregistré (formats wave, au, ...).<br/>
    						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Méthode fréquentielle : on décompose le signal par transformée de Fourier (formats MP3, ...).<br/>
							(Certains changements de niveau sonore ne sont pas perceptibles par l\'oreille humaine. 
							Les codages µ-Law et A-Law exploitent cette propriété pour encoder les niveaux en utilisant moins de bits.)</li>	
 					</ul> 
				
				</div>
				
				<div class="descSite">
				
					<H3>Descriptif des boutons du site:</H3>
					
					<p> inserrer ici image du menu </p>
					
					<ul> 
					
						<li><b>Accueil :</b> Ici sont indiquées les différentes MAJ du site web.</li>															
 						
 						<li><b>Boite à Rythme :</b> Une boite à rythme, pour creer quelques échantillons. Et notre propre boite à rythme</li>
												
 						<li><b>Piano :</b> Un synthé, pour creer quelques échantillons.</li>
 						
 						<li><b>Son :</b> Pour lire une musique sur un serveur web.</li>
 						
 						<li><b>Micro :</b> Pour enregistrer la voix.</li>
 						
 						<li><b>Wiki :</b> Webtools & Glossaire & Wiki</li>	
 						
 						<li><b>Deposer Musique:</b>Pour déposer une musique (.mp3 / .mp4) sur le serveur. (utile pour le Quizz), On peut également s\'en servir pour deposer un échantillon </li>
					
						<li><b>Musiques :</b> Pour lire une des musiques stockées sur le serveur, à l\'aide de la balise audio de HTML5</li>	
 						
 						<li><b>Quizz :</b> On prend une musique aléatoirement sur le serveur, on la joue, 
						puis on demande de trouver le titre, si 75% des mots sont juste on considère la réponse bonne. Pour l\'instant on utilise SOUNDEX en php,
 						cette librairie permet de comparer un mot à son équivalent phonétique(on tolère un peu les fautes).</li>
						
					</ul>
				
				</div>
				
				<div class="descSite">
				
					<H3>Descriptif des Applications (Javascript) du site:</H3>
					
					<ol>
					
						
						<li> <b>Boite à Rythme :</b> <br/><br/>
							Emplacement: ../BoiteARythme/ <br/>
							Description: Instrument de musique électronique imitant une batterie ou des instruments de percussion.<br/>
							Enregistrer un échantillon: Utiliser la fonction Save de l\'application.<br/>
						</li>
						
						<li> <b>Piano :</b> <br/><br/>
							Emplacement: ../Piano/<br/>
							Description: Cette application met en oeuvre un "analogique" le synthétiseur polyphonique, avec une architecture vocale classique. Jouable via le clavier et/ou la souris.<br/>
							Touches: A VENIR.<br/>
							Enregistrer un échantillon: A VENIR.<br/>
						</li>
						
						<li> <b>Son :</b> <br/><br/>
							Emplacement: ../Son/<br/>
							Description: Lire une musique sur un serveur web et afficher son spectre<br/>
						</li>
						
						<li> <b>Micro :</b> <br/><br/>
							Emplacement: ../Micro/<br/>
							Description: Enregistrer un son et convertir le signal acoustique en signal électrique.<br/>
						</li>
					
					
					</ol>
					
				</div>
			
			</body>

	';
	
	
	
	echo utf8_encode($affichage);
	
	
	require "./menulat.php";

?>