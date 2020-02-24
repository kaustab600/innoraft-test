document.getElementById('fname').onblur = function(){
	
	var name = document.getElementById('fname').value;
	if(!name.match(/^[a-zA-Z]+$/)){
		alert('plaase enter only letters');
		document.getElementById('fname').value = "";
	}	
}

document.getElementById('lname').onblur = function(){
	
	var name = document.getElementById('lname').value;
	if(!name.match(/^[a-zA-Z]+$/)){
		alert('plaase enter only letters');
		document.getElementById('lname').value = "";
	}	
}

document.getElementById('mail').onkeyup = function(){
	
	var email = document.getElementById('mail').value;

	if(!email.match(/^\w*[-]?\w+@\w+(\.\w{2,3}){1,3}$/)){
		alert('plaase enter a valid email');
		document.getElementById('mail').value = "";
	}	
}

document.getElementById('crfmpass').onblur = function(){
	
	var crf = document.getElementById('crfmpass').value;
	var pass = document.getElementById('pass').value;

	if(crf != pass){
		alert('confirm password doesnt match');
		document.getElementById('crfmpass').value = "";
	}	
}
