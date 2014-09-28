<?php

	require_once 'parser.php';

	if( !empty($_FILES['csv']['tmp_name']) ) {
	
		if(move_uploaded_file($_FILES['csv']['tmp_name'], 'calculation.csv')) {
			
			$parser = new parser();
			echo $parser->getFormula($_POST['formula']);
			//echo $parser->sum();
			//echo $parser->average();
			//echo $parser->percent();
		}
		else {
			echo 'Erreur lors de la copie du fichier';
		}
	
	}

?>