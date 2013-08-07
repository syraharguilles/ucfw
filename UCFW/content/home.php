<?php
	session_start();
	require_once("content/process/redirect2.php");
	require_once("library/dbcon.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Home | User</title>

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
				
				$("._wPaint_menu").hide();
				
				
					$("#wall-post-content").load("content/parts/OverAllPost.php");
					$("#campuses-links a").live("click",function(){
						var pageid = this.id;
						
						$.post("content/parts/OverAllPost.php",{pageid : pageid},function(data){								
							$("#wall-post-content").html(data);		
							
								$("#campusno_tmp").val($("#campusno_temp").val());
								$("#campusno_tmp_img").val($("#campusno_temp").val());
								
						});
					});
				//mana
				
				
			});
		</script>
	</head>
	<body><input type = "hidden" id = "user_login" value = "<?php echo $_SESSION['userid'];?>"/>
		<div id = "modalView"></div>
		<div id = "wrapper">
			<div id = "sub-wrapper">
				<div id = "header">
					<?php include "content/parts/header.php";?>
				</div>
				
				<div id = "content">
					<div id = "information">
						<label >User</label>
						<div id = "post-wall-panel"><a id = "postmsg" href = "javascript:void(0);">Click Me to Post</a></div>
						<div id = "categoryMenuPanel">
							<?php include_once "content/menuCategory.php"; ?>
						</div>
						<div><?php include_once "content/parts/wall-post-home.php";?></div>
					</div>
				</div>
				<div id = "left-sidebar">
						
				</div>
				<div id = "right-sidebar">
					<div id = "wall-post-content">
						
					</div>
				</div>
				<div id "footer"></div>
			</div>
		</div>
	</body>
