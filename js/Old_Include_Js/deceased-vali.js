$(document).ready(function() {
var a = $("#f_name");
var b = $("#m_name");
var c = $("#l_name");
var d = $("#address");
var e = $("#suburb");
var f = $("#state");
var g = $("#postcode");

var h = $("#age");
var i = $("#searchsdate");
var j = $("#height");
var k = $("#weight");
var l = $("#pob");
var m = $("#searchsdate1");
var n = $("#tod");
var o = $("#cob");
var p = $("#death_address");
var q = $("#death_suburb");
var r = $("#death_state");
var s = $("#death_postcode");

var t = $("#doc_postcode");
var u = $("#doc_telephone");
var v = $("#doc_mobile");
var w = $("#doc_email");
var x = $("#business_postcode");
var y = $("#business_telephone");
var z = $("#business_mobile");
var a1 = $("#business_email");


	function IsEmail(email) 
	{
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	 // var regex=/^.*(?=.{6,32})(?=.*\d)(?=.*[a-zA-Z]).*$/;
	  return regex.test(email);
	}

	$("#dsubmit").click(function(){
				a.css("backgroundColor", "");
				b.css("backgroundColor", "");
				c.css("backgroundColor", "");
				d.css("backgroundColor", "");
				e.css("backgroundColor", "");
				f.css("backgroundColor", "");
				g.css("backgroundColor", "");
				h.css("backgroundColor", "");
				i.css("backgroundColor", "");
				j.css("backgroundColor", "");
				k.css("backgroundColor", "");
				l.css("backgroundColor", "");
				m.css("backgroundColor", "");
				n.css("backgroundColor", "");
				o.css("backgroundColor", "");
				p.css("backgroundColor", "");
				q.css("backgroundColor", "");
				r.css("backgroundColor", "");
				s.css("backgroundColor", "");
				t.css("backgroundColor", "");
				u.css("backgroundColor", "");
				v.css("backgroundColor", "");
				w.css("backgroundColor", "");
				x.css("backgroundColor", "");
				y.css("backgroundColor", "");
				z.css("backgroundColor", "");
				a1.css("backgroundColor", "");

		if(a.val()=="")
		{
			a.css("backgroundColor", "yellow");
			a.focus();
			alert("Please enter your first name !");
			return false;
		}
		else if(b.val()=="")
		{
			b.css("backgroundColor", "yellow");
			b.focus();
			alert("Please enter your middle name !");
			return false;
		}
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
			alert("Please enter your age !");
			return false;
		}
		else if(i.val()=="")
		{
			i.css("backgroundColor", "yellow");
			i.focus();
			alert("Please select date !");
			return false;
		}
		else if(j.val()=="")
		{
			j.css("backgroundColor", "yellow");
			j.focus();
			alert("Please enter height !");
			return false;
		}
		else if(k.val()=="")
		{
			k.css("backgroundColor", "yellow");
			k.focus();
			alert("Please enter weight !");
			return false;
		}
		else if(l.val()=="")
		{
			l.css("backgroundColor", "yellow");
			l.focus();
			alert("Please enter place of birth !");
			return false;
		}
		else if(m.val()=="")
		{
			m.css("backgroundColor", "yellow");
			m.focus();
			alert("Please enter country of birth !");
			return false;
		}
		else if(n.val()=="")
		{
			n.css("backgroundColor", "yellow");
			n.focus();
			alert("Please select date !");
			return false;
		}
		else if(o.val()=="")
		{
			o.css("backgroundColor", "yellow");
			o.focus();
			alert("Please enter death time !");
			return false;
		}
		else if(p.val()=="")
		{
			p.css("backgroundColor", "yellow");
			p.focus();
			alert("Please enter death address !");
			return false;
		}
		else if(q.val()=="")
		{
			q.css("backgroundColor", "yellow");
			q.focus();
			alert("Please enter subrub !");
			return false;
		}
		else if(r.val()=="")
		{
			r.css("backgroundColor", "yellow");
			r.focus();
			alert("Please enter state !");
			return false;
		}
		else if(s.val()=="")
		{
			s.css("backgroundColor", "yellow");
			s.focus();
			alert("Please enter postcode !");
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
			alert("Invalid age !");
			return false;
		}

		else if(isNaN(s.val()))
		{
			s.css("backgroundColor", "yellow");
			s.focus();
			alert("Invalid postcode !");
			return false;
		}	
		else if(isNaN(t.val()))
		{
			t.css("backgroundColor", "yellow");
			t.focus();
			alert("Invalid postcode !");
			return false;
		}	
		else if(isNaN(u.val()))
		{
			u.css("backgroundColor", "yellow");
			u.focus();
			alert("Invalid telephone no. !");
			return false;
		}	
		else if(isNaN(v.val()))
		{
			v.css("backgroundColor", "yellow");
			v.focus();
			alert("Invalid mobile no. !");
			return false;
		}	
		else if(!IsEmail(w.val()) && w.val()!="")
		{
			w.css("backgroundColor", "yellow");
			w.focus();
			alert("Invalid email id !");
			return false;
		}
		else if(isNaN(x.val()))
		{
			x.css("backgroundColor", "yellow");
			x.focus();
			alert("Invalid postcode !");
			return false;
		}	
		else if(isNaN(y.val()))
		{
			y.css("backgroundColor", "yellow");
			y.focus();
			alert("Invalid telephone no. !");
			return false;
		}	
		else if(isNaN(z.val()))
		{
			z.css("backgroundColor", "yellow");
			z.focus();
			alert("Invalid mobile no. !");
			return false;
		}	
		else if(!IsEmail(a1.val())  && a1.val()!="")
		{
			a1.css("backgroundColor", "yellow");
			a1.focus();
			alert("Invalid email id !");
			return false;
		}

		else
		{
			document.deceased_form.submit();
		}

	});

});