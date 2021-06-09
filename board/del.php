 <?//
    include "../lib.php";
 
    
    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($conn, $idx);  
      
    $query = "select name from board where idx='$idx'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

    if($_SESSION['userid'] !== $data['name']) { // 자기글 아닐땐 삭제 불가능
        if($_SESSION['role'] == 'ADMIN'){ // 관리자는 모두 삭제 가능
            $query = "delete from board where idx='$idx' ";
            $result = mysqli_query($conn, $query);
            if($result) { echo "<script> alert('삭제 되었습니다'); </script>"; }
            else { echo "<script> alert('삭제 실패!'); </script>"; }
            echo "<meta http-equiv='refresh' content='0, list.php'>";
            exit();
        }

        echo "<script> alert('작성자만 삭제할 수 있습니다.'); </script>";
        echo "<meta http-equiv='refresh' content='0, list.php'>";
        exit();
    }

    $query = "delete from board where idx='$idx' ";
    $result = mysqli_query($conn, $query);

    if($result) { echo "<script> alert('삭제 되었습니다'); </script>"; }
    else { echo "<script> alert('삭제 실패!'); </script>"; }

?>
<meta http-equiv='refresh' content='0, list.php'>
