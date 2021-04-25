<?
    include "lib.php";

    $idx = $_GET['idx']; 
    $idx = mysqli_real_escape_string($conn, $idx); 

    $query = "select * from board where idx='$idx' ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result); 
?>


<form action="writePost.php" method="post"> 
    <table width=800 border="1" cellpadding=5 >
    <tr>
            <th> 이름 </th> 
            <td> <?=$data['name']?>  </td>
        </tr>
    <tr>
            <th> 제목 </th> 
            <td> <?=$data['subject']?>  </td>
        </tr>
        
    <tr>
            <th> 내용 </th> 
            <td> <?=nl2br($data['memo'])?>
                 
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <div style="float:right; "> 
                    <button type="button" onclick="location.href='confirmDel.php?idx=<?=$idx?>'">삭제</button>
                    <button type="button" onclick="location.href='write.php?idx=<?=$idx?>'">수정</button>
                </div>
                <a href="list.php">목록</a>
            </td>
        </tr>
    </table>
</form> 
 