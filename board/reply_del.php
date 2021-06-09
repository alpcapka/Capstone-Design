<?php
	include "../lib.php";
	
	// hidden의 값 rno를 받아와 그 값에 해당하는 idx 에 대한 reply 테이블 정보 가져오기
	$r_no = $_POST['r_no']; 
	$query = "select * from reply where idx='$r_no'";
	$result = mysqli_query($conn, $query);
    $reply = mysqli_fetch_array($result);
	
	// hidden의 값 b_no를 받아와 그 값에 해당하는 idx 에 대한 board 정보 가져오기
	$b_no = $_POST['b_no']; 
	$query2 = "select * from board where idx='$b_no'";
	$result2 = mysqli_query($conn, $query2);
    $board = mysqli_fetch_array($result2);
	
	/* 세션값과 db의 name을 비교  */
	if($_SESSION['userid'] === $reply['usersUid']) 
		{
			// 테이블 reply에서 인덱스값이 $rno인 값을 찾아 삭제
			$query = "delete from reply where idx='$r_no'"; 
            $result = mysqli_query($conn, $query);
          
	    }