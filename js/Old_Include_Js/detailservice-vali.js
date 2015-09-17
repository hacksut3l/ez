function formvalidation(thisform)
{

	
	var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
	var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
	var date1 = thisform.preferred_date1.value;
	var date2 = thisform.preferred_date2.value;
	var estimate_people = thisform.estimate_people.value;
	var coffin_name = thisform.coffin_name.value;
	var casket_category = thisform.casket_category.value;
	var other_coffin = thisform.other_coffin.value;
	var is_religious = document.getElementsByName("is_religious");
	var held_detail = thisform.held_detail.value;
	var cementary_held_funeral = thisform.cementary_held_funeral.value;
	var estimate_people_rosary = thisform.estimate_people_rosary.value;
	var special_clothing_details = thisform.special_clothing_details.value;
	var reader_name = thisform.reader_name.value;
	var poems = thisform.poems.value;
	var newpaper_name = thisform.newpaper_name.value;
	var transport_detail = thisform.transport_detail.value;
	var limousines_details = thisform.limousines_details.value;
	
	var pickup_loc = thisform.pickup_loc.value;
	var return_loc = thisform.return_loc.value;
	
	var flower_type = thisform.flower_type.value;
	
    var colours = thisform.colours.value;
	var organisation_name = thisform.organisation_name.value;
	var name_cemnt = thisform.name_cemnt.value;
	var state = thisform.state.value;
	var music_leaving = thisform.music_leaving.value;
	var musician_name = thisform.musician_name.value;
	var musician_email = thisform.musician_email.value;
	var musician_phone = thisform.musician_phone.value;
	var bearer_name1 = thisform.bearer_name1.value;
	var bearer_realtionship1 = thisform.bearer_realtionship1.value;
	var bearer_sex1 = thisform.bearer_sex1.value;
	var ref_people = thisform.ref_people.value;
	var special_request = thisform.special_request.value;
	var funeral_held_detail = thisform.funeral_held_detail.value;
	var special_arrangement_detail = thisform.special_arrangement_detail.value;
	
	var funeral_place = document.getElementsByName("funeral_place");
	for (var i = 0; i < funeral_place.length; i++) {       
        if (funeral_place[i].checked) {
         var  is_fun_place =  funeral_place[i].value;
            break;
        }
    }
	
	for (var i = 0; i < is_religious.length; i++) {       
        if (is_religious[i].checked) {
           is_rel =  is_religious[i].value;
            break;
        }
    }
	var religious_details = thisform.religious_details.value;
	var is_viewing = document.getElementsByName("is_viewing");
	for (var i = 0; i < is_viewing.length; i++) {       
        if (is_viewing[i].checked) {
           is_view =  is_viewing[i].value;
            break;
        }
    }
	var held = document.getElementsByName("held");
	for (var i = 0; i < held.length; i++) {       
        if (held[i].checked) {
           is_other =  held[i].value;
            break;
        }
    }
	var is_special_clothing = document.getElementsByName("is_special_clothing");
	for (var i = 0; i < is_special_clothing.length; i++) {       
        if (is_special_clothing[i].checked) {
           is_special =  is_special_clothing[i].value;
            break;
        }
    }
	
	var is_minister = document.getElementsByName("is_minister");
	var minister_name = thisform.minister_name.value;
	var minister_email = thisform.minister_email.value;
	var minister_phone = thisform.minister_phone.value;
	for (var i = 0; i < is_minister.length; i++) {       
        if (is_minister[i].checked) {
           is_min =  is_minister[i].value;
            break;
        }
    }
	var is_special_reading = document.getElementsByName("is_special_reading");
	for (var i = 0; i < is_special_reading.length; i++) {       
        if (is_special_reading[i].checked) {
           is_read =  is_special_reading[i].value;
            break;
        }
    }
	var is_newpaper = document.getElementsByName("is_newpaper");
    for (var i = 0; i < is_newpaper.length; i++) {       
        if (is_newpaper[i].checked) {
           is_news =  is_newpaper[i].value;
            break;
        }
    }	
	var transport = document.getElementsByName("transport");
	for (var i = 0; i < transport.length; i++) {       
        if (transport[i].checked) {
           is_transport =  transport[i].value;
            break;
        }
    }
	
	var limousines = document.getElementsByName("limousines");
	for (var i = 0; i < limousines.length; i++) {       
        if (limousines[i].checked) {
           is_lumi =  limousines[i].value;
            break;
        }
    }
	
	var is_floral = document.getElementsByName("is_floral");
	for (var i = 0; i < is_floral.length; i++) {       
        if (is_floral[i].checked) {
           is_flor =  is_floral[i].value;
            break;
        }
    }
	var floral = document.getElementsByName("floral");
	for (var i = 0; i < floral.length; i++) {       
        if (floral[i].checked) {
           var floral_val =  floral[i].value;
            break;
        }
    }
	var is_donation = document.getElementsByName("is_donation");
	for (var i = 0; i < is_donation.length; i++) {       
        if (is_donation[i].checked) {
           is_donate =  is_donation[i].value;
            break;
        }
    }
	var is_musics = document.getElementsByName("is_music");
	for (var i = 0; i < is_musics.length; i++) {       
        if (is_musics[i].checked) {
           is_music =  is_musics[i].value;
            break;
        }
    }
	var is_musician = document.getElementsByName("is_musician");
	for (var i = 0; i < is_musician.length; i++) {       
        if (is_musician[i].checked) {
           is_music_val =  is_musician[i].value;
            break;
        }
    }
	var bearers = document.getElementsByName("bearers");
	for (var i = 0; i < bearers.length; i++) {       
        if (bearers[i].checked) {
           is_bear =  bearers[i].value;
            break;
        }
    }
	var refreshment = document.getElementsByName("refreshment");
	for (var i = 0; i < refreshment.length; i++) {       
        if (refreshment[i].checked) {
           is_relation =  refreshment[i].value;
            break;
        }
    }
	var special_arrangement = document.getElementsByName("special_arrangement");
	for (var i = 0; i < special_arrangement.length; i++) {       
        if (special_arrangement[i].checked) {
           is_arrange =  special_arrangement[i].value;
            break;
        }
    }
	
    if(date1== '' && document.getElementById('day_service_status_yes').checked )
	{

		alert('Please enter first date'); 
		thisform.preferred_date1.style.background='Yellow';
		thisform.preferred_date1.focus(); 
		return false;
	}
    if(date2=='' && document.getElementById('day_service_status_yes').checked)
	{
		alert('Please enter second date'); 
		thisform.preferred_date2.style.background='Yellow';
		thisform.preferred_date2.focus(); 
		return false;
	}
	if(estimate_people=='')
	{
		alert('Please enter the estimate number of people may attend the service'); 
		thisform.estimate_people.style.background='Yellow';
		thisform.estimate_people.focus(); 
		return false;
		
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
	if(is_fun_place=='Other')
	{
	  
	  if(funeral_held_detail=='')
	  {
		 alert('Please enter the other place for funeral to be held'); 
		thisform.funeral_held_detail.style.background='Yellow';
		thisform.funeral_held_detail.focus(); 
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
	   if(estimate_people_rosary=='')
	   {
		alert('Please enter the number of people attending the viewing or rosary'); 
		thisform.estimate_people_rosary.style.background='Yellow';
		thisform.estimate_people_rosary.focus(); 
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
	if(coffin_name=='')
	{
		alert('Please enter the coffin or casket name'); 
		thisform.coffin_name.style.background='Yellow';
		thisform.coffin_name.focus(); 
		return false;
    }
	
	/*if(coffin_supplier=='')
	{
		alert('Please enter the coffin or casket supplier'); 
		thisform.coffin_supplier.style.background='Yellow';
		thisform.coffin_supplier.focus(); 
		return false;	
	}*/
	if(is_min=='yes')
	{
		if(minister_name=='')
		{
			alert('Please enter minister name'); 
			thisform.minister_name.style.background='Yellow';
			thisform.minister_name.focus(); 
			return false;

		}
		if(minister_email == '')
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
			alert('Please minister first phone'); 
			thisform.minister_phone.style.background='Yellow';
			thisform.minister_phone.focus(); 
			return false;

		}
	}
	
	if(is_read=='yes')
	{
	   if(reader_name=='')
	   {
		alert('Please enter the details of person/s to deliver the reading'); 
		thisform.reader_name.style.background='Yellow';
		thisform.reader_name.focus(); 
		return false; 
	   }
	   if(poems=='')
	   {
			alert('Please enter the list text or poems'); 
			thisform.poems.style.background='Yellow';
			thisform.poems.focus(); 
			return false; 
	   }
	}
	if(is_news=='yes')
	{
	  	if(newpaper_name=='')
		{
		  	alert('Please enter the newspaper name'); 
			thisform.newpaper_name.style.background='Yellow';
			thisform.newpaper_name.focus(); 
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
	if(is_lumi=='yes')
	{
	  if(limousines_details=='')
	  {
		 alert('Please enter the number of seats you require'); 
		 thisform.limousines_details.style.background='Yellow';
		 thisform.limousines_details.focus(); 
		 return false; 
	  }
	}
	if(pickup_loc=='' && document.getElementById('transport_status_yes').checked)
	{
	  alert('Please enter the pick up location'); 
	  thisform.pickup_loc.style.background='Yellow';
	  thisform.pickup_loc.focus(); 
	  return false;	
	}
	if(return_loc=='' && document.getElementById('transport_status_yes').checked)
	{
	  alert('Please enter the return location'); 
	  thisform.return_loc.style.background='Yellow';
	  thisform.return_loc.focus(); 
	  return false;	
	}
	if(special_request=='' && document.getElementById('transport_status_yes').checked)
	{
	  alert('Please enter the special request'); 
	  thisform.special_request.style.background='Yellow';
	  thisform.special_request.focus(); 
	  return false;
	}
	if(is_flor=='yes' && floral_val=='other')
	{
	   if(flower_type=='')
	   {
	    alert('Please enter the flower type'); 
		thisform.flower_type.style.background='Yellow';
		thisform.flower_type.focus(); 
		return false;
	   }
	   if(colours=='')
	   {
	    alert('Please enter the flower colours'); 
		thisform.colours.style.background='Yellow';
		thisform.colours.focus(); 
		return false;
	   }
	}
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
	}
	if(is_music_val=='yes')
	{
	  if(musician_name=='')
	  {
		alert('Please enter the musician name'); 
		thisform.musician_name.style.background='Yellow';
		thisform.musician_name.focus(); 
		return false; 
	  }
	  if(musician_email=='')
	  {
		alert('Please enter the musician email'); 
		thisform.musician_email.style.background='Yellow';
		thisform.musician_email.focus(); 
		return false; 
	  }
	 else if (emailFilter.test(thisform.musician_email.value)== false) 
		{ //test email for illegal characters
			alert('Please enter a valid email address');
			thisform.musician_email.style.background = 'Yellow';
			thisform.musician_email.focus();
			return false;
		} 
		else if (thisform.musician_email.value.match(illegalChars)) 
		{
			thisform.musician_email.style.background = 'Yellow';
			alert('The email address contains illegal characters');
			thisform.musician_email.focus();
			return false;
		}
		else
		{
			thisform.musician_email.style.background='';
		}
	  if(musician_phone=='')
	  {
		alert('Please enter the musician phone'); 
		thisform.musician_phone.style.background='Yellow';
		thisform.musician_phone.focus(); 
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
	if(is_relation=='yes')
	{
	   if(ref_people=='')
	   {
		alert('Please enter the Estimated number of people to be catered for refreshment'); 
		thisform.ref_people.style.background='Yellow';
		thisform.ref_people.focus(); 
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