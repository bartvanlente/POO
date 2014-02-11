var $navigation = {

    init : function() {

        $( '.login' ).click(function() {
            $( '#login' ).toggle();
        });
    }

}

$(document).ready(function() {

    $navigation.init();

});