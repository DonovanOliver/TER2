<?php

if(isset($_POST['song'])){
	$_GET['song'] = $_POST['song'];
}


	if(isset($_GET['song'])){
			
			// on refais le nom correct
			$words = array("%2C+", "+", "%20");
			$string = str_replace($words, " ", $_GET['song']);

			echo '<meta http-equiv="refresh" content="0; URL=./Musiques/'.$string.'">';
			
	}

?>