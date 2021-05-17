<?
require_once '../lib.php';

if(is_null($login_status)){
    header("location: ../index.php");
}

$userUid = $_SESSION['userid'];

$current_Pwd = $_POST[ 'current_Pwd' ];
$new_Pwd = $_POST[ 'new_Pwd' ];
$new_Pwd_confirm = $_POST[ 'new_Pwd_confirm' ];

if ( !is_null( $current_Pwd ) ) {
    $conn = mysqli_connect( 'localhost', 'student', 'gkrtod123', 'study' );
    $sql = "SELECT usersPwd FROM users WHERE usersUid = '$userUid'";
    $result = mysqli_query( $conn, $sql );
    while ( $row = mysqli_fetch_array( $result ) ) {
      $encrypted_Pwd = $row[ 'usersPwd' ];
    }
     if ( password_verify( $current_Pwd, $encrypted_Pwd ) ) {
        if ( $new_Pwd == $new_Pwd_confirm ) {
            $encrypted_new_Pwd = password_hash( $new_Pwd, PASSWORD_DEFAULT);
            $sql_change_Pwd = "UPDATE users SET usersPwd = '" . $encrypted_new_Pwd . "' WHERE usersUid = '" . $userUid . "';";
            mysqli_query( $conn, $sql_change_Pwd );
            echo "<script>alert('변경 되었습니다..'); window.location.href='my.php'</script>";
      } else {
        $wp2 = 1;
      }
    } else {
      $wp1 = 1;
    }
}
?>

<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>비밀번호 변경</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/ChangePwd.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
  </head>
  <body>
    <form action="ChangePwd.php" method="POST">
        <h1>비밀번호 변경</h1>
        <hr>
        <input type="password" name="current_Pwd" class="form-control form1" placeholder="현재 비밀번호" required>
        <div class="input-group form2">
            <input type="password" name="new_Pwd" class="form-control" placeholder="새 비밀번호" required>
            <input type="password" name="new_Pwd_confirm" class="form-control" placeholder="새 비밀번호 확인" required>
        </div>
        <hr>
        <button type="submit" class="btn btn-success">변경</button>
        <?php
            if ( $wp1 == 1 ) {
            echo "<script>alert('현재 비밀번호가 틀렸습니다.');</script>";
            }
            if ( $wp2 == 1 ) {
            echo "<script>alert('새 비밀번호가 일치하지 않습니다.');</script>";
            }
        ?>
    </form>
  </body>
</html>
