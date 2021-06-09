<?php
    require_once ('../lib.php')
?>
<!doctype hmtl>
<html lang="ko">
    <head>
        <title>내 정보</title>
        <link rel="stylesheet" href="../css/my.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
    </head>
    <body>
        <?php
            if($login_status == false){
                header("location: ../index.php?error=NotPermission");
                exit(); // 로그인 안돼있으면 로그인페이지로
            }
        ?>
        <div  class="container">
            <section>
                    <div class="title">
                        <h1 >내 정보</h1>
                        <a  href="../index.php" class="back">홈으로</a>
                    </div>
                    <div class="profile">
                        <img  src="#">
                        <h3 ><?echo $_SESSION['useremail'];?></h3>
                        <p >
                        <span ><?echo $_SESSION['userid'];?></span>
                        </p>
                    </div>
            </section>
            <form action="Deleteuser.php" method="POST" onsubmit="return confirm('정말 탈퇴하시겠습니까?');">
                <h2>계정</h2>
                <hr>
                <a  href="#" class="item">회원 정보 수정</a>
                <hr>
                <a  href="./ChangePwd.php" class="item">비밀번호 수정</a>
                <hr>
                <?if($_SESSION['role'] == 'ADMIN') {?>
                    <a  href="../crawling/crawlingcsv.php" class="item">공지사항 새로고침 하기 (관리자 기능)</a>
                    <hr>
                <?}?>
                <button type="submit" name="submit">회원 탈퇴</button>
            </form>
        </div>
    </body>
</html>