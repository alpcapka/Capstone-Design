<?
    include "../lib.php";

    $idx = $_GET['idx']; 
    $idx = mysqli_real_escape_string($conn, $idx); 

    $query = "select * from board where idx='$idx' ";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result); 

    $tmp = $idx."_".$data['title']." ";

    if(preg_match('/'.$tmp.'/', $_COOKIE['page_cookie'])){}
    else{
        $hit = "update board set hit=hit+1 where idx=$idx";
        $conn->query($hit);


        setcookie('page_cookie', $_COOKIE['page_cookie'].$tmp, time()+86400, '/');
    }
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/reply.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
    <link rel="stylesheet" href="../css/view.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
</head>
<body>
    <h3 style="margin-top: 100px; text-align: center;">자유게시판</h3>
    <!-- 게시글 보여지는 부분 -->
    <div class="con-bview">
        <form action="writePost.php" method="post"> 
            <table cellpadding="5" style="background-color: white;">
            <tr>
                    <th> 이름 </th> 
                    <td> <?=setMasking('left',$data['name'])?></td>
            </tr>
            <tr>
                    <th> 제목 </th> 
                    <td> <?=$data['title']?></td>
            </tr>
                
            <tr>
                    <th> 내용 </th> 
                    <td> <?=nl2br($data['memo'])?> </td>
            </tr>
            <tr>
                    <th> 조회수 </th> 
                    <td> <?=$data['hit']?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div style="float:right; ">
                        <button type="button" onclick="if(!confirm('삭제 하시겠습니까?')){return false;} else{location.href='del.php?idx=<?=$data['idx']?>'}">삭제</button>
                        <?if($_SESSION['userid'] == $data['name']){?> <!--작성자면 수정버튼이 보인다-->
                        <button type="button" onclick="location.href='write.php?idx=<?=$idx?>'">수정</button>
                        <?}?>
                    </div>
                    <a href="list.php">목록</a>
                </td>
            </tr>
            </table>
        </form>
    </div>
    <!-- 댓글 보여지는 부분 -->
    <div class="con-reply">
        <div class="reply_view">
            <h3 style="padding:10px 0 15px 0; border-bottom: solid 2px gray;">댓글목록</h3>
            <?php 
                $query2 = "select * from reply where con_num='".$idx."' order by idx desc"; 
                $result2 = mysqli_query($conn, $query2); 
                
                while($reply = mysqli_fetch_array($result2)){
            ?>
            <div class="dat_view">
                <div><b><?=setMasking('left', $reply['usersUid'])?></b></div>
                <div class="dap_to comt_edit"><?=nl2br($reply['content'])?></div>
                <div class="rep_me dap_to"><?=$reply['regdate']?></div>
                <input type="hidden" name="b_no" class="b_idx" value="<?=$idx?>">
                <input type="hidden" name="r_no" class="r_idx" value="<?=$reply['idx']?>">
                <div class="rep_me rep_menu">
                <?
                    if($_SESSION['userid'] === $reply['usersUid']){
                ?>
                    <button class="dat_del_btn" id="del_btn" href="./reply_del.php">삭제</button>
                <?}?>
                </div>
            </div>
            <?php } ?>
            <!-- 댓글 작성하는 부분 -->
            <div class="dat_ins">
                <input type="hidden" name="idx" class="idx" value="<?=$idx?>">
                <input type="hidden" name="dat_user" id="dat_user" class="dat_user" value="<?=$_SESSION['userid']?>">
                <div style="margin-top:10px;">
                    <textarea name="content" class="rep_con" id="rep_con"></textarea>
                    <button id="rep_btn" class="rep_btn">댓글</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>                
    <script src="./reply.js"></script>
<body>