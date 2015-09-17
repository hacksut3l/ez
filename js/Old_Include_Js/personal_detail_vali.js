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
		
	$('#person_detail_form').submit(function()
	{
		
		if($('#f_name').val() == '')
		{	
			alert('Please enter your first name');
			$("#f_name").css("background-color", "yellow");
			$("#f_name").focus();
			return false;
		}
		else
		{
			$("#f_name").css("background-color", "");
		}
		
		/*if($('#m_name').val() == '')
		{	
			alert('Please enter your middle name');
			$("#m_name").css("background-color", "yellow");
			$("#m_name").focus();
			return false;
		}
		else
		{
			$("#m_name").css("background-color", "");
		}*/
		
		if($('#l_name').val() == '')
		{	
			alert('Please enter your last name');
			$("#l_name").css("background-color", "yellow");
			$("#l_name").focus();
			return false;
		}
		else
		{
			$("#l_name").css("background-color", "");
		}
		
		if($('#address1').val() == '')
		{	
			alert('Please enter your addess');
			$("#address1").css("background-color", "yellow");
			$("#address1").focus();
			return false;
		}
		else
		{
			$("#address1").css("background-color", "");
		}
		
		if($('#state').val() == '')
		{	
			alert('Please enter your state/province');
			$("#state").css("background-color", "yellow");
			$("#state").focus();
			return false;
		}
		else
		{
			$("#state").css("background-color", "");
		}
		
		if($('#postcode').val() == '')
		{	
			alert('Please enter your postcode');
			$("#postcode").css("background-color", "yellow");
			$("#postcode").focus();
			return false;
		}
		else
		{
			$("#postcode").css("background-color", "");
		}
		
		if($('#country').val() == '0')
		{	
			alert('Please enter your country');
			$("#country").css("background-color", "yellow");
			$("#country").focus();
			return false;
		}
		else
		{
			$("#country").css("background-color", "");
		}
		
		if($('#telephone').val() == '')
		{	
			alert('Please enter your telephone no');
			$("#telephone").css("background-color", "yellow");
			$("#telephone").focus();
			return false;
		}
		else
		{
			$("#telephone").css("background-color", "");
		}
		
		if($('#mobile').val() == '')
		{	
			alert('Please enter your mobile no');
			$("#mobile").css("background-color", "yellow");
			$("#mobile").focus();
			return false;
		}
		else
		{
			$("#mobile").css("background-color", "");
		}
		
		
		if (!validateEmail($('#email').val())) 
		{
            alert('Please enter valid email address');
			$("#email").css("background-color", "yellow");
			$("#email").focus();
			return false;
        }
		else
		{
			$("#email").css("background-color", "");
		}
		
		if($('#searchsdate').val() == '')
		{	
			alert('Please enter your date of birth');
			$("#searchsdate").css("background-color", "yellow");
			$("#searchsdate").focus();
			return false;
		}
		else
		{
			$("#searchsdate").css("background-color", "");
		}
		
		
		if($('#pob').val() == '')
		{	
			alert('Please enter your place of birth');
			$("#pob").css("background-color", "yellow");
			$("#pob").focus();
			return false;
		}
		else
		{
			$("#pob").css("background-color", "");
		}
		
		if($('#cob').val() == '0')
		{	
			alert('Please enter your country of birth');
			$("#cob").css("background-color", "yellow");
			$("#cob").focus();
			return false;
		}
		else
		{
			$("#cob").css("background-color", "");
		}
		
		if($('#occuption').val() == '')
		{	
			alert('Please enter your occuption');
			$("#occuption").css("background-color", "yellow");
			$("#occuption").focus();
			return false;
		}
		else
		{
			$("#occuption").css("background-color", "");
		}
		
		if($('#religion').val() == '')
		{	
			alert('Please enter your religion');
			$("#religion").css("background-color", "yellow");
			$("#religion").focus();
			return false;
		}
		else
		{
			$("#religion").css("background-color", "");
		}
		
		
		/* --- Children detail vaildation -- */
		
		var children_hidden = parseInt($('#children_hidden').val());
		
		for(var i=1;i<=children_hidden;i++)
		{
			if($('#children_name'+i).val() == '')
			{	
				alert('Please enter children name');
				$("#children_name"+i).css("background-color", "yellow");
				$("#children_name"+i).focus();
				return false;
			}
			else
			{
				$("#children_name"+i).css("background-color", "");
			}
			
			if($('#children_dob'+i).val() == '')
			{	
				alert('Please enter children date of birth');
				$("#children_dob"+i).css("background-color", "yellow");
				$("#children_dob"+i).focus();
				return false;
			}
			else
			{
				$("#children_dob"+i).css("background-color", "");
			}
			
		}
		
		/* --- End of children detail validation -- */
		
		
		
		
		/* --- Kin detail vaildation -- */
		
		var kin_hidden = parseInt($('#kin_hidden').val());
		
		for(var i=1;i<=kin_hidden;i++)
		{
			if($('#kin_fname'+i).val() == '')
			{	
				alert('Please enter Kin first name');
				$("#kin_fname"+i).css("background-color", "yellow");
				$("#kin_fname"+i).focus();
				return false;
			}
			else
			{
				$("#kin_fname"+i).css("background-color", "");
			}
			
			/*if($('#kin_mname'+i).val() == '')
			{	
				alert('Please enter Kin middle name');
				$("#kin_mname"+i).css("background-color", "yellow");
				$("#kin_mname"+i).focus();
				return false;
			}
			else
			{
				$("#kin_mname"+i).css("background-color", "");
			}*/
			
			if($('#kin_lname'+i).val() == '')
			{	
				alert('Please enter Kin last name');
				$("#kin_lname"+i).css("background-color", "yellow");
				$("#kin_lname"+i).focus();
				return false;
			}
			else
			{
				$("#kin_lname"+i).css("background-color", "");
			}
			
			if($('#kin_address1_'+i).val() == '')
			{	
				alert('Please enter Kin address');
				$("#kin_address1_"+i).css("background-color", "yellow");
				$("#kin_address1_"+i).focus();
				return false;
			}
			else
			{
				$("#kin_address1_"+i).css("background-color", "");
			}
			
			if($('#kin_state'+i).val() == '')
			{	
				alert('Please enter Kin state/province');
				$("#kin_state"+i).css("background-color", "yellow");
				$("#kin_state"+i).focus();
				return false;
			}
			else
			{
				$("#kin_state"+i).css("background-color", "");
			}
			
			if($('#kin_postcode'+i).val() == '')
			{	
				alert('Please enter Kin postcode');
				$("#kin_postcode"+i).css("background-color", "yellow");
				$("#kin_postcode"+i).focus();
				return false;
			}
			else
			{
				$("#kin_postcode"+i).css("background-color", "");
			}
			
			if($('#kin_country'+i).val() == '0')
			{	
				alert('Please enter Kin country');
				$("#kin_country"+i).css("background-color", "yellow");
				$("#kin_country"+i).focus();
				return false;
			}
			else
			{
				$("#kin_country"+i).css("background-color", "");
			}
			
			if($('#kin_telephone'+i).val() == '')
			{	
				alert('Please enter Kin telephone no.');
				$("#kin_telephone"+i).css("background-color", "yellow");
				$("#kin_telephone"+i).focus();
				return false;
			}
			else
			{
				$("#kin_telephone"+i).css("background-color", "");
			}
			
			if($('#kin_mobile'+i).val() == '')
			{	
				alert('Please enter Kin mobile no.');
				$("#kin_mobile"+i).css("background-color", "yellow");
				$("#kin_mobile"+i).focus();
				return false;
			}
			else
			{
				$("#kin_mobile"+i).css("background-color", "");
			}
			
			if (!validateEmail($('#kin_email'+i).val())) 
			{
				alert('Please enter valid email address');
				$("#kin_email"+i).css("background-color", "yellow");
				$("#kin_email"+i).focus();
				return false;
			}
			else
			{
				$("#kin_email"+i).css("background-color", "");
			}
			
			if($('#kin_realtionship'+i).val() == '')
			{	
				alert('Please enter Kin relationship to you');
				$("#kin_realtionship"+i).css("background-color", "yellow");
				$("#kin_realtionship"+i).focus();
				return false;
			}
			else
			{
				$("#kin_realtionship"+i).css("background-color", "");
			}
			
		}
		
		/* --- End of Kin detail validation -- */
		
		/* --- Doctor detail validation -- */
		
		if($('#doc_fname').val() == '')
		{	
			alert('Please enter doctor first name');
			$("#doc_fname").css("background-color", "yellow");
			$("#doc_fname").focus();
			return false;
		}
		else
		{
			$("#doc_fname").css("background-color", "");
		}
		
		if($('#doc_lname').val() == '')
		{	
			alert('Please enter doctor last name');
			$("#doc_lname").css("background-color", "yellow");
			$("#doc_lname").focus();
			return false;
		}
		else
		{
			$("#doc_lname").css("background-color", "");
		}
		
		if($('#doc_address1').val() == '')
		{	
			alert('Please enter doctor addess');
			$("#doc_address1").css("background-color", "yellow");
			$("#doc_address1").focus();
			return false;
		}
		else
		{
			$("#doc_address1").css("background-color", "");
		}
		
		if($('#doc_state').val() == '')
		{	
			alert('Please enter doctor state/province');
			$("#doc_state").css("background-color", "yellow");
			$("#doc_state").focus();
			return false;
		}
		else
		{
			$("#doc_state").css("background-color", "");
		}
		
		if($('#doc_postcode').val() == '')
		{	
			alert('Please enter doctor postcode');
			$("#doc_postcode").css("background-color", "yellow");
			$("#doc_postcode").focus();
			return false;
		}
		else
		{
			$("#doc_postcode").css("background-color", "");
		}
		
		if($('#doc_country').val() == '0')
		{	
			alert('Please enter doctor country');
			$("#doc_country").css("background-color", "yellow");
			$("#doc_country").focus();
			return false;
		}
		else
		{
			$("#doc_country").css("background-color", "");
		}
		
		if($('#doc_telephone').val() == '')
		{	
			alert('Please enter doctor telephone no');
			$("#doc_telephone").css("background-color", "yellow");
			$("#doc_telephone").focus();
			return false;
		}
		else
		{
			$("#doc_telephone").css("background-color", "");
		}
		
		if($('#doc_mobile').val() == '')
		{	
			alert('Please enter doctor mobile no');
			$("#doc_mobile").css("background-color", "yellow");
			$("#doc_mobile").focus();
			return false;
		}
		else
		{
			$("#doc_mobile").css("background-color", "");
		}
		
		
		if (!validateEmail($('#doc_email').val())) 
		{
            alert('Please enter valid email address');
			$("#doc_email").css("background-color", "yellow");
			$("#doc_email").focus();
			return false;
        }
		else
		{
			$("#doc_email").css("background-color", "");
		}
		
		/* --- End of Doctor detail validation -- */
		
		if($('#will_location').val() == '')
		{	
			alert('Please enter Will location');
			$("#will_location").css("background-color", "yellow");
			$("#will_location").focus();
			return false;
		}
		else
		{
			$("#will_location").css("background-color", "");
		}
		
		/* --- Executor detail validation -- */
		
		if($('#executor_fname').val() == '')
		{	
			alert('Please enter executor first name');
			$("#executor_fname").css("background-color", "yellow");
			$("#executor_fname").focus();
			return false;
		}
		else
		{
			$("#executor_fname").css("background-color", "");
		}
		
		if($('#executor_lname').val() == '')
		{	
			alert('Please enter executor last name');
			$("#executor_lname").css("background-color", "yellow");
			$("#executor_lname").focus();
			return false;
		}
		else
		{
			$("#executor_lname").css("background-color", "");
		}
		
		if($('#executor_address1').val() == '')
		{	
			alert('Please enter executor addess');
			$("#executor_address1").css("background-color", "yellow");
			$("#executor_address1").focus();
			return false;
		}
		else
		{
			$("#executor_address1").css("background-color", "");
		}
		
		if($('#executor_state').val() == '')
		{	
			alert('Please enter executor state/province');
			$("#executor_state").css("background-color", "yellow");
			$("#executor_state").focus();
			return false;
		}
		else
		{
			$("#executor_state").css("background-color", "");
		}
		
		if($('#executor_postcode').val() == '')
		{	
			alert('Please enter executor postcode');
			$("#executor_postcode").css("background-color", "yellow");
			$("#executor_postcode").focus();
			return false;
		}
		else
		{
			$("#executor_postcode").css("background-color", "");
		}
		
		if($('#executor_country').val() == '0')
		{	
			alert('Please enter executor country');
			$("#executor_country").css("background-color", "yellow");
			$("#executor_country").focus();
			return false;
		}
		else
		{
			$("#executor_country").css("background-color", "");
		}
		
		if($('#executor_telephone').val() == '')
		{	
			alert('Please enter executor telephone no');
			$("#executor_telephone").css("background-color", "yellow");
			$("#executor_telephone").focus();
			return false;
		}
		else
		{
			$("#executor_telephone").css("background-color", "");
		}
		
		if($('#executor_mobile').val() == '')
		{	
			alert('Please enter executor mobile no');
			$("#executor_mobile").css("background-color", "yellow");
			$("#executor_mobile").focus();
			return false;
		}
		else
		{
			$("#executor_mobile").css("background-color", "");
		}
		
		
		if (!validateEmail($('#executor_email').val())) 
		{
            alert('Please enter valid email address');
			$("#executor_email").css("background-color", "yellow");
			$("#executor_email").focus();
			return false;
        }
		else
		{
			$("#executor_email").css("background-color", "");
		}
		
		/* --- End of Executor detail validation -- */
		
		
		/* --- Solicitor detail validation -- */
		
		if($('#solicitor_fname').val() == '')
		{	
			alert('Please enter Solicitor first name');
			$("#solicitor_fname").css("background-color", "yellow");
			$("#solicitor_fname").focus();
			return false;
		}
		else
		{
			$("#solicitor_fname").css("background-color", "");
		}
		
		if($('#solicitor_lname').val() == '')
		{	
			alert('Please enter Solicitor last name');
			$("#solicitor_lname").css("background-color", "yellow");
			$("#solicitor_lname").focus();
			return false;
		}
		else
		{
			$("#solicitor_lname").css("background-color", "");
		}
		
		if($('#solicitor_address1').val() == '')
		{	
			alert('Please enter Solicitor addess');
			$("#solicitor_address1").css("background-color", "yellow");
			$("#solicitor_address1").focus();
			return false;
		}
		else
		{
			$("#solicitor_address1").css("background-color", "");
		}
		
		if($('#solicitor_state').val() == '')
		{	
			alert('Please enter Solicitor state/province');
			$("#solicitor_state").css("background-color", "yellow");
			$("#solicitor_state").focus();
			return false;
		}
		else
		{
			$("#solicitor_state").css("background-color", "");
		}
		
		if($('#solicitor_postcode').val() == '')
		{	
			alert('Please enter Solicitor postcode');
			$("#solicitor_postcode").css("background-color", "yellow");
			$("#solicitor_postcode").focus();
			return false;
		}
		else
		{
			$("#solicitor_postcode").css("background-color", "");
		}
		
		if($('#solicitor_country').val() == '0')
		{	
			alert('Please enter Solicitor country');
			$("#solicitor_country").css("background-color", "yellow");
			$("#solicitor_country").focus();
			return false;
		}
		else
		{
			$("#solicitor_country").css("background-color", "");
		}
		
		if($('#solicitor_telephone').val() == '')
		{	
			alert('Please enter Solicitor telephone no');
			$("#solicitor_telephone").css("background-color", "yellow");
			$("#solicitor_telephone").focus();
			return false;
		}
		else
		{
			$("#solicitor_telephone").css("background-color", "");
		}
		
		if($('#solicitor_mobile').val() == '')
		{	
			alert('Please enter Solicitor mobile no');
			$("#solicitor_mobile").css("background-color", "yellow");
			$("#solicitor_mobile").focus();
			return false;
		}
		else
		{
			$("#solicitor_mobile").css("background-color", "");
		}
		
		
		if (!validateEmail($('#solicitor_email').val())) 
		{
            alert('Please enter valid email address');
			$("#solicitor_email").css("background-color", "yellow");
			$("#solicitor_email").focus();
			return false;
        }
		else
		{
			$("#solicitor_email").css("background-color", "");
		}
		
		/* --- End of Solicitor detail validation -- */
		
		
		
		/* --- Family detail vaildation -- */
		
		var family_hidden = parseInt($('#family_hidden').val());
		
		for(var i=1;i<=family_hidden;i++)
		{
			if($('#family_fname'+i).val() == '')
			{	
				alert('Please enter family and friends first name');
				$("#family_fname"+i).css("background-color", "yellow");
				$("#family_fname"+i).focus();
				return false;
			}
			else
			{
				$("#family_fname"+i).css("background-color", "");
			}
			
			/*if($('#family_mname'+i).val() == '')
			{	
				alert('Please enter family and friends middle name');
				$("#family_mname"+i).css("background-color", "yellow");
				$("#family_mname"+i).focus();
				return false;
			}
			else
			{
				$("#family_mname"+i).css("background-color", "");
			}*/
			
			if($('#family_lname'+i).val() == '')
			{	
				alert('Please enter family and friends last name');
				$("#family_lname"+i).css("background-color", "yellow");
				$("#family_lname"+i).focus();
				return false;
			}
			else
			{
				$("#family_lname"+i).css("background-color", "");
			}
			
			if($('#family_address1_'+i).val() == '')
			{	
				alert('Please enter family and friends address');
				$("#family_address1_"+i).css("background-color", "yellow");
				$("#family_address1_"+i).focus();
				return false;
			}
			else
			{
				$("#family_address1_"+i).css("background-color", "");
			}
			
			if($('#family_state'+i).val() == '')
			{	
				alert('Please enter family and friends state/province');
				$("#family_state"+i).css("background-color", "yellow");
				$("#family_state"+i).focus();
				return false;
			}
			else
			{
				$("#family_state"+i).css("background-color", "");
			}
			
			if($('#family_postcode'+i).val() == '')
			{	
				alert('Please enter family and friends postcode');
				$("#family_postcode"+i).css("background-color", "yellow");
				$("#family_postcode"+i).focus();
				return false;
			}
			else
			{
				$("#family_postcode"+i).css("background-color", "");
			}
			
			if($('#family_country'+i).val() == '0')
			{	
				alert('Please enter family and friends country');
				$("#family_country"+i).css("background-color", "yellow");
				$("#family_country"+i).focus();
				return false;
			}
			else
			{
				$("#family_country"+i).css("background-color", "");
			}
			
			if($('#family_telephone'+i).val() == '')
			{	
				alert('Please enter family and friends telephone no.');
				$("#family_telephone"+i).css("background-color", "yellow");
				$("#family_telephone"+i).focus();
				return false;
			}
			else
			{
				$("#family_telephone"+i).css("background-color", "");
			}
			
			if($('#family_mobile'+i).val() == '')
			{	
				alert('Please enter family and friends mobile no.');
				$("#family_mobile"+i).css("background-color", "yellow");
				$("#family_mobile"+i).focus();
				return false;
			}
			else
			{
				$("#kin_mobile"+i).css("background-color", "");
			}
			
			if (!validateEmail($('#family_email'+i).val())) 
			{
				alert('Please enter valid email address');
				$("#family_email"+i).css("background-color", "yellow");
				$("#family_email"+i).focus();
				return false;
			}
			else
			{
				$("#family_email"+i).css("background-color", "");
			}
			
			if($('#family_realtionship'+i).val() == '')
			{	
				alert('Please enter family and friends relationship to you');
				$("#family_realtionship"+i).css("background-color", "yellow");
				$("#family_realtionship"+i).focus();
				return false;
			}
			else
			{
				$("#family_realtionship"+i).css("background-color", "");
			}
			
		}
		
		/* --- End of Family detail validation -- */
		
		
		if(!$("#certify").attr('checked'))
		{
			alert('Please tick certify');
			return false;
		}
		
		if(!$("#terms").attr('checked'))
		{
			alert('Please tick terms and condition');
			return false;
		}
		
		
		
	});
	
	
	




							
							
});