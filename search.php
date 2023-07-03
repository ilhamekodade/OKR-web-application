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
      div#content{
      text-align: center;
      font-size: 40px;
}
input, select {
  width: 100%;
  padding: 12px 20px;
  margin: 4px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: transparent;
  color: aliceblue;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: bold;
}

input[type=submit]:hover {
  background-color: transparent;
  color: black;
  font-weight: bold;
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
table {
      border-color: darkgreen;
      border: 2px solid;
   width: 100%;
}
table th:hover {background-color: white;}
table tr th, td {
  text-align: left;
  padding: 8px;
  border-color: darkgreen;
      border: 2px solid;
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


div#content div{
      display: inline-block;
}
</style>
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

           <div class="init">
            <form method = "post">
                <input type = "text" name = "init" placeholder="Initiative" required>
                <input type = "submit" name = "searchinit" value = "Search" required>
            </form>   
           </div>
           <div class="obj">
            <form method = "post">
                <input type = "text" name = "obj" placeholder="Objective" required>
                <input type = "submit" name = "searchobj" value = "Search" required>
            </form>      
           </div>
           <div class="kr">
            <form method = "post">
                <input type = "text" name = "kr" placeholder="Key-Result" required>
                <input type = "submit" name = "searchkr" value = "Search" required>
            </form>     
           </div>
           <div class="action">
            <form method = "post">
                <input type = "text" name = "act" placeholder="Action" required>
                <input type = "submit" name = "searchact" value = "Search" required>
            </form>      
           </div>
      <?php
           $mysqli = new mysqli("localhost","root","","okr");

            // Check connection
            if ($mysqli -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
                                          }
            if(isset($_POST['searchinit'])){
                  $search= $_POST['init'];
                  if(!empty($search)){
                        if ($result = $mysqli -> query("SELECT * FROM initiative WHERE initiative LIKE '$search'")) {
                        while ($d = mysqli_fetch_array($result)) {
                                ?><table>
                                      <tr bgcolor="#bfd9bf">
                                         <th><?php echo "ID"; ?></th> 
                                         <th><?php echo "Initiative"; ?></th> 
                                         <th><?php echo "Description"; ?></th>
                                         <th><?php echo "Processus"; ?></th>
                                         <th><?php echo "Owner"; ?></th>
                                         <th><?php echo "Time"; ?></th>
                                         <th><?php echo "Construction"; ?></th>
                                         <th><?php echo "Deployment"; ?></th>
                                         <th><?php echo "Objectives"; ?></th>
                                         <th><?php echo "Key-Results"; ?></th>
                                         <th><?php echo "Actions"; ?></th> 
                                      </tr>
                                      <tr bgcolor="#eff6ef">
                                         <th><?php echo $d['idinitiative']; ?></th> 
                                         <th><?php echo $d['initiative']; ?></th> 
                                         <th><?php echo $d['description']; ?></th>
                                         <th><?php echo $d['processus']; ?></th>
                                         <th><?php echo $d['owner']; ?></th>
                                         <th><?php echo $d['delay']; ?></th>
                                         <th><?php echo $d['construction']."%"; ?></th>
                                         <th><?php echo $d['deployment']."%"; ?></th>
                                         <th><?php echo $d['objectives']; ?></th>
                                         <th><?php echo $d['krs']; ?></th>
                                         <th><?php echo $d['actions']; ?></th> 
                                      </tr>
                                </table><?php
                                                   }
                                                                                                           }
                                    }
                                          } 

            if(isset($_POST['searchobj'])){
                  $search= $_POST['obj'];
                  if(!empty($search)){
                        if ($r = $mysqli -> query("SELECT * FROM objective WHERE objective LIKE '$search'")) {
                        while ($d = mysqli_fetch_array($r)) {
                                ?><table>
                                      <tr bgcolor="#bfd9bf">
                                         <th><?php echo "ID"; ?></th> 
                                         <th><?php echo "Objective"; ?></th> 
                                         <th><?php echo "Description"; ?></th>
                                         <th><?php echo "Initiative"; ?></th>
                                         <th><?php echo "Owner"; ?></th>
                                         <th><?php echo "Construction"; ?></th>
                                         <th><?php echo "Deployment"; ?></th>
                                      </tr>
                                      <tr bgcolor="#eff6ef">
                                    <?php 
                                     $c = $d['idinitiative'];
                                    if($x = $mysqli ->query("SELECT * FROM initiative WHERE idinitiative = $c"));
                                         $y = mysqli_fetch_array($x); 
                                         $z = $y['initiative']; ?>
                                         <th><?php echo $d['idobjective']; ?></th>
                                         <th><?php echo $d['objective']; ?></th>  
                                         <th><?php echo $d['description']; ?></th>
                                         <th><?php echo $z; ?></th>
                                         <th><?php echo $d['owner']; ?></th>
                                         <th><?php echo $d['construction']."%"; ?></th>
                                         <th><?php echo $d['deployment']."%"; ?></th>
                                      </tr>
                                </table><?php
                                                   }
                                                                                                           }
                                    }
                                          } 
            if(isset($_POST['searchkr'])){
                  $search= $_POST['kr'];
                  if(!empty($search)){
                        if ($r = $mysqli -> query("SELECT * FROM kr WHERE kr LIKE '$search'")) {
                        while ($d = mysqli_fetch_array($r)) {
                                ?><table>
                                      <tr bgcolor="#bfd9bf">
                                         <th><?php echo "ID"; ?></th> 
                                         <th><?php echo "KR"; ?></th>  
                                         <th><?php echo "Description"; ?></th>
                                         <th><?php echo "Objective"; ?></th>
                                         <th><?php echo "Owner"; ?></th>
                                         <th><?php echo "Construction"; ?></th>
                                         <th><?php echo "Deployment"; ?></th>
                                      </tr>
                                      <tr bgcolor="#eff6ef">
                                    <?php 
                                    $c = $d['idobjectif'];
                                    $x=$mysqli->query("SELECT * FROM objective WHERE idobjectif = $c");
                                    $y = mysqli_fetch_array($x); $z = $y['objective'];?>
                                         <th><?php echo $d['idkr']; ?></th>
                                         <th><?php echo $d['kr']; ?></th>  
                                         <th><?php echo $d['description']; ?></th>
                                         <th><?php echo $z; ?></th>
                                         <th><?php echo $d['owner']; ?></th>
                                         <th><?php echo $d['construction']."%"; ?></th>
                                         <th><?php echo $d['deployment']."%"; ?></th>
                                      </tr>
                                </table><?php
                                                   }
                                                                                                           }
                                    }
                                          } 
                  if(isset($_POST['searchact'])){
                  $search= $_POST['act'];
                  if(!empty($search)){
                        if ($r = $mysqli -> query("SELECT * FROM action WHERE action LIKE '$search'")) {
                        while ($d = mysqli_fetch_array($r)) {
                                ?><table>
                                      <tr bgcolor="#bfd9bf">
                                         <th><?php echo "ID"; ?></th>
                                         <th><?php echo "Action"; ?></th>  
                                         <th><?php echo "Description"; ?></th>
                                         <th><?php echo "Key-Result"; ?></th>
                                         <th><?php echo "Owner"; ?></th>
                                         <th><?php echo "Construction"; ?></th>
                                         <th><?php echo "Deployment"; ?></th>
                                      </tr>
                                      <tr bgcolor="#eff6ef">
                                    <?php 
                                    $c = $d['idkr'];
                                    $x=$mysqli->query("SELECT * FROM kr WHERE idkr = $c");
                                   $y = mysqli_fetch_array($x); $z = $y['kr'];?>
                                         <th><?php echo $d['idaction']; ?></th>  
                                         <th><?php echo $d['action']; ?></th>
                                         <th><?php echo $d['description']; ?></th>
                                         <th><?php echo $z; ?></th>
                                         <th><?php echo $d['owner']; ?></th>
                                         <th><?php echo $d['construction']."%"; ?></th>
                                         <th><?php echo $d['deployment']."%"; ?></th>
                                      </tr>
                                </table><?php
                                                   }
                                                                                                           }
                                    }
                                          } 
      ?>     
            
      </div>
      <footer>
            <p>
                  Copyright &copy; KODADE ILHAME - 2022 - All right reserved
            </p>
      </footer>

</body>
</html>