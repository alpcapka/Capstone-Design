   <?php
    
    
    include "simple_html_dom.php";
    
    // include "csv.php";
    $data = file_get_html("http://www.semyung.ac.kr/prog/vwBoard/bbs01/kor/sub08_02_01/list.do");
    
    $www= "www.semyung.ac.kr";
    
    //url 정보
    foreach($data->find('div[class=link]',0)->find('a') as $element){
        $aaa = $www.$element->href;
        echo $aaa.'<br>';
    }
    foreach($data->find('div[class=link]',1)->find('a') as $element){
        $bbb = $www.$element->href;
        echo $bbb.'<br>';
    }
    foreach($data->find('div[class=link]',2)->find('a') as $element){
        $ccc = $www.$element->href;
        echo $ccc.'<br>';
    }
    foreach($data->find('div[class=link]',3)->find('a') as $element){
        $ddd = $www.$element->href;
        echo $ddd.'<br>';
    }
    foreach($data->find('div[class=link]',4)->find('a') as $element){
        $eee = $www.$element->href;
        echo $eee.'<br>';
    }


    // title 정보
    foreach($data->find('div[class=link]',0)->find('a')as $element){
        $ti = $element->plaintext;
        $ti0 = trim($ti);
        echo $ti0.'<br>';
    }
    foreach($data->find('div[class=link]',1)->find('a')as $element){
        $ti = $element->plaintext;
        $ti1 = trim($ti);
        echo $ti1.'<br>';
    }
    foreach($data->find('div[class=link]',2)->find('a')as $element){
        $ti = $element->plaintext;
        $ti2 = trim($ti);
        echo $ti2.'<br>';
    }
    foreach($data->find('div[class=link]',3)->find('a')as $element){
        $ti = $element->plaintext;
        $ti3 = trim($ti);
        echo $ti3.'<br>';
    }
    foreach($data->find('div[class=link]',4)->find('a')as $element){
        $ti = $element->plaintext;
        $ti4 = trim($ti);
        echo $ti4.'<br>';
    }

    // writer 정보
    foreach($data->find('td[class=problem_name]',0)->find('text')as $element){
        
        $wr0= trim($element);
        echo $wr0.'<br>';
    }
    foreach($data->find('td[class=problem_name]',1)->find('text')as $element){
        
        $wr1= trim($element);
        echo $wr1.'<br>';
    }
    foreach($data->find('td[class=problem_name]',2)->find('text')as $element){
        
        $wr2= trim($element);
        echo $wr2.'<br>';
    }
    foreach($data->find('td[class=problem_name]',3)->find('text')as $element){
        
        $wr3= trim($element);
        echo $wr3.'<br>';
    }
    foreach($data->find('td[class=problem_name]',4)->find('text')as $element){
        
        $wr4= trim($element);
        echo $wr4.'<br>';
    }



    // date 정보
   
    foreach($data->find('td[class=date]',0)->find('text')as $element){
        
        $da0= trim($element);
        echo $da0.'<br>';
    }
    foreach($data->find('td[class=date]',1)->find('text')as $element){
        
        $da1= trim($element);
        echo $da1.'<br>';
    }
    foreach($data->find('td[class=date]',2)->find('text')as $element){
        
        $da2= trim($element);
        echo $da2.'<br>';
    }
     foreach($data->find('td[class=date]',3)->find('text')as $element){
        
        $da3= trim($element);
        echo $da3.'<br>';
    }
    foreach($data->find('td[class=date]',4)->find('text')as $element){
        
        $da4= trim($element);
        echo $da4.'<br>';
    }
    echo '<br>';
    
    
    
    //csv로 변환
    
    
    $file = fopen('./crawling1.csv', 'w');
 
    // save the column headers
    fputcsv($file, array('제목', '부서명', '등록일', 'url'));
     
    // Sample data. This can be fetched from mysql too
    $cs = array(
    array($ti0,$wr0,$da0,$aaa),
    array($ti1,$wr1,$da1,$bbb),
    array($ti2,$wr2,$da2,$ccc),
    array($ti3,$wr3,$da3,$ddd),
    array($ti4,$wr4,$da4,$eee)
    );
    
   
    
        echo $ti0.','.$wr0.','.$da0.','.$aaa.'<br>';
        echo $ti1.','.$wr1.','.$da1.','.$bbb.'<br>';
        echo $ti2.','.$wr2.','.$da2.','.$ccc.'<br>';
        echo $ti3.','.$wr3.','.$da3.','.$ddd.'<br>';
        echo $ti4.','.$wr4.','.$da4.','.$eee.'<br>';
        echo '<br>';

    // save each row of the data
    foreach ($cs as $row)
    {
    fputcsv($file, $row);
    }
     
    // Close the file
    fclose($file);


  

    //csv파일 데이터베이스 저장
$conn = mysqli_connect("localhost","admin","capstone123@","capstone");
$conn->set_charset("utf8");
if($conn){
    $file="./crawling1.csv";
    $handle=fopen($file,"r");
    $i = 0;
    $table="crawling1";

    $query="DROP TABLE $table ;";
    echo $query,"<br>";
    mysqli_query($conn,$query);
            
    while(($cont=fgetcsv($handle, 1000,",")) !==false){
        
        if($i==0){  
            $dep=$cont[0];
            $sal=$cont[1];
            $id =$cont[2];
            $id2=$cont[3];
            
            $query="CREATE TABLE $table ( $dep VARCHAR(100), $sal VARCHAR(20), $id VARCHAR(20), $id2 VARCHAR(500));";
            echo $query,"<br>";
            mysqli_query($conn,$query);
            }
        else{
            $query="INSERT INTO $table ($dep,$sal,$id,$id2) VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]');";
            echo $query,"<br>";
            mysqli_query($conn,$query);
        }
        $i++;
    }
}
else{
    echo "connection failed";
}
?>
<script>
    location.href='../main.php';
</script>