<?php
    header('Content-Type: text/html; charset=utf-8'); // utf-8인코딩

    error_reporting(1);
    ini_set("display_errors", 1);


    $conn = mysqli_connect('localhost', 'admin', 'capstone123@', 'capstone', '3306'); // DB 접속
    $conn->set_charset("utf8");

    if(mysqli_connect_error()){
        echo "mysql 접속중 오류가 발생했습니다. ";
        echo mysqli_connect_error(); 
    }

    // idx Auto.increase
    function mq($sql)
	{
		global $conn;
		return $conn->query($sql);
	}


    // session
    session_start();
    if( isset( $_SESSION[ 'useremail' ] ) ) {$login_status = TRUE;} // email로 접속해서 세션 값 넘어오면 login_status 활성화

    // masking
    function setMasking($type, $obj) {
    $result = "";
    if(!empty($type)) {
        switch($type) {
            case "left"   : $result = preg_replace('/.(?=.)/u', '*', $obj); break;
            case "center" : $result = preg_replace('/.(?=.$)/u', '*', $obj); break;
            case "right"  : $result = preg_replace('/.(?!..)/u', '*', $obj); break;
            case "all"    : $result = preg_replace('/./u', '*', $obj); break;
            default       : $result = preg_replace('/.(?=.$)/u', '*', $obj); break;
            }
        }

    return $result;
    }