        jQuery(document).ready(function(){

	    "use strict";
		$('#slider-carousel').caroufredsel({
	    responsive:true,
		width:'100%',
		circular:true,
		scroll:
		{
			
			items:1,
			duration:500,
			pauseOnHover:true,
			
		},
		
		auto:true,
            items:{
			
				visible:
            {
					
					min:1,
					max:1,
				},
				
				height:"variable"
			
			},
                                           
                                           
			pagination:{
                container:".sliderpager",
                pageAnchorBuilder:false
                
            },
	
	
});
            
            
            
        $('#portfolio-slider').caroufredsel({
	    responsive:true,
		width:'100%',
		circular:true,
        prev:'#prev',
        next:'#next',
		scroll:
		{
			
			items:1,
			duration:500,
			pauseOnHover:true,
			
		},
		
		auto:true,
            items:{
			
				visible:
            {
					
					min:1,
					max:4,
				},
				
				height:"variable"
			
			},
                                           
                                           

	
	
});
          
            $(window).scroll(function(){
                             
                var top=$(window).scrollTop();
               
                if(top>=60){
                   
                   $("header").addClass('secondary');
                   
                   }
                else if
                      ($("header").hasClass('secondary')){
                            $("header").removeClass('secondary');
                      
                }
                
                             
        
        });
    
            $('a').smoothScroll();

            $("#livesearch").keyup(function(){
				var live=$(this).val();
				if (live!='') {
					$.ajax({
						url:"check/livesearch.php",
						method:"POST"
						data:{search:live},
						dataType="text",
						success:function(data){
							
							$('#statuslive').html(data);
						}


					});
				}else{
					$('#statuslive').html("");
				}


            });




 
});
