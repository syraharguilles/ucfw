<?php require_once("library/dbcon.php"); session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Home | Guest</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="css/base/jquery.ui.all.css">
		<link rel="stylesheet" href="css/demos.css">
		<script type="text/javascript" src="js/jquery.1.7.2.js"></script>
		<script src="js/jquery-1.8.0.js"></script>
		<script src="js/ui/jquery.ui.core.js"></script>
		<script src="js/ui/jquery.ui.widget.js"></script>
		<script src="js/ui/jquery.ui.accordion.js"></script>
		<script src="js/ui/jquery.ui.button.js"></script>
		<script type="text/javascript" src=""></script>
		
		<script src="js/src-js/text.js" ></script>
		<link rel="stylesheet" href="css/rocanvas.css" type="text/css" />
		<script>
		
			jQuery(document).ready(function($) {
				var icons = {
					header: "ui-icon-circle-arrow-e",
					headerSelected: "ui-icon-circle-arrow-s"
				};
				$( "#accordion" ).accordion({
					icons: icons
				});
				$( "#toggle" ).button().toggle(function() {
					$( "#accordion" ).accordion( "option", "icons", false );
				}, function() {
					$( "#accordion" ).accordion( "option", "icons", icons );
				});
				//dri sugod
				$("#text-panel").attr("style",function(){
					$(this).css("height","150px");
				});
				$("#image-panel").attr("style",function(){
					$(this).css("height","180px");
				});
				
				$("#guest-panel").attr("style",function(){
					$(this).css("height","180px");
				});
				
				$("._wPaint_menu").hide();
				
				
					$("#wall-post-content").load("content/parts/guestPost.php");
					$("#campuses-links a").live("click",function(){
						var pageid = this.id;
						
						$.post("content/parts/guestPost.php",{pageid : pageid},function(data){								
							$("#wall-post-content").html(data);		
							
								$("#campusno_tmp").val($("#campusno_temp").val());
								$("#campusno_tmp_img").val($("#campusno_temp").val());
								
						});
					});
			});
		</script>
		
	</head>
	<body>
		<div id = "modalView"></div>
		<div id = "wrapper">
			<div id = "sub-wrapper">
				<div id = "header">
					<?php include "content/parts/header.php";?>
				</div>
				<style type="text/css">
					#campuses-links{
						position:absolute;
						top:30px;
						left:30px;
					}
					#campuses-links a{
						color:#fff;
						text-decoration:underline;
						margin-right:21px;
						font-size:11px;
					}
					#campuses-links li{
						float:left;
					}
					#campuses-links ul{
						padding:0;
						margin:0;
					}
				</style>
			
				<div id = "content">
					<div id = "information">
						<label>Guest</label> 
						<!--<div id = "campuses-links">
							<ul>
								<?php
									$sql = "SELECT * FROM campuses";
									$result = mysql_query($sql);
									
									while($row = mysql_fetch_array($result)):
								?>
									<li><a href = "javascript:void(0);" id = "<?php echo $row['campusno']?>"><?php echo $row['campusname']?></a></li>
								<?php
									endwhile;
								?>
							</ul>
						</div>-->
						<div id = "post-wall-panel"><a id = "postmsg" href = "javascript:void(0);">Click Me to Post</a></div>
						<div id = "categoryMenuPanel">
							<?php include_once "content/menuCategory.php"; ?>
						</div>
						
					</div>
					<!--diri sugod--><div id = "wall-post">			
						<div id = "post-wrapper">
							<form> 
								<div id = "choose-color">	
									<div class = "color" style = "height:60px; width:22px; background:transparent url('content/image/red-picker.png') no-repeat center;">
										<input type = "radio" checked = "" name ="color" value = "red">
									</div>
									<div class = "color" style = "height:60px; width:22px; background:transparent url('content/image/yellow-picker.png') no-repeat center;"><input type = "radio" name ="color" value = "yellow"></div>
									<div class = "color" style = "height:60px; width:22px; background:transparent url('content/image/blue-picker.png') no-repeat center;"><input type = "radio" name ="color" value = "blue"></div>
									<div class = "color" style = "height:60px; width:22px; background:transparent url('content/image/green-picker.png') no-repeat center;"><input type = "radio" name ="color" value = "green"></div>
									<div class = "color" style = "height:60px; width:22px; background:transparent url('content/image/light-blue-picker.png') no-repeat center;"><input type = "radio" name ="color" value = "skyblue"></div>
								</div>
								<div id="accordion" style = "width:800px !important;">
									<h3><a href="#">GUEST INFO</a></h3>
									<div id = "guest-panel" style = "height:100px !important;">
										<form>
											<table cellpadding = "1" cellspacing = "1">
												<tr>
													<td>Firt Name:</td>
													<td><input type = "text" id = "guestfname"/></td>
												</tr>
												<tr>
													<td>Middle Name:</td>
													<td><input type = "text" id = "guestmname"/></td>
												</tr>
												<tr>
													<td>Last Name:</td>
													<td><input type = "text" id = "guestlname"/></td>
												</tr>
												<tr>
													<td>Email:</td>
													<td><input type = "text" id = "email"/></td>
												</tr>
												<tr>
													<td>&nbsp;</td>
													<td><input type = "button" id = "btnSubmit" value = "Submit"/></td>
												</tr>
											</table>
										</form>
										<script type = "text/javascript">
											jQuery(document).ready(function($){
												$("#btnSubmit").live("click",function(){
													var gfname = $("#guestfname").val()
														gmname = $("#guestmname").val()
														glname = $("#guestlname").val()
														gemail = $("#email").val();
														
													var data = {
														guest : "guest",
														gfname : gfname,
														gmname : gmname,
														glname : glname,
														gemail : gemail
													};
													$.post("content/process/insert_query.php",data,function(){
														$("#guestfname").val("");
														$("#guestmname").val("");
														$("#guestlname").val("");
														$("#email").val("");
														alert("SUCCESS");
													});
												});
											});
										</script>
									</div>
									<h3><a href="#">TEXT</a></h3>
									<div id = "text-panel" style = "height:100px !important;">
										<!--<label class = "text-check-word">TEXT PANELS</label>-->
										<div id = "text-tools">
											<textarea id ="wall-content" maxlength = "60" style = "resize:none;" rows = "5" cols = "40"></textarea>
											<input type = "button" id = "btnPost" name = "post" value = "POST"/>
										</div>
									</div>
									<h3><a href="#">DOODLE</a></h3>
									<div id = "doodle-panel">
										<input type = "hidden" id = "campusno_tmp" name = "campusno_tmp"/>
										<div id="mainContent">
											<!--<label>DOODLE PANELS</label>-->
											<?php include "doodle/index.php";?>											
										</div>
									</div>
							</form> 
								<h3><a href="#">IMAGE</a></h3>
									<div id = "image-panel">
										<!--<label>IMAGE PANELS</label>-->
										<form action="content/process/fileuploadimage.php" method="post" enctype="multipart/form-data">
											<input type = "hidden" id = "campusno_tmp_img" name = "campusno_tmp_img"/>
											<label for="file">Filename:</label>
											<input type="file" name="file" id="file" /> 
											<br />
											<input type="submit" name="submit" value="Submit" />
										</form>
									</div>
								</div>
						</div>
					</div><!--mana-->
					<div id = "wall-post-content">
					</div>	
					
				</div>
				
				<div id = "footer"></div>
			</div>
		</div>
	</body>
