<script type="text/javascript">
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
		var conf = confirm("Are you sure you want to Log out?","Yes","No");
		
		if(conf==true)
		{
			document.location = "index.php";
		}
	}
	
	function conf_first()
	{
		var conf=confirm("Are you sure you want to change your password?");
		if(conf==true)
		{
			alert("Successfully Changed!")
			document.location = "home.php";
		}
	}
	
	function toggle(zap)
	{
		if(document.getElementById)
		{
			var show = document.getElementById(zap).style;
			if(show.display == "block")
			{
				show.display = "none";
				document.getElementById('note_btn').value = 'Show Notes';
			}else
			{
				show.display = "block";
				document.getElementById('note_btn').value = 'Hide Notes';
			}
			return false;
		}
		else
		{
			return true;
		}
	}
	
	
	
