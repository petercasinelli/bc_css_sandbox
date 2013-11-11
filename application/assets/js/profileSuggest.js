$(function(){
	$("#green_button").click(function() {
		var skillsVar = $(".as-values").val();
		var bioVar = $("#bio").val();
		if(!skillsVar && !bioVar) {
			$("#modal_notice").html("<span style=\"color:#ff0000;\">You must enter skills and a bio.</span>");
		} else {
			$.ajax({
				url : Settings.base_url + 'student/ajax_edit/',
				type : "POST",
				data : {
					skills : skillsVar,
					bio : bioVar
				},
				success : function(response, textStatus, jqXHR) {
					// log a message to the console
					console.log("It worked!");
					$("#alert").html("<div style=\"padding:5px;\">Thanks for adding your skills and bio. Have any feedback? Send an e-mail to <a href=\"mailto:bccss.development@gmail.com\" target=\"_blank\">bccss.development@gmail.com</a>.</div>").show();
					$(".modal_close").click();
				},
				// callback handler that will be called on error
				error : function(jqXHR, textStatus, errorThrown) {
					// log the error to the console
					console.log("The following error occured: " + textStatus, errorThrown);
					console.log("Response was: " + response);
                    $("#loadModal").hide();
				},
				// callback handler that will be called on completion
				// which means, either on success or error
				complete : function() {
					// enable the inputs
					console.log("Completed");
	
				}
			});
		}
	});
	
	$("a[rel*=leanModal]").leanModal({
		closeButton : ".modal_close"
	});
	
	$("#loadModal").click();

});