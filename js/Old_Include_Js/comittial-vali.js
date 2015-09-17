function formvalidation(thisform)
{
	
	var name_cemetery,cemetery_city,cemetery_state,cemetery_area,cemetery_section,cemetery_number;
	var existing_grave_addr,grave_number,grave_location;
	var crematorium_name,crematorium_city,crematorium_state;
		
	  var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
	  var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
	
	name_cemetery=thisform.name_cemetery;
	cemetery_city=thisform.cemetery_city;
	cemetery_state=thisform.cemetery_state;
	cemetery_area=thisform.cemetery_area;
	cemetery_section=thisform.cemetery_section;
	cemetery_number=thisform.cemetery_number;
	existing_grave_addr=thisform.existing_grave_addr;
	grave_number=thisform.grave_number;
	grave_location=thisform.grave_location;
	crematorium_name=thisform.crematorium_name;
	crematorium_city=thisform.crematorium_city;
	crematorium_state=thisform.crematorium_state;

	var laid_to_rest = document.getElementsByName("laid_to_rest");
	var burried_in = document.getElementsByName("burried_in");
	var is_preferred_section = document.getElementsByName("is_preferred_section");
	
	
for (var i = 0; i < laid_to_rest.length; i++) {       
        if (laid_to_rest[i].checked) {
           laid =  laid_to_rest[i].value;
            break;
        }
    }
	
for (var i = 0; i < burried_in.length; i++) {       
        if (burried_in[i].checked) {
           burried =  burried_in[i].value;
            break;
        }
    }
	
	for (var i = 0; i < is_preferred_section.length; i++) {       
        if (is_preferred_section[i].checked) {
           preferred_section =  is_preferred_section[i].value;
            break;
        }
    }
	
	if(laid == 'burial')
	{
		
		if(burried == 'new grave')
		{
			
			
				if(f_name.value=='')
				{
					
				 alert('Please enter fisrt name'); 
				 f_name.style.background='Yellow';
				 f_name.focus(); 
				  return false;
				}
				else
				{
					f_name.style.background='';
				}
				   
				   
			   if(m_name.value=='')
			   {
				 alert('Please enter middle name'); 
				 m_name.style.background='Yellow';
				 m_name.focus(); 
				  return false;
			   }
			   else
			   {
					m_name.style.background='';
			   }
			   
			   
			   if(l_name.value=='')
			  {
				 alert('Please enter last name'); 
				 l_name.style.background='Yellow';
				 l_name.focus(); 
				  return false;
			   }
			   else
			   {
					l_name.style.background='';
			   }
			    if(address1.value=='')
			  {
				 alert('Please enter address'); 
				 address1.style.background='Yellow';
				 address1.focus(); 
				  return false;
			   }
			   else
			   {
					address1.style.background='';
			   }
			     if(address2.value=='')
			  {
				 alert('Please enter address'); 
				 address2.style.background='Yellow';
				 address2.focus(); 
				  return false;
			   }
			   else
			   {
					address2.style.background='';
			   }
			   if(state.value=='')
			  {
				 alert('Please enter state'); 
				 state.style.background='Yellow';
				 state.focus(); 
				  return false;
			   }
			   else
			   {
					state.style.background='';
			   }
			    if(postcode.value=='')
			  {
				 alert('Please enter postcode'); 
				 postcode.style.background='Yellow';
				 postcode.focus(); 
				  return false;
			   }
			   else
			   {
					postcode.style.background='';
			   }
			    if(country.value=='0')
			  {
				 alert('Please select country'); 
				 country.style.background='Yellow';
				 country.focus(); 
				  return false;
			   }
			   else
			   {
					country.style.background='';
			   }
			    if(telephone.value=='')
			  {
				 alert('Please enter telephone number'); 
				 telephone.style.background='Yellow';
				 telephone.focus(); 
				  return false;
			   }
			   else
			   {
					telephone.style.background='';
			   }
			   if(mobile.value=='')
			  {
				 alert('Please enter mobile number'); 
				 mobile.style.background='Yellow';
				 mobile.focus(); 
				  return false;
			   }
			   else
			   {
					mobile.style.background='';
			   }
			   if(email.value=='')
			  {
				 alert('Please enter email address'); 
				 email.style.background='Yellow';
				 email.focus(); 
				  return false;
			   }
			   else
			   {
					email.style.background='';
			   }
			   
			   
			   
			   
			   
			   if(preferred_section == 'yes')
			  {
				
					if(cemetery_area.value=='')
				  {
					 alert('Please enter cemetery area'); 
					 cemetery_area.style.background='Yellow';
					 cemetery_area.focus(); 
					  return false;
				   }
				   else
				   {
						cemetery_area.style.background='';
				   }
				   
				   
				   if(cemetery_section.value=='')
				  {
					 alert('Please enter cemetery section'); 
					 cemetery_section.style.background='Yellow';
					 cemetery_section.focus(); 
					  return false;
				   }
				   else
				   {
						cemetery_section.style.background='';
				   }
				   
				   
				   if(cemetery_number.value=='')
				  {
					 alert('Please enter cemetery number'); 
					 cemetery_number.style.background='Yellow';
					 cemetery_number.focus(); 
					  return false;
				   }
				   else
				   {
						cemetery_number.style.background='';
				   }
				   
			  }
			   
		}
	     else
		{
				if(existing_grave_addr.value=='')
			  {
				 alert('Please enter address'); 
				 existing_grave_addr.style.background='Yellow';
				 existing_grave_addr.focus(); 
				  return false;
			   }
			   else
			   {
					existing_grave_addr.style.background='';
			   }
			   
			   if(grave_number.value=='')
			  {
				 alert('Please enter grave number'); 
				 grave_number.style.background='Yellow';
				 grave_number.focus(); 
				  return false;
			   }
			   else
			   {
					grave_number.style.background='';
			   }
			   
			   if(grave_location.value=='')
			  {
				 alert('Please enter grave location'); 
				 grave_location.style.background='Yellow';
				 grave_location.focus(); 
				  return false;
			   }
			   else
			   {
					grave_location.style.background='';
			   }
			   
			   
		}
			
			
	}
	else if(laid == 'cremation')
	{
		  if(crematorium_name.value=='')
		  {
			 alert('Please enter crematorium name'); 
			 crematorium_name.style.background='Yellow';
			 crematorium_name.focus(); 
			  return false;
		   }
		   else
		   {
				crematorium_name.style.background='';
		   }
		   
		   if(crematorium_city.value=='')
		  {
			 alert('Please enter crematorium city'); 
			 crematorium_city.style.background='Yellow';
			 crematorium_city.focus(); 
			  return false;
		   }
		   else
		   {
				crematorium_city.style.background='';
		   }
		   
		   if(crematorium_state.value=='')
		  {
			 alert('Please enter crematorium state'); 
			 crematorium_state.style.background='Yellow';
			 crematorium_state.focus(); 
			  return false;
		   }
		   else
		   {
				crematorium_state.style.background='';
		   }
		   
	}
	else
	{
		if(mausoleum_name.value=='')
		  {
			 alert('Please enter mauoleum name'); 
			 mausoleum_name.style.background='Yellow';
			 mausoleum_name.focus(); 
			  return false;
		   }
		   else
		   {
				mausoleum_name.style.background='';
		   }
		   
		   if(mausoleum_city.value=='')
		  {
			 alert('Please enter mausoleum city'); 
			 mausoleum_city.style.background='Yellow';
			 mausoleum_city.focus(); 
			  return false;
		   }
		   else
		   {
				mausoleum_city.style.background='';
		   }
		   
		   if(mausoleum_state.value=='')
		  {
			 alert('Please enter mausoleum state'); 
			 mausoleum_state.style.background='Yellow';
			 mausoleum_state.focus(); 
			  return false;
		   }
		   else
		   {
				mausoleum_state.style.background='';
		   }
	}
	
   
}