
// This will ensure that showTime() is executed every second
var clock = setInterval(showTime, 1000);

// This function will be used to show the time on all pages.				
function showTime(){
	var p = document.getElementById("clock");
	var time = new Date();
	
	// This will ensure that the minute value displays as two digits
	var min = time.getMinutes();
	if(min < 10){
		min = "0" + min
	}
	
	// This will ensure that the second value displays as two digits
	var sec = time.getSeconds();
	if(sec < 10){
		sec = "0" + sec;
	}
	
	// This will update the 'clock' p element with a String representing the time
	p.innerHTML = getCurrentDate() + " " + time.getHours() + ":" + min + " " + sec + "<br />";
}

// This is the function that was written earlier on in the assignment. It will be used to help format
// the date properly.
function getCurrentDate(){
	var curDate = new Date();	// Used to gather the current date on the user's system
	var formatDate = "";	// Will store the properly formatted date
	
	// This switch statement will take the number representing the day of the week,
	// and turn it into the appropriate String.
	switch(curDate.getDay()){
		case 0: formatDate += "Sunday";
						break;
		case 1: formatDate += "Monday";
						break;
		case 2: formatDate += "Tuesday";
						break;
		case 3: formatDate += "Wednesday";
						break;
		case 4: formatDate += "Thursday";
						break;
		case 5: formatDate += "Friday";
						break;
		case 6: formatDate += "Saturday";
						break;
	}

	formatDate += ", ";
	
	// This switch statement will take the number representing the month and turn
	// it into the appropriate String.
	switch(curDate.getMonth()){
		case 0: formatDate += "January";
						break;
		case 1: formatDate += "February";
						break;
		case 2: formatDate += "March";
						break;
		case 3: formatDate += "April";
						break;
		case 4: formatDate += "May";
						break;
		case 5: formatDate += "June";
						break;
		case 6: formatDate += "July";
						break;
		case 7: formatDate += "August";
						break;
		case 8: formatDate += "September";
						break;
		case 9: formatDate += "October";
						break;
		case 10: formatDate += "November";
						break;
		case 11: formatDate += "December";
						break;
	}

	formatDate += " ";
	
	// The remainder of the date will now be added to the String
	formatDate += curDate.getDate() + ", ";
	formatDate += curDate.getFullYear();
	return formatDate;
}


// This function will verify the registration form
function verify_entry(){
	
	// First, any styling of labels will be removed and their colour will be reset.
	// This is needed because the function makes the label of any incorrect value red.
	var labels = document.getElementsByTagName("label");
	for(var i = 0; i < labels.length; i++){
		labels[i].removeAttribute("style");
		labels[i].setAttribute("color", "#90906A");
	}
	
	// The first_name field will be verified first. It will make sure that
	// the first name consists of ONLY letters. If the name entered is not valid,
	// the user will be asked to try again and the label will be set to red.
	var firstName = document.getElementById("first_name").value;
	if(firstName.search(/^[A-Za-z]+$/) < 0){
		document.getElementById("firstNameLabel").style.color = "red";
		alert("You must enter a proper first name!");
		return false;
	}
	
	// The last_name field will be verified next. Once again, the last name
	// must be ONLY letters; if an incorrect name is entered, it will be handled
	// just like firstName.
	var lastName = document.getElementById("last_name").value;
	if(lastName.search(/^[A-Za-z]+$/) < 0){
		document.getElementById("lastNameLabel").style.color = "red";
		alert("You must enter a proper last name!");
		return false;
	}
	
	// The email field will be verified next. A modified version of the RegExp
	// developed in Exercise 2 is used to allow for a wider range of emails.
	var email = document.getElementById("email").value;
	if(email.search(/^\w+@[A-Za-z0-9.]+\.(com|ca|org|net)$/) < 0){
		document.getElementById("emailLabel").style.color = "red";
		alert("You must enter a valid email!");
		return false;
	}
	
	// The phone number field will be verified next. It can be in the format either
	// 5555555555, 555 555 5555, 555-555-5555, or any combination of one space / dash.
	var phoneNumber = document.getElementById("phone_number").value;
	if(phoneNumber.search(/^\d{3}(\s|\-)?\d{3}(\s|\-)?\d{4}$/) < 0){
		document.getElementById("phoneLabel").style.color = "red";
		alert("You must enter a valid phone number!");
		return false;
	}
	
	// Finally, the passwords will be verified if the function gets this far.
	var password = document.getElementById("password").value;
	var confirmation = document.getElementById("confpass").value;
	
	// If either of the password fields are blank, the user will be asked to enter
	// some value
	if(password == "" || confirmation == ""){
		alert("You must enter and confirm your password!");
		return false;
	}
	
	// If the passwords don't match, the user will be asked to try again. The
	// password fields will also be made blank.
	if(password != confirmation){
		document.getElementById("password").value = "";
		document.getElementById("confpass").value = "";
		alert("The passwords you entered do not match!");
		return false;
	}
	
	// If everything validates properly, then the form will be submitted to 'authentication.php'
	document.getElementById("register").action = "authentication.php";
	return true;
}