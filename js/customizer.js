/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {


	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );


	// Sidebar options
	wp.customize( 'sidebar_layout', function( value ) {
		value.bind( function( to ) {
			$( '#page' ).removeClass( 'sidebar-right sidebar-left sidebar-none' );
			$( '#page' ).addClass( to );
			console.log( to );
			if ( to == 'sidebar-none' ) {
				$('.sidebar-none .widget-area').masonry({
				// options
					itemSelector: '.widget',
					columnWidth: '.widget'
				});
			} else {
				$('.widget-area').masonry('destroy');
			}
		});
	});


} )( jQuery );
