<div class="main">
    <div class="main-cards">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                전체게시판
            </div>
            <ul class="list-group list-group-flush">
                <?
                $query = "select * from board order by idx desc limit 3 "; 
                $result = mysqli_query($conn, $query); 

                while($data = mysqli_fetch_array($result)){
                ?>
                <li class="list-group-item"><a href="./board/view.php?idx=<?=$data['idx']?>" style="color:black; text-decoration:none;"><?=$data['title']?></a></li>
                <? } ?>
            </ul>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                공지사항
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">1</li>
                <li class="list-group-item">2</li>
                <li class="list-group-item">3</li>
            </ul>
        </div>
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                ㅇㅇㅇ
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">1</li>
                <li class="list-group-item">2</li>
                <li class="list-group-item">3</li>
            </ul>
        </div>
    </div>
    <div class="main-function">
        <button type="button" class="main-function-item btn btn-outline-primary" href="#">인기순</a></button>
        <button type="button" class="main-function-item btn btn-outline-primary" href="#">최신순</a></button>
        <!-- <a class="wrap title item" href="#">OO순</a> -->
        <form id="searchArticleForm" class="search">
            <select name="search type">
                <option value="4">전체</option>
                <option value="3">해시태그</option>
                <option value="2">글 제목</option>
                <option value="1">글 내용</option>
            </select>
            <input name="keyboard" placeholder="검색어를 입력하세요." class="text">
        </form>
    </div>
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
                        <h3 class="titleshow"><?=$data['title']?></h3>
                        <p class="regdateshow">(<?=substr($data['regdate'],0,10)?>)</p>
                    </div>
                    <p class="memoshow"><?=$data['memo']?></p>
                </div>     
                <?php    }?>
            </div>        
        </div>
    </div>
</div>