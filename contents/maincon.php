<div class="container-xl con-main">
    <!-- left side -->
    <div class="left">
        <div class="main_profile">
            <form class="logged">
                <img src="/img/anonymous.png" class="picture">
                <p class="P_id"><?echo $_SESSION['userid'];?> (<?if($_SESSION['role'] == 'ADMIN') {echo "ADMIN";} else {echo "user";} ?>)</p>
                <ul class="buttons">
                    <?php
                    if(isset($_SESSION['useremail'])){
                        echo "<li><button type='button' onclick=\"location.href='./registeration/my.php'\" class='btn btn-outline-secondary btn-sm'>내 정보</button></li>";
                        echo "<li><button type='button' onclick=\"location.href='../registeration/logout.inc.php'\" class='btn btn-outline-secondary btn-sm'>로그아웃</button></li>";
                    }
                    else{
                        echo "오류";
                    }
                    ?>
                </ul>
            </form>
        </div>
        <a target="_blank" onClick="window.open('http://smuniv.xyz:3000/', 'livechat', 'resizable=no scrollbars=yes width=1000 height=700 top=100,left=300 ')">
            <img id="livechat" src="../img/chat_button.png" alt="">
        </a>
        <a href="https://semyung.everytime.kr/">
            <img id="everytime" src="../img/everytime.png" alt="">
        </a>
    </div>

    <!-- center -->
    <div class="center">
        <!-- <div class="main-function">
            <button type="button" class="main-function-item btn btn-outline-primary" href="#">인기순</a></button>
            <button type="button" class="main-function-item btn btn-outline-primary" href="#">최신순</a></button>
            <form id="searchArticleForm" class="search">
                <select name="search type">
                    <option value="4">전체</option>
                    <option value="3">해시태그</option>
                    <option value="2">글 제목</option>
                    <option value="1">글 내용</option>
                </select>
                <input name="keyboard" placeholder="검색어를 입력하세요." class="text">
            </form>
        </div> -->
        <div class="main-board">
            <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="scrollspy-example" tabindex="0">        
                <div class="viewbox">     
                    <?php
                    $query = "select * from board order by idx desc";
                    $result = mysqli_query($conn, $query);
                    while($data = mysqli_fetch_array($result)){
                    ?>
                    <div class="article">
                        <div>
                            <a class="titleshow" href="./board/view.php?idx=<?=$data['idx']?>"><h3><?=$data['title']?></h3></a>
                            <p class="regdateshow">(<?=substr($data['regdate'],0,10)?>)</p>
                        </div>
                        <p class="memoshow"><?=nl2br($data['memo'])?></p>
                    </div>     
                    <?php    }?>
                </div>        
            </div>
        </div>
    </div>
</div>
