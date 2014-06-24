<!DOCTYPE HTML>

<html lang="en">


<head>

	  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

  <style>
  #eq span {
    height:120px; float:left; margin:15px
  }
  </style>
  <script>
  $(function() {
    $( "#volume" ).slider({
      value: 10,
      orientation: "horizontal",
      range: "min",
      animate: true,
      slide: gainRefresh,
      change: gainRefresh
    });
    $( "#acoustique" ).slider({
      value: 60,
      orientation: "horizontal",
      range: "min",
      animate: true,
      slide: refreshReverb,
      change: refreshReverb
    });
  });
  </script>
    
    
    <style>
    
    	html,body
		{
		   width:100%;
		   height:100%;
		   margin:0px;
		   padding:0px;
		}
			
  
        #myCanvas {
            border: 1px solid #9C9898;
        }
		
		h1 {
		background: #385C85;
		color: #FFF;
		padding: 10px;
		padding-left: 20px;
		margin-top: 0px;
		text-align: center 
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
		
		.row {
		  margin-left: -20px;
		  *zoom: 1;
		}
		
		.row:before,
		.row:after {
		  display: table;
		  line-height: 0;
		  content: "";
		}
		
		.row:after {
		  clear: both;
		}
		
		[class*="span"] {
		  min-height: 1px;
		  margin-left: 20px;
		}
		
		
		
		
		td{
		  width:300px;
		  height:300;
		}
		
		#keybox {
		  width: 610px;
		  margin-left: -7px;
		
		}
		
		#blackkeys {
		  position: absolute;
		  z-index: 2;
		  padding-left: 20px;
		  margin-left: 0px;
		  width: 610px;
		  height: 0px;
		}
		
		.black {
		  background: black;
		  width: 20px;
		  height: 70px;
		  margin: 0px 10px;
		  border-bottom-right-radius: 5px;
		  border-bottom-left-radius: 5px;
		}
		
		.white {
		  background: white;
		  width: 40px;
		  height: 150px;
		  border: 1px solid black;
		  border-bottom-right-radius: 5px;
		  border-bottom-left-radius: 5px;
		}
		
		.key {
		  display: inline-block;
		}
		
		.spacer {
		  display: inline-block;
		  width: 48px;
		  height: 0;
		}
		
		center {
		  display: block;
		  text-align: -webkit-center;
		}
    </style>
	<title>Notre Boite &agrave; Rythme</title>

    <script src="../BoiteARythme/fun/js/chroma.js"></script>
	
<script src="http://cwilso.github.io/AudioContext-MonkeyPatch/AudioContextMonkeyPatch.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<?php 
		//on lit le fichier echantillons pour récupérer la liste des echantillons
		/**
		 *  Lire un fichier CSV et stoquer ces non dans le menu
		 *  @param chemin: le chemin ou le nom du fichier (si repertoire courant) (sans le point ".csv")
		 */
		function searchAndRead($chemin){
			//on commence a la ligne 1 et on cree une variable texte pour enregistrer le texte
			$ligne = 1;
		
			//tableau pour stocker les chemins
			$soundPath = array();
			
			//lien vers les musiques
			$lien = "../Divers/Musiques/Echantillons/";
			
			//on ouvre le fichier en mode lecture et on va lire champs apres champs et ligne apres ligne
			if (($fic = fopen($chemin."Echantillons.csv", "r")) !== false) {
				while (($data = fgetcsv($fic, 1000, ",")) !== false) {
					//le nombre de champs par ligne
					$num = count($data);
					$texte = $lien;
					for ($case=0; $case < $num; $case++) {
						//on affiche le lien
						$texte .= $data[$case];
					}
					$soundPath[$ligne] = $texte;
					$ligne++;
		
				}
			
			}else{
				echo 'Erreur de lecture du fichier Ecantillon.csv';
			}
		
			//on ferme le fichier
			fclose($fic);	
			
			//on retourne le tableau
			return $soundPath;
		}

		//on renseigne le chemin
		$chemin = "../Divers/Musiques/Echantillons/";

		$echantillons = searchAndRead($chemin);
		
		//on regarde si on a un nombre d'echantillons ajoutés
		if(isset($_POST['nb'])){
			if( $_POST['nb'] <= (sizeof($echantillons)-1) ){
				$nb = $_POST['nb'];
			}else{
				$nb = sizeof($echantillons)-1;
			}
		}else{
			$nb = 1;
		}

