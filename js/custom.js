$(document).ready(function(){

//------------------------Tab Menu Setup -----------------------//

// Needed variables
var $content = $("#tab-container");
$('#tab-container').easytabs({
animate	: true,
updateHash : false,
transitionIn :'fadeIn',
transitionOut	:'fadeOut',
animationSpeed	:500,
tabActiveClass	:'active',
tabs :'.tab',
transitionInEasing: 'easeOutExpo',
transitionOutEasing: 'easeInOutExpo'
// animate : true,
// cache : true,
// updateHash : false,
// transitionIn :'fadeIn',
// transitionOut :'fadeOut',
// animationSpeed :600,
// tabs :".tab",
// tabActiveClass :'active',
// 
});

// Hover menu effect

/* $('.tab a').hover( function() {
$(this).stop().animate({ marginTop: "-7px" }, 200);
},function(){
$(this).stop().animate({ marginTop: "0px" }, 300);
});  */


/* ---------------------------------------------------------------------- */
/* Custom Functions
/* ---------------------------------------------------------------------- */
// Needed variables
var $logo = $('#logo');
// Show logo
$('.tab-resume,.tab-work, .tab-photo,.tab-contact').click(function() {
$logo.fadeIn('slow');
});
// Hide logo
$('.tab-profile').click(function() {
$logo.fadeOut('slow');
}); 

//--------------------------------- Hover animation for the elements of the portfolio --------------------------------//
	
	$('.thumbnail').hover( function(){ 
		$(this).children('img').animate({ opacity: 0.55 }, 'fast');
	}, function(){ 
		$(this).children('img').animate({ opacity: 1 }, 'slow'); 
	}); 

// Fancy Box 

/*
 *  Simple image gallery. Uses default settings
 */

$('.fancybox').fancybox({
	
	nextEffect : 'fade',
	prevEffect :  'fade',
	nextEasing : 'easeOutBack',
	prevEasing : 'easeInBack',
	
	helpers: {
				title : {
					type : 'outside'
				},
				overlay : {
					speedIn : 200,
					opacity : 0.95
				}
			}
	
}); 





});
