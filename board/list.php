<?php
  require_once ('../lib.php')
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <!-- main css -->
        <link rel="stylesheet" href="../css/style.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
        <link rel="stylesheet" href="../css/dark-mode.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
        <link rel="stylesheet" href="./css/dark-mode.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
    </head>
    <body>
        <div id="wrap">
            <?
                require_once ("../contents/header.php");
            ?>
            <div class="tablebox">
                <table class="table table-hover" style="background-color: white;">
                    <h3 style="text-align: center;">전체게시판</h3>
                    <hr>
                    <thead>
                        <tr>
                        <th scope="col" style="width: 10px;">No.</th>
                        <th scope="col" style="width: 100px;">Name</th>
                        <th scope="col" style="width: 900px;">Title</th>
                        <th scope="col" style="width: 150px;">Date</th>
                        <th scope="col" style="width: 200px;">IP</th>
                        <th scope="col" style="width: 100px;">조회 수</th>
                        <th scope="col" style="width: 100px;"></th>
                        </tr>
                    </thead>
                    <?

                        $query = "select * from board order by idx desc"; 
                        $result = mysqli_query($conn, $query); 
                        
                        while($data = mysqli_fetch_array($result)){
                            $data['ip'] = preg_replace('/\d{1,3}.\d{1,3}$/', '***.***', $data['ip']);
                    ?>
                    <tbody>
                        <tr>
                            <td><?=$data['idx']?> </td>
                            <td><?=setMasking('left',$data['name'])?> </td>
                            <td><a href="view.php?idx=<?=$data['idx']?>" style="color:black; text-decoration:none;"><?=$data['title']?></a> </td>
                            <td><?=substr($data['regdate'],0,10)?> </td>
                            <td><?=$data['ip']?></td>
                            <td><?=$data['hit']?> </td>
                            <td><button type="button" onclick="if(!confirm('삭제 하시겠습니까?')){return false;} else{location.href='del.php?idx=<?=$data['idx']?>'}">삭제</button></td>
                        </tr>
                    <? } ?>
                    </tbody>           
                </table>
                <button type="button" onclick="location.href='write.php'" class="btn btn-outline-primary position-absolute" style="right:20px;">글쓰기</button>
            </div>
        </div>
        <!-- bootstrap script -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <!-- main script -->
        <script src="../javascript/main.js"></script>
        <script src="../javascript/dark-mode-switch.js"></script>
    </body>
</html>