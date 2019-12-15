<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Embellished 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140207

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
<link href="../layout/styles/default.css?after" rel="stylesheet" type="text/css" media="all" />
<link href="../layout/styles/fonts.css?after" rel="stylesheet" type="text/css" media="all" />
</head>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<?php

      session_start();
      if(!isset($_SESSION['user_id'])){
        echo "<script>alert('로그인 해주세요.');history.back();</script>";
    exit;
      }
?>

<body>
<div id="wrapper1">
  <div id="header-wrapper">
    <div id="header" class="container">
      <div id="logo"> <span class="icon icon-cogs"></span>
        <h1><a href="../index.php">Rereview</a></h1>
        <span>Help your study</span> </div>

        <div class="navbar">
          <div class="dropdown">
              <a href="../index.php">Home</a>
            </div>  
            <div class="dropdown">
            <a class="dropbtn">Write Review</a>
              <div class="dropdown-content">
                <a href="full-width_TOEIC.php">TOEIC</a>
                <a href="full-width_TOEFL.php">TOEFL</a>
                <a href="full-width_TEPS.php">TEPS</a>
              </div>
          </div>
          <div class="dropdown">
            <a class="dropbtn">Read Review</a>
              <div class="dropdown-content">
                <a href="review_TOEIC.php?Order='ReviewNo'">TOEIC</a>
                <a href="review_TOEFL.php?Order='ReviewNo'">TOEFL</a>
                <a href="review_TEPS.php?Order='ReviewNo'">TEPS</a>
              </div>
          </div> 
          <div class="dropdown">
            <a href="#news">About us</a>
          </div> 
        </div>
    </div>
  </div>
</div>


<div class="wrapper_2">
  <div id="reading">
  <h1>리뷰 보기-TEPS</h1>

  <a href="review_TEPS.php?Order=ReviewNo desc" class="loginButton">최신순<a href="review_TEPS.php?Order=Star desc" class="loginButton">별점높은순<a href="review_TEPS.php?Order=Star" class="loginButton">별점낮은순</a></a></a>

  <?php

   $Order=$_GET['Order'];


    @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');

   if (mysqli_connect_errno()) {

      echo "<p>Error: Could not connect to database.<br />
   
      Please try again later.</p>";

      exit;
   }

   $result = $db -> query("SELECT l.LectureName, l.Teacher, r.ReviewNo, r.Title, r.Subject, l.LectureNo, r.Star, r.Review, r.reviewNo FROM Review As r join lectures as l on l.lectureno=r.lectureno WHERE Subject='TEPS' Order by $Order");

    echo "<br><br>
          <div class=\"wrap-table100\">
              <div class=\"table\">

             <div class=\"row header\">
              <div class=\"cell\">
                강좌이름
              </div>
              <div class=\"cell\">
                강사명
              </div>
              <div class=\"cell\">
                제목
              </div>
              <div class=\"cell\">
                점수
              </div>
            </div>";

    if($result->num_rows > 0){
         while($row = $result->fetch_assoc()) {
            $Noreview=$row["reviewNo"];
            echo "<div class=\"row\"> <div class=\"cell\" data-title=\"LectureName\">". $row["LectureName"]."</div><div class=\"cell\" data-title=\"Teacher\">". $row["Teacher"] ."</div><div class=\"cell\" data-title=\"Title\"><a class=\"reviewtitle\" href=\"showreview.php?Noreview=$Noreview\">". $row["Title"] ."</a></div><div class=\"cell\" data-title=\"Star\">".$row["Star"] ."</div></div>";
        }
    }
    else{
      echo "0 result";
    }

      echo "</div></div>"; 


    $db->close();
  ?>    
  </div>
</div>

    </div>
    
  </div>
</div>



<div id="footer" class="container">
  <div class="title">
    <span class="byline">오픈 소프트웨어 플랫폼 6팀 <br>
    Rereview Company</span> </div>
  <ul class="contact">
    <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
    <li><a href="#" class="icon icon-facebook"><span></span></a></li>
    <li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
    <li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
    <li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
  </ul>
</div>



