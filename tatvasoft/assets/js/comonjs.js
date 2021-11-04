$(document).ready(function () {

		jQuery.validator.addMethod("lettersonly", function(value, element) {
		  return this.optional(element) || /^[a-z\s]+$/i.test(value);
		}, "Letters only please"); 

		jQuery.validator.addMethod("accept", function(value, element, param) {
		    return value.match(new RegExp("^" + param + "$"));
		});

	    $('#login_form').validate({ 
		        rules: {
		            username: {
		                required: true,
		                
		            },
		            password: {
		                required: true,
		                
		            }
		        },
		        messages :{
			        username : {
			            required : 'Please Enter Username',
			        },
			        password : {
			            required : 'Please Enter Password',
			        },
			    }
		});


		$('#user_register').validate({ 
		        rules: {
		            username: {
		                required: true,
		                
		            },
		            password: {
		                required: true,
		                
		            },
		            name: {
		            	required: true,
		            	lettersonly: true,
		            },
		            mobile_no: {
		            	number: true,
		            	required: true,
		            	minlength: 10,
			            maxlength:10,
		            },
		            profile: { required: true, accept: "jpg|png"}
		        },
		        messages :{
			        username : {
			            required : 'Please Enter Username',
			        },
			        password : {
			            required : 'Please Enter Password',
			        },
			        name : {
			            required : 'Please Enter Name',
			            lettersonly: 'Enter Alphanumeric value only',
			        },
			        mobile_no : {
			            required : 'Please Enter Moble no',
			            number: 'Please Enter Valid Number',
			            minlength: 'Enter 10 Digit Moble no ',
			            maxlength: 'Enter 10 Digit Moble no ',

			        },
			        profile: 
			        {
			        	accept : 'Allow Only jpg,png format',
			        }
			    }
		});

});


