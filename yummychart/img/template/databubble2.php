<?php

    header ("Content-type: image/png");
    $im = imagecreatefrompng('bubble2.png');
	
	$blanc = ImageColorAllocate ($im, 134, 187, 162);	
	
	ImageCreate($_GET['width'], $_GET['height'])
            or die ("Erreur lors de la création de l'image");
    imagealphablending($im,FALSE);
	imagesavealpha($im,TRUE);
	
	$_GET['titre'] = str_replace('_',' ', $_GET['titre']);
	
	//on écrit sur le logo
	imagelayereffect ( $im , IMG_EFFECT_OVERLAY );
	imagettftext($im, 40, 0, 23, 95, $blanc, 'Oswald.otf', $_GET['titre']);
	
	ImagePng ($im);
?>