?>

	<script>
		var audioBuffer;
		var targetX = 500, targetY = 200, targetRadius = 50;
		var playerX=0, playerY=0;
		
		var canvas,context,contextSound;
		var keyPressed=false,key='';
		var mousePressed=false,mouseX=0,mouseY=0,pmouseX=0,pmouseY=0;
		var width,height;
		var sound;

		var QUAL_MUL = 30;

		function background(couleur){
		  fill(couleur);
		  context.fillRect(0,0,width,height);
		}
		
		function random(val){
		  return val*Math.random();
		}
		
		function random(val1,val2){
		  return random(val2-val1)+val1;
		}
		
		function keyPress(){
		  keyPressed=true;
		}
		
		function keyNotPress(){
		  keyPressed=false;
		}
		
		function mousePress(){
		  mousePressed=true;
		}
		
		function mouseNotPress(){
		  mousePressed=false;
		}
		
		function println(message){
		  console.log(message);
		}
		
		var calcDistanceToMove = function(delta, speed) {
		    return (speed * delta) ; 
		  };
		
		
		
		function image(nom,x,y){
		  var imageObj = new Image();
		  imageObj.onload = function() {
		    drawImage(this,x,y);
		  };
		  imageObj.src = nom;
		}
		
		function drawImage(imageObj,x,y) {
		  context.drawImage(imageObj, x, y);
		}
		
		function imageDim(nom,x,y,dx,dy){
		  var imageObj = new Image();
		  imageObj.onload = function() {
		    drawImageDim(this,x,y,dx,dy);
		  };
		  imageObj.src = nom;
		}
		
		function drawImageDim(imageObj,x,y,dx,dy) {
		  context.drawImage(imageObj, x, y,dx,dy);
		}
		
		function text(message) {
		  text(message,0,0);
		}
		
		function text(message,x,y) {
		  context.font = '18pt Calibri';
		  context.fillText(message, x, y);
		} 
		
		function fill(couleur){
		  context.fillStyle = couleur;
		}
		
		function getMousePos(canvas, evt) {
		  // get canvas position
		  var obj = canvas;
		  var top = 0;
		  var left = 0;
		  while (obj && obj.tagName != 'BODY') {
		    top += obj.offsetTop;
		    left += obj.offsetLeft;
		    obj = obj.offsetParent;
		  }
		
		  // return relative mouse position
		  var mouseX = evt.clientX - left + window.pageXOffset;
		  var mouseY = evt.clientY - top + window.pageYOffset;
		  return {
		    x:mouseX,
		    y:mouseY
		  };
		}
		
		function line(x1,y1,x2,y2){
		  context.beginPath();
		  context.moveTo(x1,y1);
		  context.lineTo(x2,y2);
		  context.stroke();
		}
		
		function ellipse(x, y, longueur, hauteur){
		    var ctx = canvas.getContext('2d');
		    ctx.beginPath();
		    var lx = x - longueur/2,
		        rx = x + longueur/2,
		        ty = y - hauteur/2,
		        by = y + hauteur/2;
		    var magic = 0.551784;
		    var xmagic = magic*longueur/2;
		    var ymagic = hauteur*magic/2;
		    context.moveTo(x,ty);
		    context.bezierCurveTo(x+xmagic,ty,rx,y-ymagic,rx,y);
		    context.bezierCurveTo(rx,y+ymagic,x+xmagic,by,x,by);
		    context.bezierCurveTo(x-xmagic,by,lx,y+ymagic,lx,y);
		    context.bezierCurveTo(lx,y-ymagic,x-xmagic,ty,x,ty);
		    context.fill();
		    context.stroke();
		}
		
		function circle(x,y,rayon){
			context.beginPath();
		    context.arc(x, y, rayon, 0, 2 * Math.PI, false);
		    //context.fillStyle = "black";
		    context.fill();
		    context.stroke();
		}
		
		function BoiteARythme(x,y,longueurX,longueurY,nbBeats,BPM){
		  this.x=x;
		  this.y=y;
		  this.longueurX=longueurX;
		  this.longueurY=longueurY;
		  this.nbBeats=nbBeats;
		  this.sons=[];
		  this.toucher=new Array([]);
		  this.appuyer=false;
		  this.lineX=0;
		  this.indexBeat=0;
		  this.BPM=BPM;
		  this.stop=false;
		  this.pause=false;
		  this.volume=true;
		  
		  
		  this.addSon=function(nom){
		    var son=new Sound();
		    loadAndDecodeSample(nom, son); 
		    this.sons.push(son);
		  };
		  
		  this.dessineToi=function(){
			if(!this.stop){
				this.dessineJouer();
			}
			else{
				time = contextSound.currentTime;
				if(this.lineX!=0){
					this.lineX=0;
				}
			}
		    this.dessineGrille();
		  };
		  
		  this.init=function(){
			var longueur=this.nbBeats;
		    var hauteur=this.sons.length;
			this.toucher=new Array([]);
				for(i=0;i<longueur;i++){
				  this.toucher.push([]);
				  for(j=0;j<hauteur;j++){
					this.toucher[i].push(false);
				  }
				}
			}
		  
		  this.dessineJouer=function(){
		    if(contextSound.currentTime!== 0) {
		    var now = contextSound.currentTime;
		    var delta = now - time;
		    var incX = calcDistanceToMove(delta, this.calculeVpourBPM(this.BPM));
		      
		    var nbSon=this.sons.length;
		    var longueur=longueurX/this.nbBeats;
		    var hauteur=longueurY/this.nbSon;
		      
		    line(this.lineX+this.x,0,this.lineX+this.x,height);
		    if(this.indexBeat*longueur<=this.lineX){
		      for(i=0;i<nbSon;i++){
		        if(this.toucher[this.indexBeat][i] && this.volume){
		          this.sons[i].play(0);
		        }
		      }
		      this.indexBeat++;
		    }
			if(!this.pause){
				this.lineX+=incX;
			}
		    if(this.lineX>this.longueurX){
		      this.lineX=0;
		      this.indexBeat=0;
		    }
		    time=now;
		    }
		  };
		  
		  this.dessineGrille=function(){
		    grille(x,y,longueurX,longueurY,longueurX/this.nbBeats,longueurY/this.sons.length);
		    var nbSon=this.sons.length;
		    
		    var longueur=longueurX/this.nbBeats;
		    var hauteur=longueurY/nbSon;
		    for(i=0;i<this.nbBeats;i++){
		      for(j=0;j<nbSon;j++){ 
				if(mousePressed&&mouseX>i*longueur+this.x&&mouseX<(i+1)*longueur+this.x&&mouseY>j*hauteur+this.y&&mouseY<(j+1)*hauteur+this.y&&!this.appuyer){
		             this.toucher[i][j]=!this.toucher[i][j];
		             this.appuyer=true;
		         }
		        if(!mousePressed){
		          this.appuyer=false;
		        }
		      }
		    }
		    
		    fill("grey");
		    for(i=0;i<this.nbBeats;i++){
		      for(j=0;j<nbSon;j++){
		        if(this.toucher[i][j]){
		          ellipse(longueur*i+longueur/2+this.x,hauteur*j+hauteur/2+this.y,longueur*10/12,hauteur*10/12);
		        }
		      }
		    }
		  };
		  
		  this.calculeVpourBPM=function(bpm) {
		  var bps = bpm/60;
		  var largeurPixelsUnBeat = width / this.nbBeats;
		  
		  // en une s, je dois parcourir bps * largeurPixelsUnBeat
		  
		  // vitesse en pixels par seconde pour
		  // que la barre verticale balaye BPM
		  // beats / minute
		  var v = bps * largeurPixelsUnBeat;
		  return v;
		};
		
			this.setStop=function(stop){
				this.stop=stop;
			}
			
			this.setPause=function(pause){
				this.pause=pause;
			}
			
			this.setSon=function(son){
				this.volume=son;
			}
			
		  this.setBPM=function(BPM){
			this.BPM=BPM;
		  }
		  this.max=nbBeats;
		  this.setNbBeats=function(nbBeats){
		    var nbSon=this.sons.length;
			if(nbBeats>this.max){
				for(i=this.max;i<nbBeats;i++){
				  this.toucher.push([]);
				  for(j=0;j<nbSon;j++){
					this.toucher[i].push(false);
				  }
				}
				this.max=nbBeats;
			}
			this.nbBeats=nbBeats;
		  }
		  
		}
		
		function Bouton(nom1,nom2,nom3){
		  this.nom1=nom1;
		  this.nom2=nom2;
		  this.nom3=nom3;
		  this.click=false;
		  this.appuyer=false;
		  this.dessineToi=function(x,y,dx,dy){
		    if(mousePressed){
		      if(x<mouseX&&x+dx>mouseX&&y<mouseY&&y+dy>mouseY){
		        imageDim(nom3,x,y,dx,dy);
		        if(!this.appuyer){
		          this.appuyer=true;
		        }
		      }
		      else{
		        imageDim(nom1,x,y,dx,dy);
		      }
		    }
		    else{
		      if(x<mouseX&&x+dx>mouseX&&y<mouseY&&y+dy>mouseY){
		        if(this.appuyer){
		          this.appuyer=false;
		          this.click=true;
		        }
		        imageDim(nom2,x,y,dx,dy);
		      }
		      else{
		        if(this.appuyer){
		          this.appuyer=false;
		        }
		        imageDim(nom1,x,y,dx,dy);
		      }
		    }
		  };
		  this.getClick=function(){
		    if(this.click){
		      this.click=false;
		      return true;
		    }
		    return false;
		  };
		}
		
		function Radio(nom1,nom2){
		  this.bouton1=new Bouton(nom1,nom1,nom1);
		  this.bouton2=new Bouton(nom2,nom2,nom2);
		  this.etat=true;
		  this.dessineToi=function(x,y,dx,dy){
		    if(this.etat){
		      this.bouton1.dessineToi(x,y,dx,dy);
		      if(this.bouton1.getClick()){
		        this.etat=false;
		      }
		    }
		    else{
		      this.bouton2.dessineToi(x,y,dx,dy);
		      if(this.bouton2.getClick()){
		        this.etat=true;
		      }
		    }
		  };
		
		  this.getEtat=function(){
		    return this.etat;
		  };
		
		  this.setEtat=function(b){
		    this.etat=b;
		  };
		}
		
		function grille(x,y,longueurX,longueurY,interX,interY){
		  fill("black");
		  for(i=x;i<=longueurX+x;i+=interX){
		    line(i,y,i,longueurY+y);
		  }
		  for(i=y;i<=longueurY+y;i+=interY){
		    line(x,i,longueurX+x,i);
		  }
		}
		
		function initAudioContext() {
		    console.log("initialisation of audio context. Should work with any browser except IE");
		    contextSound = new AudioContext();
		}
		
		// Load and decode a sound sample using Ajax/XhR2
		function loadAndDecodeSample(url, son) {
		    var request = new XMLHttpRequest();
		
		    request.open("GET", url, true);
		    request.responseType = "arraybuffer";
		
		    // Asynchronous callback. Called when the sound file has been downloaded using Ajax/Xhr2
		    request.onload = function() {
		        console.log("Sound file loaded");
		        // request.response = for example a mp3, ogg, wav file. We need to decode it in order
		        // to be processable by the web audio engine. Web Audio works only with "decoded" samples in
		        // memory
		        contextSound.decodeAudioData(request.response,
		                function onSuccess(decodedBuffer) {
		                    decodedSample = decodedBuffer;
		                    son.setDecodedSample(decodedSample);
		                    console.log("The music file we downloaded has been decoded");
		                  //sound.play();
		                  // init GUI
		                  buttonPlay.disabled = false;
		                  //this.audioBuffer = decodedBuffer;
		                },
		                function onFailure() {
		                    alert("Decoding the audio buffer failed");
		                });
		    };
		
		    // sending XhR2 request, when the response is arrived, the onload callback is called (above)
		    request.send();
		}
		
		// Note : no async callbacks in there. In callbacks, the use of "this" is very tricky
		function Sound() {
		  this.decodedSample=null;
		  this.sourceNode=null;
		  this.sourceNode2=null;
		  this.sourceNode3=null;
		
		    this.setDecodedSample = function(sample) {
		        this.decodedSample = sample;
		    };

			//Changer la Fréquence
			this.changeFrequency = function(element) {
				  // Clamp the frequency between the minimum value (40 Hz) and half of the
				  // sampling rate.
				  var minValue = 40;
				  var maxValue = contextSound.sampleRate / 2;
				  // Logarithm (base 2) to compute how many octaves fall in the range.
				  var numberOfOctaves = Math.log(maxValue / minValue) / Math.LN2;
				  // Compute a multiplier from 0 to 1 based on an exponential scale.
				  var multiplier = Math.pow(2, numberOfOctaves * (element.value - 1.0));
				  // Get back to the frequency value between min and max.
				  this.filter.frequency.value = maxValue * multiplier;
			};

			//Modifier la Qualité
			this.changeQuality = function(element) {
				  this.filter.Q.value = element.value * QUAL_MUL;
			};

			//ACTIVER / DESACTIVER LE FILTRE
			this.toggleFilter = function(element) {
				  this.sourceNode.disconnect(0);
				  this.filter.disconnect(0);
				  // Check if we want to enable the filter.
				  if (element.checked) {
				    // Connect through the filter.
				    this.sourceNode.connect(this.filter);
				    this.filter.connect(contextSound.destination);
				  } else {
				    // Otherwise, connect directly.
				    this.sourceNode.connect(contextSound.destination);
				  }
			};

		
		    this.buildAudioGraph = function() {
		        // We create a web audio node that will be the source of the graph
		        this.sourceNode = contextSound.createBufferSource();
		        // It will contain the decoded sound sample
		        this.sourceNode.buffer = this.decodedSample;

		        /**
		        *		Creation d'un filtre avec web audio
		        **/

		     	this.filter	= contextSound.createBiquadFilter();
		     	this.filter.type = 0; // LOWPASS
		     	this.filter.frequency.value = 5000;

		     	//on applique les filtres
		     	this.changeFrequency(document.getElementById("freq"));
		     	this.changeQuality(document.getElementById("qual"));

		     	// Soit le filtre est activé soiton démarre comme avant si désactivé
			    // Connect through the filter.
				this.toggleFilter(document.getElementById("c1"));
				
		        console.log("graphe web audio construit");
		    };
		
		    	// Finally: tell the source when to start
		    	this.play = function(delay) {
		        // We need to rebuild the graph before each play, this may seem odd but
		        // web audio is optimized for that pattern
		        this.buildAudioGraph();
		        //console.log("lecture");
		        // first param = time where to start, second optional parameter = delay before playing
		        //this.sourceNode.buffer = audioBuffer;
		        this.sourceNode.start(delay,0);

		        /** TEST COURBES **/
		        
		        /**
		        *   Init du noeud javascript
		        **/
				// setup a javascript node
				var javascriptNode = contextSound.createJavaScriptNode(1024, 1, 1);
				
				// connect to destination, else it isn't called
				javascriptNode.connect(contextSound.destination);	
				

				// when the javascript node is called
				// we use information from the analyzer node
				// to draw the volume
				javascriptNode.onaudioprocess = function () {
				
				    // get the average for the first channel
				    var array = new Uint8Array(analyser.frequencyBinCount);
				    analyser.getByteFrequencyData(array);

				    drawSpectrum(array);
						
				    drawSpectrogram(array);
				    
							
				    var array2 = new Uint8Array(analyser.frequencyBinCount);
				    analyser.getByteTimeDomainData(array2)
					
				    drawWave(array2);
				
				}

				//var delai = bpm/60;
				
				// setup a analyzer
				var analyser = contextSound.createAnalyser();
				analyser.smoothingTimeConstant = 0.01;
				analyser.fftSize = 512;
				
				// create a buffer source node
				this.filter.connect(analyser);
				analyser.connect(javascriptNode);
				
				// get the context from the canvas to draw on
				var ctx = $("#spectrogram").get()[0].getContext("2d");
				
				// create a temp canvas we use for copying
				var tempCanvas = document.createElement("canvas");
				tempCanvas.width = 300;
				tempCanvas.height = 150;
				var tempCtx = tempCanvas.getContext("2d");
				
				// used for color distribution
				var hot = new chroma.ColorScale({
				    colors:['#000000', '#ff0000', '#ffff00', '#ffffff'],
				    positions:[0, .25, .75, 1],
				    mode:'rgb',
				    limits:[0, 175]
				});
				
				
				
				function drawSpectrum(array) {
				    var ctx = $("#spectrum").get()[0].getContext("2d");

				    var som = 0;
				
				
				    for ( var i = 0; i < (array.length); i++ ){
				        var value2 = array[i];
						som = som + value2;
				        
				    }
				    //On ne dessine que lorsque l'on a un resultats valable (un son quoi)
					if(som != 0){
					    ctx.fillStyle = "#ffffff"
						ctx.clearRect(0, 0, 150, 128);
					    for ( var i = 0; i < (array.length); i++ ){
					        var value = array[i];
					
					        ctx.fillRect(i,200-value,1,150);
					        
					    }
					}
				   
				};
				
				function drawWave(array) {

					var ctx = $("#wave").get()[0].getContext("2d");

				    var som = 0;
					
					
				    for ( var i = 0; i < (array.length); i++ ){
				        var value2 = array[i];
						som = som + value2;
				        
				    }
				
				    if(som != 0){
					    ctx.fillStyle = "#ffffff"
					    ctx.clearRect(0, 0, 150, 128);
					
					    for ( var i = 0; i < (array.length); i++ ){
					        var value = array[i];
					
					        ctx.fillRect(i/2+11,202-value,1,1);
					    }
				    }


				};
				
				function drawSpectrogram(array) {
				
				    // copy the current canvas onto the temp canvas
				    var canvas2 = document.getElementById("spectrogram");
				
				    tempCtx.drawImage(canvas2, 0, 0, 150, 128);
				
				    // iterate over the elements from the array
				    for (var i = 0; i < array.length; i++) {
				        // draw each pixel with the specific color
				        var value = array[i];
				        ctx.fillStyle = hot.getColor(value).hex();
				
				        // draw the line at the right side of the canvas
				        ctx.fillRect(150 - 1, 128 - i, 1, 1);
				    }
				
				    // set translate on the canvas
				    ctx.translate(-1, 0);
				    // draw the copied image
				    ctx.drawImage(spectrogram, 0, 0, 150, 128, 0, 0, 150, 128);
				
				    // reset the transformation matrix
				    ctx.setTransform(1, 0, 0, 1, 0, 0);
				
				}

				/** FIN TEST COURBES **/
		       
		    	};
		}
		function play() {
		  sound.play();
		  
		}
		function stop() {
		  sound.stop();
		}
		
		
		window.onload = function () {
		  canvas = document.getElementById('myCanvas');
		  context = canvas.getContext('2d');
		  var mousePos;
		  width=canvas.width;height=canvas.height;
		
		  document.onkeydown=keyPress;
		  document.onkeyup=keyNotPress;
		  document.onmousedown=mousePress;
		  document.onmouseup=mouseNotPress;
		  
		  boiteARythme=new BoiteARythme(100,0,width-100,height,16,100);
		  
		  buttonPlay = document.querySelector("#play");
		  buttonStop = document.querySelector("#stop");
		  buttonPause = document.querySelector("#pause");
		  buttonSon = document.querySelector("#son");
		  buttonSansSon = document.querySelector("#sansSon");
		  
		  buttonPlay.disabled = true;
		
		  
		  initAudioContext();
		  sound = new Sound();
		  loadAndDecodeSample("../BoiteARythme/click.mp3", sound); 
		  
		  time = contextSound.currentTime;
		
		
		  canvas.addEventListener('mousemove', function (evt) {
		    mousePos = getMousePos(canvas, evt);
		    pmouseX = mouseX; pmouseY = mouseY;
		    mouseX = mousePos.x; mouseY = mousePos.y;
		  }, false);
		
		  window.addEventListener('keypress', function (e) {
		    key=String.fromCharCode(window.event? event.keyCode: e.keyCode);
		  }, false);
		  
		  buttonPlay.addEventListener("click", function() {
		    sound.play();
		    boiteARythme.setStop(false);
		    boiteARythme.setPause(false);
		  });
		  
		  buttonStop.addEventListener("click", function() {
		    boiteARythme.setStop(true);
		    boiteARythme.setPause(false);
		  });
		  
		  buttonPause.addEventListener("click", function() {
		    boiteARythme.setPause(true);
		    boiteARythme.setStop(false);
		  });
		  
		  buttonSon.addEventListener("click", function() {
		    boiteARythme.setSon(true);
		  });
		  
		  buttonSansSon.addEventListener("click", function() {
		    boiteARythme.setSon(false);
		  });

		
		  function setup(){
		    boiteARythme.init();
		    
		    boiteARythme.addSon("../BoiteARythme/tom1.mp3");
		    boiteARythme.addSon("../BoiteARythme/tom2.mp3");
		    boiteARythme.addSon("../BoiteARythme/tom3.mp3");
		    boiteARythme.addSon("../BoiteARythme/hihat.mp3");
		    boiteARythme.addSon("../BoiteARythme/snare.mp3");
		    boiteARythme.addSon("../BoiteARythme/kick.mp3");

			<?php 
					//on ajoute les échantillons
					if(isset($_POST["SendE"])){
						
						for($num = 0; $num < sizeof($echantillons); $num++){
				
							$string = 'echantillon'.$num;

							if(isset($_POST[$string])){
								
								echo 'boiteARythme.addSon("'.$chemin.$_POST[$string].'.mp3");';
							}
						}				
					}
							
			?>
		  }
		
		  var x=0;
		  function draw() {
		    background("white");
			fill("black");

			<?php
				//on place les labels relatifs aux échantillons ajoutés
				if(isset($_POST["SendE"])){
					

					
					echo '
							text("Pom1",20,30);
							text("Pom2",20,80);
							text("Pom3",20,130);
							text("Chapeau",5,180);
							text("Caisse",20,230);
							text("Pied",20,280);
						';
					
					$cptN = 280;
					
					for($num = 0; $num < sizeof($echantillons); $num++){
			
						$string = 'echantillon'.$num;

						if(isset($_POST[$string])){
							$cptN = $cptN + 50;
							if(strlen($_POST[$string]) <= 6){
								echo 'text("'.$_POST[$string].'",20,'.($cptN).');';
							}else{
								if(strlen($_POST[$string]) >= 8){
									$stringRes = substr($_POST[$string],0,8); 
									echo 'text("'.$stringRes.'",1,'.($cptN).');';

								}else{
									echo 'text("'.$_POST[$string].'",1,'.($cptN).');';
								}
							}
						}
					}				
				}else{
					echo '
							text("Pom1",20,30);
							text("Pom2",20,80);
							text("Pom3",20,130);
							text("Chapeau",5,180);
							text("Caisse",20,230);
							text("Pied",20,280);
						';
				}
						
			?>
			
			boiteARythme.setBPM(document.getElementById("BPM").value);
			boiteARythme.setNbBeats(document.getElementById("nbBeats").value);
					
		    //grille(0,0,width,height,100,100);
		    boiteARythme.dessineToi();
		    
		    // On reexecute la fonction mainloop 60 fois/s
		    window.requestAnimationFrame(draw);
		  }
		  setup();
		
		  // Appelé dès que la page est chargée
		  draw();
		};
    </script>
