<style>
	*{
		font-family:arial;
	}
	#textSlide, #doddleSlide, #imageSlide, #openSlide{
		width:500px;
		border:1px solid #4261ff;
		margin-bottom:1px;
		background-color:#eaedff;
		
	}
	.title{
		display:block;
		padding-top:10px;
		padding-left:15px;
		padding-bottom:10px;
		font-size:14px;
		font-weight:bolder;
		background-color:#6079f9;
		border-bottom:3px solid #a5b4ff;
		color:#fff;
		
	}
	.textTools, .doddleTools, .imageTools, .openTools{
		display:none;
	}
	.title:hover{
		background-color:#000;
	}
</style>
<script type = "text/javascript" src = "js/jquery.1.7.2.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$("#text").click(function(){

			var textTools = $(".textTools");
			var doddleTools = $(".doddleTools");
			var imageTools = $(".imageTools");
			textTools.css("height","300px");
			if(textTools.toggle("slow")){
				$(".doddleTools").hide();
				$(".imageTools").hide();
			}
			
		});
		$("#doodle").click(function(){ 
			var textTools = $(".textTools");
			var doddleTools = $(".doddleTools");
			var imageTools = $(".imageTools");
			
			doddleTools.css("height","300px");
			
			if(doddleTools.toggle("slow")){
				$(".textTools").hide();
				$(".imageTools").hide();
			}
		});
		$("#image").click(function(){
			var textTools = $(".textTools");
			var doddleTools = $(".doddleTools");
			var imageTools = $(".imageTools");
			
			imageTools.css("height","300px");
			
			if(imageTools.toggle("slow")){
				$(".doddleTools").hide();
				$(".textTools").hide();
			}
		});
		$("#open").click(function(){
			var openTools = $(".openTools");
			
			openTools.css("height","300px");
			
			if(openTools.toggle("slow")){
				$(".doddleTools").hide();
				$(".textTools").hide();
			}
		});
	});
</script>
<div id = "addPost">
	
	<div id = "textSlide">
		<label class ="title" id = "text">Text</label>
		<div class = "textTools">adadas</div>
	</div>
	<div id = "doddleSlide">
		<label class ="title" id = "doodle">Doodle</label>
		<div class = "doddleTools">adadas</div>
	</div>
	<div id = "imageSlide">
		<label class ="title"  id = "image">Image</label>
		<div class = "imageTools">adadas</div>
	</div>
	<div id = "openSlide">
		<label class ="title"  id = "open">Open</label>
		<div class = "openTools">adadas</div>
	</div>
</div>