<?
    include "../lib.php";

    $idx = $_GET['idx']; 
    $idx = mysqli_real_escape_string($conn, $idx); 

    $query = "select * from board where idx='$idx' ";
    $result = mysqli_query($conn, $query); 
    $data = mysqli_fetch_array($result); 

?>
<head>
    <link rel="stylesheet" href="../css/write.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
</head>
<body>
    <form action="writePost.php" method="post" enctype="multipart/form-data"> 
        <input type="hidden" name="idx" value="<?=$idx?>">
        <table width=800 border="1" cellpadding=5 >
            <tr>
                <th> 이름 </th> 
                <td><input type="hidden" name="name" value="<?=$_SESSION['userid']?>"><?=setMasking('left', $_SESSION['userid'])?></td>
            </tr>
            <tr>
                <th> 제목 </th> 
                <td> <input type="text" name="title" style="width:100%; background-color: #DAE0E6;"  value="<?=$data['title']?>"  > </td>
            </tr>
                
            <tr>
                <th> 내용 </th> 
                <td> 
                    <textarea name="memo" style="width:100%; height:300px; background-color: #DAE0E6;"><?=$data['memo']?></textarea> 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="text-align:center; ">
                        <input type="file" name="my_image" value="사진 선택">
                        <input type="submit" value="저장">
                    </div> 
                </td>
            </tr>
        </table>
    </form>
<body>