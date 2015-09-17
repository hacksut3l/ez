

						     	/**================================================================================||
								||      *Developer : Green Cubes Solutions										   ||
								||      *Website   : www.greencubes.co.in										   ||
								||      *Date      : 25-11-2014													   ||
								||																				   ||
								||      *  NOTICE OF LICENSE  *													   ||
								|| 																				   ||
								|| 																				   ||
								||		   This source file is subject to the Company Copyright 				   ||
								||		   and its use by any other party without concern of Greencubes        	   ||
								||  	   or trying to sell this code will be considered illegal 				   ||
								||		   and any legal actions can be undertaken.								   ||
								||		   If you want to receive a copy of the license, please send an email      ||
								||  	   to info@greencubes.co.in, for further procedure						   ||
								||=================================================================================**/


 
function nameCheck(name){
	
	if (name == ''){
			
			document.getElementById("AllError").className = "error1";
			document.getElementById("AllError").innerHTML = 'All Field Required !';
			return false;
	}
	else
	{
		document.getElementById("AllError").innerHTML = '';
		return true;		
		
	}
	
	
}

function BussnessNameCheck(BussnessName){
	
	if (BussnessName == ''){
			
			document.getElementById("AllError").className = "error1";
			document.getElementById("AllError").innerHTML = 'All Field Required !';
			return false;
	}
	else
	{
		document.getElementById("AllError").innerHTML = '';
		return true;		
		
	}
	
	
}



function BussnessTypeCheck(BussnessType){
	
	if (BussnessType == ''){
			
			document.getElementById("AllError").className = "error1";
			document.getElementById("AllError").innerHTML = 'All Field Required !';
			return false;
	}
	else
	{
		document.getElementById("AllError").innerHTML = '';
		return true;		
		
	}
	
	
}


function PositionCheck(Position){
	
	if (Position == ''){
			
			document.getElementById("AllError").className = "error1";
			document.getElementById("AllError").innerHTML = 'All Field Required !';
			return false;
	}
	else
	{
		document.getElementById("AllError").innerHTML = '';
		return true;		
		
	}
	
	
}

function EmailCheck(Position){
	
	if (Position == ''){
			
			document.getElementById("AllError").className = "error1";
			document.getElementById("AllError").innerHTML = 'All Field Required !';
			return false;
	}
	else
	{
		document.getElementById("AllError").innerHTML = '';
		return true;		
		
	}
	
	
}

function ContactMethodCheck(ContactMethod){
	
	if (ContactMethod == ''){
			
			document.getElementById("AllError").className = "error1";
			document.getElementById("AllError").innerHTML = 'All Field Required !';
			return false;
	}
	else
	{
		document.getElementById("AllError").innerHTML = '';
		return true;		
		
	}
	
	
}

function ContactNumberCheck(ContactNumber){
	
	if (ContactNumber == ''){
			
			document.getElementById("AllError").className = "error1";
			document.getElementById("AllError").innerHTML = 'All Field Required !';
			return false;
	}
	else
	{
		document.getElementById("AllError").innerHTML = '';
		return true;		
		
	}
	
	
}












function MyAnuJayCretedForm(){
	var a = nameCheck(document.getElementById("name").value);
	var b = BussnessNameCheck(document.getElementById("BussnessName").value);
	var c = BussnessTypeCheck(document.getElementById("BussnessType").value);
	var d = PositionCheck(document.getElementById("Position").value);
	var e = ContactMethodCheck(document.getElementById("ContactMethod").value);
	var f = ContactNumberCheck(document.getElementById("ContactNumber").value);
	var g = ContactNumberCheck(document.getElementById("Email").value);

	
	
	
	

	
	if(a && b && c && d && e && f && g && h){
		return true;	
	}
	else{
		return false;	
	}
}


	
function IsNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}


function matchString(str1,str2){
	if(str1==str2)
		return true;	
	else
		return false;
}

function checkStringMinLength(strlength,chklength){
    if(strlength.length > chklength)
        return true;
    else
        return false; 
}

function checkStringMaxLength(strlength,chklength){
    if(strlength.length <= chklength)
        return true;
    else
        return false; 
}

function chkRegExpression(string,regExpn){
    var patt=new RegExp(regExpn);
		if(!(patt.test(string)))
                    return false;
                else
                    return true;
}





						     	/**================================================================================||
								||      *Developer : Green Cubes Solutions										   ||
								||      *Website   : www.greencubes.co.in										   ||
								||      *Date      : 25-11-2014													   ||
								||																				   ||
								||      *  NOTICE OF LICENSE  *													   ||
								|| 																				   ||
								|| 																				   ||
								||		   This source file is subject to the Company Copyright 				   ||
								||		   and its use by any other party without concern of Greencubes        	   ||
								||  	   or trying to sell this code will be considered illegal 				   ||
								||		   and any legal actions can be undertaken.								   ||
								||		   If you want to receive a copy of the license, please send an email      ||
								||  	   to info@greencubes.co.in, for further procedure						   ||
								||=================================================================================**/
