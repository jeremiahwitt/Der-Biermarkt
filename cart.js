
/* This will make sure that the user is logged in. If they are, trying to add an item *
 * to their cart will direct them to 'cart.php'. If they are not, they will be asked  *
 * to log into an account in order to make a purchase.															  */
function verify_login(loggedin){
	if(loggedin){
		
		// This will set the action of the form to 'cart.php', allowing the user to purchase
		document.getElementById("storeForm").action = "cart.php";
		return true;
	} else {
		
		// This will tell the user they must log in first.
		alert("You must login to make a purchase!");
		return false;
	}
}