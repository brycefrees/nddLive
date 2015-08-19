jQuery(window).load(function($) {

	/* Portfolio items loaded, now show them one by one with a delay in between
	================================================================================*/
	jQuery('#portfolio').isotope({ filter: '*' });
	setTimeout(function() {
		jQuery('#portfolio.loader').removeClass('loader'); // Remove the loader effect because all the images are loaded!
	}, 400);
	jQuery('#portfolio.faded .item').delay(350).each(function(i){
		jQuery(this).css('visibility','visible').delay(100 * i).fadeTo(1000,1);
	});
	

}); // window.load function
