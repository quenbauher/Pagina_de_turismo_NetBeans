$(document).ready(function(){

	$("#banner_principal").css({"height":$(window).height() + "px"});

	var flag = false;
	var scroll;

	$(window).scroll(function(){
		scroll = $(window).scrollTop();

		if(scroll > 200){
			if(!flag){
                            
				$("#logo").css({"margin-top": "-5px", "width": "250px","height":"55px"});

				$("header").css({"background-color": "#3C3C3C"});
                                
				flag = true;
			}
		}else{
			if(flag){
				$("#logo").css({"margin-top": "150px", "width": "600px","height":"180px"});

				$("header").css({"background-color": "transparent"});
                                  
				flag = false;
			}
		}


	});

});