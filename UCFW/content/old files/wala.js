/*DELETE CAMPUS*/
	$(".deletecampusadmin")
		.button()
		.click(function(){
			var id = this.id;
			$.post('content/process/select_query.php',{txtID : id, admincampus : "admincampus"},function(data){
				$(".idno").val(data.idno);								
				$("#dialog-delete-campus").dialog("open");						
			},"json");
			
		});
	$("#dialog-delete-campus").dialog({
		autoOpen: false,
		height: 140,
		width: 297,
		modal: true,
		buttons: {
			"DELETE": function() {
				
				var idno = $("#dialog-delete-campus .idno").val();
				
				var data = {
					admincampus : "admincampus",
					txtidno : idno
				};
				
				$.post("content/process/delete_query.php",data,function(){
					alert("SUCCESSFULLY DELETED");
					$("#dialog-delete-campus").dialog("close");							
				});
			},
			Cancel: function() {
				$(this).dialog("close");
			}
		}, 
	});/*END DELETE CAMPUS*/