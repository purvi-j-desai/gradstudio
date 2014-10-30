/** Client-side form validation for the questionnaire **/
function validateForm() {
	
	var valid = true;
	
	var email_address = $("input:text[name=email_address]").val();
	var enrolled_in_college = $("input:radio[name=enrolled_in_college]:checked").val();
	var gpa = $("input:text[name=gpa]").val();
	var english_speaker = $("input:radio[name=english_speaker]:checked").val();
	var area_of_study = $("input:radio[name=area_of_study]:checked").val();
	var beliefs1 = $("input:radio[name=beliefs1]:checked").val();
	var beliefs2 = $("input:radio[name=beliefs2]:checked").val();
	var beliefs3 = $("input:radio[name=beliefs3]:checked").val();
	var beliefs4 = $("input:radio[name=beliefs4]:checked").val();
	var beliefs5 = $("input:radio[name=beliefs5]:checked").val();
	var beliefs6 = $("input:radio[name=beliefs6]:checked").val();
	var beliefs7 = $("input:radio[name=beliefs7]:checked").val();
	var beliefs8 = $("input:radio[name=beliefs8]:checked").val();
	var beliefs9 = $("input:radio[name=beliefs9]:checked").val();
	var beliefs10 = $("input:radio[name=beliefs10]:checked").val();
	var beliefs11 = $("input:radio[name=beliefs11]:checked").val();
	var beliefs12 = $("input:radio[name=beliefs12]:checked").val();
	var beliefs13 = $("input:radio[name=beliefs13]:checked").val();
	var beliefs14 = $("input:radio[name=beliefs14]:checked").val();
		
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

	if (!enrolled_in_college) {
		valid = false;
		$("#enrolled_in_college").find(".errorstar").css("display", "inline");
	}
	
	if (gpa && (isNaN(gpa))) {
		valid = false;
		$("#gpa").find(".errornote").css("display", "inline");
	}
	
	if (!english_speaker) {
		valid = false;
		$("#english_speaker").find(".errorstar").css("display", "inline");
	}
	
	if (!area_of_study) {
		valid = false;
		$("#area_of_study").find(".errorstar").css("display", "inline");
	} else if (area_of_study == "other") { // check for "other"
		area_of_study = $("input:text[name=area_of_study_other]").val();
		if (!area_of_study) {
			valid = false;
			$("#area_of_study").find(".errorstar").css("display", "inline");
		}
	}
	
	if (!beliefs1) {
		valid = false;
		$("#beliefs1").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs2) {
		valid = false;
		$("#beliefs2").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs3) {
		valid = false;
		$("#beliefs3").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs4) {
		valid = false;
		$("#beliefs4").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs5) {
		valid = false;
		$("#beliefs5").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs6) {
		valid = false;
		$("#beliefs6").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs7) {
		valid = false;
		$("#beliefs7").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs8) {
		valid = false;
		$("#beliefs8").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs9) {
		valid = false;
		$("#beliefs9").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs10) {
		valid = false;
		$("#beliefs10").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs11) {
		valid = false;
		$("#beliefs11").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs12) {
		valid = false;
		$("#beliefs12").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs13) {
		valid = false;
		$("#beliefs13").find(".errorstar").css("display", "inline");
	}
	
	if (!beliefs14) {
		valid = false;
		$("#beliefs14").find(".errorstar").css("display", "inline");
	}
	
	
	if (!valid) {
		$("#errormsg").css("display", "block");
		$('html,body').scrollTop(0);
	}
	return valid;
}
	