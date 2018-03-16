
function cros_submit()
{
	if((document.cros_form.cros_width.value=="") || (isNaN(document.cros_form.cros_width.value)))
	{
		alert("Please enter the image width. only number.")
		document.cros_form.cros_width.focus();
		return false;
	}
	else if((document.cros_form.cros_height.value=="") || (isNaN(document.cros_form.cros_height.value)))
	{
		alert("Please enter the image height. only number.")
		document.cros_form.cros_height.focus();
		return false;
	}
	else if((document.cros_form.cros_display.value=="") || (isNaN(document.cros_form.cros_display.value)))
	{
		alert("Please enter the display. only number.")
		document.cros_form.cros_display.focus();
		return false;
	}
	else if((document.cros_form.cros_intervaltime.value=="") || (isNaN(document.cros_form.cros_intervaltime.value)))
	{
		alert("Please enter the interval time. only number.")
		document.cros_form.cros_intervaltime.focus();
		return false;
	}
	else if((document.cros_form.cros_duration.value=="") || (isNaN(document.cros_form.cros_duration.value)))
	{
		alert("Please enter the duration. only number.")
		document.cros_form.cros_duration.focus();
		return false;
	}
	
}

function cros_delete(id)
{
	if(confirm("Do you want to delete this record?"))
	{
		document.frm_cros_display.action="options-general.php?page=netgo-horizontal-carousel&ac=del&did="+id;
		document.frm_cros_display.submit();
	}
}	

function cros_redirect()
{
	window.location = "options-general.php?page=netgo-horizontal-carousel";
}