<body>

<h1>Notre Boite &agrave; Rythme (+ &eacute;chantillons)</h1>
<center>
     <a href="../"><button type="button"  class="button">Accueil</button></a></br>

<table><tr><td>
<?php 
	//on modifie la taille du canvas
	if(!isset($_POST["SendE"])){
		echo'<canvas id="myCanvas" width="1000" height="300">';
	}else{
		echo'<canvas id="myCanvas" width="1000" height="'.(300+($nb*50)).'">';
	}
?>
</canvas>

</td><td>

        <div class="row">
            <div class="span4 " >
                Frequencies:
                <canvas id="spectrum" width="150" height="128"
                style="display: block; background-color: black ;"></canvas>
            </div>
            <div class="span4 ">
                Spectrogram:
                <canvas id="spectrogram" width="150" height="128"
                        style="display: block; background-color: black ;"></canvas>
            </div>
            <div class="span4">
                Waveform:
                <canvas id="wave" width="150" height="128"
                        style="display: block; background-color: black ;"></canvas>
            </div>

        </div>
        </td></tr>


</table>


        <br/>
 <button id="play"><img src="../BoiteARythme/play.png"></button>
 <button id="pause"><img src="../BoiteARythme/pause.png"></button>
 <button id="stop"><img src="../BoiteARythme/stop.png"></button>
 <button id="son"><img src="../BoiteARythme/son.png"></button>
 <button id="sansSon"><img src="../BoiteARythme/sansSon.png"></button></br><br/>
 BPM<input type="number" id="BPM" min="60" max="1000" value="100" step="2" >
 nbBeats<input type="number" id="nbBeats" min="1" max="64" value="16" step="1" ></br><br/>
 

