
$(document).ready(function (){	
	$('div.videowin').hide(); 
	$('a.hide').hide(); 
	$('a.show').click(function(){
		$(this).parent().parent("div.play").next("div.videowin").slideToggle('slow');
		$(this).hide(); 
		$(this).siblings('a.hide').show(); 
		});
			
	$('a.hide').click(function(){
		$(this).parent().parent("div.play").next("div.videowin").slideToggle('slow');
		$(this).hide(); 
		$(this).siblings('a.show').show();
		});		
	
});