function validate(id)
{	
	var input = document.getElementById(id);
	if (input.value == ""){
		input.style.border = "2px solid red";
		document.getElementById(id + 1).innerHTML = "Champ vide.";
		document.getElementById(id + 1).style.color = "red";
	}		
	else {
		input.style.border = "2px solid green";
		document.getElementById(id + 1).innerHTML = "";
}
}