<input type="checkbox" id="c1" checked="false" onchange="boiteARythme.toggleFilter(this);">
<label for="c1"><span></span>Enable filter</label></p>

<p><input type="range" id="freq" min="0" max="1" step="0.01" value="1" onchange="boiteARythme.changeFrequency(this);"> Frequency</p>

<p><input type="range" id="qual" min="0" max="1" step="0.01" value="0" onchange="boiteARythme.changeQuality(this);"> Quality</p>



 <?php 
 
		
 		//on affiche le formulaire qie si pas de retour du bouton submit
 		if(!isset($_POST["SendE"])){
		
	 		echo '<p>Ajouter un &eacute;chantillon &agrave; la boite</p>
	 			  <FORM method=post action="">
					<SELECT name="echantillon0">
					';
			
			for($i = 1; $i < sizeof($echantillons)+1; $i++){
				//On propose l'ajout d'échantillons
				$stringToReplace   = array(".mp3", "../Divers/Musiques/Echantillons/");
				$enchantillonNom = str_replace($stringToReplace, "", $echantillons[$i]);
				
				echo '
				Ajouter...<OPTION VALUE="'.$enchantillonNom.'">'.$enchantillonNom.'</OPTION>
				';
		
	
			}
			
			echo '
			</SELECT><br/>
			';
			
			if(isset($_POST["getAnotherEchantillon"])){
					$n = intval($nb);
									
					for( $j = 0; $j < ($n); $j++ ){
						$nomEch = 'echantillon'.($j+1);
						
						echo '
						<SELECT name="'.$nomEch.'">
						';
						
							for($i = 1; $i < sizeof($echantillons)+1; $i++){
								//On propose l'ajout d'échantillons
								$stringToReplace   = array(".mp3", "../Divers/Musiques/Echantillons/");
								$enchantillonNom = str_replace($stringToReplace, "", $echantillons[$i]);
								echo '
								Ajouter...<OPTION VALUE="'.$enchantillonNom.'">'.$enchantillonNom.'</OPTION>
								';
									
							}
						
						echo '
						</SELECT><br/>
						';
					}
					
					$nb = $nb + 1;
			}
			
			// nb vaut 0 si un seul echantillons
			// 1 si 1... etc ...
			echo '
				<INPUT type = "submit" value = "&#8635;" name = "getAnotherEchantillon">
				<INPUT type = "hidden" value = "'.$nb.'" name = "nb">
				<INPUT type="submit" name="SendE" value="Envoyer">
			</FORM>';
			
 		}
 		
 
 ?>
 
 <script>

 var contextBIS = new AudioContext();

 var oscillator = contextBIS.createOscillator();
 var isOscDispo = true;
 var ctxGain = contextBIS.createGain();
 var filterBIS = contextBIS.createBiquadFilter();
 var waveShaper = contextBIS.createWaveShaper();
 var revNode = contextBIS.createConvolver();

 var ctxGain2;
 var duree = 0;

 filterBIS.connect(waveShaper);
 waveShaper.connect(ctxGain);
 ctxGain.connect(contextBIS.destination);

 ctxGain.gain.value = $( "#volume" ).slider( "value" ) /100;
 filterBIS.type = 0; // Low-pass filterBIS. See BiquadFilterNode docs
 filterBIS.frequency.value = 4000; // Set cutoff to 440 HZ 


 var bufferBIS = new Array( 50000 );


 for(i=0; i<50000; i++){  // k1 = 1/(12*sampling_rate*duree)
   bufferBIS[i] = 0;  // =k1*math.exp(-i*k1)*rand(-1,+1)
 } // rand(-1,+1) = Math.pow(-1, Math.floor((Math.random() * 10) + 1));
 bufferBIS[0] = 1.000;
 bufferBIS[40000] = 1.000;

 toto();

 function endOscillator(){
   isOscDispo = true;
 }

 function toto(){ 
   setInterval(timer1, 100);
 }

 function timer1() {
   if(duree === 0) return;
   $("#compteur").text(duree);
   stop = duree - 1;
   if(duree === 0){
       oscillator.stop();
   }
 }

 function refreshReverb(){
   //for(i=0; i<50000; i++){ 
   //  bufferBIS[i] = 0;  
   //}
   //for(i=1; i <= $( "#volume" ).slider( "value" ); i++){  
     //bufferBIS[i * Math.floor((50000 / $( "#volume" ).slider( "value" ))) ] = 1;
   //}
 }

 function dummy(){
   
 }

 function playSound() {
   if(isOscDispo){
     oscillator = contextBIS.createOscillator();
     oscillator.onended = endOscillator;
     oscillator.connect(filterBIS);
     oscillator.type = $( "select" )[0].selectedIndex;
     // 0=sinus, carré, dent de scie, triangle
     oscillator.frequency.value = $( "#freq" ).val() * 10;
     isOscDispo = false;
     oscillator.start();
   }
 }

 function stopSound(){
   if(!isOscDispo){
     oscillator.stop();
   }
 }



 function playSound2() {
   if(isOscDispo){
     oscillator = contextBIS.createOscillator();
     oscillator.onended = endOscillator;
     oscillator.connect(filterBIS);
     oscillator.type = $( "select" )[0].selectedIndex;
     // 0=sinus, 1=carré, 2=dent de scie, 3=triangle
     oscillator.frequency.value = $( "#freq" ).val() * 10;
     isOscDispo = false;
     oscillator.start();
   }
  
   var bufferBIS2 = contextBIS.createBuffer(1, 2*contextBIS.sampleRate, contextBIS.sampleRate);
   var data = bufferBIS2.getChannelData(0);
   data[0] = 1;
   data[contextBIS.sampleRate/2] = 0.3;
   data[contextBIS.sampleRate] = 0.1;
   revNode.bufferBIS = bufferBIS2;
   
   oscillator.connect(filterBIS);
   filterBIS.connect(waveShaper);
   waveShaper.connect(revNode);
   revNode.connect(ctxGain);
   ctxGain.connect(contextBIS.destination); 

   oscillator.start(0);
   duree = 5;
   $("#compteur").text(duree);
 }

 function freqRefresh(){
      oscillator.frequency.value = $( "#freq" ).val() * 10;
 }

 function gainRefresh(){
   ctxGain.gain.value = $( "#volume" ).slider( "value" ) / 100;
 }

 function freqFilterRefresh(){
   filterBIS.frequency.value = 100*Math.pow(2.0, 3*$( "#coupure" ).val()/100);
 }

 function qRefresh(){
   filterBIS.Q.value = 1 + 30*$( "#q" ).val();
 }

 function chgShape(){
   var valShape = $( "select" )[0].selectedIndex;
   switch (valShape){
     case 0:
       oscillator.type = oscillator.SINE;
       break;
     case 1:
       oscillator.type = oscillator.SQUARE;
       break;
     case 2:
       oscillator.type = oscillator.SAWTOOTH;
       break;
     case 3:
       oscillator.type = oscillator.TRIANGLE;
       break;
     default :
       oscillator.type = oscillator.SINE;
       break;
   }
 }

 function osc1Refresh(){
 var DURATION = 10;
 var FREQUENCY = $( "#osc1" ).val()/10;
 var SCALE = 0.4;
   
 var valueCount = 4096;
 var values = new Float32Array(valueCount);
 for (var i = 0; i < valueCount; i++) {
   var percent = (i / valueCount) * DURATION*FREQUENCY;
   values[i] = ($( "#volume" ).slider( "value" ) / 100) + (Math.sin(percent * 2*Math.PI) * SCALE);
   if (i == valueCount - 1) {
     values[i] = $( "#volume" ).slider( "value" ) / 100;
   }
 }

     ctxGain.gain.setValueCurveAtTime(values, contextBIS.currentTime, DURATION);

 }

 function filterChg(){
   filterBIS.type = $( "select" )[1].selectedIndex;
 }

 function frequencyFromNoteNumber( note ) {
 	return 440 * Math.pow(2,(note-69)/12);
 }

 function playNote(id){
   oscillator = contextBIS.createOscillator();
     oscillator.onended = endOscillator;
     oscillator.connect(filterBIS);
     oscillator.type = $( "select" )[0].selectedIndex;
     // 0=sinus, carré, dent de scie, triangle
     oscillator.frequency.value = frequencyFromNoteNumber(id);
     isOscDispo = false;
     oscillator.start();
 }

 function stopNote(){
   
 }
 </script>


