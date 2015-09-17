function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

$(document).ready(function (){
							
	$('#advance_after_form').submit(function()
	{		
		if($('#is_wake').is(":checked"))
		{ 
         	if($('#wake').val() == '')
			{	
				alert('Please enter type of funeral wake');
				$("#wake").css("background-color", "yellow");
				$("#wake").focus();
				return false;
			}
			else
			{
				$("#wake").css("background-color", "");
			}
        }
		
		
		if($('#is_ashes').is(":checked"))
		{ 
         	if($('#ash_loc_other').is(":checked"))
			{	
				if($('#ash_other_loc').val() == '')
				{
					alert('Please enter ashes scattered location');
					$("#ash_other_loc").css("background-color", "yellow");
					$("#ash_other_loc").focus();
					return false;
				}
				else
				{
					$("#ash_other_loc").css("background-color", "");
				}
			}
			
        }	
		
		
		if($('#is_burried_ash').is(":checked"))
		{ 
         	if($('#burried_ash_loc_other').is(":checked"))
			{	
				if($('#burried_ash_other').val() == '')
				{
					alert('Please enter place where ashes to be buried');
					$("#burried_ash_other").css("background-color", "yellow");
					$("#burried_ash_other").focus();
					return false;
				}
				else
				{
					$("#burried_ash_other").css("background-color", "");
				}
			}
			
        }
		
		
		if($('#headstone').is(":checked"))
		{ 
         	if($('#headstone_written').val() == '')
			{	
				alert('Please enter marker/headstone on your inscription');
				$("#headstone_written").css("background-color", "yellow");
				$("#headstone_written").focus();
				return false;
			}
			else
			{
				$("#headstone_written").css("background-color", "");
			}
        }
		
		
		
		
	});
	
	
							
});