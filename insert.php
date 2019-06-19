<?php
	$link = new mysqli("localhost", "root", "", "rating") or die ("ERROR 404");
	$id_user = $_POST["id_user"];
	$id_bussiness = $_POST["id_bussiness"];
	$count = $_POST["count"];
	$insert = "INSERT star (id_user, id_bussiness, count) VALUE ('$id_user', '$id_bussiness', '$count')";
	$query = mysqli_query($link, $insert);
?>