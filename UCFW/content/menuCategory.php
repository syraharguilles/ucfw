<script type = "text/javascript">
	
	jQuery(document).ready(function($){
	
		//campuses
		$(".campuses").live("click",function(){
			var id = $("#menu-nav li:hover > a").attr("id");
			
			var data = {
				campusno : id
			};
			//for view
			$.post("content/parts/PostCampus.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
				$("#campusno_tmp_img").val($("#campusno_temp").val());
			});
			
		});
		//departments
		$(".departments").live("click",function(){
			var id = $("#menu-nav li:hover > a").attr("id");
			
			var data = {
				deptno: this.id,
				campusno : id
			};
			//for view
			$.post("content/parts/PostDept.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#deptno_tmp_img").val($("#deptno_temp").val());
					
			});
			
		});
		//deptact
		$(".deptact").live("click",function(){
			var id = $("#menu-nav li:hover > a").attr("id");
			var deptno = $("#menu-nav li:hover > a.departments").attr("id");
			//alert("Campuses: "+id+"DEPARTMENT: "+deptno +" actdept :"+this.id);
			
			var data = {
				deptactno: this.id,
				deptno: deptno,
				campusno : id
			};
			//for view
			$.post("content/parts/PostDeptact.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#deptno_tmp_img").val($("#deptno_temp").val());
					$("#deptactno_tmp_img").val($("#deptactno_temp").val());
					
			});
			
		});
		//colleges
		$(".colleges").live("click",function(){
			var id = $("#menu-nav li:hover > a").attr("id");
			var idcol = $("#menu-nav li:hover > a.colleges").attr("id");
			
			var data = {
				colno: idcol,
				campusno : id
			};
			//for view
			$.post("content/parts/PostCol.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#colno_tmp_img").val($("#colno_temp").val());
					
			});
		});
		//colact
		$(".colact").live("click",function(e){
			var id = $("#menu-nav li:hover > a").attr("id");
			var idcol = $(this).attr("college_id");
			//alert("Campuses: "+id+"\nColleges :"+idcol+"\nCOLACT: "+this.id);
			
			var data = {
				colactno: this.id,
				colno: idcol,
				campusno : id
			};
			//for view
			$.post("content/parts/PostColact.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#colno_tmp_img").val($("#colno_temp").val());
					$("#colactno_tmp_img").val($("#colactno_temp").val());
					
			});
		});
		
		//programs
		$(".programs").live("click",function(e){
			var id = $("#menu-nav li:hover > a").attr("id");
			var idcol = $("#menu-nav li:hover > a.colleges").attr("id");
			//alert("Campuses: "+id+"\nColleges :"+idcol+"\n programs: "+this.id);
			
			var data = {
				progno: this.id,
				colno: idcol,
				campusno : id
			};
			//for view
			$.post("content/parts/PostColprog.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#colno_tmp_img").val($("#colno_temp").val());
					$("#progno_tmp_img").val($("#progno_temp").val());
					
			});
			e.preventDefault();
		});
		
		//progact
		$(".progact").live("click",function(e){
			var id = $("#menu-nav li:hover > a").attr("id");
			var idcol = $("#menu-nav li:hover > a.colleges").attr("id");
			var idprog = $(this).attr("prog_id");
			//alert("Campuses: "+id+"\nColleges :"+idcol+"\nPrograms: "+idprog+"\n progact: "+this.id);
			
			var data = {
				progactno: this.id,
				progno: idprog,
				colno: idcol,
				campusno : id
			};
			//for view
			$.post("content/parts/PostColprogact.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#colno_tmp_img").val($("#colno_temp").val());
					$("#progno_tmp_img").val($("#progno_temp").val());
					$("#progactno_tmp_img").val($("#progactno_temp").val());
					
			});
			e.preventDefault();
		});
		//progorg
		$(".progorg").live("click",function(e){
			var id = $("#menu-nav li:hover > a").attr("id");
			var idcol = $("#menu-nav li:hover > a.colleges").attr("id");
			var idprog = $(this).attr("prog_id");
			//alert("Campuses: "+id+"\nColleges :"+idcol+"\nPrograms: "+idprog+"\n org: "+this.id);
			
			var data = {
				progorgno: this.id,
				progno: idprog,
				colno: idcol,
				campusno : id
			};
			//for view
			$.post("content/parts/PostColprogorg.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#colno_tmp_img").val($("#colno_temp").val());
					$("#progno_tmp_img").val($("#progno_temp").val());
					$("#progprogno_tmp_img").val($("#progorgno_temp").val());
					
			});
			e.preventDefault();
		});
		//progorgact
		$(".progorgact").live("click",function(e){
			var id = $("#menu-nav li:hover > a").attr("id");
			var idcol = $("#menu-nav li:hover > a.colleges").attr("id");
			var idprog = $(this).attr("prog_id");
			var idprogorg = $(this).attr("progorg_id");
			
			alert("Campuses: "+id+"\nColleges :"+idcol+"\nPrograms: "+idprog+"\nProgorg:"+idprogorg+"\n progorgact: "+this.id);
			e.preventDefault();
		});
		//organizations
		$(".organizations").live("click",function(){
			var id = $("#menu-nav li:hover > a").attr("id");
			//alert("Campuses: "+id+" organizations :"+this.id);
			
			var data = {
				orgno: this.id,
				campusno : id
			};
			//for view
			$.post("content/parts/PostOrg.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#orgno_tmp_img").val($("#orgno_temp").val());
					
			});
		});
		//orgact
		$(".orgact").live("click",function(){
			var id = $("#menu-nav li:hover > a").attr("id");
			var orgno = $("#menu-nav li:hover > a.organizations").attr("id");
			//alert("Campuses: "+id+"org: "+orgno +" orgact :"+this.id);
			
			var data = {
				orgactno: this.id,
				orgno: orgno,
				campusno : id
			};
			//for view
			$.post("content/parts/PostOrgact.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#orgno_tmp_img").val($("#orgno_temp").val());
					$("#orgactno_tmp_img").val($("#orgactno_temp").val());
					
			});
			
		});
		$(".activities").live("click",function(){
			var id = $("#menu-nav li:hover > a").attr("id");
			//alert("Campuses: "+id+" act :"+this.id);
			
			var data = {
				actno: this.id,
				campusno : id
			};
			//for view
			$.post("content/parts/PostAct.php",data,function(data){								
				$("#wall-post-content").html(data);		
				
					$("#campusno_tmp_img").val($("#campusno_temp").val());
					$("#actno_tmp_img").val($("#actno_temp").val());
					
			});
		});
	});
