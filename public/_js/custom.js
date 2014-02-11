var $navigation = {

    init : function() {

        $( '.login' ).click(function() {
            $( '#login' ).toggle();
            $( '#login' ).find( 'input[type="text"]' ).focus();
        });
        
        $( '#login' ).on('mouseleave',function() {
            $( '#login ').hide();
	});
    }

}

$(document).ready(function() {

    $navigation.init();

});