var timeout	= 100;
	var closetimer	= 0;
	var ddmenuitem	= 0;	
	// open hidden layer
	function mopen(id)
	{	
		// cancel close timer
		mcancelclosetime();
	
		// close old layer
		if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
	
		// get new layer and show it
		ddmenuitem = document.getElementById(id);
		ddmenuitem.style.visibility = 'visible';
	
	}
	// close showed layer
	function mclose()
	{
		if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
	}
	
	// go close timer
	function mclosetime()
	{
		closetimer = window.setTimeout(mclose, timeout);
	}
	
	// cancel close timer
	function mcancelclosetime()
	{
		if(closetimer)
		{
			window.clearTimeout(closetimer);
			closetimer = null;
		}
	}
	
	// close layer when click-out
	document.onclick = mclose;
	
	function confirm_logout()
	{
			document.location = "logout.php";
	}
	
	function isNumberKey(evnt)
	{
		var e = evnt;
		if(window.event)
		{
			var  charCode = e.keyCode;	
		}else if(e.which)
			{
				var charCode = e.which;	
			}
		if(charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		return true;		
	}