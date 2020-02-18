document.getElementById('btn1').onclick=function func(){

	document.getElementById('box1').style.width = "300px";
}

document.getElementById('btn2').onclick=function func(){

	document.getElementById('box2').style.transform = "translateX(400px)";
	document.getElementById('box2').style.transition = "transform 2s";
}

window.onscroll=function func(){

	
	var a = document.documentElement.scrollTop;
	if(a>700 || a<900)
	{
		document.getElementById('scrollsection').style.position = "sticky";
		document.getElementById('scrollsection').style.top = "0px";
	}
}



document.getElementById('btn3').onclick=function func(){

				// create wrapper container
			var wrapper = document.createElement('div');

			var wrapelement = document.getElementById('wrapelement')
				// insert wrapper before el in the DOM tree
			wrapelement.parentNode.insertBefore(wrapper, wrapelement);

				// move el into wrapper
			wrapper.appendChild(wrapelement);

}


document.getElementById('btn4').onclick = function func(){

	document.getElementById('test3').disabled = true;
}


document.getElementById('btn5').onclick =  function func(){
	
	 var x = document.getElementById("dontclass");
	
	x.querySelector("p:not(.intro)").style.background = "transparent"; 
	
}


document.getElementById('btn6').onclick = function func(){
	var x = document.getElementById('oddli');
	var y = x.querySelectorAll("li");
	y[3].style.background ="red";
	y[4].style.background ="red";
	y[5].style.background ="red";
}

document.getElementById('btn7').onclick = function func(){

 var x = document.getElementById('except1');
 var y = x.querySelectorAll("li:not(:first-of-type)");
 var len = y.length;
 var i;
 for(i=0;i<len;i++)
 {

 	y[i].style.border ="2px solid black";
 }


}


document.getElementById('tab1').onclick = function func(){
	var el = document.getElementById("firsttab");

// Single class
	el.classList.add("active");

	var el2 = document.getElementById("secondtab");
	el2.classList.remove("active");

// Multiple calsses
	//el.classList.add("my-class", "nother-class");
}

document.getElementById('tab2').onclick = function func(){
	var el = document.getElementById("secondtab");

// Single class
	el.classList.add("active");

	var el2 = document.getElementById("firsttab");
	el2.classList.remove("active");


// Multiple calsses
	//el.classList.add("my-class", "nother-class");
}



document.getElementById('btn10').onclick=function func(){
	
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