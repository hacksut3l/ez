$(document).ready(function() {
var a = $("#f_name");
//var b = $("#m_name");
var c = $("#l_name");
var d = $("#address");
var e = $("#city");
var f = $("#state");
var g = $("#postcode");
var h = $("#telephone");
var i = $("#mobile");
var j = $("#emailid");
var k = $("#searchsdate");
var l = $("#certify");
var m = $("#terms");

	function IsEmail(email) 
	{
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	 // var regex=/^.*(?=.{6,32})(?=.*\d)(?=.*[a-zA-Z]).*$/;
	  return regex.test(email);
	}

	$("#psubmit").click(function(){
				a.css("backgroundColor", "");
				//b.css("backgroundColor", "");
				c.css("backgroundColor", "");
				d.css("backgroundColor", "");
				e.css("backgroundColor", "");
				f.css("backgroundColor", "");
				g.css("backgroundColor", "");
				h.css("backgroundColor", "");
				i.css("backgroundColor", "");
				j.css("backgroundColor", "");
				k.css("backgroundColor", "");

		if(a.val()=="")
		{
			a.css("backgroundColor", "yellow");
			a.focus();
			alert("Please enter your first name !");
			return false;
		}
		/*else if(b.val()=="")
		{
			b.css("backgroundColor", "yellow");
			b.focus();
			alert("Please enter your middle name !");
			return false;
		}*/
		else if(c.val()=="")
		{
			c.css("backgroundColor", "yellow");
			c.focus();
			alert("Please enter your last name !");
			return false;
		}
		else if(d.val()=="")
		{
			d.css("backgroundColor", "yellow");
			d.focus();
			alert("Please enter your address !");
			return false;
		}
		else if(e.val()=="")
		{
			e.css("backgroundColor", "yellow");
			e.focus();
			alert("Please enter your suburb !");
			return false;
		}
		else if(f.val()=="")
		{
			f.css("backgroundColor", "yellow");
			f.focus();
			alert("Please select your state !");
			return false;
		}
		else if(g.val()=="")
		{
			g.css("backgroundColor", "yellow");
			g.focus();
			alert("Please enter your postcode !");
			return false;
		}
		else if(h.val()=="")
		{
			h.css("backgroundColor", "yellow");
			h.focus();
			alert("Please enter your telephone no. !");
			return false;
		}
		else if(i.val()=="")
		{
			i.css("backgroundColor", "yellow");
			i.focus();
			alert("Please enter your mobile no. !");
			return false;
		}
		else if(j.val()=="")
		{
			j.css("backgroundColor", "yellow");
			j.focus();
			alert("Please enter your email id !");
			return false;
		}
		else if(k.val()=="")
		{
			k.css("backgroundColor", "yellow");
			k.focus();
			alert("Please select date !");
			return false;
		}
		
		else if(isNaN(g.val()))
		{
			g.css("backgroundColor", "yellow");
			g.focus();
			alert("Invalid postcode !");
			return false;
		}
		else if(isNaN(h.val()))
		{
			h.css("backgroundColor", "yellow");
			h.focus();
			alert("Invalid telephone no. !");
			return false;
		}
		else if(isNaN(i.val()))
		{
			i.css("backgroundColor", "yellow");
			i.focus();
			alert("Invalid mobile no. !");
			return false;
		}	
		else if(!IsEmail(j.val()))
		{
			j.css("backgroundColor", "yellow");
			j.focus();
			alert("Invalid email id !");
			return false;
		}

		else if(!l.is(':checked'))
		{
		alert("Please select certify");
		return false;
		}
		else if(!m.is(':checked'))
		{
		alert("Please accept terms and condition to proceed");
		return false;
		}
		
		else
		{
			document.person_making_form.submit();
		}

	});

});