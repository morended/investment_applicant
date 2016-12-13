function registrationValidate(form){
	
var firstname, lastname,email,reemail,password,text;

    // Get the value of the input field with id="numb"
    firstname = form.firstname.value;
	    lastname = form.lastname.value;
		    email = form.email.value;
			    reemail = form.reenteremail.value;
				    password = form.password.value;
					   atpos = email.indexOf("@");
						dotpos = email.lastIndexOf(".");
         
         
text="";
    // If x is Not a Number or less than one or greater than 10
    if (firstname==""){
        text = "Please provide your firstname!<br>";
		
		document.getElementById("demo").innerHTML = text;
		
    } 
	
	if (email==""||atpos < 1 || ( dotpos - atpos < 2 )){
        text += "Please provide correct email!<br>";
		
    document.getElementById("demo").innerHTML = text;
		
    } 
	if (email!=reemail){
        text += "Email Ids doesnt match<br>";
		
    document.getElementById("demo").innerHTML = text;
		
    } 
	if (password==""){
        text += "Please provide your password<br>";
		
    document.getElementById("demo").innerHTML = text;
		
    } 
	if(text.length>1) return false;
		
		
	return true;
}


function validate(form){
	
var firstname,password;

    
    firstname = form.firstname.value;
	   
				    password = form.password.value;
					if (firstname==""){
        text = "Please provide your firstname!<br>";
		} 
	if (password==""){
        text += "Please provide your password!<br>";
		
		
    } 
	if(text.length>1){
		alert(text);
		text="";
		return false;
	}
	return true;
	
	
}
         
         