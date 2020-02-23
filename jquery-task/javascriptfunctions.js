document.querySelector('.section1 button').onclick=function func(){

	document.querySelector('.section1 .height').style.width = "300px";

}

document.querySelector('.section2 button').onclick=function func(){

	document.querySelector('.section2 .height').style.transform = "translateX(400px)";
	document.querySelector('.section2 .height').style.transition = "transform 2s";
}

window.onscroll=function func(){

	
	var a = document.documentElement.scrollTop;
	if(a>700 || a<900)
	{
		document.querySelector('.full').style.position = "sticky";
		document.querySelector('.full').style.top = "0px";
	}
}



document.querySelector('.section5 button').onclick=function func(){
				
				// create wrapper container
			var wrapper = document.createElement('div');

			var wrapelement = document.querySelector('.section5 p:nth-of-type(2)');
				// insert wrapper before el in the DOM tree
			wrapelement.parentNode.insertBefore(wrapper, wrapelement);

				// move el into wrapper
			wrapper.appendChild(wrapelement);

}


document.querySelector('.section9 button').onclick = function func(){

	document.querySelector('.section9 input[type="text"][value="test value"]').disabled = true;
}


document.querySelector('.section6 button').onclick =  function func(){
	
	 var x = document.querySelector('.section6');
	
	x.querySelector("p:not(.intro)").style.background = "transparent"; 
	
}


document.querySelector('.section7 button').onclick = function func(){
	var x = document.querySelector('.section7');
	var y = x.querySelectorAll("li");
	y[3].style.background ="red";
	y[4].style.background ="red";
	y[5].style.background ="red";
}

document.querySelector('.section8 button').onclick = function func(){

 var x = document.querySelector('.section8');
 var y = x.querySelectorAll("li:not(:first-of-type)");
 var len = y.length;
 var i;
 for(i=0;i<len;i++)
 {

 	y[i].style.border ="2px solid black";
 }


}


document.querySelector('.section4 button:first-of-type').onclick = function func(){
	var el = document.querySelector('.section4 .content:first-of-type');

// Single class
	el.classList.add("active");

	var el2 = document.querySelector('.section4 .content:nth-of-type(2)');
	el2.classList.remove("active");

// Multiple calsses
	//el.classList.add("my-class", "nother-class");
}

document.querySelector('.section4 button:nth-of-type(2)').onclick = function func(){
	var el =document.querySelector('.section4 .content:nth-of-type(2)');

// Single class
	el.classList.add("active");

	var el2 = document.querySelector('.section4 .content:first-of-type');
	el2.classList.remove("active");


// Multiple calsses
	//el.classList.add("my-class", "nother-class");
}



document.querySelector('.section10 button').onclick=function func(){
	
	window.scrollTo(0, 0);
	
	/*function scrollToTop() {
    var position =
        document.body.scrollTop || document.documentElement.scrollTop;
    if (position) {
        window.scrollBy(0, -Math.max(1, Math.floor(position / 10)));
        scrollAnimation = setTimeout("scrollToTop()", 30);
    } else clearTimeout(scrollAnimation);
}
*/
}