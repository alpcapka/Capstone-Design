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
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if($error === 0){
                if ($img_size > 300000) {
                    echo "<script> alert('파일 크기가 너무 큽니다.'); </script>";
                }
                else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png"); 

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                        // Insert into Database
                        $sql = "INSERT INTO images(image_url) VALUES('$new_img_name')";
                        mysqli_query($conn, $sql);
                    }
                    else {
                        echo "<script> alert('해당 확장자는 업로드 할 수 없습니다.'); </script>";
                    }
                }
            }
        else {
            echo "<script> alert('오류 발생!'); </script>";
        }
        
        
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