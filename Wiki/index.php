<?php

	$affichage = '';
	$affichage .= '
	<!DOCTYPE html>
		<html lang="fr">
			<head>
			
				<meta charset="UTF-8" />
				<title>WebAudioP�dia</title>
        		
				<!-- CSS du bouton lateral -->
				<link rel="stylesheet" href="Css/WikiBouton.css" type="text/css" />
        		<script type="text/javascript" src="jquery-1.3.2.js"></script>
				
				<style type="text/css">
					ul li { margin: 20px 0 }
					ol li { margin: 50px 0 }
				</style>
				
			</head>
			
			<body>
		
				<H1> WebAudioP�dia </H1>
			
			<center><a href=".."><button type="button" class="button">Accueil</button></a></center>
				
				<div class="description">
				
					<H3> Description du sujet: </H3>
				
					<p>La librairie Web Audio permet de cr�er des applications audio de grande qualit�, qui vont
						tourner dans le browser : logiciels multipistes, lecteurs audio avanc�s (avec boucles, visualisations
						qui dansent en musique, etc), instruments virtuels (synth�tiseurs, �chantillonneurs), support
						midi, effets temps r�el. Pour ceux qui connaissent un peu la Musique Assist�e par Ordinateur
						(MAO), on a l��quivalent des VSTs et des VSTis directement accessibles en JavaScript. Cette
						API est tr�s r�cente et tourne depuis peu dans tous les navigateurs sauf IE (� venir pour la
						version 12).
						Le but de ce TER consiste � d�velopper des instruments virtuels et des effets qui pourront
						�tre int�gr�s dans un lecteur audio multipiste �crit par Michel Buffa et ses �tudiants, destin� aux
						musiciens amateurs d�sirant travailler leur instruments en jouant par dessus des "backtracks",
						des pistes d�accompagnement. Par exemple : je prends une chanson des Guns and Roses ou
						d�ACDC, la vraie chanson, j�enl�ve la guitare solo et c�est moi qui joue par dessus. Dans ce cas,
						si je veux enregistrer le mix de ma guitare + la backtrack, je dois brancher ma guitare dans une
						entr�e audio de l�ordinateur, Web Audio le supporte. Mais j�aimerais aussi avoir le son d�Angus
						Young ou de Slash. L� il me faut de la distorsion, un peu de compression, �galiser les fr�quences,
						etc Ca tombe bien, on a �a aussi tout fait dans Web Audio. Il est aussi possible de faire ses
						propres effets. Si je suis pianiste nomade, j�ai peut �tre envie d�utiliser un instrument virtuel,
						un orgue, un piano virtuel, un synth�... Dans ce cas sur mon ipad, je dessine un clavier, et je
						veux jouer dessus, ou bien je branche un vrai clavier midi sur mon ipad ou sur mon PC et je
						veux que les evenements midi entrant se transforment en sons g�n�r�s par l�ordinateur. Et je
						veux toujours pouvoir enregistrer le r�sultat. Etc...
						Bien s�r, tout cela sans RIEN installer sur son ordinateur, juste avec une appli web �crite
						en HTML5!
						Bien s�r, nous ne proposerions pas ce sujet si tout cela n��tait pas possible.
						Le sujet du TER consiste donc � explorer cette nouvelle API, d�velopper quelques effets et
						instruments virtuels, int�grer le tout dans le lecteur audio multipiste (pour s�accompagner et
						enregistrer nos performances).
					</p>
				</div>
				
				
				<div class="definition">
				
					<H3> D�finition des mots-cl�s: </H3>
				
					<ul> 
					
						<li><b>Instrument de musique:</b> C\'est un objet pouvant produire un son contr�l� par un musicien � que cet objet soit con�u dans
							cet objectif, ou bien qu\'il soit modifi� ou �cart� de son usage premier. La voix ou les mains, m�me si elles
							ne sont pas des objets � proprement parler, sont consid�r�es comme des instruments de musique d�s lors qu\'elles
							participent � une �uvre musicale.</li>
							
						<li><b>Instruments de synth�se:</b> Un synth�tiseur, ou trivialement synth�, est un instrument de musique capable de
							cr�er et de manipuler des sons �lectroniques au moyen de tables d\'ondes, d\'�chantillons ou d\'oscillateurs 
							�lectroniques produisant des formes d\'ondes que l\'on modifie � l\'aide de circuits compos�s de filtres, 
							de modulateurs d\'amplitude, de g�n�rateurs d\'enveloppe.</li>
							
 						<li><b>�chantillon:</b> Un �chantillon (sample en anglais) est un extrait de musique ou un son r�utilis� dans une nouvelle
 							composition musicale, souvent jou� en boucle. L\'extrait original peut �tre une note, 
 							un motif musical ou sonore quelconque. Il peut �tre original ou r�utilis� en dehors de son contexte d\'origine.</li>
 							
 						<li><b>Son analogique:</b> Le son analogique est un signal �lectrique continu pour lequel il existe une valeur de tension
 							en concordance avec la variation de la pression de l\'air. Analogique vient du mot "analogue" ce qui signifie "ressemblance".
 							En effet, un son analogique est enregistr� de fa�on analogue � l�onde sonore qu�elle produit. Un son est une pression d�air 
 							qui vibre en fonction du temps. Cette pression est capt�e par un microphone et transforme cette pression en tension. </li>
 							
						<li><b>Son harmonique:</b> En musique, un harmonique est un composant � part enti�re d�un son musical (et plus g�n�ralement d\'une onde),
 							qui poss�de une fr�quence multiple de la fr�quence fondamentale.
							<br/>Par exemple, si on appelle � �0 � la fr�quence fondamentale, les harmoniques auront des fr�quences �gales � : 2�0, 3�0 etc.
 							En prenant comme note fondamentale le � la3 � (440 Hz) du piano, les harmoniques sont toutes les notes ayant pour fr�quence 
 							un multiple de 440. Les harmoniques d�une note sont donc forc�ment plus aigus que cette note et s\'appelent harmoniques sup�rieurs.</li>
 							
 						<li><b>Abstraction :</b> Le son est repr�sent� par un signal analogique. Pour le num�riser, on l\'�chantillonne :<br/>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�chantillonnage temporel : on prend la mesure du signal � intervalle r�gulier (fr�quence d\'�chantillonnage).<br/>
    						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�chantillonnage num�rique : la valeur analogique est convertie en valeur num�rique sur un nombre limit� de bits.<br/>
							Le signal est enregistr� sous forme num�rique selon deux principales m�thodes :<br/>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M�thode temporelle : chaque �chantillon temporel est enregistr� (formats wave, au, ...).<br/>
    						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M�thode fr�quentielle : on d�compose le signal par transform�e de Fourier (formats MP3, ...).<br/>
							(Certains changements de niveau sonore ne sont pas perceptibles par l\'oreille humaine. 
							Les codages �-Law et A-Law exploitent cette propri�t� pour encoder les niveaux en utilisant moins de bits.)</li>	
 					</ul> 
				
				</div>
				
				<div class="descSite">
				
					<H3>Descriptif des boutons du site:</H3>
					
					<p> inserrer ici image du menu </p>
					
					<ul> 
					
						<li><b>Accueil :</b> Ici sont indiqu�es les diff�rentes MAJ du site web.</li>
						
						<li><b>Deposer Musique:</b>Pour d�poser une musique (.mp3 / .mp4) sur le serveur. (utile pour le Quizz), On peut �galement s\'en servir pour deposer un �chantillon </li>
					
						<li><b>Musiques :</b>Pour lire une des musiques stock�es sur le serveur, � l\'aide de la balise audio de HTML5</li>
						
						<li><b>Relier instrument :</b> A VENIR.</li>
						
						<li><b>Partition :</b> A VENIR.</li>
						
						<li><b>Quizz :</b> On prend une musique al�atoirement sur le serveur, on la joue, 
						puis on demande de trouver le titre, si 75% des mots sont juste on consid�re la r�ponse bonne. Pour l\'instant on utilise SOUNDEX en php,
 						cette librairie permet de comparer un mot � son �quivalent phon�tique(on tol�re un peu les fautes).</li>
						
 						<li><b>Changer Style :</b> On passe du style 1 au style 2 en CSS, possibilit� d\'en mettre autant que l\'on veut.</li>
						
 						<li><b>Synth�tiseur :</b> Un synth�, pour creer quelques �chantillons.</li>
 						
 						<li><b>Boite � Rythme :</b> Une boite � rythme, pour creer quelques �chantillons.</li>
						
 						<li><b>Son :</b> Pour lire une musique sur un serveur web.</li>
						
					</ul>
				
				</div>
				
				<div class="descSite">
				
					<H3>Descriptif des Applications (Javascript) du site:</H3>
					
					<ol>
					
						<li> <b>Synth�tiseur :</b> <br/><br/>
							Emplacement: WebAudio/Modules/midiSynth <br/>
							Description: Cette application met en oeuvre un "analogique" le synth�tiseur polyphonique, avec une architecture vocale classique. Jouable via Internet MIDI ou le clavier virtuel(TRADUCTION A REVOIR).<br/>
							Touches: A VENIR.<br/>
							Enregistrer un �chantillon: A VENIR.<br/>
						</li>
						
						<li> <b>Boite � Rythme :</b> <br/><br/>
							Emplacement: WebAudio/Modules/MIDIDrums-master <br/>
							Description: Plus rapide de l\'appui de contr�leur MIDI (en utilisant un Livid Instruments CNTRLR) � la machine Brillant tambour (TRADUCTION A REVOIR).<br/>
							Enregistrer un �chantillon: Utiliser la fonction Save du logiciel (EXPLICATIONS PLUS DETAILLEES A VENIR).<br/>
						</li>
					
					
					</ol>
					
				</div>
			
			</body>

	';
	
	
	
	echo utf8_encode($affichage);
	
	


?>