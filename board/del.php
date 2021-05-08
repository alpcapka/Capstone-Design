 <?//
    include "../lib.php";
 
    
    $idx = $_POST['idx'];

    $idx = mysqli_real_escape_string($conn, $idx);  
      
    $query = "select * from board where idx='$idx'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result); 

    $query = "delete from board where idx='$idx' ";
    mysqli_query($conn, $query); 

?>
<script>
    location.href='list.php';//
</script>
