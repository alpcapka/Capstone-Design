<?
    include "../lib.php";
 
    $name = $_POST['name'];
    $idx = $_POST['idx'];
    $title = $_POST['title'];
    $memo = $_POST['memo'];

    $idx = mysqli_real_escape_string($conn, $idx); 
    $name = mysqli_real_escape_string($conn, $name); 
    $title = mysqli_real_escape_string($conn, $title); 
    $memo = mysqli_real_escape_string($conn, $memo);
    

    if($idx){  // 수정 

        $query = "select * from board where idx='$idx' ";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_array($result); 

        $query = "update board set name='$name',
        title='$title',
        memo='$memo'
        where idx='$idx' "; 
        
        mysqli_query($conn, $query); 


    }else{ 


        $regdate = date("Y-m-d H:i:s"); 
        $ip = $_SERVER['REMOTE_ADDR'];
        $mqq = mq("alter table board auto_increment = 1"); // 삭제해도 순번대로 다시 idx값 재설정

        $query = "insert into board(name, title, memo, regdate, ip)
            values('$name','$title','$memo','$regdate','$ip')";


        mysqli_query($conn, $query); 

    }

?>
<script>
    location.href='list.php';
</script>