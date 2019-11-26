$(":text, textarea").keyup(function()
{
	if($(this).attr("id")==  "login-username" )
	{
		
	}
	else
	{
		$(this).val($(this).val().toUpperCase());
	}
	
});