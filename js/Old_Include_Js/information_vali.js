$(document).ready(function (){  
	
	$('.infoform').submit(function()
	{
		/* Family and friends validation */
		var family_hidden = parseInt($('#family_hidden').val());
		
		for(var i=1;i<=family_hidden;i++)
		{
			if($('#name'+i).val() == '')
			{
				alert('Please enter name');
				$('#name'+i).attr('style','background-color: yellow;')
				$('#name'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=family_hidden;i++)
		{
			if($('#realtionship'+i).val() == '')
			{
				alert('Please enter realtionship');
				$('#realtionship'+i).attr('style','background-color: yellow;')
				$('#realtionship'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=family_hidden;i++)
		{
			if($('#telephoneno'+i).val() == '')
			{
				alert('Please enter telephone no');
				$('#telephoneno'+i).attr('style','background-color: yellow;')
				$('#telephoneno'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* Important contacts validation */
		var contact_hidden = parseInt($('#contact_hidden').val());
		
		for(var i=1;i<=contact_hidden;i++)
		{
			if($('#contact_category'+i).val() == 0)
			{
				alert('Please enter category');
				$('#contact_category'+i).attr('style','background-color: yellow;')
				$('#contact_category'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=contact_hidden;i++)
		{
			if($('#contact_name'+i).val() == '')
			{
				alert('Please enter contact name');
				$('#contact_name'+i).attr('style','background-color: yellow;')
				$('#contact_name'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=contact_hidden;i++)
		{
			if($('#contact_phone'+i).val() == '')
			{
				alert('Please enter phone no');
				$('#contact_phone'+i).attr('style','background-color: yellow;')
				$('#contact_phone'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* service provider validation */
		var service_provider_hidden = parseInt($('#service_provider_hidden').val());
		
		for(var i=1;i<=service_provider_hidden;i++)
		{
			if($('#category'+i).val() == 0)
			{
				alert('Please enter category');
				$('#category'+i).attr('style','background-color: yellow;')
				$('#category'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=service_provider_hidden;i++)
		{
			if($('#provider_name'+i).val() == '')
			{
				alert('Please enter provider name');
				$('#provider_name'+i).attr('style','background-color: yellow;')
				$('#provider_name'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=service_provider_hidden;i++)
		{
			if($('#provider_ref'+i).val() == '')
			{
				alert('Please enter provider reference');
				$('#provider_ref'+i).attr('style','background-color: yellow;')
				$('#provider_ref'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=service_provider_hidden;i++)
		{
			if($('#provider_telephone'+i).val() == '')
			{
				alert('Please enter phone no');
				$('#provider_telephone'+i).attr('style','background-color: yellow;')
				$('#provider_telephone'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* Insurance company validation */
		var insurance_hidden = parseInt($('#insurance_hidden').val());
		
		for(var i=1;i<=insurance_hidden;i++)
		{
			if($('#insurance_category'+i).val() == 0)
			{
				alert('Please enter category');
				$('#insurance_category'+i).attr('style','background-color: yellow;')
				$('#insurance_category'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=insurance_hidden;i++)
		{
			if($('#insurance_policy'+i).val() == '')
			{
				alert('Please enter policy');
				$('#insurance_policy'+i).attr('style','background-color: yellow;')
				$('#insurance_policy'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=insurance_hidden;i++)
		{
			if($('#insurance_company'+i).val() == '')
			{
				alert('Please enter company name');
				$('#insurance_company'+i).attr('style','background-color: yellow;')
				$('#insurance_company'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=insurance_hidden;i++)
		{
			if($('#insurance_contact'+i).val() == '')
			{
				alert('Please enter phone no');
				$('#insurance_contact'+i).attr('style','background-color: yellow;')
				$('#insurance_contact'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* Bank validation */
		var bank_hidden = parseInt($('#bank_hidden').val());
		
		for(var i=1;i<=bank_hidden;i++)
		{
			if($('#account_type'+i).val() == 0)
			{
				alert('Please enter account type');
				$('#account_type'+i).attr('style','background-color: yellow;')
				$('#account_type'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=bank_hidden;i++)
		{
			if($('#account_no'+i).val() == '')
			{
				alert('Please enter account no');
				$('#account_no'+i).attr('style','background-color: yellow;')
				$('#account_no'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=bank_hidden;i++)
		{
			if($('#bank_name'+i).val() == '')
			{
				alert('Please enter bank name');
				$('#bank_name'+i).attr('style','background-color: yellow;')
				$('#bank_name'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* Investment validation */
		var investment_hidden = parseInt($('#investment_hidden').val());
		
		for(var i=1;i<=investment_hidden;i++)
		{
			if($('#investment_type1'+i).val() == 0)
			{
				alert('Please enter account type');
				$('#investment_type'+i).attr('style','background-color: yellow;')
				$('#investment_type'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=investment_hidden;i++)
		{
			if($('#investment_account_no'+i).val() == '')
			{
				alert('Please enter account no');
				$('#investment_account_no'+i).attr('style','background-color: yellow;')
				$('#investment_account_no'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=investment_hidden;i++)
		{
			if($('#institution_name'+i).val() == '')
			{
				alert('Please enter institution name');
				$('#institution_name'+i).attr('style','background-color: yellow;')
				$('#institution_name'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* Property validation */
		var property_hidden = parseInt($('#property_hiddenv').val());
		
		for(var i=1;i<=property_hidden;i++)
		{
			if($('#property_type'+i).val() == 0)
			{
				alert('Please enter property type');
				$('#property_type'+i).attr('style','background-color: yellow;')
				$('#property_type'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=property_hidden;i++)
		{
			if($('#property_description'+i).val() == '')
			{
				alert('Please enter description');
				$('#property_description'+i).attr('style','background-color: yellow;')
				$('#property_description'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=property_hidden;i++)
		{
			if($('#property_location'+i).val() == '')
			{
				alert('Please enter location');
				$('#property_location'+i).attr('style','background-color: yellow;')
				$('#property_location'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* Pension validation */
		var pension_hidden = parseInt($('#pension_hidden').val());
		
		for(var i=1;i<=pension_hidden;i++)
		{
			if($('#pension_type'+i).val() == 0)
			{
				alert('Please enter pension type');
				$('#pension_type'+i).attr('style','background-color: yellow;')
				$('#pension_type'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=pension_hidden;i++)
		{
			if($('#pension_account_no'+i).val() == '')
			{
				alert('Please enter account no');
				$('#pension_account_no'+i).attr('style','background-color: yellow;')
				$('#pension_account_no'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=pension_hidden;i++)
		{
			if($('#organisation_name'+i).val() == '')
			{
				alert('Please enter organisation name');
				$('#organisation_name'+i).attr('style','background-color: yellow;')
				$('#organisation_name'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		/* Property validation */
		var property_hidden = parseInt($('#property_hidden').val());
		
		for(var i=1;i<=property_hidden;i++)
		{
			if($('#property_type'+i).val() == 0)
			{
				alert('Please enter property type');
				$('#property_type'+i).attr('style','background-color: yellow;')
				$('#property_type'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=property_hidden;i++)
		{
			if($('#property_description'+i).val() == '')
			{
				alert('Please enter description');
				$('#property_description'+i).attr('style','background-color: yellow;')
				$('#property_description'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=property_hidden;i++)
		{
			if($('#property_location'+i).val() == '')
			{
				alert('Please enter location');
				$('#property_location'+i).attr('style','background-color: yellow;')
				$('#property_location'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		/* loan validation */
		var loan_hidden = parseInt($('#loan_hidden').val());
		
		for(var i=1;i<=loan_hidden;i++)
		{
			if($('#loan_account_type'+i).val() == 0)
			{
				alert('Please enter loan type');
				$('#loan_account_type'+i).attr('style','background-color: yellow;')
				$('#loan_account_type'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=loan_hidden;i++)
		{
			if($('#loan_account'+i).val() == '')
			{
				alert('Please enter loan account');
				$('#loan_account'+i).attr('style','background-color: yellow;')
				$('#loan_account'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=loan_hidden;i++)
		{
			if($('#lender_name'+i).val() == '')
			{
				alert('Please enter lender name');
				$('#lender_name'+i).attr('style','background-color: yellow;')
				$('#lender_name'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* credit card validation */
		var credit_hidden = parseInt($('#credit_hidden').val());
		
		for(var i=1;i<=credit_hidden;i++)
		{
			if($('#credit_company'+i).val() == '')
			{
				alert('Please enter company name');
				$('#credit_company'+i).attr('style','background-color: yellow;')
				$('#credit_company'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=credit_hidden;i++)
		{
			if($('#credit_card'+i).val() == '')
			{
				alert('Please enter credit card no');
				$('#credit_card'+i).attr('style','background-color: yellow;')
				$('#credit_card'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=credit_hidden;i++)
		{
			if($('#exp_date'+i).val() == '')
			{
				alert('Please enter expiry date');
				$('#exp_date'+i).attr('style','background-color: yellow;')
				$('#exp_date'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=credit_hidden;i++)
		{
			if($('#credit_phone'+i).val() == '')
			{
				alert('Please enter phone no');
				$('#credit_phone'+i).attr('style','background-color: yellow;')
				$('#credit_phone'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		/* social media validation */
		var social_hidden = parseInt($('#social_hidden').val());
		
		for(var i=1;i<=social_hidden;i++)
		{
			if($('#social_category'+i).val() == 0)
			{
				alert('Please enter category');
				$('#social_category'+i).attr('style','background-color: yellow;')
				$('#social_category'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=social_hidden;i++)
		{
			if($('#username'+i).val() == '')
			{
				alert('Please enter username');
				$('#username'+i).attr('style','background-color: yellow;')
				$('#username'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=social_hidden;i++)
		{
			if($('#password'+i).val() == '')
			{
				alert('Please enter password');
				$('#password'+i).attr('style','background-color: yellow;')
				$('#password'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		/* Pets validation */
		var pet_hidden = parseInt($('#pet_hidden').val());
		
		for(var i=1;i<=pet_hidden;i++)
		{
			if($('#pet_category'+i).val() == 0)
			{
				alert('Please enter pet category');
				$('#pet_category'+i).attr('style','background-color: yellow;')
				$('#pet_category'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=pet_hidden;i++)
		{
			if($('#pet_name'+i).val() == '')
			{
				alert('Please enter pet name');
				$('#pet_name'+i).attr('style','background-color: yellow;')
				$('#pet_name'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=pet_hidden;i++)
		{
			if($('#pet_sex'+i).val() == '')
			{
				alert('Please enter pet sex');
				$('#pet_sex'+i).attr('style','background-color: yellow;')
				$('#pet_sex'+i).focus();
				return false;
			}
		}
		
		for(var i=1;i<=pet_hidden;i++)
		{
			if($('#pet_notes'+i).val() == '')
			{
				alert('Please enter special notes');
				$('#pet_notes'+i).attr('style','background-color: yellow;')
				$('#pet_notes'+i).focus();
				return false;
			}
		}
		
		
		/* -------------------------------- */
		
		
		
	});
	
	
							
});