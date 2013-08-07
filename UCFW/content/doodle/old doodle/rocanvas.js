/* some JS code inspired/used from http://www.williammalone.com/articles/create-html5-canvas-javascript-drawing-app/ */

var roCanvas={};
var clickX = new Array();
var clickY = new Array();
roCanvas['startX'] = 0;
roCanvas['startY'] = 0;
roCanvas['clearRect']=[0,0,0,0]; 	
var clickDrag = new Array();
var paint;
var defaultColor="#000";
var defaultShape="round";
var defaultWidth=5;
var drawTool="path";

var canvas = document.getElementById('RoCanvas');
// Check the element is in the DOM and the browser supports canvas

if(canvas.getContext) 
{
    // Initaliase a 2-dimensional drawing context
    var context = canvas.getContext('2d');
    
    context.strokeStyle = defaultColor;
    context.lineJoin = defaultShape;
    context.lineWidth = defaultWidth;
}

$('#RoCanvas').click(function(e){
	if ($('#textAreaPopUp').length == 0) {
		var mouseX = e.pageX - this.offsetLeft + $("#RoCanvas").position().left;
		var mouseY = e.pageY - this.offsetTop;

		//append a text area box to the canvas where the user clicked to enter in a comment
		var textArea = "<div id='textAreaPopUp' style='position:absolute;top:"+mouseY+"px;left:"+mouseX+"px;z-index:30;'><textarea id='textareaTest' style='width:100px;height:50px;'></textarea>";
		var saveButton = "<input type='button' value='save' id='saveText' onclick='saveTextFromArea("+mouseY+","+mouseX+");'></div>";
		var appendString = textArea + saveButton;
		$("#m").append(appendString);
	} else {
		$('textarea#textareaTest').remove();
		$('#saveText').remove();
		$('#textAreaPopUp').remove();
		var mouseX = e.pageX - this.offsetLeft + $("#RoCanvas").position().left;
		var mouseY = e.pageY - this.offsetTop;
		//append a text area box to the canvas where the user clicked to enter in a comment
		var textArea = "<div id='textAreaPopUp' style='position:absolute;top:"+mouseY+"px;left:"+mouseX+"px;z-index:30;'><textarea id='textareaTest' style='width:100px;height:50px;'></textarea>";
		var saveButton = "<input type='button' value='save' id='saveText' onclick='saveTextFromArea("+mouseY+","+mouseX+");'></div>";
		var appendString = textArea + saveButton;
		$("#m").append(appendString);
	}
});

function saveTextFromArea(y,x){
	//get the value of the textarea then destroy it and the save button
	var text = $('textarea#textareaTest').val();
	//$('textarea#textareaTest').remove();
	//$('#saveText').remove();
	$('#textAreaPopUp').remove();
	//get the canvas and add the text functions
	var canvas = document.getElementById('RoCanvas');
	var ctx = canvas.getContext('2d');
	var cw = canvas.clientWidth;
	var ch = canvas.clientHeight;
	canvas.width = cw;
	canvas.height = ch;
	//break the text into arrays based on a text width of 100px
	var phraseArray = getLines(ctx,text,100);
	// this adds the text functions to the ctx
	CanvasTextFunctions.enable(ctx);
	var counter = 0;
	//set the font styles
	var font = "sans";
	var fontsize = 16;
	ctx.strokeStyle = "rgba(237,229,0,1)";
	ctx.shadowOffsetX = 2;
	ctx.shadowOffsetY = 2;
	ctx.shadowBlur = 1;
	ctx.shadowColor = "rgba(0,0,0,1)";
	//draw each phrase to the screen, making the top position 20px more each time so it appears there are line breaks
	$.each(phraseArray, function() {
		//set the placement in the canvas
		var lineheight = fontsize * 1.5;
		var newline = ++counter;
		newline = newline * lineheight;
		var topPlacement = y - $("#RoCanvas").position().top + newline;
		var leftPlacement = x - $("#RoCanvas").position().left;
		text = this;
		//draw the text
		ctx.drawText(font, fontsize, leftPlacement, topPlacement, text);					
		ctx.save();
		ctx.restore();
	});
	//reset the drop shadow so any other drawing don't have them
	ctx.shadowOffsetX = 0;
	ctx.shadowOffsetY = 0;
	ctx.shadowBlur = 0;
	ctx.shadowColor = "rgba(0,0,0,0)";
}

