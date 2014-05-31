$( function() {
		$( '.logForm' ).ipValidate( {

			required : { //required is a class
				rule : function() {
					return $( this ).val() == '' ? false : true;
				},
				onError : function() {
					if( !$( this ).parent().hasClass( 'element_container' ) ) {
						$( this ).wrap( '<div class="element_container error_div"></div>' ).after( '<span>' + $( this ).attr( 'rel' ) + '</span>' );
					} else if( !$( this ).parent().hasClass( 'error_div' ) ) {
						$( this ).next().text( $( this ).attr( 'rel' ) ).parent().addClass( 'error_div' );
					}
				},
				onValid : function() {
					$( this ).next().text( '' ).parent().removeClass( 'error_div' );
					$(this).focus();
				}
			},


			nonzero : { //nonzero is a class

				rule : function() {
					return $( this ).val() == 0 ? false : true;
				},
				onError : function() {
					$( this ).css( 'border', '4px solid #F7ACAC' );
				},
				onValid : function() {
					$( this ).css( 'border', '4px solid #dbdbdb' );
				}
			},

			postOptions : {  //postOptions is a class

				rule : function() {
					return $( 'input[type=checkbox]:checked' ).length < 1 ? false : true;
				},
				onError : function() {
					$( '.chk_div', this ).css( 'border', '4px solid #F7ACAC' );
				},
				onValid : function() {
					$( '.chk_div', this ).css( 'border', '4px solid #dbdbdb' );
				}
			},

			submitHandler : function() {
				
				return true;
				
			}
		});
		
	});


$(document).ready(function() { 
		
    $(".update_user-btn").click(function(){
    	document.logForm.submit();
    });

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