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

var $rate_picture = {
    
    init : function() {
        
        $('.like, .dislike').on('click', function(e) {
            
            
            e.preventDefault(e);
            //window.alert($(this).attr('class'));
            $.ajax({
                
                'type': 'post',
                'url': '/POO/index/rate',
                'datatype': 'html',
                'data': {'type': $(this).attr('class'), 'img_id': $(this).attr('data-file')},
                success: function(response){

                    try {
                        
                        $likes = jQuery.parseJSON(response);
                        
                        $('.like span').html($likes['like']);
                        $('.dislike span').html($likes['dislike']);
                    
                    } catch(error) {
                        window.alert("You need to be logged in to like. ");
                    }
                }
                
            });
            
        });
        
    }
    
}

var $category_activation = {
    
    init : function() {
        
        $('.active_category, .inactive_category').on('click', function() {
            
            switch($(this).attr('class')) {
                
                case 'active_category':
                    $(this).removeClass('active_category');
                    $(this).addClass('inactive_category');
                    break;
                
                case 'inactive_category':
                    $(this).removeClass('inactive_category');
                    $(this).addClass('active_category');
                    break;
                
            } 
            
        });
        
        
        
    }
    
}

var $category_filter = {
    
    init : function() {
        
        $('#refresh_categories').on('click', function(e) {
            
            e.preventDefault();
            
            var filter_these = new Array();
            
            $('.active_category').each(function() {
                
                filter_these[$(this).attr('for')] = $(this).attr('for');
            });
           
            filter_these.splice(0, 1);
           
            if(filter_these.length !== 0) {
                
                $.ajax({
                    
                    'type': 'post',
                    'url': '/POO/index/getCategoryImages',
                    'datatype': 'html',
                    'data': {'categories': filter_these}, 
                    success: function(response){
                        window.alert(response);
                    }
                });
                
            }
            
            
        });
        
    }
    
}


$(document).ready(function() {

    $navigation.init();
    
    $users.init();
    
    $upload.init();
    
    $comments.init();
    
    $rate_picture.init();
    
    $category_activation.init();
    
    $category_filter.init();

});