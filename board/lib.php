<?
    header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

    error_reporting(1);
    ini_set("display_errors", 1);


    $conn = mysqli_connect("localhost","student","gkrtod123","study"); 

    if(mysqli_connect_error()){
        echo "mysql 접속중 오류가 발생했습니다. ";
        echo mysqli_connect_error(); 
    }

    function mq($sql)
	{
		global $conn;
		return $conn->query($sql);
	}
    