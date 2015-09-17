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
	
	$('#guardian_form').submit(function()
	{
				
		/* --- Funeral guardian detail vaildation -- */
			
		var guardian_hidden = parseInt($('#guardian_hidden').val());
		
		for(var i=1;i<=guardian_hidden;i++)
		{
			if($('#f_name'+i).val() == '')
			{	
				alert('Please enter first name');
				$("#f_name"+i).css("background-color", "yellow");
				$("#f_name"+i).focus();
				return false;
			}
			else
			{
				$("#f_name"+i).css("background-color", "");
			}
			
			/*if($('#m_name'+i).val() == '')
			{	
				alert('Please enter middle name');
				$("#m_name"+i).css("background-color", "yellow");
				$("#m_name"+i).focus();
				return false;
			}
			else
			{
				$("#m_name"+i).css("background-color", "");
			}*/
			
			if($('#l_name'+i).val() == '')
			{	
				alert('Please enter last name');
				$("#l_name"+i).css("background-color", "yellow");
				$("#l_name"+i).focus();
				return false;
			}
			else
			{
				$("#l_name"+i).css("background-color", "");
			}
			
			if($('#address1_'+i).val() == '')
			{	
				alert('Please enter address');
				$("#address1_"+i).css("background-color", "yellow");
				$("#address1_"+i).focus();
				return false;
			}
			else
			{
				$("#address1_"+i).css("background-color", "");
			}
			
			if($('#state'+i).val() == '')
			{	
				alert('Please enter state/province');
				$("#state"+i).css("background-color", "yellow");
				$("#state"+i).focus();
				return false;
			}
			else
			{
				$("#state"+i).css("background-color", "");
			}
			
			if($('#postcode'+i).val() == '')
			{	
				alert('Please enter postcode');
				$("#postcode"+i).css("background-color", "yellow");
				$("#postcode"+i).focus();
				return false;
			}
			else
			{
				$("#postcode"+i).css("background-color", "");
			}
			
			if($('#country'+i).val() == '0')
			{	
				alert('Please enter country');
				$("#country"+i).css("background-color", "yellow");
				$("#country"+i).focus();
				return false;
			}
			else
			{
				$("#country"+i).css("background-color", "");
			}
			
			if($('#telephone'+i).val() == '')
			{	
				alert('Please enter telephone no.');
				$("#telephone"+i).css("background-color", "yellow");
				$("#telephone"+i).focus();
				return false;
			}
			else
			{
				$("#telephone"+i).css("background-color", "");
			}
			
			if($('#mobile'+i).val() == '')
			{	
				alert('Please enter mobile no.');
				$("#mobile"+i).css("background-color", "yellow");
				$("#mobile"+i).focus();
				return false;
			}
			else
			{
				$("#mobile"+i).css("background-color", "");
			}
			
			if (!validateEmail($('#email'+i).val())) 
			{
				alert('Please enter valid email address');
				$("#email"+i).css("background-color", "yellow");
				$("#email"+i).focus();
				return false;
			}
			else
			{
				$("#email"+i).css("background-color", "");
			}
			
		}
					
		/* --- End of guardian detail validation -- */		
		
		
		if(!$("#terms").attr('checked'))
		{
			alert('Please tick terms and condition');
			return false;
		}
		
							
	});
							
							
							
							
});