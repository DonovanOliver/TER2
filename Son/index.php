<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Son</title>  
  <script src="http://cwilso.github.io/AudioContext-MonkeyPatch/AudioContextMonkeyPatch.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<style>
body { 
	background-color: #EEEEEE;
}
h1 {
	background: #385C85;
	color: #FFF;
	padding: 10px;
	padding-left: 20px;
	margin-top: 0px;
	text-align: center 
}
canvas {
  background: black;
}

.play {
    display:inline-block;
    margin:5px;
    width: 24px;
    height: 32px;
    background-repeat: no-repeat; 
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAgCAYAAAAIXrg4AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAMZJREFUeNq0lt0NgzAMhIPlfWAR1BXYpDBSxSCFiYr70CqKUH6cO0t+SEC++xxkIvP8eFuOgRRiOVkeJvJkCAxW+BOtD8tl318nkiAOOE1KENA0knkGockRQGik8j03TS2Bm0YcbW2i8RA00UjnZ16k6SUo0ghw7NzSIAluaSRw4k/DEqCcQdqiyVq0KaH4+i38WyjjYONNZbhGChRHhTJc9wo0jWtluPYIuH+ZynBdKwC5tijDdU4AfnVUhutUAO46jkuAAQD+jXZOTODXVwAAAABJRU5ErkJggg==);
    text-indent:-200px;
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
<body onload="init();">
	<script>
		var playButton, stopButton, sound, context;
		var decodedSample;

		// For visualizing frequencies
		// The canvas, its context and fillstyle
		var canvas, ctx;
		// Canvas' height and width
		var CANVAS_HEIGHT;
		var CANVAS_WIDTH;
		// We'll need the offset later
		var OFFSET = 100;
		// Spacing between the individual bars
		var SPACING = 5;

		// For drawing the shape of the sound sample
		var waveformDrawer = new WaveformDrawer();
		var canvasWaveForm, ctxWaveForm;
		
		var alreadyPlaying=false;
		
		
		function line(context,x1,y1,x2,y2){
		  context.beginPath();
		  context.moveTo(x1,y1);
		  context.lineTo(x2,y2);
		  context.stroke();
		}
		
		function fill(context,couleur){
		  context.fillStyle = couleur;
		}

		function init() {
			// Events for the play/stop bottons
			playButton = document.querySelector('#play');
			stopButton = document.querySelector('#stop');
			
            playButton.disabled = true;

			// Init the Web Audio engine using the standard spec. Should work also on browsers that support
		  // only the old "webkit" prefixrd version of Web Audio, thanks to Chris Wilson's shym (see the
		  // script included, in the HTML <head> part)
			initAudioContext();

			// create an instance of a Sound for web audio
			sound = new Sound();
			
			
			var listeDeChoix=document.getElementById("choix");
			var choix=listeDeChoix.options[listeDeChoix.selectedIndex].value;

			// loads a sound file using Ajax/Xhr2 + decode it and pass it to the sound object.
			loadAndDecodeSample("../Divers/Musiques/Musiques/"+choix, sound); 


			playButton.addEventListener('click', play);
			stopButton.addEventListener('click', stop);
		  
		  // for frequency visualization
		  canvas = document.getElementById('fft');
		  ctx = canvas.getContext('2d');
		  ctx.fillStyle = "white";
		  CANVAS_HEIGHT= canvas.height;
		  CANVAS_WIDTH = canvas.width;  
		  
		  // for drawing the wave form
		  canvasWaveForm = document.getElementById('waveForm');
		  ctxWaveForm = canvasWaveForm.getContext('2d');
		} 
		
		var id=2;
		
		function ajout(){
			var listeDeChoix=document.getElementById("choix");
			var choix=listeDeChoix.options[listeDeChoix.selectedIndex].value;
			stop();
			ctxWaveForm.clearRect ( 0 , 0 , CANVAS_WIDTH , CANVAS_HEIGHT );
			ctx.clearRect ( 0 , 0 , CANVAS_WIDTH , CANVAS_HEIGHT );
			init();		
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
				context.decodeAudioData(request.response, 
						function onSuccess(decodedBuffer) {
							decodedSample = decodedBuffer;
							son.setDecodedSample(decodedSample);
							console.log("The music file we downloaded has been decoded");
							// let's draw it!
						  drawSoundWaveShape(decodedBuffer);
						  playButton.disabled = false;
						},
						function onFailure() {
							alert("Decoding the audio buffer failed");
						});
			};

			// sending XhR2 request, when the response is arrived, the onload callback is called (above)
			request.send();
		}

		function initAudioContext() {
			console.log("initialisation of audio context. Should work with any browser except IE");
			context = new AudioContext();
		}

		function drawSoundWaveShape(decodedBuffer) {

		  waveformDrawer.init(decodedBuffer, canvasWaveForm, '#83E83E');
		  waveformDrawer.drawWave(0, canvasWaveForm.height);  
		}

		function play() {
		  if(!alreadyPlaying){
			sound.play();
			alreadyPlaying=true;
			drawFrequencies();
		  }
		}
		function stop() {
		  sound.stop();
		  alreadyPlaying=false;
		}

		// Draws the frequencies of the played sound 60 times/s
		function drawFrequencies() {  
		  // New typed array for the raw frequency data
		  freqData = new Uint8Array(sound.analyzerNode.frequencyBinCount);
		  
		  // Put the raw frequency into the newly created array
		  sound.analyzerNode.getByteFrequencyData(freqData);
		  
		  // Clear the canvas
		  ctx.clearRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
		  
		  // This loop draws all the bars
		  for (var i = 0; i < freqData.length - OFFSET; i++) {
			// Work out the hight of the current bar
			// by getting the current frequency
			var magnitude = freqData[i + OFFSET];
			// Draw a bar from the bottom up (cause for the "-magnitude")
			ctx.fillRect(i * SPACING, CANVAS_HEIGHT, SPACING / 2, -magnitude/3);
		  
		  }
		  // draw again, at 60 frames/s
		  requestAnimationFrame(drawFrequencies);

		}

		// Note : no async callbacks in there. In callbacks, the use of "this" is very tricky
		function Sound() {
			this.decodedSample;
			this.sourceNode;
			this.analyzerNode;
		  
			this.setDecodedSample = function(sample) {
				this.decodedSample = sample;
			}; 

			this.buildAudioGraph = function() {
				// We create a web audio node that will be the source of the graph
				this.sourceNode = context.createBufferSource();
				// It will contain the decoded sound sample
				this.sourceNode.buffer = this.decodedSample;
			  
			  // We create an analyzer node
			  this.analyzerNode = context.createAnalyser();

			  // connect the sourceNoe to the filter
			  this.sourceNode.connect(this.analyzerNode);      
			  
			  // and the analyzer to the destination (speakers)
			   this.analyzerNode.connect(context.destination);
			   console.log("web audio graph built");
			};

			// Finally: tell the source when to start
			this.play = function() {
				// We need to rebuild the graph before each play, this may seem odd but
				// web audio is optimized for that pattern
				this.buildAudioGraph();
				console.log("lecture");
				// first param = time where to start, second optional parameter = delay before playing
				this.sourceNode.start(0);
			};

			this.stop = function() {
				console.log("stop, audio graph destroyed");
				this.sourceNode.stop(context.currentTime);
			};
		}

		// ----- this is usyually in a waveDrawer.js file I include
		// This is just useful for drawing a sample once.
		// Usage is 3 steps
		// 1 : var waveformDrawer = new WaveformDrawer();
		// 2 : waveformDrawer.init(decodedBuffer, canvas, color);
		// 3 : waveformDrawer.drawWave(y, SAMPLE_HEIGHT);
		// Where first parameter = Y position (top left corner)
		// second = height of the sample drawing, usually the canvas's height
		function WaveformDrawer() {
			this.decodedAudioBuffer;
			this.peaks;
			this.canvas;
			this.displayWidth;
			this.displayHeight;
			this.sampleStep =  10;
			this.color = 'black';
			//test

			this.init = function(decodedAudioBuffer, canvas, color) {
				this.decodedAudioBuffer = decodedAudioBuffer;
				this.canvas = canvas;
				this.displayWidth = canvas.width;
				this.displayHeight = canvas.height;
				this.color = "#384085";
				//this.sampleStep = sampleStep;

				// Initialize the peaks array from the decoded audio buffer and canvas size
				this.getPeaks();
			}

			this.max = function max(values) {
				var max = -Infinity;
				for (var i = 0, len = values.length; i < len; i++) {
					var val = values[i];
					if (val > max) { max = val; }
				}
				return max;
			}
			// Fist parameter : were to start vertically in the canvas (useful when we draw several
			// waveforms in a single canvas)
			// Second parameter = height of the sample
			this.drawWave = function(startY, height) {
				var ctx = this.canvas.getContext('2d');
				
				
				ctx.save();
				ctx.translate(0, startY);

				ctx.fillStyle = this.color;
				ctx.strokeStyle = this.color;

				var width = this.displayWidth;
				var coef = height / (2 * this.max(this.peaks));
				var halfH = height / 2;

				ctx.beginPath();
				ctx.moveTo(0, halfH);
				ctx.lineTo(width, halfH);
				console.log("drawing from 0, " + halfH + " to " + width + ", " + halfH);
				ctx.stroke();


				ctx.beginPath();
				ctx.moveTo(0, halfH);
			   
				for (var i = 0; i < width; i++) {
					var h = Math.round(this.peaks[i] * coef);
					ctx.lineTo(i, halfH + h);
				}
				ctx.lineTo(width, halfH);

				ctx.moveTo(0, halfH);

				for (var i = 0; i < width; i++) {
					var h = Math.round(this.peaks[i] * coef);
					ctx.lineTo(i, halfH - h);
				}

				ctx.lineTo(width, halfH);

				ctx.fill();
				
				ctx.restore();
				
				}

			// Builds an array of peaks for drawing
			// Need the decoded buffer
			// Note that we go first through all the sample data and then
			// compute the value for a given column in the canvas, not the reverse
			// A sampleStep value is used in order not to look each indivudal sample
			// value as they are about 15 millions of samples in a 3mn song !
			this.getPeaks = function() {
				var buffer = this.decodedAudioBuffer;
				var sampleSize = Math.ceil(buffer.length / this.displayWidth);

				console.log("sample size = " + buffer.length);

				this.sampleStep = this.sampleStep || ~~(sampleSize / 10);

				var channels = buffer.numberOfChannels;
				// The result is an array of size equal to the displayWidth
				this.peaks = new Float32Array(this.displayWidth);

				// For each channel
				for (var c = 0; c < channels; c++) {
					var chan = buffer.getChannelData(c);

					for (var i = 0; i < this.displayWidth; i++) {
						var start = ~~(i * sampleSize);
						var end = start + sampleSize;
						var peak = 0;
						for (var j = start; j < end; j += this.sampleStep) {
							var value = chan[j];
							if (value > peak) {
								peak = value;
							} else if (-value > peak) {
								peak = -value;
							}
						}
						if (c > 1) {
							this.peaks[i] += peak / channels;
						} else {
							this.peaks[i] = peak / channels;
						}
					}
				}
			}
		}
	</script>
	<h1>Son</h1>
  <center>
     <a href="../"><button type="button" class="button">Accueil</button></a></br>
  <?php
	function choiceList($data){
		$res='<select id="choix">';
		foreach($data as $i){
			$res.= '<option value="'.$i.'">'.$i.'</option>';
		}
		$res.='</select>
		<button type="button" class="button" onclick="javascript: ajout()">Télécharger</button></br>';
		return $res;
	}
	
	function viewMP3($chemin){
		$res=array();
		if ($handle = opendir($chemin)) {

			/* This is the correct way to loop over the directory. */
			while (false !== ($entry = readdir($handle))) {
				if(strlen($entry)>=4&&$entry[strlen($entry)-4]=="."&&$entry[strlen($entry)-3]=="m"&&$entry[strlen($entry)-2]=="p"&&$entry[strlen($entry)-1]=="3"){
					array_push($res,$entry);
				}
			}

			closedir($handle);
		}
		return $res;
	}
	
	echo 'Musique:'.choiceList(viewMP3("../Divers/Musiques/Musiques"));
  ?>
  <!--<p class="play" id="play"></p>
  <p class="stop" id="stop"></p>-->
  
 <button id="play" class="buttonImage" ><img src="play.png"></button>
 <button id="stop" class="buttonImage"><img src="stop.png"></button></br>
	<canvas height="100" width="1000" id="fft"></canvas></br>
	<canvas height="100" width="1000" id="waveForm"></canvas></br>
  </center>
	
</body>
</html>