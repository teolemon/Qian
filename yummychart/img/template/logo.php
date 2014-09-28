<?php

    header ("Content-type: image/png");
    $im = imagecreatefrompng('logo.png');
	
	$blanc = ImageColorAllocate ($im, 255, 255, 255);	
	
	ImageCreate($_GET['width'], $_GET['height'])
            or die ("Erreur lors de la création de l'image");
    imagealphablending($im,FALSE);
	imagesavealpha($im,TRUE);
	
	$_GET['titre'] = str_replace('_',' ', $_GET['titre']);
	
	//on écrit sur le logo
	imagelayereffect ( $im , IMG_EFFECT_OVERLAY );
	imagettftext($im, 18, 0, 65, 76, $blanc, 'Oswald.otf', $_GET['titre']);
	
	ImagePng ($im);
?>