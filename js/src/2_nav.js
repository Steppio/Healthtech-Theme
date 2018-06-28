function slideToMe( href , distance ) {

    jQuery('html, body').animate({
        scrollTop: jQuery( href ).offset().top - distance
    }, 500);

}

jQuery(document).ready(function(){

	jQuery('#menu a').click(function(event) {

		console.log('bleh');

	    var href = jQuery(this).attr('rel'),
	        distance = 0;

	    slideToMe( href , distance );

	    return false;

	});

});

$( document ).ready(function() {

    if(window.location.href.indexOf("signup") > -1) {

    	console.log('signup');

	    var href = '.signup',
	        distance = 0;

	    slideToMe( href , distance );

    }	

});