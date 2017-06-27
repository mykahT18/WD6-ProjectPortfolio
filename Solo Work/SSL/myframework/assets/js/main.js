console.log("YELLER!!!!!!!!!");

$("#ajaxbtn").click(function(){

	$.ajax({
		method: "POST",
		url: "/welcome/ajaxPars",
		data: {email: $("#email").val(), 
			password: $("#password").val()},
			success: function(msg){
			if(msg=="Welcome!!"){
				window.location = "../welcome";
			}else{
				alert("Login Information is incorrect")
			}
		}
	})
})