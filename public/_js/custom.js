var $navigation = {

    init : function() {

    }

}

var $users = {
    
    init : function() {
        
        $('#timeline > li > a').click(function() {
            $( this ).next().toggle();
        });
        
    }
    
}

$(document).ready(function() {

    $navigation.init();
    
    $users.init();

});