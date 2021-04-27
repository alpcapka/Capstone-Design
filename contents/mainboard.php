<div class="main">
    <div class="cards">
        <div class="card" style="width: 18rem;">
        <div class="card-header">
            자유게시판
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
            추천게시판
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">1</li>
            <li class="list-group-item">2</li>
            <li class="list-group-item">3</li>
        </ul>
        </div>
    </div>
</div>