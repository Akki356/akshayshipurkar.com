(function( $ ) {

        /**
         * Connects to the Theme Customizer's color picker, and changes the anchor
         * color whenever the user changes colors in the Theme Customizer.
         */
	// Header & Sidebar
    wp.customize( 'nouveau_topbottom', function( value ) {
        value.bind( function( to ) {
            $( '.color-main' ).css( 'background', to );
        } );
    });

	// Theme Color, Links & Hovers
    wp.customize( 'nouveau_theme', function( value ) {
        value.bind( function( to ) {
            $( '.format-standard .post-deco .hex , .scrollup , .format-standard .readbtn' ).css( 'background', to );
            $( '.format-standard' ).css( 'border-top-color', to );
            $( 'a:hover , a:focus , a:active' ).css( 'color', to );
            $( '.hentry h1 a:hover' ).css( 'color', to );
        } );
    });

}( jQuery ));