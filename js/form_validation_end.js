/** Client-side form validation for the questionnaire **/
function validateForm() {
	
	var valid = true;
	
	var email_address = $("input:text[name=email_address]").val();
	var gender = $("input:radio[name=gender]:checked").val();
	var age = $("input:text[name=age]").val();
	var end_survey1 = $("input:radio[name=end_survey1]:checked").val();
	var end_survey2 = $("input:radio[name=end_survey2]:checked").val();
	var end_survey3 = $("input:radio[name=end_survey3]:checked").val();
	var end_survey4 = $("input:radio[name=end_survey4]:checked").val();
	var end_survey5 = $("input:radio[name=end_survey5]:checked").val();
	var end_survey6 = $("input:radio[name=end_survey6]:checked").val();
	var end_survey7 = $("input:radio[name=end_survey7]:checked").val();

		
	// Remove previous notes
	$(".errorstar").css("display", "none");
	$(".errornote").css("display", "none");
	$("#errormsg").css("display", "none");
	
	if (!email_address) {
		valid = false;
		$("#email_address").find(".errorstar").css("display", "inline");
	} else {
		var atpos = email_address.indexOf("@");
		var dotpos = email_address.lastIndexOf(".");
		if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email_address.length) {
			$("#email_address").find(".errorstar").css("display", "inline");
			$("#email_address").find(".errornote").css("display", "inline");
			valid = false;
		}
	} 
	
	if (!gender) {
		valid = false;
		$("#gender").find(".errorstar").css("display", "inline");
	}
	
	if (!age) {
		valid = false;
		$("#age").find(".errorstar").css("display", "inline");
	}
	
	else if (isNaN(age)) { // age must be a number
		valid = false;
		$("#age").find(".errorstar").css("display", "inline");
		$("#age").find(".errornote").css("display", "inline");
	}
	
	if (!end_survey1) {
		valid = false;
		$("#end_survey1").find(".errorstar").css("display", "inline");
	}
	
	if (!end_survey2) {
		valid = false;
		$("#end_survey2").find(".errorstar").css("display", "inline");
	}

	if (!end_survey3) {
		valid = false;
		$("#end_survey3").find(".errorstar").css("display", "inline");
	}
	
	if (!end_survey4) {
		valid = false;
		$("#end_survey4").find(".errorstar").css("display", "inline");
	}
	
	if (!end_survey5) {
		valid = false;
		$("#end_survey5").find(".errorstar").css("display", "inline");
	}
	
	if (!end_survey6) {
		valid = false;
		$("#end_survey6").find(".errorstar").css("display", "inline");
	}
	
	if (!end_survey7) {
		valid = false;
		$("#end_survey7").find(".errorstar").css("display", "inline");
	}
	
	

	
	if (!valid) {
		$("#errormsg").css("display", "block");
		$('html,body').scrollTop(0);
	}
	return valid;
}
	