<br/><br/>

<table>
  <tr><td>
<p class="ui-state-default ui-corner-all ui-helper-clearfix" style="padding:4px;">
  <span class="ui-icon ui-icon-volume-on" style="float:left; margin:-2px 5px 0 0;"></span>
  Master
</p>
 
Volume<div id="volume" style="width:260px; margin:15px;"></div>
Acoustique<div id="acoustique" style="width:260px; margin:15px;"></div>
<button onclick="playSound()">Jouer</button>
<button onmousedown="playSound2()"  onmouseup="dummy()">Note</button>
<button onclick="stopSound()">Stop</button>
</td><td>
<p class="ui-state-default ui-corner-all" style="padding:4px;margin-top:4em;">
  <span class="ui-icon ui-icon-signal" style="float:left; margin:-2px 5px 0 0;"></span>
  Mode
</p>
    <select id="shape" onchange="chgShape()" ><option>sinusoidale</option><option>carre</option><option>scie</option><option>triangle</option></select>shape<br />
  <input id="freq" type="range" min="0" max="100" step="1" value="50" onchange="freqRefresh()">freq</input><br />
  <input id="osc1" type="range" min="0" max="100" step="1" value="0" >freq tremolo</input><br />
  <button onclick="osc1Refresh()">Start Tremolo</button>

