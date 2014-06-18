var synthBox = null;
var pointerDebugging = false;

function testChange(e) {
	console.log("test");
}

function createKnob( id, label, width, x, y, min, max, currentValue, color, onChange ) {
	var container = document.createElement( "div" );
	container.className = "knobContainer";
	container.style.left = "" + x + "px";
	container.style.top = "" + y + "px";

/*
	var knob = document.createElement( "input" );
	knob.className = "knob";
	knob.id = id;
	knob.value = currentValue;
	if (label == "detune")
		knob.setAttribute( "data-cursor", true );
	knob.setAttribute( "data-min", min );
	knob.setAttribute( "data-max", max );
	knob.setAttribute( "data-width", width );
	knob.setAttribute( "data-angleOffset", "-125" );
	knob.setAttribute( "data-angleArc", "250" );
	knob.setAttribute( "data-fgColor", color );

*/
	var knob = document.createElement( "webaudio-knob" );
//	knob.className = "knob";
	knob.id = id;
	knob.setAttribute( "value", "" + currentValue );
	knob.setAttribute( "src", "img/LittlePhatty.png" );
	knob.setAttribute( "min", ""+min );
	knob.setAttribute( "max", ""+max );
	knob.setAttribute( "step", (max-min)/100 );
	knob.setAttribute( "diameter", "64" );
	knob.setAttribute( "sprites", "100" );
	knob.setAttribute( "tooltip", label );
	knob.onchange = onChange;
//	knob.setValue( currentValue );

	container.appendChild( knob );

	var labelText = document.createElement( "div" );
	labelText.className = "knobLabel";
	labelText.style.top = "" + (width* 0.85) + "px";
	labelText.style.width = "" + width + "px";
	labelText.appendChild( document.createTextNode( label ) );

	container.appendChild( labelText );

//	$( knob ).knob({ 'change' : onChange });

	return container;
}

function createDropdown( id, label, x, y, values, selectedIndex, onChange ) {
	var container = document.createElement( "div" );
	container.className = "dropdownContainer";
	container.style.left = "" + x + "px";
	container.style.top = "" + y + "px";

	var labelText = document.createElement( "div" );
	labelText.className = "dropdownLabel";
	labelText.appendChild( document.createTextNode( label ) );
	container.appendChild( labelText );

	var select = document.createElement( "select" );
	select.className = "dropdownSelect";
	select.id = id;
	for (var i=0; i<values.length; i++) {
		var opt = document.createElement("option");
		opt.appendChild(document.createTextNode(values[i]));
		select.appendChild(opt);
	}
	select.selectedIndex = selectedIndex;
	select.onchange = onChange;
	container.appendChild( select );

	return container;
}

function createSection( label, x, y, width, height ) {
	var container = document.createElement( "fieldset" );
	container.className = "section";
	container.style.left = "" + x + "px";
	container.style.top = "" + y + "px";
	container.style.width = "" + width + "px";
	container.style.height = "" + height + "px";

	var labelText = document.createElement( "legend" );
	labelText.className = "sectionLabel";
	labelText.appendChild( document.createTextNode( label ) );

	container.appendChild( labelText );
	return container;
}

