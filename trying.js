$(function(){

	$("#usererror").hide();
	$("#userchecker").hide();
	$("#dispchecker").hide();
	$("#passerror").hide();
	$("#confirmpasserror").hide();
	$("#emailerror").hide();
	$("#fnameerror").hide();
	
	

	var error_user = false;
	var error_userchecker = false;
	var error_dispchecker = false;
	var error_pass = false;
	var error_confirm = false;
	var error_email = false;
	var error_fname = false;
	


	$("#username").focusout(function(){

		check_username();



		
	});

	$(document).ready(function(){

		$("#userchecker").load("checkuser.php").show();

		$("#username").keyup(function(){

			$.post("checkuser.php", {username: form.username.value},
				function(result){

					$("#userchecker").html(result).show();
				});

		});


	});

	$(document).ready(function(){

		$("#dispchecker").load("checkdisp.php").show();

		$("#displayname").keyup(function(){

			$.post("checkdisp.php", {displayname: form.displayname.value},
				function(result){

					$("#dispchecker").html(result).show();
				});

		});


	});

	$("#password").focusout(function(){


		check_password();
		
		
	});

	$("#confirmpass").focusout(function(){


		check_confirmpass();
		
		
	});

	$("#email").focusout(function(){


		check_email();
		
		
	});

	$("#fname").focusout(function(){

		check_fname();


		
	});

	

	$("#lname").focusout(function(){

		check_lname();


		
	});



	




	function check_username() {
		var username_length = $("#username").val().length;



		if(username_length < 8 || username_length > 15) {
			$("#usererror").html("Should be between 8-15 characters");
			$("#usererror").show();
			error_user = true;
		}else {
			$("#usererror").hide();
		}

	}


	function check_password() {
		var password_length = $("#password").val().length;

		if(password_length < 8 || password_length > 20) {
			$("#passerror").html("Should be between 8-20 characters");
			$("#passerror").show();
			error_pass = true;
		}else {
			$("#passerror").hide();
		}

	}

	function check_confirmpass() {
		var password = $("#password").val();
		var confirm = $("#confirmpass").val();

		if(password != confirm) {
			$("#confirmpasserror").html("Password don't match");
			$("#confirmpasserror").show();
			error_confirm = true;
		}else {
			$("#confirmpasserror").hide();
		}

	}

	function check_email() {
		var pattern = new RegExp(/^[+a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}$/);

		if(pattern.test($("#email").val())) {
			$("#emailerror").hide();
		}else {
			$("#emailerror").html("Invalid e-mail address");
			$("#emailerror").show();
			error_email = true;
			
		}
	}	

	function check_fname() {
		var firstname = $("#fname").val();

		if(/^[a-zA-Z0-9- ]*$/.test(firstname) == false) {
			$("#fnameerror").html("Error: it contains illegal characters");
			$("#fnameerror").show();
			error_fname = true;
		}else {
			$("#fnameerror").hide();
		}

	}

	function check_lname() {
		var lastname = $("#lname").val();

		if(/^[a-zA-Z0-9- ]*$/.test(lastname) == false) {
			$("#lnameerror").html("Error: it contains illegal characters");
			$("#lnameerror").show();
			error_fname = true;
		}else {
			$("#lnameerror").hide();
		}

	}


	


$("#form").submit(function() {

		error_user = false;
		error_pass = false;
		error_confirm = false;
		error_email = false;
		error_fname = false;
	    

		check_username();
		check_password();
		check_confirmpass();
		check_email();
		check_fname();
		check_lname();
		

		if(error_user == false && error_pass == false && error_confirm == false && error_email == false && error_fname == false){
			
			$.post ( $("#form").attr("#action"), $("#form :input").serializeArray(), function(info){ $("#submiterror").html(info)});
			return true;

			

		} else {
			
			alert ("please fill up all fields");
			return false;
		}

	});
	
	
	



	

});