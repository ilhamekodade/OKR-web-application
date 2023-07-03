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
<style type="text/css">
table {
   border-radius: 10px;
   width: 100%;
}
table th:hover {background-color: white;}
table tr th, td {
  text-align: left;
  padding: 8px;
}

table.top tr th {
  color: black;
  font-size: 15px;
  font-family: Lucida Console;
  font-weight: normal;
  border-radius: 5px;}
table.buttom{
      font-size: 17px;
      padding-top: 80px;
      width: 100%;
      border-radius: 5px;
      border-color: darkslateblue;
      border: 2px solid;
}
table.top{
      width: 50%;
      padding-left: 1000px;
      }
 table tr th {
      text-align: left;
}
h1{
      color: white;
      background-color: #98b47f;
      font-weight: bold;
      font-size: 25px;
      border-radius: 10px;
}
td{
  font-weight: bold;
  font-size: 19px;
  font-family: Lucida Console;
}

div#content table{
      padding: 20px;
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
<?php 
            $mysqli = new mysqli("localhost","root","","okr");

            // Check connection
            if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
             } ?>
      <header>
            OKR
      <p>
            For your ambitious goals
      </p>  
      </header>

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
      
      <div id="content">

            <?php
            if($i = $mysqli ->query("SELECT * FROM initiative")){
              while ($n = mysqli_fetch_array($i)) {
                     
                     $idn = $n['idinitiative'];
                       
                    ?>
                    
                    <table class="top">
                      <tr>
                            <th bgcolor="#c0c8d0"><?php echo "Initiative"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['initiative']; ?></th>
                            <th bgcolor="#c0c8d0"><?php echo "Objectives"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['objectives']; ?></th>
                      </tr>  
                      <tr>
                            <th bgcolor="#c0c8d0"><?php echo "Description"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['description']; ?></th>
                            <th bgcolor="#c0c8d0"><?php echo "Key-Results"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['krs']; ?></th>
                      </tr> 
                      <tr>
                            <th bgcolor="#c0c8d0"><?php echo "Processus"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['processus']; ?></th>
                            <th bgcolor="#c0c8d0"><?php echo "Actions"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['actions']; ?></th>
                      </tr>  
                      <tr>
                            <th bgcolor="#c0c8d0"><?php echo "Owner"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['owner']; ?></th>
                            <th bgcolor="#c0c8d0"><?php echo "Construction"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['construction']."%"; ?></th>
                      </tr> 
                      <tr>
                            <th bgcolor="#c0c8d0"><?php echo "Time (months)"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['delay']; ?></th>
                            <th bgcolor="#c0c8d0"><?php echo "Deployment"; ?></th>
                            <th bgcolor="#eceef1"><?php echo $n['deployment']."%"; ?></th>
                      </tr>  

                    </table>
                    <table class="buttom">
                  <tr bgcolor="#778899">
                      <th>ID</th>  
                      <th>Obj/KR/Act</th>        
                      <th>Description</th>
                      <th>Owner</th>
                      <th>Construction</th>
                      <th>Deployment</th>
                  </tr>
                  <?php  if($r = $mysqli -> query("SELECT * FROM objective WHERE idinitiative = $idn")){  
                                   
                              while ($row = mysqli_fetch_array($r)) {    ?>                         
                                
                                <tr bgcolor="#94a2af">
                                <th><?php echo "Objective#  ".$row['idobjectif']; ?></th>
                                <th><?php echo $row['objective']; ?></th>
                                <th><?php echo $row['description']; ?></th>
                                <th><?php echo $row['owner'];?></th>
                                <th><?php echo $row['construction']."%";?></th>
                                <th><?php echo $row['deployment']."%";?></th>
                                </tr> 
    
                                    <?php $o = $row['idobjectif'];
                              if($k = $mysqli -> query("SELECT * FROM kr WHERE idobjectif = $o")){

                                    while ($kk = mysqli_fetch_array($k)){  ?>

                                    <tr bgcolor="#c0c8d0">
                                    <th><?php echo "KR#  ".$kk['idkr']; ?></th>
                                    <th><?php echo $kk['kr']; ?></th>
                                    <th><?php echo $kk['description']; ?></th>
                                    <th><?php echo $kk['owner'];?></th>
                                    <th><?php echo $kk['construction']."%";?></th>
                                    <th><?php echo $kk['deployment']."%";?></th>
                                    </tr>  
                                        <?php $v = $kk['idkr'];
                                    if($ac = $mysqli -> query("SELECT * FROM action WHERE idkr = $v")){

                                           while($act = mysqli_fetch_array($ac)){  ?>

                                    <tr bgcolor="#eceef1">
                                    <th><?php echo "Action#  ".$act['idaction']; ?></th>
                                    <th><?php echo $act['action']; ?></th>
                                    <th><?php echo $act['description']; ?></th>
                                    <th><?php echo $act['owner'];?></th>
                                    <th><?php echo $act['construction']."%";?></th>
                                    <th><?php echo $act['deployment']."%";?></th>
                                    </tr>
                                    <?php                                       }
                                                                                                      }
                                   
                                                                         }
                                                                                                    }
                              
                                                                                   }
                                                                                                          }
                                                                                        }                             
                                                                                                                 }?>
                                      
                        </table>
            
            
      </div>

 <footer>
            <p>
                  Copyright &copy; KODADE ILHAME - 2022 - All right reserved
            </p>
 </footer>
<?php $mysqli -> close(); ?>
</body>

</html>