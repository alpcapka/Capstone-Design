<?php

session_start();
session_unset();
session_destroy(); // 세션 종료


header("location: ../index.php"); // 로그인 화면으로
exit();