
$(document).ready(function(){

  $(window).scroll(function(){
  
    if($(this).scrollTop() > 10){ 
      
      /*$("#header").css({"position":"sticky",
              "top":"0px"});*/
      $("#header").css({"position":"fixed",
                         "top":"0"});
    }
    else{ 

      $("#header").css({"position":"static",
              "top":"0px"});
    }

  });

});

