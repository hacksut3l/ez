function formvalidation(thisform)
{
	var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
	var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
	var funeral_held_detail = thisform.funeral_held_detail.value;
	var religious_details = thisform.religious_details.value;
	var funeral_place = document.getElementsByName("funeral_place");
	var cementary_held_funeral = thisform.cementary_held_funeral.value;
    var is_religious = document.getElementsByName("is_religious");
	var is_viewing = document.getElementsByName("is_viewing");
	var is_special_clothing = document.getElementsByName("is_special_clothing");
	var held = document.getElementsByName("held");
	var held_detail = thisform.held_detail.value;
	var rosary_loc_details = thisform.rosary_loc_details.value;
	var special_clothing_details = thisform.special_clothing_details.value;
	var casket_category = thisform.casket_category.value;
	var other_coffin = thisform.other_coffin.value;
	var is_minister = document.getElementsByName("is_minister");
	var minister_name =  thisform.minister_name.value;
	var minister_email = thisform.minister_email.value;
	var minister_phone = thisform.minister_phone.value;
	var is_eulogy = document.getElementsByName("is_eulogy");
	var is_eulogy_text = document.getElementsByName("is_eulogy_text");
	var eulogy_text_detail = thisform.eulogy_text_detail.value;
	var is_eulogy_performer = document.getElementsByName("is_eulogy_performer");
	var name = thisform.name.value;
	var contact_num = thisform.contact_num.value;
	var address = thisform.address.value;
	var is_special_reading = document.getElementsByName("is_special_reading");
	var funreal_reading_detail = thisform.funreal_reading_detail.value;
	var transport = document.getElementsByName("transport");
	var transport_detail = thisform.transport_detail.value;
	var pickup_loc = thisform.pickup_loc.value;
	var return_loc = thisform.return_loc.value;
	var special_request = thisform.special_request.value;
	//var is_floral = document.getElementsByName("is_floral");
	//var flower_type = thisform.flower_type.value; 
	//var colour = thisform.colour.value;
	var is_donation = document.getElementsByName("is_donation");
	var organisation_name = thisform.organisation_name.value;
	var is_musics = document.getElementsByName("is_music");
	var name_cemnt = thisform.name_cemnt.value;
	var state = thisform.state.value;
	var music_leaving = thisform.music_leaving.value;
	var hymns = thisform.hymns.value;
	var is_musician = document.getElementsByName("is_musician");
	var bearers = document.getElementsByName("bearers");
	var musician_name = thisform.musician_name.value;
	var bearer_name1 = thisform.bearer_name1.value;
	var bearer_realtionship1 = thisform.bearer_realtionship1.value;
	var bearer_sex1 = thisform.bearer_sex1.value;
	var special_arrangement = document.getElementsByName("special_arrangement");
	var special_arrangement_detail = thisform.special_arrangement_detail.value;
	for (var i = 0; i < is_religious.length; i++) {       
        if (is_religious[i].checked) {
           is_rel =  is_religious[i].value;
            break;
        }
    }
	for (var i = 0; i < funeral_place.length; i++) {       
        if (funeral_place[i].checked) {
           is_fun_place =  funeral_place[i].value;
            break;
        }
    }
	for (var i = 0; i < is_viewing.length; i++) {       
        if (is_viewing[i].checked) {
           is_view =  is_viewing[i].value;
            break;
        }
    }
	for (var i = 0; i < held.length; i++) {       
        if (held[i].checked) {
           is_other =  held[i].value;
            break;
        }
    }
	for (var i = 0; i < is_special_clothing.length; i++) {       
        if (is_special_clothing[i].checked) {
           is_special =  is_special_clothing[i].value;
            break;
        }
    }
	for (var i = 0; i < is_minister.length; i++) {       
        if (is_minister[i].checked) {
           is_min =  is_minister[i].value;
            break;
        }
    }
	for (var i = 0; i < is_eulogy.length; i++) {       
        if (is_eulogy[i].checked) {
           is_eulo =  is_eulogy[i].value;
            break;
        }
    }
	for (var i = 0; i < is_eulogy_text.length; i++) {       
        if (is_eulogy_text[i].checked) {
           eulo_text =  is_eulogy_text[i].value;
            break;
        }
    }
	for (var i = 0; i < is_eulogy_performer.length; i++) {       
        if (is_eulogy_performer[i].checked) {
           eulo_perf =  is_eulogy_performer[i].value;
            break;
        }
    }
	for (var i = 0; i < is_special_reading.length; i++) {       
        if (is_special_reading[i].checked) {
           is_read =  is_special_reading[i].value;
            break;
        }
    }
	for (var i = 0; i < transport.length; i++) {       
        if (transport[i].checked) {
           is_transport =  transport[i].value;
            break;
        }
    }
	/*for (var i = 0; i < is_floral.length; i++) {       
        if (is_floral[i].checked) {
           floral_val =  is_floral[i].value;
            break;
        }
    }
	var floral_items = document.getElementsByName('floral[]');
    for (var i = 0; i < floral_items.length; i++)
    {
		if (floral_items[i].checked ){
		floral_array =  floral_items[i].value;
		break;
	  }alert(floral_array);
	}*/
	
	for (var i = 0; i < is_donation.length; i++) {       
        if (is_donation[i].checked) {
           is_donate =  is_donation[i].value;
            break;
        }
    }
	for (var i = 0; i < is_musics.length; i++) {       
        if (is_musics[i].checked) {
           is_music =  is_musics[i].value;
            break;
        }
    }
	for (var i = 0; i < is_musician.length; i++) {       
        if (is_musician[i].checked) {
           is_music_val =  is_musician[i].value;
            break;
        }
    }
	for (var i = 0; i < bearers.length; i++) {       
        if (bearers[i].checked) {
           is_bear =  bearers[i].value;
            break;
        }
    }
	for (var i = 0; i < special_arrangement.length; i++) {       
        if (special_arrangement[i].checked) {
           is_arrange =  special_arrangement[i].value;
            break;
        }
    }
	if(is_fun_place == 'Other')
	{
	   if(funeral_held_detail == '')
	   {
	    alert('Please enter the other place for funeral to be held'); 
		thisform.funeral_held_detail.style.background='Yellow';
		thisform.funeral_held_detail.focus(); 
		return false;
	   }	
	}
	if(is_fun_place == 'At ___followed by the committal at the cemetery')
	{
	   if(cementary_held_funeral == '')
	   {
	    alert('Please enter the cementry other place for funeral to be held'); 
		thisform.cementary_held_funeral.style.background='Yellow';
		thisform.cementary_held_funeral.focus(); 
		return false;
	   }	
	}
	
	if(is_rel=='religious')
	{
	  if(religious_details=='')
	  {
		alert('Please enter the name of religion/spiritual belief/philosophy on which service be based upon'); 
		thisform.religious_details.style.background='Yellow';
		thisform.religious_details.focus(); 
		return false;
	  }
	}
	if(is_view=='viewing' || is_view=='rosary')
	{
	   if(held_detail=='' && is_other=='other')
	   {
		alert('Please enter the other place for viewing or rosary to be held'); 
		thisform.held_detail.style.background='Yellow';
		thisform.held_detail.focus(); 
		return false;    
	   }
	   if(rosary_loc_details=='')
	   {
		alert('Please enter the details of location for viewing or rosary'); 
		thisform.rosary_loc_details.style.background='Yellow';
		thisform.rosary_loc_details.focus(); 
		return false; 
	   }
	   if(is_special=='yes')
	   {
		 if(special_clothing_details=='')
		 {
			alert('Please enter the list of special items of clothing or jewellery to be provided'); 
		    thisform.special_clothing_details.style.background='Yellow';
		    thisform.special_clothing_details.focus(); 
			return false; 
		 }
	   }
	}
	if(casket_category=='Other type' && other_coffin == '' )
	{
		alert('Please enter the other type for casket category'); 
		thisform.other_coffin.style.background='Yellow';
		thisform.other_coffin.focus(); 
		return false;
    }
	if(is_min=='yes')
	{
		if(minister_name=='')
		{
			alert('Please enter minister name'); 
			thisform.minister_name.style.background='Yellow';
			thisform.minister_name.focus(); 
			return false;

		}
		if(minister_email=='')
		{
			alert('Please enter minister email'); 
			thisform.minister_email.style.background='Yellow';
			thisform.minister_email.focus(); 
			return false;

		}
		else if (emailFilter.test(thisform.minister_email.value)== false) 
		{ 
			alert('Please enter a valid email address');
			thisform.minister_email.style.background = 'Yellow';
			thisform.minister_email.focus();
			return false;
			
		} 
		else if (thisform.minister_email.value.match(illegalChars)) 
		{
			thisform.minister_email.style.background = 'Yellow';
			alert('The email address contains illegal characters');
			thisform.minister_email.focus();
			return false;
		}
		else
		{
			thisform.minister_email.style.background='';
		}
		
		if(minister_phone=='')
		{
			alert('Please enter minister phone'); 
			thisform.minister_phone.style.background='Yellow';
			thisform.minister_phone.focus(); 
			return false;

		}
	}
	if(is_eulo == 'yes')
	{
	   if(eulo_text == 'yes' && eulogy_text_detail == '')
	   {
		    alert('Please enter the eulogy text detials'); 
			thisform.eulogy_text_detail.style.background='Yellow';
			thisform.eulogy_text_detail.focus(); 
			return false;
	   }
	   if(eulo_perf == 'yes')
	   {
		  if(name == '')
		  {
			alert('Please enter the eulogy performer name'); 
			thisform.name.style.background='Yellow';
			thisform.name.focus(); 
			return false;
		  } 
		  if(contact_num == '')
		  {
			alert('Please enter the eulogy performer contact number'); 
			thisform.contact_num.style.background='Yellow';
			thisform.contact_num.focus(); 
			return false;
		  } 
		  if(address == '')
		  {
			alert('Please enter the eulogy performer address'); 
			thisform.address.style.background='Yellow';
			thisform.address.focus(); 
			return false;
		  }   
	   }	
	}
	if(is_read=='yes')
	{
	   if(funreal_reading_detail=='')
	   {
			alert('Please enter the list text or poems'); 
			thisform.funreal_reading_detail.style.background='Yellow';
			thisform.funreal_reading_detail.focus(); 
			return false; 
	   }
	}
	if(is_transport=='other')
	{
	  	if(transport_detail=='')
	    {
			alert('Please enter the vehicle in which body is to be transported'); 
			thisform.transport_detail.style.background='Yellow';
			thisform.transport_detail.focus(); 
			return false;
		}
	}
	if(pickup_loc=='')
	{
	  alert('Please enter the pick up location'); 
	  thisform.pickup_loc.style.background='Yellow';
	  thisform.pickup_loc.focus(); 
	  return false;	
	}
	if(return_loc=='')
	{
	  alert('Please enter the return location'); 
	  thisform.return_loc.style.background='Yellow';
	  thisform.return_loc.focus(); 
	  return false;	
	}
	if(special_request=='')
	{
	  alert('Please enter the special request'); 
	  thisform.special_request.style.background='Yellow';
	  thisform.special_request.focus(); 
	  return false;
	}
	/*if(floral_val == 'yes')
	{
	  if(floral_array == 'other')
	   {
		  if(flower_type == '')
		  {
			alert('Please enter the flower type'); 
			thisform.flower_type.style.background='Yellow';
			thisform.flower_type.focus(); 
			return false;
		  }
		  if(colour == '')
		  {
			alert('Please enter the colour'); 
			thisform.colour.style.background='Yellow';
			thisform.colour.focus(); 
			return false;  
		  }   
	   }	
	}*/
	if(is_donate=='yes')
	{
	  if(organisation_name=='')
	   {
	 	alert('Please enter the organisation name'); 
		thisform.organisation_name.style.background='Yellow';
		thisform.organisation_name.focus(); 
		return false;
	   }
	}
	if(is_music=='yes')
	{
	   if(name_cemnt=='')
	   {
	  	alert('Please enter the entering music name'); 
		thisform.name_cemnt.style.background='Yellow';
		thisform.name_cemnt.focus(); 
		return false; 
	   }
	   if(state=='')
	   {
	  	alert('Please enter the music during funeral'); 
		thisform.state.style.background='Yellow';
		thisform.state.focus(); 
		return false; 
	   }
	   if(music_leaving=='')
	   {
	  	alert('Please enter the leaving music name'); 
		thisform.music_leaving.style.background='Yellow';
		thisform.music_leaving.focus(); 
		return false; 
	   }
	   if(hymns=='')
	   {
	  	alert('Please enter the hymns'); 
		thisform.hymns.style.background='Yellow';
		thisform.hymns.focus(); 
		return false; 
	   }
	   
	}
	if(is_music_val=='yes')
	{
	  if(musician_name=='')
	  {
		alert('Please enter the singer details'); 
		thisform.musician_name.style.background='Yellow';
		thisform.musician_name.focus(); 
		return false; 
	  }
	}
	if(is_bear=='family/friend')
	{
	  if(bearer_name1=='')
	  {
		alert('Please enter the family bearers name'); 
		thisform.bearer_name1.style.background='Yellow';
		thisform.bearer_name1.focus(); 
		return false; 
	  }
	  if(bearer_realtionship1=='')
	  {
		alert('Please enter the family bearers relationship'); 
		thisform.bearer_realtionship1.style.background='Yellow';
		thisform.bearer_realtionship1.focus(); 
		return false; 
	  }
	  if(bearer_sex1=='')
	  {
		alert('Please enter the family bearers sex'); 
		thisform.bearer_sex1.style.background='Yellow';
		thisform.bearer_sex1.focus(); 
		return false; 
	  }
	}
	if(is_arrange=='yes')
	{
	   if(special_arrangement_detail=='')
	   {
		alert('Please enter the field for describe your special request'); 
		thisform.special_arrangement_detail.style.background='Yellow';
		thisform.special_arrangement_detail.focus(); 
		return false;
	   }
	}
		
}