</script>
<ul id = "menu-nav">
	<?php
		$sql="Select * from campuses";
		$result=mysql_query($sql,$con);
		while($row=mysql_fetch_array($result)):
	?>	
		<!--campuses-->
		<li>
			<a href = "javascript:void(0);" class = "campuses" id = "<?php echo $row['campusno'];?>"><?php echo $row['campusabbr']; ?></a>
			<ul>
				<!--for departments-->
				<li><a href = "javascript:void(0);" class = "camp_dept">DEPARTMENTS</a>					
					<ul>
						<?php
							$sql="Select * from departments where campusno=".$row['campusno'];
							$dept=mysql_query($sql,$con);
							
							while($r=mysql_fetch_array($dept)):
						?>
							<li>
								<a href = "javascript:void(0);" class = "departments" id = "<?php echo $r['deptno'];?>"><?php echo $r['deptabbr'];?></a>
								<!--for dept activities-->
								<ul>
									<?php
										$sql="Select * from activities where deptno=".$r[0];
										$actdept=mysql_query($sql,$con);
										while($rad=mysql_fetch_array($actdept)):
									?>
										<li><a href = "javascript:void(0);" class = "deptact" id = "<?php echo $rad['actno'];?>"><?php echo $rad['actname'];?></a></li>
									<?php
										endwhile;
									?>
								</ul>
							</li><!--end of dept activities-->
								
						<?php 
							endwhile;
						?>
					</ul>
				</li><!--end of departments-->
				<!--for colleges-->
				<li><a href = "javascript:void(0);" class = "camp_col">COLLEGES</a>
					<ul>
						<?php
							$sql="Select * from colleges where campusno=".$row['campusno'];
							$col=mysql_query($sql,$con);
							while($rr=mysql_fetch_array($col)):
							
						?>
								<li><a href = "javascript:void(0);" class = "colleges" id = "<?php echo $rr['colno']?>"> <?php echo $rr['colabbr'];?> </a>
							
									<!--for programs-->
									<ul>
										<?php
											$sql="Select * from programs where orgno is null and colno=".$rr['colno'];
											$prog=mysql_query($sql,$con);
											while($rp=mysql_fetch_array($prog)):
										?>
												<li>
													<a href = "javascript:void(0);" class = "programs" id = "<?php echo $rp['progno'];?>"><?php echo $rp['progacronyms']; ?></a>
													<!--for org programs-->
													<ul class = "prog_org">
														<?php
															$sql="Select * from organizations where progno=".$rp['progno'];
															$orgprog=mysql_query($sql,$con);
															while($rop=mysql_fetch_array($orgprog)):
														?>
															<li><a href = "javascript:void(0);" prog_id ="<?php echo $rp['progno'];?>" class = "progorg" id = "<?php echo $rop['orgno'];?>"><?php echo $rop['orgabbr'];?></a>
																<!--for act org programs-->
																<ul class = "prog_org_act">
																	<?php
																		$sql="Select * from activities where orgno=".$rop['orgno'];
																		$actorgprog=mysql_query($sql,$con);
																		while($raop=mysql_fetch_array($actorgprog)):
																	?>
																		<li><a href = "javascript:void(0);" prog_id ="<?php echo $rp['progno'];?>" progorg_id = "<?php echo $rop['orgno'];?>" class = "progorgact"   id = "<?php echo $raop['actno'];?>"><?php echo $raop['actname'];?></a></li>
																	<?php
																		endwhile; 
																	?>
																</ul>
															</li><!--end of act org programs-->
														<?php 
															endwhile; 
														?>
													</ul>
												</li><!--end of org programs-->
												<!--for programs act-->
												<?php
													$sql="Select * from activities where deptno is null and orgno is null and progno=".$rp['progno'];
													$actprog=mysql_query($sql,$con);
													while($rap=mysql_fetch_array($actprog)):
												?>
													<li><a href = "javascript:void(0);" prog_id ="<?php echo $rp['progno'];?>" class = "progact" id = "<?php echo $rap['actno'];?>">  - <?php echo $rap['actname']; ?></a></li>	
												<?php
													endwhile;
												?>
												<!--end of programs act-->
										<?php
											endwhile;
										?>
									
									</ul>
								</li><!--end of programs -->
								<!--for colleges act-->
								<?php
									$sql="Select * from activities where orgno is null and progno = 0 and campusno =".$row[0]." and colno=".$rr[0];
									$actcol=mysql_query($sql,$con);
									while($rac=mysql_fetch_array($actcol)):
								?>
									<li><a href = "javascript:void(0);" class = "colact" college_id = "<?php echo $rr['colno'];?>" id = "<?php echo $rac['actno'];?>">  - <?php echo $rac['actname']?></a></li>
								<?php endwhile; ?>	
								<!--end of colleges act-->
						<?php 
							endwhile; 
						?>
					</ul> 
				</li><!--end of colleges-->
				<li><a href = "javascript:void(0);">ORGANIZATIONS</a>
					<!--for organizations-->
					<ul class ="org">
						<?php
							$sql="Select * from organizations where deptno is null and colno is null and progno is null and campusno=".$row['campusno'];
							$org=mysql_query($sql,$con);
							while($ro=mysql_fetch_array($org)):
						?>
							
								<li><a href = "javascript:void(0);" class = "organizations" id = "<?php echo $ro['orgno'];?>"><?php echo $ro['orgabbr']?></a>
									<!--for org activities-->
									<ul class = "org_act">
										<?php
											$sql="Select * from activities where deptno is null and colno is null and progno is null and orgno=".$ro['orgno'];
											$orgact=mysql_query($sql,$con);
											while($roc=mysql_fetch_array($orgact)):
										?>
											<li>
												<a href = "javascript:void(0);" class = "orgact" id = "<?php echo $roc['actno'];?>"><?php echo $roc['actname']?></a>
											</li>
										<?php 
											endwhile; 
										?>
									</ul>
								</li><!--end of org activities-->

						<?php 
							endwhile; 
						?>
			   		</ul>
				</li><!--end of organizations-->
				<li><a href = "javascript:void(0);">ACTIVITIES</a>
					<!--for activities-->
					<ul class = "act">
						<?php
							$sql="Select * from activities where orgno is null and deptno is null and colno is null and progno is null and campusno=0";
							$act=mysql_query($sql,$con);
							while($rc=mysql_fetch_array($act)):
						?>
							<li><a href = "javascript:void(0);" class = "activities" id = "<?php echo $rc['actno'];?>"><?php echo $rc['actname'];?></a></li>
						<?php 
							endwhile;
						?>
					</ul>
				</li><!--end of activities-->
			</ul>
		</li><!--end of campuses-->
<?php endwhile; ?>
</ul>