$(document).ready(function(){

	$("#login").click(function(){
		
		
		var email = $("#username").val();
		var password = $("#password").val();
		
	if( email =='' || password ==''){

		alert("Sila Masukkan ID dan Katalaluan...!!!!!!");

	}else {
		$.post("index.php/login/checklogin",{ user: email, pass:password},
			
		function(data) {
			if(data =='Successfully Logged in...'){

				$("form")[0].reset();

				$('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
				//alert(data);
				var redirect = 'index.php/panel'; 
				window.location = redirect;

			} else{
				alert("Sila Masukkan ID dan Katalaluan");
			}
		});
	}
	});
});