function formvalidation(thisform)
{
	var cremin_type,special_request,memorial,detail_of_mem,written;
		
	var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
	var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;	
	
	cremin_type=thisform.cremin_type;
	special_request=thisform.special_request;
	memorial=thisform.memorial;
	detail_of_mem=thisform.detail_of_mem;
	written=thisform.written;
	
	var is_urn = document.getElementsByName("is_urn");
	var is_special_request = document.getElementsByName("is_special_request");
	var is_memorial = document.getElementsByName("is_memorial");
	var is_specific_memorial = document.getElementsByName("is_specific_memorial");
	
	
	for (var i = 0; i < is_urn.length; i++) {       
        if (is_urn[i].checked) {
           urn =  is_urn[i].value;
            break;
        }
    }
	
	for (var i = 0; i < is_special_request.length; i++) {       
			if (is_special_request[i].checked) {
			   spclrequest =  is_special_request[i].value;
				break;
			}
	}
	
	for (var i = 0; i < is_memorial.length; i++) {       
        if (is_memorial[i].checked) {
           memo =  is_memorial[i].value;
            break;
        }
    }
	
	for (var i = 0; i < is_specific_memorial.length; i++) {       
			if (is_specific_memorial[i].checked) {
			   specific_memo=  is_specific_memorial[i].value;
				break;
			}
	}
	
	
	if(urn == 'yes')
	{
		if(cremin_type.value=='')
		{
		 alert('Please enter type'); 
		 cremin_type.style.background='Yellow';
		 cremin_type.focus(); 
		  return false;
		}
		else
		{
			cremin_type.style.background='';
		}
	}
	
	if(spclrequest == 'yes')
	{
		if(special_request.value=='')
		{
		 alert('Please enter special request type'); 
		 special_request.style.background='Yellow';
		 special_request.focus(); 
		  return false;
		}
		else
		{
			special_request.style.background='';
		}
	}
	
	if(memo == 'yes')
	{
		if(memorial.value=='')
		{
		 alert('Please enter memorial'); 
		 memorial.style.background='Yellow';
		 memorial.focus(); 
		  return false;
		}
		else
		{
			memorial.style.background='';
		}
	}
	
	
	if(specific_memo == 'yes')
	{
		if(detail_of_mem.value=='')
		{
		 alert('Please enter specific memorial'); 
		 detail_of_mem.style.background='Yellow';
		 detail_of_mem.focus(); 
		  return false;
		}
		else
		{
			detail_of_mem.style.background='';
		}
	}
	
	
	if(written.value==''  && document.getElementById('memorial_status_yes').checked  )
	{
	 alert('Please enter specific inscription'); 
	 written.style.background='Yellow';
	 written.focus(); 
	  return false;
	}
	else
	{
		written.style.background='';
	}
	
	
	
	
}