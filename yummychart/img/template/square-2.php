<?php

    header ("Content-type: image/png");
    $im = imagecreatefrompng('square.png');
	
	$vert = ImageColorAllocate ($im, 214, 124, 0);	
	
	ImageCreate($_GET['width'], $_GET['height'])
            or die ("Erreur lors de la création de l'image");
    imagealphablending($im,FALSE);
	imagesavealpha($im,TRUE);
	
	$_GET['titre'] = str_replace('_',' ', $_GET['titre']);
	
	//on écrit sur le logo
	imagelayereffect ( $im , IMG_EFFECT_OVERLAY );
	imagettftext($im, 30, 0, 15, 76, $vert, 'Oswald.otf', $_GET['titre']);
	
	ImagePng ($im);
?>