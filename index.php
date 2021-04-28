<?
  include "lib.php";
?>
<!doctype html>
<html lang="ko">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- main css -->
    <link rel="stylesheet" href="./css/style.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
    <link rel="stylesheet" href="./css/dark-mode.css?after" type="text/css" media="screen" title="no title" charset="utf-8"/>
  </head>
  <body>
    <div id="wrap">
      <!-- header -->
      <?
      require_once ("./contents/header.php");
      ?>
      
      <!-- container -->
      <div class="container con position-relative">
        <?
        require_once("./contents/mainboard.php");
        ?>
      </div>
    </div>  
      
    <!-- bootstrap script -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <!-- main script -->
    <script src="./javascript/main.js"></script>
    <script src="./javascript/dark-mode-switch.js"></script>
  </body>
</html>