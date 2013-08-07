<?php require_once("library/dbcon.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Campus | Guest</title>

		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src="js/jquery.1.7.2.js"></script>
		<script type="text/javascript" src=""></script>
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
				<script type = "text/javascript">
					$(document).ready(function(){
						$("#campuses-links a").live("click",function(){
							var id = this.id;
						});
						
					});
				</script>
				<?php
					$tmp = $_POST['pageid'];
					echo $tmp;
				?>
				<div id = "content">
					<div id = "information">
						<label>Guest</label> 
						
						<div id = "campuses-links">
							<ul>
								<?php
								
									$sql = "SELECT * FROM campuses";
									$result = mysql_query($sql);
									
									while($row = mysql_fetch_array($result)):
								?>
									<li><a href = "javascript:void(0);" id = "<?php echo $row['campusabbr']?>"><?php echo $row['campusname']?></a></li>
								<?php
									endwhile;
								?>
							</ul>
						</div>
						<div id = "post-wall-panel"><a id = "postmsg" href = "javascript:void(0);">Click Me to Post</a></div>
					</div>
					<div id = "wall-post">
						<form>
						<div id = "choose-color">
							<label>Choose Color:</label>
							<div class = "color" style = "height:30px; width:30px; background:#ffcaca;"><input type = "radio" name ="color" value = "ffcaca"></div>
							<div class = "color" style = "height:30px; width:30px; background:#fdfb8b;"><input type = "radio" name ="color" value = "fdfb8b"></div>
							<div class = "color" style = "height:30px; width:30px; background:#a1ffd2;"><input type = "radio" name ="color" value = "a1ffd2"></div>
							<div class = "color" style = "height:30px; width:30px; background:#b6efff;"><input type = "radio" name ="color" value = "b6efff"></div>
							<div class = "color" style = "height:30px; width:30px; background:#c7b6ff;"><input type = "radio" name ="color" value = "c7b6ff"></div>
						
						</div>
							<div id = "text-panel">
								<label class = "text-check-word">TEXT PANELS</label>
								<div id = "text-tools">
									<label>Message:</label>
									<textarea id ="wall-content" maxlength = "60" style = "resize:none;" rows = "5" cols = "67"></textarea>
								</div>
							</div>
							<div id = "doddle-panel"><label>DODDLE PANELS</label></div>
							<div id = "image-panel"><label>IMAGE PANELS</label></div>
							<input type = "button" id = "btnPost" name = "post" value = "POST"/>
						</form>	
					</div>
					<div id = "wall-post-content">
						<?php
							$sql = "SELECT * FROM posts where poststat = 'active' order by postno desc";
							$result = mysql_query($sql);
							while($row = mysql_fetch_array($result)):
						?>
							<div class = "post-content" style = "background:#<?php echo $row['postcolor']?>;">
								<p><?php echo $row['postcontent'];?></p>
								<a href = "javascript:void(0);" class = "btnDelete" id = "<?php echo $row["postno"]?>">Delete</a>
							</div>
						<?php endwhile;?>
					</div>	
				</div>
				
				<div id = "footer"></div>
			</div>
		</div>
	</body>
</html>
<script type = "text/javascript">
	$(document).ready(function(){
		$("#wall-post").hide();
		$("#postmsg").live("click",function(){
			$("#wall-post").toggle("slow");
			$("#modalView").addClass("modal");
		});
		$("#modalView").live("click",function(){
			$("#modalView").removeClass("modal");
			$("#wall-post").hide("slow");
			$(".color input[name=color]:checked").val();
			
		});
		$(".btnDelete").live("click",function(){
			var id = this.id;
			
			$.post("content/process/delete_query.php",{txtPost:"wall-post-delete",txtID:id},function(){
				alert("SUCCESSFULLY DELETED");
			});
			
		});
		$("#btnPost").click(function(e){
			var content = $("#wall-content").val()
				color = $(".color input[name=color]:checked").val();
				
				$.post("content/process/insert_query.php",{txtContent:content,txtPost:"wall-post",txtGuest : "guest",txtColor: color},function(){
					alert("SUCCESSFULLY ADDED");
					$("#wall-content").val("");
					$("#wall-post").hide("slow");
					$("#modalView").removeClass("modal");
				});
			e.preventDefault();
		});
	});
</script>