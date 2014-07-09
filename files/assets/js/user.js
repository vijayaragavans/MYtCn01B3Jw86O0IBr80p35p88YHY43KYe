$(document).ready(function() { 
		
	//var local_dir = "http://localhost/myanalytics/";
	var local_dir = location.protocol + "//" + document.domain + "/";
	//var local_dir = location.protocol + "//" + document.domain + "/";
	
	$("#logForm").validate({
		rules: {
		input_password: {
				required: true,
				minlength: 5
			},
			input_username: {
				required: true,
				email: true
			}
		},
		messages: {
			user_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			user_email: "Please enter a valid email address"
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
			
		var params = "user_password="+$("#input_password").val()+"&username="+$("#input_username").val()+"&for=login";
			
		$.ajax({
		            type: "POST",
		            url: local_dir+"home/processLogin/",
		            data: params,
		            async: false,
		            success: function(sresponse) {
				 		if(sresponse == 0)
				 		{
				 			$(".response").html("Email Address or Password does not match");
				 			return false;
				 		}else{
				 			window.loaction.href = "index.php?/home/index/";
				 		}
				 	}
				 });
			
		}
		
	}); // End of Login Validation


	$("#siteForm").validate({
		rules: {
		input_site_label: {
				required: true,
				minlength: 5
			},
		input_site_url: {
				required: true,
				minlength: 5
			}
		},
		messages: {
		},
	    onfocusout: function(element) {
	        $(element).valid();
	    },
	    highlight: function(element) {
	        var cssObj = {'border' : '1px solid red', 'background-color:':'red', 'color' : 'red'}
	    	$(element).css(cssObj);
	    },
	    unhighlight: function(element) {
	    	$(element).removeClass('error');
	        var cssObj = {'border' : '1px solid #0EA6BF', 'color' : '#222222'}
	    	$(element).css(cssObj);
	    },

	    submitHandler: function(form) {
			
		var params = "input_site_label="+$("#input_site_label").val()+"&input_site_url="+$("#input_site_url").val()+"&for=add_site";
			
		$.ajax({
		            type: "POST",
		            url: local_dir+"site/add_new_site/",
		            data: params,
		            async: false,
		            success: function(sresponse) {

				 if(sresponse == 0)
				{
				 	$(".response").html("Insert Failed! Please try again...");
				 	return false;
				}else{
				 	$(".response").html("Site Added Successfully.");
				 	return false;
				}
			}
			});
			
		}
		
	}); // End of Add New Site

	

    $('#photoimg').live('change', function()	{ 
    	   var showResponse  = '';
			    $("#preview").html('');
			    
			    var options = { 
			    	    url: 'application/libraries/external/ajaximage.php', 
						target: '#preview',
						method:"POST",
			    	    success:    function(showResponse){
			    		}
			    }; 
			    
			    $("#logForm").ajaxForm( options).submit();
			    
	});
   
    
    $("#sites").live('change', function(){

    	var current_site = $(this).val();

    	$.cookie('current_site', current_site, {path:'/'});

    	window.location.reload();
    	
    });

    $("#client_info").live('change', function(){
    	var user_api_key = $(this).val();
    	
		var params = "api="+user_api_key;
		 $.ajax({
	            type: "POST",
	            url: "index.php?/clients/view",
	            data: params,
	            async: false,
	            success: function(sresponse) {
			 	alert(sresponse);
			 	}
		});
    	
    });

    
    $("#add_pause").click(function(){
    	
    	var title = $("#pause_title").val();
    	var start = $("#pause_start").val();
    	var end = $("#pause_end").val();
    	
    	if(title.length == 0 || start.length == 0 || end.langth == 0)
    	{
    		return false;
    	}
    	
    	
		var params = "title="+title+"&start="+start+"&end="+end;
		 $.ajax({
	            type: "POST",
	            url: "index.php?/resume/add_pause_action",
	            data: params,
	            async: false,
	            success: function(sresponse) {
			 
			 		if(sresponse > 0)
			 		{
			 			window.location.reload();
			 			
			 		}
			 	}
		});
    	
    });

}); 

function list_of_pause()
{
	
	 $.ajax({
         type: "POST",
         url: "index.php?/resume/index",
         async: false,
         success: function(sresponse) {
		 }
	});
	 
}