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
        
        $upload.select();
        
        $('.album').css({'display': 'none'});
        
        $('#upload_left ul li a').click(function(e) {
     
            $('.active_upload').hide();
            
            $($(this).attr('href')).show();
            $($(this).attr('href')).addClass('active_upload');
            
            $('.active_menu').removeClass('active_menu');
            $(this).parent().addClass('active_menu');
            
            e.preventDefault();

        }); 
    },
            
    select : function() {
        $('#select_file_category').change(function(){			
            if( $(this).find("option:selected").html() == 'album' )
            {
                $('.album').css({'display': 'block'});
                $('.image').css({'display': 'none'});
            }
            else
            {
                $('.album').css({'display': 'none'}); 
                $('.image').css({'display': 'block'});
            }
        });   
    }
}    

var $comments = {
    
    init : function() {
        
        $('#chars_left').text(250);
        
        $('#comment').keyup(function() {
           
            var chars_left = (250 - $(this).val().length);
            
            $('#chars_left').text(chars_left);
            
            if(chars_left < 0) {
                $('#chars_left').addClass('chars_limit');
            }
        });
    }
    
}

$(document).ready(function() {

    $navigation.init();
    
    $users.init();
    
    $upload.init();
    
    $comments.init();

});