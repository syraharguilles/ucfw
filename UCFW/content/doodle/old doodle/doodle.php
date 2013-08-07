

<div id="mainContent">
	<!--[if IE]>
	<p style="font-weight:bold;color:red;">Sorry, your browser doesn't support canvas. Please download a modern browser like <a href="http://www.mozilla.com/en-US/firefox/new/">Firefox</a>, <a href="http://www.google.com/chrome/">Chrome</a>, <a href="http://www.opera.com/">Opera</a> or <a href="http://www.apple.com/safari/">Safari</a>.</p>
	<![endif]-->

	<!--[if ! IE]><!-->
	<div id="m">
		<canvas id="RoCanvas" width="200" height="100" style="border:1pt solid black;margin:auto;cursor:crosshair;clear:both;">
		</canvas>
	</div>

	<div style="clear:both;">&nbsp;</div>

	<div style="float:left;">Colors:</div> <a href="#" class="colorPicker" onclick="setColor('#FFF');return false;" style="background:#FFF;">&nbsp;</a>
	<a class="colorPicker" href="#" onclick="setColor('#000');return false;" style="background:#000;">&nbsp;</a>
	<a class="colorPicker" href="#" onclick="setColor('#FF0000');return false;" style="background:#FF0000;">&nbsp;</a>
	<a class="colorPicker" href="#" onclick="setColor('#00FF00');return false;" style="background:#00FF00;">&nbsp;</a>
	<a class="colorPicker" href="#" onclick="setColor('#0000FF');return false;" style="background:#0000FF;">&nbsp;</a>
	<a class="colorPicker" href="#" onclick="setColor('#FFFF00');return false;" style="background:#FFFF00;">&nbsp;</a>
	<a class="colorPicker" href="#" onclick="setColor('#00FFFF');return false;" style="background:#00FFFF;">&nbsp;</a>

	<div style="clear:both;">&nbsp;</div>

	<div style="float:left;">Sizes:</div> 
	<a href="#" class="colorPicker" onclick="setSize(2);return false;" style="width:2px;height:2px;margin-left:15px;">&nbsp;</a>
	<a href="#" class="colorPicker" onclick="setSize(5);return false;" style="width:5px;height:5px;margin-left:15px;">&nbsp;</a>
	<a href="#" class="colorPicker" onclick="setSize(10);return false;" style="width:10px;height:10px;margin-left:15px;">&nbsp;</a>
	<a href="#" class="colorPicker" onclick="setSize(25);return false;" style="width:25px;height:25px;margin-left:15px;">&nbsp;</a>

	<div style="clear:both;">&nbsp;</div>

	<div style="float:left;">Tools:</div> 

	<a href="#" onclick="setTool('path');return false;"><img src="content/image/tool-path.png" width="25" height="25" alt="Free Path"></a>
	<a href="#" onclick="setTool('rectangle');return false;"><img src="content/image/tool-rectangle.png" width="25" height="25" alt="Empty Rectangle"></a>
	<a href="#" onclick="setTool('filledrectangle');return false;"><img src="content/image/tool-filledrectangle.png" width="25" height="25" alt="Filled Rectangle"></a>

	<div style="clear:both;">&nbsp;</div>

	<p style="clear:both;"><input type="button" value="Clear Canvas" onclick="clearCanvas();">
	<input type="button" value="Save Doodle" onclick="centerElt('RoSave',400,300);"></p>

	<div id="RoSave" class="ajax form" style="width:450px;">
		<form method="post">   
		<fieldset>
			<legend>Doodle information:</legend>
			<table>												
				<tr>
					<td><label style="color:#4e698c;">Doodle Name:<label></td>
					<td><input type="text" name="ddl_name" size="30" maxlength="20" required/></td>
				</tr>
							
				<tr>
					<td valign="top"><label style="color:#4e698c;">Doodle Description:<label></td>
					<td>
						<textarea name="ddl_desc" placeholder="Description" maxlength="40"></textarea><br/>
						
					</td>
				</tr>		
			</table>
	 
		</fieldset>
		<p align="center">
		<input type="button" value="Save Doodle" onclick="RoSave(this.form);">
		<input type="button" value="Cancel" onclick="$('#RoSave').hide('slow');">
		</p>
		</form>
	</div>
	<div id="res">
	</div>
</div>						
		