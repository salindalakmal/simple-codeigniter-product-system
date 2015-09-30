$(document).ready(function(){

	$(this).foundation({
		topbar : {
    		mobile_show_parent_link: false,
    		is_hover: !Modernizr.touch
  		}
	});

	// Slider
	$(window).load(function () {
	    $('.flexslider').flexslider({
	        animation: "fade",
	        start: function(slider){
	        	$('#preloader').fadeOut(200);
	        	var sliderImgHeight = $('.flexslider img').height();
				$('.flexslider').css('min-height', sliderImgHeight); 
        	},
	    });
	});


   	if(! Modernizr.touch){
       $( ".date" ).attr( "type", "text" );
        $('.date').fdatepicker({
            format: 'yyyy-mm-dd'
        }); 
    }
    
    // Form Tel-Country Flags
    $("#phone").intlTelInput();
    
    $('.lightbox').magnificPopup({
        delegate: 'a',
        type: 'image',
        image: {
            cursor: null,
            titleSrc: 'title'
        },
        gallery: {
            enabled: true,
            preload: [0,1], // Will preload 0 - before current, and 1 after the current image
            navigateByImgClick: true
        }
    });

});



        
    

