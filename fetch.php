<?php
	$link = new mysqli("localhost", "root", "", "rating") or die ("ERROR 404");

	$select = "SELECT * FROM bussiness";
	$query = mysqli_query($link, $select);
	$data = "";
	$output = "";
	$color = "";
	if(mysqli_num_rows($query) > 0){
		while($result = mysqli_fetch_assoc($query)){
			$data = fetch_star($result["id"], $link);
			$output .= '<div class="row_content">';
			$output .= '<h4>'.$result["name"].'</h4>';
			$output .= '<div class="tiny"><em>'.$result["address"].'</em></div>';
			$output .= '<div class="bodd">'.$result["service"].'</div>';
			$output .= '<div class="vote" data-user="1">';

			for($i = 1; $i <= 5; $i++){
				if($i <= $data){
					$color = "#ffcc00";
				}else{
					$color = "#ccc";
				}
				$output .= '<span class="fa fa-star icon" data_id="'.$i.'" data-user="1" data-bussiness="'.$result["id"].'" data-count="'.$i.'" style="color:'.$color.';" id="event_'.$result["id"]."_".$i.'" count="'.$data.'"></span>';
			}
			$output .= '</div>';
			$output .= '</div>';
		}	
	}

	echo $output;

	function fetch_star ($id_bussiness, $link)
	{
		$select = "SELECT AVG (count) AS count FROM star WHERE id_bussiness = '$id_bussiness' ";
		$query = mysqli_query($link, $select);
		$output = "";
		if(mysqli_num_rows($query) > 0){
			while($result = mysqli_fetch_assoc($query)){
				$output .= round($result["count"]);
			}
		}
		return $output;
	}
?>