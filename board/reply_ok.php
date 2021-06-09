<?php
	include "../lib.php";
	
	$idx = $_POST['idx'];
	$usersUid = $_POST['dat_user'];
	$content = $_POST['rep_con'];
	$regdate = date("Y-m-d H:i:s");

	$idx = mysqli_real_escape_string($conn, $idx); 
    $usersUid = mysqli_real_escape_string($conn, $usersUid); 
    $content = mysqli_real_escape_string($conn, $content); 

	$query = "insert into reply(con_num, usersUid, content, regdate)
            values('$idx','$usersUid','$content', '$regdate')";
		
	mysqli_query($conn, $query);

?>
	