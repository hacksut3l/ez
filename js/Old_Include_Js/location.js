$(document).ready(function()
{
	$('#state').live("change",function()
	{
		var state_id = $(this).val();
		
		$.ajax
			({
				type: "POST",
				url: "get_cities.php",
				data: "state_id="+state_id,
				success: function(msg)
				{
					$('#city_span').html(msg);
				}
				
			});
		
	});
	
	
	
	
	
	
});