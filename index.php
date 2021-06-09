<!-- This is login page -->
<?
    require_once('lib.php');
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- main css -->
    <link rel="stylesheet" href="./css/registeration.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
</head>
    <body>
        <?php
            if($login_status){
                header("location: ./main.php");
                exit(); // 이미 로그인 된 상태면 main으로
            }
        ?>
        <div class="login-form bg-light p-4" style="max-width: 420px; margin: 300px auto;">
            <form action="./registeration/login.inc.php" method="POST" class="row g-3">
                <div class="col-12">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="name@example.com">
                </div>
                <div class="col-12">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe"> Remember me</label>
                        <button type="submit" name="submit" class="btn btn-dark float-end">Login</button>
                    </div>
                </div>
            </form>
            <hr class="mt-4">
            <div class="col-12">
                <p class="text-center mb-0">Have not account yet? <a href="./registeration/Signup.php">Signup</a></p>
            </div>
            <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput"){
                    echo "<script>alert('모든 칸을 채워주세요.');</script>";
                }

                else if($_GET["error"] == "wronglogin"){
                    echo "<script>alert('잘못 입력하셨습니다.');</script>";
                }
            
               
                else if($_GET["error"] == "NotPermission"){
                        echo "<script>alert('잘못된 접근입니다.');</script>";
                    }
                }
            ?>
        </div>
        
        <!-- bootstrap script -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <!-- main script -->
        <script src="./javascript/main.js"></script>
    </body>
</html>