function getLines(ctx,phrase,maxPxLength) {
	//break the text area text into lines based on "box" width
	var wa=phrase.split(" "),
	phraseArray=[],
	lastPhrase="",
	l=maxPxLength,
	measure=0;
	ctx.font = "16px sans-serif";
	for (var i=0;i<wa.length;i++) {
		var w=wa[i];
		measure=ctx.measureText(lastPhrase+w).width;
		if (measure<l) {
			lastPhrase+=(" "+w);
		}else {
			phraseArray.push(lastPhrase);
			lastPhrase=w;
		}
		if (i===wa.length-1) {
			phraseArray.push(lastPhrase);
			break;
		}
	}
	return phraseArray;
}

$('#RoCanvas').mousedown(function(e){
  var mouseX = e.pageX - this.offsetLeft;
  roCanvas['startX']=mouseX;
  var mouseY = e.pageY - this.offsetTop;
  roCanvas['startY']=mouseY;
		
  paint = true;	
  if(drawTool=='path')
  {
	addClick(mouseX, mouseY);
	redraw();
  } 
});  

$('#RoCanvas').mousemove(function(e){
    if(paint){
	// clear any rectangles that should be cleared
    context.clearRect(roCanvas['clearRect'][0],roCanvas['clearRect'][1],
		roCanvas['clearRect'][2],roCanvas['clearRect'][3]);
		
	// draw different shapes
	switch(drawTool)
	{
		case 'rectangle':		
		case 'filledrectangle':		
			w = e.pageX - this.offsetLeft - roCanvas['startX'];
			h = e.pageY - this.offsetTop - roCanvas['startY'];			
			roCanvas['clearRect']=[roCanvas['startX'], roCanvas['startY'], w, h];
			
			if(drawTool=='rectangle')
			{
				context.strokeRect(roCanvas['startX'], roCanvas['startY'], w, h);			
			}
			else
			{				
				context.fillRect(roCanvas['startX'], roCanvas['startY'], w, h);			
			}
		break;
		default:
			addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
		break;
	}    
    redraw();
  }
});

$('#RoCanvas').mouseup(function(e){
  paint = false;
  
  clickX = new Array();
  clickY = new Array();
  clickDrag = new Array();
  roCanvas['clearRect']=[0,0,0,0]; 	
});

$('#RoCanvas').mouseleave(function(e){
  paint = false;
});

function addClick(x, y, dragging)
{
  clickX.push(x);
  clickY.push(y);
  clickDrag.push(dragging);
}

function redraw(){
 // canvas.width = canvas.width; // Clears the canvas  
  			
  for(var i=0; i < clickX.length; i++)
  {		
    context.beginPath();
    if(clickDrag[i] && i){
      context.moveTo(clickX[i-1], clickY[i-1]);
     }else{
       context.moveTo(clickX[i]-1, clickY[i]);
     }
     context.lineTo(clickX[i], clickY[i]);
     context.closePath();
     context.stroke();
  }
}

function clearCanvas()
{
	context.clearRect(0,0,canvas.width,canvas.height);
    canvas.width = canvas.width;
    
    clickX = new Array();
    clickY = new Array();
    clickDrag = new Array();
}

function setColor(col)
{
    context.strokeStyle = col;
	context.fillStyle = col;
}

function setSize(px)
{
    context.lineWidth=px;
}

// sets the tool to draw
function setTool(tool)
{
	drawTool=tool;	
}

function RoSave(frm)
{    
    var strImageData = canvas.toDataURL(); 
	
	$.ajax({
		url: "doodle.php", // place your Ajax URL here
		dataType: "html",
		type: "post",
		data: "pic="+encodeURIComponent(strImageData)+"&name="+frm.ddl_name.value+"&desc="+frm.ddl_desc.value,
		success: function(msg)
		{
		   // on success output some message or redirect etc
		   alert("Doodle created.");
		   //document.write("<img src='"+decodeURIComponent(strImageData)+"'/>");
		   window.location="doodle.php";
		}		
	});		
	//console.log(data);
}

function centerElt(eid,w,h)
{
    elt=document.getElementById(eid);
    var centerY= Math.floor(Math.round($(window).height()/2));
    var centerX= Math.floor(Math.round($(window).width()/2));

    elt.style.top=(centerY-Math.floor(Math.round(h/2))-50)+$(window).scrollTop() + "px";
    elt.style.left=(centerX-Math.floor(Math.round(w/2)))+"px";

    // elt.style.display='block';
	$("#"+eid).show('slow');
}