function setupSynthUI() {
	synthBox = document.getElementById("synthbox");
	
	var mode = createSection( "mode", 10, 10, 87, 342 );
	mode.appendChild( createDropdown( "modewave", "forme", 12, 15, ["sinusoidale","carre", "scie", "triangle"], currentModWaveform, onUpdateModWaveform ))
	mode.appendChild( createKnob( "mFreq", "fréquence", 80, 12, 65, 0, 10, currentModFrequency, "#c10087", onUpdateModFrequency ) );
	mode.appendChild( createKnob( "modeOsc1", "osc1 tremolo", 80, 12, 160, 0, 100, currentModOsc1, "#c10087", onUpdateModOsc1 ) );
	mode.appendChild( createKnob( "modeOsc2", "osc2 tremolo", 80, 12, 255, 0, 100, currentModOsc2, "#c10087", onUpdateModOsc2 ) );
	synthBox.appendChild( mode );

	var osc1 = createSection( "OSCILATEUR1", 130, 10, 223, 160 );	
	osc1.appendChild( createDropdown( "osc1wave", "formeOnde", 10, 15, ["sinusoidale","carre", "scie", "triangle"/*, "wavetable"*/], currentOsc1Waveform, onUpdateOsc1Wave ))
	osc1.appendChild( createDropdown( "osc1int", "intervale",  140, 15, ["32'","16'", "8'"], currentOsc1Octave, onUpdateOsc1Octave ) );
	osc1.appendChild( createKnob(     "osc1detune", "detune", 100, 10, 65, -1200, 1200, currentOsc1Detune, "blue", onUpdateOsc1Detune ) );
	osc1.appendChild( createKnob(     "osc1mélange", "mélange",       100, 130, 65, 0, 100, currentOsc1Mix, "blue", onUpdateOsc1Mix ) );
	synthBox.appendChild( osc1 );

	var osc2 = createSection( "OSCILATEUR2", 130, 192, 223, 160 );	
	osc2.appendChild( createDropdown( "osc2wave", "formeOnde", 10, 15, ["sinusoidale","carre", "scie", "triangle"/*, "wavetable"*/], currentOsc2Waveform, onUpdateOsc2Wave ))
	osc2.appendChild( createDropdown( "osc2int", "intervale", 140, 15, ["16'","8'", "4'"], currentOsc2Octave, onUpdateOsc2Octave ) );
	osc2.appendChild( createKnob( "osc2detune", "detune", 100, 10, 65, -1200, 1200, currentOsc2Detune, "blue", onUpdateOsc2Detune ) );
	osc2.appendChild( createKnob( "osc2mélange", "mélange", 100, 130, 65, 0, 100, currentOsc2Mix, "blue", onUpdateOsc2Mix ) );
	synthBox.appendChild( osc2 );

	var filtre = createSection( "filtre", 387, 10, 80, 342 );	
	filtre.appendChild( createKnob( "fFreq", "coupure", 75, 12, 15, 0, 100, currentFilterCutoff, "#ffaa00", onUpdateFilterCutoff ) );
	filtre.appendChild( createKnob( "fQ", "q",       75, 12, 100, 0, 20, currentFilterQ, "#ffaa00", onUpdateFilterQ ) );
	filtre.appendChild( createKnob( "fMod", "mode",   75, 12, 185, 0, 100, currentFilterMod, "#ffaa00", onUpdateFilterMod ) );
	filtre.appendChild( createKnob( "fEnv", "env",   75, 12, 270, 0, 100, currentFilterEnv, "#ffaa00", onUpdateFilterEnv ) );
	synthBox.appendChild( filtre );

	var filtreEnv = createSection( "boite filtre", 501, 10, 355, 98 );	
	filtreEnv.appendChild( createKnob( "fA", "attaque",  80,   10, 20, 0, 100, currentFilterEnvA, "#bf8f30", onUpdateFilterEnvA ) );
	filtreEnv.appendChild( createKnob( "fD", "diminuer",   80,  100, 20, 0, 100, currentFilterEnvD, "#bf8f30", onUpdateFilterEnvD ) );
	filtreEnv.appendChild( createKnob( "fS", "soutenir", 80,  190, 20, 0, 100, currentFilterEnvS, "#bf8f30", onUpdateFilterEnvS ) );
	filtreEnv.appendChild( createKnob( "fR", "sortie", 80,  280, 20, 0, 100, currentFilterEnvR, "#bf8f30", onUpdateFilterEnvR ) );
	synthBox.appendChild( filtreEnv );

	var volumeEnv = createSection( "boite volume", 501, 131, 355, 98 );	
	volumeEnv.appendChild( createKnob( "vA", "attaque",  80,   10, 20, 0, 100, currentEnvA, "#00b358", onUpdateEnvA ) );
	volumeEnv.appendChild( createKnob( "vD", "diminuer",   80,  100, 20, 0, 100, currentEnvD, "#00b358", onUpdateEnvD ) );
	volumeEnv.appendChild( createKnob( "vS", "soutenir", 80,  190, 20, 0, 100, currentEnvS, "#00b358", onUpdateEnvS ) );
	volumeEnv.appendChild( createKnob( "vR", "sortie", 80,  280, 20, 0, 100, currentEnvR, "#00b358", onUpdateEnvR ) );
	synthBox.appendChild( volumeEnv );

	var master = createSection( "master", 501, 254, 355, 98 );	
	master.appendChild( createKnob( "pilote", "pilote",    80,   10, 20, 0, 100, currentDrive, "yellow", onUpdateDrive ) );
	master.appendChild( createKnob( "acoustique", "acoustique",     80,  100, 30, 0, 100, currentRev, "yellow", onUpdateReverb ) );
	master.appendChild( createKnob( "volume", "volume",     80,  180, 10, 0, 100, currentVol, "yellow", onUpdateVolume ) );
	master.appendChild( createDropdown( "midiIn", "midi_in", 280, 15, ["-no MIDI-"], 0, selectMIDIIn ) );
	master.appendChild( createDropdown( "kbd_oct", "kbd_oct", 280, 60, ["+3", "+2","+1", "normal", "-1", "-2", "-3"], 3, onChangeOctave ) );
	synthBox.appendChild( master );

	keybox = document.getElementById("keybox");

	if (window.location.search.substring(1) == "touch") {
		keybox.addEventListener('touchstart', touchstart);
		keybox.addEventListener('touchmove', touchmove);
		keybox.addEventListener('touchend', touchend);
	} else {
		keybox.addEventListener('pointerdown', pointerDown);
		keybox.addEventListener('pointermove', pointerMove);
		keybox.addEventListener('pointerup', pointerUp);
		keybox.addEventListener('pointerover', pointerOver);
		keybox.addEventListener('pointerout', pointerOut);
		keybox.addEventListener('pointerenter', pointerEnter);
		keybox.addEventListener('pointerleave', pointerLeave);
		keybox.addEventListener('pointercancel', pointerCancel);
		if (window.location.search.substring(1) == "dbgptr")
			pointerDebugging = true;
	}
} 
