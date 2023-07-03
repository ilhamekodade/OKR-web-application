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
table, th, td {
  text-align: center;
}
table {
      border: 2px solid;
   width: 100%;
}
table tr th, td {
  text-align: left;
  padding: 8px;
  border-color: darkslateblue;
      border: 2px solid;
}
div.edit table tr th {
      text-align: left;
}
table tr th {
  color: black;
  text-align: center;
  font-size: 15px;
  font-family: Lucida Console;
}
td{
  font-weight: bold;
  font-size: 19px;
  font-family: Lucida Console;
}
div.buttom{
      font-size: 19px;
      padding-top: 80px;
      width: 100%;
      border-radius: 10px;
}
div.buttom table tr th {
      text-align: left;
}
td{
  font-weight: bold;
  color: whitesmoke;
  font-size: 19px;
  font-family: Lucida Console;
}

div#content div.top div{
      display: inline-block;
      border-radius: 10px;
      width: 49%;
      font-family: Lucida Console;
      font-size: 18px;
      text-align: center;
      background-color: transparent;
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
            <?php 
            $mysqli = new mysqli("localhost","root","","okr");

            // Check connection
            if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
             } ?>
<body>
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

      <div class="top">
            <div class="leftbox" style="overflow-x:auto;">
                  <table>
               <tr bgcolor="#778899">
                     <th>Construction</th>
                     <th>Deployment</th>
               </tr>
               <tr bgcolor="#a3aeba">
                  <?php 
                        $m=0;
                        $a = 0;
                        $b = 0;
                        $c = 0;
                  if($r = $mysqli -> query("SELECT * FROM initiative")){
                        
                       while ($d = mysqli_fetch_array($r)) { $m = $m+1;
                                                             $a = $a + $d['construction'];
                                                             $b = $b + $d['deployment'];
                                                             $c = $c + $d['delay'];}
                        if($m==0){
                        $v = 0; $w =0; $z = 0;
                  }
                  else{ $v = $a/$m;
                        $w = $b/$m;
                        $z = $c/$m;
                   }
            } ?>
                     <th><?php echo $v."%"?></th>
                     <th><?php echo $w."%"?></th>
               </tr>
                  </table>
            </div>

            <div class="rightbox" style="overflow-x:auto;">  
                  <table >
                     <tr bgcolor="#778899">
                     <th>Objectives</th>
                     <th>Key-Results</th>
                     <th>Actions</th>
                     </tr>
                     <tr bgcolor="#a3aeba">
                        <?php 
                        
                      $f = 0;
                      $t = 0;
                      $u = 0;
                   if ($result = $mysqli -> query("SELECT * FROM initiative")) {
                        while ($d = mysqli_fetch_array($result)){
                              $b = $d['idinitiative'];
                             if($r = $mysqli -> query("SELECT * FROM objective WHERE idinitiative = $b")) 
                             {  while ($row = mysqli_fetch_array($r)) {                             
                                     $f = $f + 1;
                              $o = $row['idobjectif'];
                              if($k = $mysqli -> query("SELECT * FROM kr WHERE idobjectif = $o")){
                                    while ($kk = mysqli_fetch_array($k)) {
                                    $t = $t +1;
                                    $v = $kk['idkr'];
                                    if($ac = $mysqli -> query("SELECT * FROM action WHERE idkr = $v")){
                                           while($act = mysqli_fetch_array($ac)){
                                          $u = $u+1;
                                    }
                                    }
                                   
                              }
                              }
                              
                        }
                      }}
                       ?><th><?php echo $f; ?></th>
                         <th><?php echo $t; ?></th>
                         <th><?php echo $u; }?></th>
                     </tr>
                  </table>
            </div> 
      </div>
            

      <div class="buttom" style="overflow-x:auto;">
                  <table>
                  <tr bgcolor="#778899">
                      <th>ID</th>
                      <th>Initiative</th>
                      <th>Description</th>
                      <th>Objectives</th>
                      <th>Key-Results</th>
                      <th>Actions</th>
                      <th>Construction</th>
                      <th>Deployment</th>
                      <th>Delay (months)</th>
                      <th>Processus</th>
                      <th>Owner</th>
                  </tr>
                        <?php 
                   if ($result = $mysqli -> query("SELECT * FROM initiative")) {
                        while ($d = mysqli_fetch_array($result)){
                        ?>
                        <tr bgcolor="#a3aeba">
                         <th><?php echo $d['idinitiative']; ?></th>
                         <th bgcolor="#778899"><?php echo $d['initiative']; ?></th>
                         <th><?php echo $d['description']; ?></th>
                         <th><?php echo $d['objectives']; ?></th>
                         <th><?php echo $d['krs']; ?></th>
                         <th><?php echo $d['actions']; ?></th>
                         <th><?php echo $d['construction']."%"; ?></th>
                         <th><?php echo $d['deployment']."%"; ?></th>
                         <th><?php echo $d['delay']; ?></th>
                         <th><?php echo $d['processus']; ?></th>
                         <th><?php echo $d['owner']; ?></th>
                   </tr> <?php
 }                             
                             }
       ?>
                  </table>
            </div> 
      
       
      </div>
      <?php $mysqli -> close(); ?>
      <footer>
            <p>
                  Copyright &copy; KODADE ILHAME - 2022 - All right reserved
            </p>
      </footer>
</body>
</html>