$(document).ready(function (){  
							
	$('#family_add_button').live("click",function()
	{
		var row = parseInt($('#family_hidden').val());
		
		var new_row = row + 1;
		
		$('#family_table').append('<tr><td><input type="text" id="name'+new_row+'" name="name'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="realtionship'+new_row+'" name="realtionship'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="telephoneno'+new_row+'" name="telephoneno'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="family_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#family_hidden').val(new_row);
		
		
	});
	
	
	
	$('#contact_add_button').live("click",function()
	{
		var row = parseInt($('#contact_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='contact_category"+new_row+"' class= 'selectcont' id='contact_category"+new_row+"'>"
		items += "<option value='0'>Select Category</option>"
		items += "<option value='executor'>Executor/Administrator</option>"
		items += "<option value='lawyer'>Lawyer</option>"
		items += "<option value='financial advisor'>Financial Advisor</option>"
		items += "<option value='insurance agent'>Insurance Agent</option>"
		items += "<option value='stockbroker'>Stockbroker</option>"
		items += "<option value='bank manager'>Bank Manager</option>"
		items += "<option value='employer'>Employer</option>"
		items += "<option value='landlord'>Landlord</option>"
		items += "<option value='doc general'>Doctor (general)</option>"
		items += "<option value='doc specialist'>Doctor (specialist)</option>"
		items += "<option value='dentist'>Dentist</option>"
		items += "<option value='religion'>Minister of Religion</option>"
		items += "<option value='celebrant'>Celebrant</option>"
		items += "<option value='veterinarian'>Veterinarian</option>"
		items += "<option value='other'>Other</option>"
		
		items += "</select>"
		
		
		$('#contact_table').append('<tr><td>'+items+'</td><td><input type="text" id="contact_name'+new_row+'" name="contact_name'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="contact_phone'+new_row+'" name="contact_phone'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="contact_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#contact_hidden').val(new_row);
		
		
	});
	
	
	
	$('#service_provider_button').live("click",function()
	{
		var row = parseInt($('#service_provider_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='category"+new_row+"' class= 'selectcont01' id='category"+new_row+"'>"
		items += "<option value='0'>Select Category</option>"
		items += "<option value='water'>Water</option>"
		items += "<option value='electricity'>Electricity</option>"
		items += "<option value='gas'>Gas</option>"
		items += "<option value='public trustee'>Public Trustee</option>"
		items += "<option value='medicare'>Medicare</option>"
		items += "<option value='centerlink'>Centrelink</option>"
		items += "<option value='local government'>Local government</option>"
		items += "<option value='veteran affairs'>Veteran Affairs</option>"
		items += "<option value='post office'>Post Office</option>"
		items += "<option value='australian taxation office'>Australian Taxation Office</option>"
		items += "<option value='bank'>Bank</option>"
		items += "<option value='nursig home'>Nursing Home</option>"
		items += "<option value='home help'>Home Help</option>"
		items += "<option value='other'>Other</option>"
		
		items += "</select>"
		
		$('#service_provider_table').append('<tr><td>'+items+'</td><td><input type="text" id="provider_name'+new_row+'" name="provider_name'+new_row+'" class="ontintext01-tbl" /></td><td><input type="text" id="provider_ref'+new_row+'" name="provider_ref'+new_row+'" class="ontintext01-tbl" /></td><td><input type="text" id="provider_telephone'+new_row+'" name="provider_telephone'+new_row+'" class="ontintext01-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="service_provider_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#service_provider_hidden').val(new_row);
		
		
	});
	
	
	
	
	$('#insurance_button').live("click",function()
	{
		var row = parseInt($('#insurance_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='insurance_category"+new_row+"' class= 'selectcont01' id='insurance_category"+new_row+"'>"
		items += "<option value='0'>Select Category</option>"
		items += "<option value='health'>Health</option>"
		items += "<option value='life'>Life</option>"
		items += "<option value='house and contents'>House & Contents</option>"
		items += "<option value='mortage'>Mortgage</option>"
		items += "<option value='annuity'>Annuity</option>"
		items += "<option value='car'>Car</option>"
		items += "<option value='dental'>Dental</option>"
		items += "<option value='disability'>Disability</option>"
		items += "<option value='boat'>Boat</option>"
		items += "<option value='caravan or trailer'>Caravan/Trailer</option>"
		items += "<option value='funeral'>Funeral</option>"
		items += "<option value='business'>Business</option>"
		items += "<option value='other'>Other</option>"
		
		items += "</select>"
		
		$('#insurance_company_table').append('<tr><td>'+items+'</td><td><input type="text" id="insurance_policy'+new_row+'" name="insurance_policy'+new_row+'" class="ontintext01-tbl" /></td><td><input type="text" id="insurance_company'+new_row+'" name="insurance_company'+new_row+'" class="ontintext01-tbl" /></td><td><input type="text" id="insurance_contact'+new_row+'" name="insurance_contact'+new_row+'" class="ontintext01-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="insurance_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#insurance_hidden').val(new_row);
		
		
	});
	
	
	
	$('#bank_button').live("click",function()
	{
		var row = parseInt($('#bank_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='account_type"+new_row+"' class= 'selectcont' id='account_type"+new_row+"'>"
		items += "<option value='0'>Select Type</option>"
		items += "<option value='executor or adminsitrator'>Executor/Administrator</option>"
		items += "<option value='safe deposit'>Safe Deposit Box</option>"
		items += "<option value='saving'>Savings</option>"
		items += "<option value='term deposit'>Term Deposit</option>"
		items += "<option value='atm or debit card'>ATM/Debit Card</option>"
		items += "<option value='investment'>Investment</option>"
		items += "<option value='business'>Business</option>"
		items += "<option value='other'>other</option>"
		
		items += "</select>"
		
		$('#bank_table').append('<tr><td>'+items+'</td><td><input type="text" id="account_no'+new_row+'" name="account_no'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="bank_name'+new_row+'" name="bank_name'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="bank_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#bank_hidden').val(new_row);
		
		
	});
	
	
	
	$('#investment_button').live("click",function()
	{
		var row = parseInt($('#investment_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='investment_type"+new_row+"' class= 'selectcont' id='investment_type"+new_row+"'>"
		items += "<option value='0'>Select Type</option>"
		items += "<option value='brokerage account'>Brokerage Account</option>"
		items += "<option value='funeral bond'>Funeral Bond</option>"
		items += "<option value='superannuation'>Superannuation</option>"
		items += "<option value='investment fund'>Investment Fund</option>"
		items += "<option value='shares'>Shares</option>"
		items += "<option value='other'>other</option>"
		
		items += "</select>"
		
		$('#investment_table').append('<tr><td>'+items+'</td><td><input type="text" id="investment_account_no'+new_row+'" name="investment_account_no'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="institution_name'+new_row+'" name="institution_name'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="investment_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#investment_hidden').val(new_row);
		
		
	});
	
	
	
	$('#pension_button').live("click",function()
	{
		var row = parseInt($('#pension_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='pension_type"+new_row+"' class= 'selectcont' id='pension_type"+new_row+"'>"
		items += "<option value='0'>Select Type</option>"
		items += "<option value='aged'>Aged</option>"
		items += "<option value='disability'>Disability</option>"
		items += "<option value='veteran affairs'>Veteran Affairs</option>"
		items += "<option value='family tax'>Family Tax Assistance</option>"
		items += "<option value='spouse'>Spouse</option>"
		items += "<option value='health care'>Health Care Card</option>"
		items += "<option value='family support'>Family Support</option>"
		items += "<option value='rental assistance'>Rental Assistance</option>"
		items += "<option value='single parent'>Single Parent</option>"
		items += "<option value='other'>other</option>"
		
		items += "</select>"
		
		$('#pension_table').append('<tr><td>'+items+'</td><td><input type="text" id="pension_account_no'+new_row+'" name="pension_account_no'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="organisation_name'+new_row+'" name="organisation_name'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="pension_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#pension_hidden').val(new_row);
		
		
	});
	
	
	
	$('#property_button').live("click",function()
	{
		var row = parseInt($('#property_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='property_type"+new_row+"' class= 'selectcont' id='property_type"+new_row+"'>"
		items += "<option value='0'>Select Type</option>"
		items += "<option value='real estate'>Real Estate</option>"
		items += "<option value='car'>Car</option>"
		items += "<option value='boat'>Boat</option>"
		items += "<option value='caravan or trailer'>Caravan/Trailer</option>"
		items += "<option value='motorcycle'>Motorcycle</option>"
		items += "<option value='art work'>Art Work</option>"
		items += "<option value='jewellery'>Jewellery</option>"
		items += "<option value='collections'>Collections</option>"
		items += "<option value='other'>other</option>"
		
		items += "</select>"
		
		$('#property_table').append('<tr><td>'+items+'</td><td><input type="text" id="property_description'+new_row+'" name="property_description'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="property_location'+new_row+'" name="property_location'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="property_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#property_hidden').val(new_row);
		
		
	});
	
	
	
	$('#loan_button').live("click",function()
	{
		var row = parseInt($('#loan_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='loan_account_type"+new_row+"' class= 'selectcont' id='loan_account_type"+new_row+"'>"
		items += "<option value='0'>Select Type</option>"
		items += "<option value='1st mortgage'>1st Mortgage</option>"
		items += "<option value='2nd Mortgage'>2nd Mortgage</option>"
		items += "<option value='home equity'>Home Equity Line of Credit</option>"
		items += "<option value='reverse morgage'>Reverse Mortgage</option>"
		items += "<option value='car1'>Car 1</option>"
		items += "<option value='car2'>Car 2</option>"
		items += "<option value='boat'>Boat</option>"
		items += "<option value='personal'>Personal</option>"
		items += "<option value='caravan or trailer'>Caravan/Trailer</option>"
		items += "<option value='business'>Business</option>"
		items += "<option value='motorcycle'>Motorcycle</option>"
		items += "<option value='investment'>Investment</option>"
		items += "<option value='other'>other</option>"
		
		items += "</select>"
		
		$('#loan_table').append('<tr><td>'+items+'</td><td><input type="text" id="loan_account'+new_row+'" name="loan_account'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="lender_name'+new_row+'" name="lender_name'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="loan_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#loan_hidden').val(new_row);
		
		
	});
	
	
	$('#credit_button').live("click",function()
	{
		var row = parseInt($('#credit_hidden').val());
		
		var new_row = row + 1;
		
		$('#credit_table').append('<tr><td><input type="text" id="credit_company'+new_row+'" name="credit_company'+new_row+'" class="ontintext01-tbl" /></td><td><input type="text" id="credit_card'+new_row+'" name="credit_card'+new_row+'" class="ontintext01-tbl" /></td><td><input type="text" id="exp_date'+new_row+'" name="exp_date'+new_row+'" class="ontintext01-tbl" /></td><td><input type="text" id="credit_phone'+new_row+'" name="credit_phone'+new_row+'" class="ontintext01-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="credit_hidden" class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#credit_hidden').val(new_row);
		
		
	});
	
	
	
	$('#social_button').live("click",function()
	{
		var row = parseInt($('#social_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='social_category"+new_row+"' class= 'selectcont' id='social_category"+new_row+"'>"
		items += "<option value='0'>Select Type</option>"
		items += "<option value='facebook'>Facebook</option>"
		items += "<option value='twitter'>Twitter</option>"
		items += "<option value='linked in'>Linked In</option>"
		items += "<option value='google'>Google+</option>"
		
		items += "</select>"
		
		$('#social_media_table').append('<tr><td>'+items+'</td><td><input type="text" id="username'+new_row+'" name="username'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="password'+new_row+'" name="password'+new_row+'" class="ontintext-tbl" /></td><td><a href="javascript:void(0);" id="familycross1" hidden_value="social_hidden"  class="remove"><img src="images/cross.png" style="padding-bottom:10px" /></a></td></tr>');
		
		$('#social_hidden').val(new_row);
		
		
	});
	
	
	
	$('#pet_button').live("click",function()
	{
		var row = parseInt($('#pet_hidden').val());
		
		var new_row = row + 1;
		
		var items="";
						
		items += "<select name='pet_category"+new_row+"' class= 'selectcont' id='pet_category"+new_row+"'>"
		items += "<option value='0'>Select Category</option>"
		items += "<option value='dog'>Dog</option>"
		items += "<option value='cat'>Cat</option>"
		items += "<option value='bird'>Bird</option>"
		
		items += "</select>"
		
		$('#pet_table').append('<tr class="rm'+new_row+'"><td>'+items+'</td><td><input type="text" id="pet_name'+new_row+'" name="pet_name'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="pet_sex'+new_row+'" name="pet_sex'+new_row+'" class="ontintext-tbl" /></td></tr><tr class="rm'+new_row+'"><td colspan="3"><p><lebel>Special Notes:</lebel><textarea id="P_address"  name="pet_notes'+new_row+'" id="pet_notes'+new_row+'" class="textarea-f"></textarea></p></td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td><a href="javascript:void(0);" id="petcross'+new_row+'" current_row = "'+new_row+'" hidden_value="pet_hidden" class="petremove rm'+new_row+'"><img src="images/cross.png" style="padding-bottom:10px; margin-left:225px;" /></a></td></tr>');
		
		//$('#pet_table').append('<tr><table><tr><td>'+items+'</td><td><input type="text" id="pet_name'+new_row+'" name="pet_name'+new_row+'" class="ontintext-tbl" /></td><td><input type="text" id="pet_sex'+new_row+'" name="pet_sex'+new_row+'" class="ontintext-tbl" /></td></tr><tr> <td colspan="3"><p><label>Special Notes:</label><textarea name="" cols="" rows="" id="P_address"  name="pet_notes1" id="pet_notes1" class="textarea-f"></textarea></p></td></tr></table> </tr>');
		
		$('#pet_hidden').val(new_row);
		
	});
	
	
	
	/* Remove code begins */
	
	$('.remove').live("click",function()
	{
		
		var hidden_value = $(this).attr('hidden_value');
		
		var rows = parseInt($('#'+hidden_value).val());
		
		$(this).closest('tr').remove();
		
		//rows = rows - 1;
		
		//$('#'+hidden_value).val(rows);
		
		
	});
	
	$('.petremove').live("click",function()
	{
		
		var hidden_value = $(this).attr('hidden_value');
		
		var current_row = $(this).attr('current_row');
		
		var rows = parseInt($('#'+hidden_value).val());
		
		$('.rm'+current_row).remove();
		
		//rows = rows - 1;
		
		//$('#'+hidden_value).val(rows);
		
		
	});
	
	
	
	
							
							
							
});