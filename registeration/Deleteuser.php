<?
require_once '../lib.php';

$userUid = $_SESSION['userid'];

if (isset($_POST["submit"])) {
    $del = "DELETE FROM users WHERE usersUid = '$userUid'";

    if ($conn->query($del) === TRUE) {
        session_unset();
        session_destroy(); // 세션 종료
        header("location: ../index.php");
        exit();
    } 
    
    else {
    echo "Error deleting record: " . $conn->error;
    }
    
}
