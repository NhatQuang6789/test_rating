$(document).ready(function(){

	setInterval(function(){
		fetch_data();	
	}, 2000);
	fetch_data();	

	function fetch_data (id_bussiness)
	{
		var id_user = $(".vote").data("user");
		$.ajax({
			url: "fetch.php",
			method: "POST",
			data: {"id_user": id_user},
			success: function (data){
				$(".default_container").html(data);
			}
		});
	}

	$(document).on("click", ".icon", function(){
		var id_user = $(this).data("user");
		var id_bussiness = $(this).data("bussiness");
		var count = $(this).data("count");
		$.ajax({
			url: "insert.php",
			method: "POST",
			data: {"id_user": id_user, "id_bussiness": id_bussiness, "count": count},
			success: function (data){
				
			}
		})
	});

	$(document).on("mouseenter", ".icon", function(){
		var index = $(this).attr("data_id");
		var id_bussiness = $(this).data("bussiness");
		remove_event(id_bussiness);
		for(var i = 0; i <= index; i++){
			$("#event_" + id_bussiness + "_" + i).css("color", "#ffcc00");
		}
	});

	function remove_event (id_bussiness){
		for(var i = 0; i <= 5; i++){
			$("#event_" + id_bussiness + "_" + i).css("color", "#ccc");
		}
	}

	$(document).on("mouseleave", ".icon", function(){
		var id_bussiness = $(this).data("bussiness");
		var count = $(this).attr("count");
		remove_event(id_bussiness);
		for(var i = 1; i <= count; i++){
			$("#event_" + id_bussiness + "_" + i).css("color", "#ffcc00");
		}
	});
});