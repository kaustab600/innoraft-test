$(document).ready(function(){

$(".section1 button").click(function(){
  $(".section1 .height").css("width","300px");  
});

$(".section2 button").click(function(){
	$(".section2 .height").css({
								"transform":"translate(400px,0)",
								"transition":"transform 1s ease"
								});
});

$(window).scroll(function(){
	
	if($(this).scrollTop() > 700 && $(this).scrollTop() < 900)
	{
		$(".full").css({"position":"sticky",
						"top":"0px"});
	}
	else
	{
		$(".full").css({"position":"static",
						"top":"0px"});
	}

});

$(".section5 button").click(function(){
    $(".section5 p:nth-of-type(2)").wrap("<div>hello</div>");
  });

$(".section9 button").click(function(){
	$("#test3").attr("value","Hello its kaustab");
	$("#test3").attr("disabled","true");
	$(this).prop('disabled', "true");
});

$(".section6 button").click(function(){

if( $( ".section6 p" ).attr("class","intro") )
{

 $( ".section6 p" ).css("background-color","transparent");
}

});

$(".section7 button").click(function(){
	$(".section7 li:nth-of-type(4) ,.section7 li:nth-of-type(5),.section7 li:nth-of-type(6) ").css("background-color","red");
});

$(".section8 button").click(function(){

	$(".section8 li").css("border-color","black");
	$(".section8 li:first-of-type").css("border-color","");
});

$(".section4 button:first-of-type").click(function(){
	$(".section4 .content:first-of-type").css("display","block");
	$(".section4 .content:nth-of-type(2)").css("display","none");
	
});

$(".section6 button").click(function(){
  
  //$(".section6 p").not(".intro").css({"background-color":"transparent"});
    
    
    $(".section6 p").each(function() {       
      
      if($(this).hasClass("intro") == false)
      {
        $(this).css("background-color","transparent");
      }       
    });  

      //$(" p:not(.intro)").css("background-color","transparent");

     /* $(document).ready(function() { 
    $(".section6 button").click(function() { 
       	$(".section6 p").not(".intro").css({"background-color":"transparent"});
    }); */
}); 


$(".section4 button:nth-of-type(2)").click(function(){
	$(".section4 .content:first-of-type").css("display","none");
	$(".section4 .content:nth-of-type(2)").css("display","block");
});


$(".section10 button").click(function(){
	//$(window).scrollTop(".section1");
	$("html,body").animate({scrollTop:$(".section1").offset().top},{duration: 1000});

});
});
