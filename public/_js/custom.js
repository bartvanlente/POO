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
        
var $upload = {
    
    init : function() {
        $('#upload_album').css({'display': 'none'});
        
        $('#upload_left ul li a').click(function(e) {
     
            $('.active_upload').hide();
            
            $($(this).attr('href')).show();
            $($(this).attr('href')).addClass('active_upload');
            
            $('.active_menu').removeClass('active_menu');
            $(this).parent().addClass('active_menu');
            
            e.preventDefault();

        }); 
    }
    
}     

$(document).ready(function() {

    $navigation.init();
    
    $users.init();
    
    $upload.init();

});