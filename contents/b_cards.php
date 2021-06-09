<div class="container-xl con-cards">
    <div class="card">
        <div class="card-header">
            공지사항
        </div>
        <ul class="list-group list-group-flush">
            <?
            $query = "select * from crawling1 order by 등록일 desc limit 5 "; 
            $result = mysqli_query($conn, $query); 

            while($data = mysqli_fetch_array($result)){
            ?>
            <li class="list-group-item"><a href="http://<?=$data['url']?>" style="text-decoration:none;"><?=$data['제목']?></a></li>
            <? } ?>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            전체게시판
        </div>
        <ul class="list-group list-group-flush">
            <?
            $query = "select * from board order by idx desc limit 5 "; 
            $result = mysqli_query($conn, $query); 

            while($data = mysqli_fetch_array($result)){
            ?>
            <li class="list-group-item"><a href="./board/view.php?idx=<?=$data['idx']?>" style="text-decoration:none;"><?=$data['title']?></a></li>
            <? } ?>
        </ul>
    </div>
    <script>
        (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.6&appId=898930250215576";
        fjs.parentNode.insertBefore(js, fjs);
        }
        (document, 'script', 'facebook-jssdk'));
    </script>
    <div class="fb-page" data-href="https://www.facebook.com/SMUBamboo2016" data-tabs="timeline" data-width="286" data-height="248" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/SMUBamboo2016" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SMUBamboo2016"></a></blockquote></div>
    <div class="fb-page" data-href="https://www.facebook.com/SMULUV" data-tabs="timeline" data-width="286" data-height="248" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/SMULUV" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SMULUV"></a></blockquote></div>
</div>