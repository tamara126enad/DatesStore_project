(function( $ ) {

    "use strict";

    // javascript code here. i.e.: $(document).ready( function(){} );


    console.log( 'admin script' );

    $('.iepa-accordion-header').on('click', function() {
      $( this ).closest( '.iepa-accordion' ).toggleClass( 'actively-open' );
    });

})(jQuery);
