$(document).ready(function() {

	$("a.delete").click(function() {
		var answer = window.confirm("Are you sure you want delete?");
		if(!answer) {
			event.preventDefault();
		}
	});
	
	window.setTimeout(function() { 
		$(".alert").slideUp(500);
	}, 5000);

	$("#orphanage_id").change(function() {
		var orphanage_id = $(this).val();
		if(orphanage_id != "") { 
			$.post("get_branch_list.php", "orphanage_id="+orphanage_id, function(data) {
				$("#branch_id").html(data);
			});
		}
	});
	
});	