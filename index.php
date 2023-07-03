<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" type="image/png" sizes="16x16" href="img/c.png">


	<title>
		OKR
	</title>
</head>
<?php
include 'connect.php';
?>

<style type="text/css">
      div#content h1{
      text-align: center;
      font-size: 45px;
      font-weight: bold;
      color: lightcyan;
      font-family: Lucida Console;
}

html {
  scroll-behavior: smooth;
}
div#content div{
      display: inline-block;
      width: 33.1%;
      font-family: Lucida Console;
      color: lightcyan;
}
div#content div.leftbox{
   font-family: Lucida Console;
   font-size: 20px;
   text-align: center;
}
div#content div.rightbox{
  font-family: Lucida Console;
   font-size: 20px;
   text-align: center;
}
div#content div.centerbox{
   font-family: Lucida Console;
   font-size: 20px;
   text-align: center;
}
img.leftbox{
      width: 100%;
      height: 500px;
}
img.rightbox{
      width: 100%;
      height: 500px;
}
img.centerbox{
      width: 100%;
      height: 500px;
}






body{
      background-image: url('https://www.wallpapertip.com/wmimgs/196-1963020_website-backgrounds-website-login-page-background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
}
header{
   border-radius: 20px;
   background-color: transparent;
      color:  white;
      font-size: 70px;
      text-align: center;
    font-family: Lucida Handwriting;
    font-weight: bold;
 }
header p{
      font-weight: normal;
      font-size: 30px;
      text-align: center;
      font-family: Lucida Console;
}
footer {
      font-family: Lucida Console;
      color: aliceblue;
      font-size: 20px;
      text-align: center;
      padding-top: 500px;
}
nav ul{
      border-radius: 20px;
      color: white ;
      text-align: center;
}
nav ul li{
      display: inline-block;
      list-style-type: none;
      padding: 50px;
}
nav ul li a{
      font-family: Lucida Console;
      color: lightcyan;
      font-weight: bold;
      font-size: 25px;
      text-decoration: none;
}
nav ul li:hover a{
      border-radius: 5px;
      color: lightblue;
      background-color: lightcyan;
}

</style>
<body>
      <header>
            OKR
      <p>
      	For your ambitious goals
      </p>	
      </header>
      
      <div id="content">
            <h1>
                  A FREE TOOL
            </h1>
            <div class="rightbox">
                  <p>
                        TO ACHIEVE YOUR AMBITIOUS GOALS
                  </p>
                  <img class="rightbox" src="https://clipground.com/images/clipart-ambition-2.jpg">
            </div>

            <div class="centerbox">
                  <p>
                        TO MANAGE YOUR OBJECTIVES
                  </p>
                  <img class="centerbox" src="https://www.managementstudyhq.com/wp-content/uploads/2019/02/Objectives-of-Management.jpg">

            </div>
            <div class="leftbox">
                  <p>
                     TO DEVELOP YOUR AGILITY   
                  </p>
                  <img class="leftbox" src="https://www.techcentral.ie/wp-content/uploads/2016/09/future_work_young_user_woman_tech.jpg">
                  
            </div>
         
      </div>
      <nav>
            <ul>
                  <li>
                        <a href="index.php">
                              Home
                        </a>
                  </li>
                  <li>
                        <a href="goals.php">
                              My goals
                        </a>
                  </li>
                  <li>
                        <a href="edit.php">
                              Edit my goals
                        </a>
                  </li>
                  <li>
                        <a href="search.php">
                              Search
                        </a>
                  </li>
                  <li>                     
                        <a href="board.php">
                              Dashboard
                        </a>
                  </li>
            </ul>
      </nav>

      <footer>
      	<p>
      		Copyright &copy; KODADE ILHAME - 2022 - All right reserved
      	</p>
      </footer>

</body>
</html>