</html>
<script type = "text/javascript">
	jQuery(document).ready(function($){
		$("#wall-post").hide();
		$("#postmsg").live("click",function(){
			$("#wall-post").fadeIn("fast");
			$("#modalView").addClass("modal");
			
		});
		
		$( "#show_tools" ).live("click",function(){
			$("._wPaint_menu").show();
		});
		
		$("#modalView").live("click",function(){
			$("#modalView").removeClass("modal");
			$("#wall-post").fadeOut("fast");
			$(".color input[name=color]:checked").val();
			$("._wPaint_menu").hide();
			
		});
		$(".btnDelete").live("click",function(){
			var id = this.id;
			
			//$.post("content/process/delete_query.php",{txtPost:"wall-post-delete",txtID:id},function(){
			//	alert("SUCCESSFULLY DELETED");
			//	window.location.reload();
			//});
			
		});
		
		$("#save_to_db").live("click",function(){
			var doodle_doodle = $("#canvasImageData").val()
					  campusno = $("#campusno_temp").val()
				color  = $(".color input[name=color]:checked").val();
			var check;
				
				if(campusno == ""){
					check = 1;
				}
				else{
					check = campusno;
				}
			
			
			$.post("content/process/insert_query.php",{DoodleData:"Doodle",doodleAlldata:doodle_doodle,txtCampusno:check,color:color},function(e){
				alert("SUCCESSFULLY ADDED");
				window.location.reload();
			});
			
		});
		
		$("#btnPost").click(function(e){
			var content = $("#wall-content").val()
				color = $(".color input[name=color]:checked").val();
				var campusno = $("#campusno_temp").val();
				var check;
				
				if(campusno == ""){
					check = 1;
				}
				else{
					check = campusno;
				}
				$.post("content/process/insert_query.php",{txtContent:content,txtPost:"wall-post",txtGuest : "guest",txtColor: color,txtCampusno : check},function(){
					alert("SUCCESSFULLY ADDED");
					window.location.reload();
					$("#wall-content").val("");
					$("#wall-post").hide("slow");
					$("#modalView").removeClass("modal");
					
					//$("#wall-post-content").append("<div class = 'post-content' style = 'background:url(content/image/"+color+".png);height:200px;width:250px;'><p>"+content+"</p><a href = 'javascript:void(0);' class = 'btnDelete'>Delete</a></div>");
				});
			e.preventDefault();
		});
	});
</script>