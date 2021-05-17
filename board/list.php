<?
    include "../lib.php";
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<div class="tablebox" style="position:relative; width:850px;">
    <table class="table table-hover" style="width:800px">
        <thead>
            <tr>
            <th scope="col">No.</th>
            <th scope="col">Title</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">IP</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <?

            $query = "select * from board order by idx desc"; 
            $result = mysqli_query($conn, $query); 

            while($data = mysqli_fetch_array($result)){
        ?>
        <tbody>
            <tr>
                <td><?=$data['idx']?> </td>
                <td><a href="view.php?idx=<?=$data['idx']?>" style="color:black; text-decoration:none;"><?=$data['title']?></a> </td>
                <td><?=$data['name']?> </td>
                <td><?=substr($data['regdate'],0,10)?> </td>
                <td><?=$data['ip']?> </td>
                <td><button type="button" onclick="location.href='confirmDel.php?idx=<?=$data['idx']?>'">삭제</button></td>
            </tr>
        <? } ?>
        </tbody>
    </table>
    <button type="button" onclick="location.href='write.php'" class="btn btn-outline-primary position-absolute" style="right:0;">글쓰기</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
