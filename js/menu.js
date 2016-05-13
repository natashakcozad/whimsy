/*
	Flaunt.js v1.0.0
	by Todd Motto: http://www.toddmotto.com
	Latest version: https://github.com/toddmotto/flaunt-js
	
	Copyright 2013 Todd Motto
	Licensed under the MIT license
	http://www.opensource.org/licenses/mit-license.php
*/
;(function($) {

	// DOM ready
	$(function() {
		
    // Primary Menu
        
		// Append the mobile icon nav
		$( '#menu-primary.nav' ).append($( '<div class="nav-mobile"></div>' ));
		
		// Add a <span> to every .nav-item that has a <ul> inside
		$( '#menu-primary-items > .menu-item' ).has( 'ul' ).prepend('<span class="nav-click"><i class="fa fa-angle-down"></i></span>');
		
		// Click to reveal the nav
		$( '.nav-mobile' ).click(function(){
			$( '.menu-items' ).toggle( 300, 'easeInBack' );
		});
        
		// Dynamic binding to on 'click'
		$( '#menu-primary-items' ).on( 'click', '.nav-click', function() {
		
			// Toggle the nested nav
			$( this ).siblings( '.sub-menu' ).toggle( 400, 'easeInBack' );
			
			// Toggle the arrow using CSS3 transforms
			$( this ).children( '.fa-angle-down' ).toggleClass( 'fa-flip-vertical' );
            
			
		});
	    
	});
	
})(jQuery);