</td><td>
<p class="ui-state-default ui-corner-all" style="padding:4px;margin-top:4em;">
    <span class="ui-icon ui-icon-signal" style="float:left; margin:-2px 5px 0 0;"></span>
  Filtre
</p>
  <select id="filterType" onchange="filterChg()" ><option>Lowpass</option><option>Highpass</option><option>Bandpass</option><option>Lowshelf</option><option>Highshelf</option><option>Peaking</option><option>Notch</option><option>Allpass</option><option>Methods</option></select>type<br />
  <input id="coupure" type="range" min="0" max="100" step="1" value="50" onchange="freqFilterRefresh()">coupure</input><br />
  <input id="q" type="range" min="0" max="1" step="0.01" value="0.01" onchange="qRefresh()">q</input><br />

  <input id="env" type="range" min="0" max="1" step="0.01" value="0.5" >env</input><br />
</td></tr>
<tr>
  <div id="keybox" touch-action="none">
        <div id="blackkeys">
            <span id="k61" class="black key" onmousedown="playNote(61)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k63" class="black key" onmousedown="playNote(63)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span class="spacer"></span><span id="k66" class="black key"  onmousedown="playNote(66)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k68" class="black key"  onmousedown="playNote(68)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k70" class="black key"></span><span class="spacer"></span><span id="k73" class="black key" onmousedown="playNote(73)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k75" class="black key"  onmousedown="playNote(75)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span class="spacer"></span><span id="k78" class="black key"  onmousedown="playNote(78)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k80" class="black key"  onmousedown="playNote(80)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k82" class="black key"  onmousedown="playNote(82)" onmouseup="stopSound()" onmouseout="stopSound()"></span>
        </div>
        <span id="k60" class="white key"  onmousedown="playNote(60)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k62" class="white key" onmousedown="playNote(62)" onmouseup="stopSound()" onmouseout="stopSound()" ></span><span id="k64" class="white key"  onmousedown="playNote(64)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k65" class="white key" onmousedown="playNote(65)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k67" class="white key" onmousedown="playNote(67)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k69" class="white key" onmousedown="playNote(69)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k71" class="white key" onmousedown="playNote(71)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k72" class="white key" onmousedown="playNote(72)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k74" class="white key" onmousedown="playNote(74)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k76" class="white key" onmousedown="playNote(76)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k77" class="white key" onmousedown="playNote(77)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k79" class="white key" onmousedown="playNote(79)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k81" class="white key" onmousedown="playNote(81)" onmouseup="stopSound()" onmouseout="stopSound()"></span><span id="k83" class="white key" onmousedown="playNote(83)" onmouseup="stopSound()" onmouseout="stopSound()"></span>
    </div>
  <div id="compteur">
    
  </div>
</tr>
</table>


 
<br/><br/> 

 
</center>
</body>
</html>