</html>
<script type = "text/javascript">
	jQuery(document).ready(function($){
		$("#wall-post").hide();
		$("#wall-post-content").load("content/parts/OverAllPost.php")
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
			
			$.post("content/process/delete_query.php",{txtPost:"wall-post-delete",txtID:id},function(){
				alert("SUCCESSFULLY DELETED");
				window.location.reload();
			});
			
		});
		$("#btnPost_user").click(function(e){
				var content = $("#wall-content").val()
				color = $(".color input[name=color]:checked").val();
				//campus
				var campusno = $("#campusno_temp").val();
				//dept
				var deptno = $("#deptno_temp").val();
				var deptactno = $("#deptactno_temp").val();
				//col
				var colno = $("#colno_temp").val();
				var colactno = $("#colactno_temp").val();
				var progno = $("#progno_temp").val();
				var progactno = $("#progactno_temp").val();
				var progorgno = $("#progorgno_temp").val();
				var orgno = $("#orgno_temp").val();
				var orgactno = $("#orgactno_temp").val();
				var actno = $("#actno_temp").val();
				
				//campus
				var checkCampusno = (campusno == "")? checkCampusno  = 1 : checkCampusno = campusno;
				//dept
				var checkDeptno = (deptno == "")? checkDeptno  = 0 : checkDeptno = deptno;
				var checkDeptactno = (deptactno == "")? checkDeptactno  = 0 : checkDeptactno = deptactno;
				//col
				var checkColno = (colno == "")? checkColno  = 0 : checkColno = colno;
				var checkColactno = (colactno == "")? checkColactno  = 0 : checkColactno = colactno;
				var checkProgno = (progno == "")? checkProgno  = 0 : checkProgno = progno;
				var checkProgactno = (progactno == "")? checkProgactno  = 0 : checkProgactno = progactno;
				var checkProgorgno = (progorgno == "")? checkProgorgno  = 0 : checkProgorgno = progorgno;
				//org
				var checkOrgno = (orgno == "")? checkOrgno  = 0 : checkOrgno = orgno;
				var checkOrgactno = (orgactno == "")? checkOrgactno  = 0 : checkOrgactno = orgactno;
				
				//act 
				var checkActno = (actno == "")? checkActno  = 0 : checkActno = actno;
				
				var data = {
					txtContent:content,
					txtPostAll:"wall-post",
					txtColor: color,
					txtCampusno : checkCampusno,
					txtDeptno : checkDeptno,
					txtDeptactno : checkDeptactno,
					txtColno : checkColno,
					txtColactno : checkColactno,
					txtProgno : checkProgno,
					txtProgactno : checkProgactno,
					txtProgorgno : checkProgorgno,
					txtOrgno : checkOrgno,
					txtOrgactno : checkOrgactno,
					txtActno : checkActno
				};
				
				$.post("content/process/insert_query.php",data,function(){
					alert("SUCCESSFULLY ADDED");
					window.location.reload();
					$("#wall-content").val("");
					$("#wall-post").hide("slow");
					$("#modalView").removeClass("modal");
					
					//$("#wall-post-content").append("<div class = 'post-content' style = 'background:url(content/image/"+color+".png);height:200px;width:250px;'><p>"+content+"</p><a href = 'javascript:void(0);' class = 'btnDelete'>Delete</a></div>");
				});
			e.preventDefault();
		});
		$("#save_to_db").live("click",function(){
			var doodle_doodle = $("#canvasImageData").val()
			//campus
			var campusno = $("#campusno_temp").val();
			//dept
			var deptno = $("#deptno_temp").val();
			var deptactno = $("#deptactno_temp").val();
			//col
			var colno = $("#colno_temp").val();
			var colactno = $("#colactno_temp").val();
			var progno = $("#progno_temp").val();
			var progactno = $("#progactno_temp").val();
			//org
			var orgno = $("#orgno_temp").val();
			var orgactno = $("#orgactno_temp").val();
			
			//act
			var actno = $("#actno_temp").val();
			
			var color  = $(".color input[name=color]:checked").val();
				//campus
				var checkCampusno = (campusno == "")? checkCampusno  = 1 : checkCampusno = campusno;
				//dept
				var checkDeptno = (deptno == "")? checkDeptno  = 0 : checkDeptno = deptno;
				var checkDeptactno = (deptactno == "")? checkDeptactno  = 0 : checkDeptactno = deptactno;
				//col
				var checkColno = (colno == "")? checkColno  = 0 : checkColno = colno;
				var checkColactno = (colactno == "")? checkColactno  = 0 : checkColactno = colactno;
				var checkProgno = (progno == "")? checkProgno  = 0 : checkProgno = progno;
				var checkProgactno = (progactno == "")? checkProgactno  = 0 : checkProgactno = progactno;
				//org
				var checkOrgno = (orgno == "")? checkOrgno  = 0 : checkOrgno = orgno;
				var checkOrgactno = (orgactno == "")? checkOrgactno  = 0 : checkOrgactno = orgactno;
				
				//act
				var checkActno = (actno == "")? checkActno  = 0 : checkActno = actno;
				
			var data = {
				DoodleDataUser:"Doodle-user",
				doodleAlldata:doodle_doodle,
				txtCampusno:checkCampusno,
				txtDeptno:checkDeptno,
				txtDeptactno:checkDeptactno,
				txtColno:checkColno,
				txtColactno : checkColactno,
				txtProgno : checkProgno,
				txtProgactno : checkProgactno,
				txtOrgno : checkOrgno,
				txtOrgactno : checkOrgactno,
				txtActno : checkActno,
				txtUser : <?php echo $_SESSION['userid'];?>,
				color:color
			};
			
			$.post("content/process/insert_query.php",data,function(e){
				alert("SUCCESSFULLY ADDED");
				window.location.reload();
			});
		});
		
		$(".favor").live("click",function(e){
				var postno = this.id;
				
				//alert(postno);
			
			var data = {
				Postfavor : "Post-favor",
				txtPostfavor : postno,
				txtUser : $("#user_login").val()
			};
			
			$.post("content/process/insert_query.php",data,function(e){
				if(e == '1')
					alert('YOU ALREADY CAST A VOTE');
				else if(e == '2')
					alert('GUEST CANNOT VOTE');
				else
				{
					alert("SUCCESSFULLY VOTED");
					window.location.reload();
				}
			});
			e.preventDefault();
		});
		
		$(".unfavor").live("click",function(e){
				var postno = this.id;
				
				//alert(postno);
			
			var data = {
				Postunfavor : "Post-unfavor",
				txtPostunfavor : postno,
				txtUser : $("#user_login").val()
			};
			
			$.post("content/process/insert_query.php",data,function(e)	{
				
				if(e == '1')
					alert('YOU ALREADY CAST A VOTE');
				else if(e == '2')
					alert('GUEST CANNOT VOTE');
				else
				{
					alert("SUCCESSFULLY VOTED");
					window.location.reload();
				}
			});
			e.preventDefault();
		});
	});
</script>

