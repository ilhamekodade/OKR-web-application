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
div#content div.delmod div.leftbox div{
     display: inline-block;
     width: 23.5%; 
}
div#content div.delmod{
      color: #98b47f;
      font-family: Lucida Console;
      font-size: 16px;
      text-align: center;
      padding: 10px;
      padding-top: 30px;
}
table, th, td {
  text-align: center;
}
table {
      border: 2px solid;
   width: 100%;
}
table th:hover {background-color: white;}
table tr th, td {
  text-align: left;
  padding: 8px;
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
div.create div{
      display: inline-block;
      width: 24%;
}
div#content div.create{
      border-radius: 10px;
      background-color: transparent;
      color: white;
      font-family: Lucida Console;
      font-size: 18px;
      text-align: center;
      padding: 10px;
      padding-top: 30px;
}
h1{
      color: white;
      background-color: transparent;
      font-weight: bold;
      font-size: 25px;
      border-radius: 10px;
}
div#content div.delmod div.leftbox div h1{
      font-weight: normal;
      background-color: transparent;
      color: white;
      font-size: 20px;
}
div#content div.edit{
      background-color: transparent;
      color: white;
      font-family: Lucida Console; 
      font-size: 18px;
      text-align: center;
      padding-right: 15px; 
}

div.edit table tr th input{
  width: 100%;
  padding: 5px 10px;
  margin: 1px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  background-color: none;
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
             }   ?>

<body>
      <?php
       if($r = $mysqli -> query("SELECT * FROM initiative")){
            while ($d = mysqli_fetch_array($r)) {
                 $o = $d['idinitiative'];
            if($x = $mysqli -> query("SELECT * FROM objective WHERE idinitiative = $o")){  
            while ($row = mysqli_fetch_array($x)){
                 $k = $row['idobjectif'];
            if($c = $mysqli -> query("SELECT * FROM kr WHERE idobjectif = $k")){
                  $acc = 0;
            while($kk = mysqli_fetch_array($c)){
                 $a = $kk['idkr'];
                 $ac = $mysqli->query("SELECT * FROM action WHERE idkr = $a");
                 while(mysqli_fetch_array($ac)){
                  $acc = $acc + 1;
                 }
                 $acons = 0;
                 $adep = 0;
                  if($act = $mysqli -> query("SELECT * FROM action WHERE idkr = $a")){
                        while($acti = mysqli_fetch_array($act)){
                         $acons = $acons + $acti['construction'];
                         $adep = $adep +$acti['deployment'];
                        }
                  if($acc == 0){ $v = 0;
                  $w = 0;
                  }
                  else{
                  $v = ($acons/$acc);
                  $w = ($adep/$acc);
                  }
                  }
                  $s = $mysqli -> prepare("UPDATE kr SET construction = ?, deployment = ? WHERE idkr = ?");
                  $s -> bind_param("iii", $v, $w, $a);
                  $s->execute();
                 }
                  }
            }
            }
            }
}
            if($r = $mysqli -> query("SELECT * FROM initiative")){
            while ($d = mysqli_fetch_array($r)) {
                 $k = $d['idinitiative'];
            if($c = $mysqli -> query("SELECT * FROM objective WHERE idinitiative = $k")){
                  
            while($kk = mysqli_fetch_array($c)){
                  $acc = 0;
                 $a = $kk['idobjectif'];
                 $ac = $mysqli->query("SELECT * FROM kr WHERE idobjectif = $a");
                 while(mysqli_fetch_array($ac)){
                  $acc = $acc + 1;
                 }
                 $acons = 0;
                 $adep = 0;
                  if($act = $mysqli -> query("SELECT * FROM kr WHERE idobjectif = $a")){
                        while($acti = mysqli_fetch_array($act)){
                         $acons = $acons + $acti['construction'];
                         $adep = $adep +$acti['deployment'];
                        }
                  if($acc == 0){ $v = 0;
                  $w = 0;
                  }
                  else{
                  $v = ($acons/$acc);
                  $w = ($adep/$acc);
                  }
                  $s = $mysqli -> prepare("UPDATE objective SET construction = ?, deployment = ? WHERE idobjectif = ?");
                  $s -> bind_param("iii", $v, $w, $a);
                  $s->execute();
                  }
                 }
                  }
            }
            }
            
            if($r = $mysqli -> query("SELECT * FROM initiative")){
            while ($d = mysqli_fetch_array($r)) {
                 $k = $d['idinitiative'];
                 $m = 0;
                 $acons = 0;
                 $adep = 0;
            if($c = $mysqli -> query("SELECT * FROM objective WHERE idinitiative = $k")){
                 while($acti = mysqli_fetch_array($c)){
                  $m = $m + 1;
                         $acons = $acons + $acti['construction'];
                         $adep = $adep +$acti['deployment'];
                        }
                        
                  if($m == 0){ $v = 0;
                  $w = 0;
                  }
                  else{
                  $v = ($acons/$m);
                  $w = ($adep/$m);
                  }
                  $s = $mysqli -> prepare("UPDATE initiative SET construction = ?, deployment = ? WHERE idinitiative = ?");
                  $s -> bind_param("iii", $v, $w, $k);
                  $s->execute();
                  }
                 }
                  }
      ?>
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
      <?php 
             if ($result = $mysqli -> query("SELECT * FROM initiative")){
                        while ($d = mysqli_fetch_array($result)){
                      $f = 0;
                      $t = 0;
                      $u = 0;
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
                  }
                  $s = $mysqli -> prepare("UPDATE initiative SET objectives = ?, krs = ?, actions = ? WHERE idinitiative = ?");
                  $s -> bind_param("iiii", $f, $t, $u, $b);
                  $s->execute();

            }
      }
                       ?>
      <div id="content">
            
            <div class="edit">
                  <h1>
                        Goals
                  </h1>
                  <table>
                  <tr style="background-color: #3e4953; border-radius: 1px;">
                      <th>ID</th>
                      <th>Init/Obj/KR/Act</th>        
                      <th>Description</th>
                      <th>Owner</th>
                      <th>Processus</th>
                      <th>Construction</th>
                      <th>Deployment</th>
                  </tr>
                   <?php
                   if ($result = $mysqli -> query("SELECT * FROM initiative")){

                        while ($d = mysqli_fetch_array($result)){    ?>
                                <tr bgcolor="#546270">
                                <th><?php echo "Initiative#  ".$d['idinitiative'];?></th>
                                <th><?php echo $d['initiative'];?></th>
                                <th><?php echo $d['description']; ?></th>
                                <th><?php echo $d['owner'];?></th>
                                <th><?php echo $d['processus'];?></th>        
                                    <?php $p = $d['processus']?>
                                <th><?php echo $d['construction']."%";?></th>
                                <th><?php echo $d['deployment']."%";?></th>
                                <?php $b = $d['idinitiative'];
                           if($r = $mysqli -> query("SELECT * FROM objective WHERE idinitiative = $b")){  
                                   
                              while ($row = mysqli_fetch_array($r)) {    ?>                         
                                
                                <tr bgcolor="#94a2af">
                                <th><?php echo "Objective#  ".$row['idobjectif']; ?></th>
                                <th><?php echo $row['objective']; ?></th>
                                <th><?php echo $row['description']; ?></th>
                                <th><?php echo $row['owner'];?></th>
                                <th><?php echo $p;?></th>
                                <th><?php echo $row['construction']."%";?></th>
                                <th><?php echo $row['deployment']."%";?></th>
                                <?php $o = $row['idobjectif'];?>
                                </tr> 
    
                                    <?php $o = $row['idobjectif'];
                              if($k = $mysqli -> query("SELECT * FROM kr WHERE idobjectif = $o")){

                                    while ($kk = mysqli_fetch_array($k)){  ?>

                                    <tr bgcolor="#c0c8d0">
                                    <th><?php echo "KR#  ".$kk['idkr']; ?></th>
                                    <th><?php echo $kk['kr']; ?></th>
                                    <th><?php echo $kk['description']; ?></th>
                                    <th><?php echo $kk['owner'];?></th>
                                    <th><?php echo $p;?></th>
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
                                    <th><?php echo $p;?></th>
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
                                                                                                                 }
                                      ?>
                        </table>
            </div>

            <div class="create">
                  <h1>
                        Create new Goals
                  </h1>
            <div class="initiative">
                 <form method="post" class="initiative">
                  <input type="text" name="init" placeholder="New Initiative" required>
                  <input type="Number" name="idinit" placeholder="ID-Initiative" required>
                  <input type="text" name="desinit" placeholder="Description">
                  <input type="text" name="pro-init" placeholder="Processus" >
                  <input type="text" name="owner-init" placeholder="Owner" >
                  <input type="Number" name="time" placeholder="Delay (months)" >
                  <input type="submit" name="ok-init" id="submit" value="submit" required>
                  </form>    
            </div>
             
            <div class="objective">
                  <form method="post" class="objective">
                  <input type="text" name="obj" placeholder="New Objective" required>
                  <input type="Number" name="id-init" placeholder="id_Initiative" required>
                  <input type="Number" name="idobj" placeholder="ID-Objective" required>
                  <input type="text" name="desobj" placeholder="Description">
                  <input type="text" name="owner-obj" placeholder="Owner" >
                  <input type="submit" name="ok-obj" id="submit" value="submit" required>
                  </form>   
            </div>  
               
            <div class="kr">
                  <form method="post" class="kr">
                  <input type="text" name="kr" placeholder="New Key-Result" required>
                  <input type="Number" name="id-obj" placeholder="id_Objective" required>
                  <input type="Number" name="idkr" placeholder="ID-Key-Result" required>
                  <input type="text" name="deskr" placeholder="Description">
                  <input type="text" name="owner-kr" placeholder="Owner" >
                  <input type="submit" name="ok-kr" id="submit" value="submit" required>
                  </form>    
            </div>
              
            <div class="action">
                  <form method="post" class="action">
                  <input type="text" name="action" placeholder="New Action" required>
                  <input type="Number" name="id-kr" placeholder="id_Key-Result" required>
                  <input type="Number" name="idaction" placeholder="ID-Action" required>
                  <input type="text" name="desact" placeholder="Description">
                  <input type="text" name="owner-act" placeholder="Owner" >
                  <input type="submit" name="ok-act" id="submit" value="submit" required>
                  </form> 
            </div>
              
            </div>
            <div class="delmod">

                  <div class="leftbox">
                   <h1>Edit Goals</h1> 
                   <div class="editinit">
                        <h1>Edit Initiative</h1>
                    <form method="post">
                      <input type="text" name="ini" placeholder="Initiative" required>
                      <input type="Number" name="idini" placeholder="ID-Initiative" required>
                      <input type="text" name="desini" placeholder="Description" >
                      <input type="text" name="pro-ini" placeholder="Processus" >
                      <input type="text" name="owner-ini" placeholder="Owner" >
                      <input type="Number" name="tim" placeholder="Delay (months)" >
                      <input type="submit" name="edit-init" id="edit-init" value="Edit" required>    
                    </form>     
                   </div>    
                   <div class="editobj">
                        <h1>Edit Objective</h1>
                      <form method="post">
                      <input type="Number" name="idob" placeholder="ID-Objective" required>
                      <input type="text" name="ob" placeholder="Objective" required>
                      <input type="Number" name="id-ini" placeholder="ID-Initiative" required>
                      <input type="text" name="desob" placeholder="Description" >
                      <input type="text" name="owner-ob" placeholder="Owner" >
                      <input type="submit" name="edit-obj" id="edit-obj" value="Edit" required>    
                    </form>       
                   </div>
                   <div class="editkr">
                        <h1>Edit KR</h1>
                    <form method="post">
                      <input type="Number" name="idk" placeholder="ID-KR" required>
                      <input type="text" name="k" placeholder="Key-Result" required>
                      <input type="Number" name="id-ob" placeholder="ID-Objectif" required>
                      <input type="text" name="desk" placeholder="Description" >
                      <input type="text" name="owner-k" placeholder="Owner" >
                      <input type="submit" name="edit-kr" id="edit-kr" value="Edit" required>    
                    </form>  
                   </div>
                   <div class="editact">
                        <h1>Edit Action</h1>
                     <form method="post">
                      <input type="Number" name="idactio" placeholder="ID-Action" required>
                      <input type="text" name="actio" placeholder="Action" required>
                      <input type="Number" name="id-k" placeholder="ID-KR" required>
                      <input type="text" name="desac" placeholder="Description">
                      <input type="text" name="owner-ac" placeholder="Owner" >
                      <input type="Number" name="const" placeholder="construction %" >
                      <input type="Number" name="deploy" placeholder="deployment %" >
                      <input type="submit" name="edit-act" id="edit-act" value="Edit" required>    
                    </form>    
                   </div>
                  </div>

                  <div class="rightbox">
                   <h1>Delete Goals</h1>
                   <div class="delinit">
                         <form method="post">
                            <input type="Number" name="idinitt" placeholder="ID-Initiative" required> 
                            <input type="submit" name="deletinit" id="deletinit" value="Delete" required>    
                         </form>
                   </div>
                   <div class="delobj">
                         <form method="post">
                            <input type="Number" name="idobjj" placeholder="ID-Objective" required> 
                            <input type="submit" name="deletobj" id="deletobj" value="Delete" required>    
                         </form>
                   </div>
                   <div class="delkr">
                         <form method="post">
                            <input type="Number" name="idkrr" placeholder="ID-KR" required> 
                            <input type="submit" name="deletkr" id="deletkr" value="Delete" required>    
                         </form>
                   </div>
                   <div class="delac">
                         <form method="post">
                            <input type="Number" name="idactionn" placeholder="ID-Action" required> 
                            <input type="submit" name="deletac" id="deletac" value="Delete" required>    
                         </form>
                   </div>
                  </div>
                  
            </div>
      </div>     
            <?php
             
            if(isset($_POST['edit-init'])){
                 $init = $_POST['ini'];
                 $des = $_POST['desini'];
                 $pro = $_POST['pro-ini'];
                 $ow = $_POST['owner-ini'];
                 $del = $_POST['tim'];
                 $id = $_POST['idini'];
                 if(!empty($init)  && !empty($id)){
                  echo "string";
                  $s = $mysqli -> prepare("UPDATE initiative SET initiative = ?, description = ?, processus = ?, owner = ?, delay = ? WHERE idinitiative = ?");
                  $s -> bind_param("ssssii", $init, $des, $pro, $ow, $del, $id);
                  $s->execute();
            }}
            if(isset($_POST['edit-obj'])){
                 $ob = $_POST['ob'];
                 $des = $_POST['desob'];
                 $idi = $_POST['id-ini'];
                 $ow = $_POST['owner-ob'];
                 $id = $_POST['idob'];
                 if(!empty($ob) && !empty($idi) && !empty($id)){
                  $s = $mysqli -> prepare("UPDATE objective SET objective = ?, description = ?, idinitiative = ?, owner = ? WHERE idobjectif = ?");
                  $s -> bind_param("ssisi", $ob, $des, $idi, $ow, $id);
                  $s->execute();
            }
            }
            if(isset($_POST['edit-kr'])){
                 $kr = $_POST['k'];
                 $des = $_POST['desk'];
                 $idi = $_POST['id-ob'];
                 $ow = $_POST['owner-k'];
                 $id = $_POST['idk'];
                 if(!empty($kr) && !empty($idi) && !empty($id)){
                  $s = $mysqli -> prepare("UPDATE kr SET kr = ?, description = ?, idobjectif = ?, owner = ? WHERE idkr = ?");
                  $s -> bind_param("ssisi", $kr, $des, $idi, $ow, $id);
                  $s->execute();
            }
            }
            if(isset($_POST['edit-act'])){
                 $action = $_POST['actio'];
                 $des = $_POST['desac'];
                 $idi = $_POST['id-k'];
                 $ow = $_POST['owner-ac'];
                 $id = $_POST['idactio'];
                 $cons = $_POST['const'];
                 $dep = $_POST['deploy'];
                 if(!empty($action) && !empty($idi) && !empty($id)){
                  $s = $mysqli -> prepare("UPDATE action SET action = ?, description = ?, idkr = ?, owner = ?, construction = ?, deployment = ? WHERE idaction = ?");
                  $s -> bind_param("ssisiii", $action, $des, $idi, $ow, $cons, $dep, $id);
                  $s->execute();
            }
            }
            if(isset($_POST['deletinit'])){
                  $id = $_POST['idinitt'];
                  if (!empty($id)) {

                        if($x = $mysqli -> query("SELECT * FROM objective WHERE idinitiative = $id")){
                           while ($d = mysqli_fetch_array($x)) {
                             $o = $d['idobjectif'];
                             if($z = $mysqli ->query("SELECT * FROM kr WHERE idobjectif = $o")){
                                while ($c = mysqli_fetch_array($z)) {
                                    $k = $c['idkr'];
                                    $mysqli->query("DELETE FROM action WHERE idkr = $k");
                              }
                        }
                        $mysqli -> query("DELETE FROM kr WHERE idobjectif = $o");
                  }
              }
              $mysqli -> query("DELETE FROM objective WHERE idinitiative = $id");
              $mysqli ->query("DELETE FROM initiative WHERE idinitiative = $id");
                  }

            }
            
            if (isset($_POST['deletobj'])) {
                  $id = $_POST['idobjj'];
                  if(!empty($id)){
                        if($x = $mysqli -> query("SELECT * FROM kr WHERE idobjectif = $id")){
                             while ($c = mysqli_fetch_array($x)) {
                                    $k = $c['idkr'];
                                    $mysqli->query("DELETE FROM action WHERE idkr = $k");
                              } 
                        }
                        $mysqli->query("DELETE FROM kr WHERE idobjectif = $id");
                        $mysqli->query("DELETE FROM objective WHERE idobjectif = $id");
                  }
            }
            if (isset($_POST['deletkr'])) {
                  $id = $_POST['idkrr'];
                  if(!empty($id)){
                       $mysqli->query("DELETE FROM action WHERE idkr = $id");
                       $mysqli->query("DELETE FROM KR WHERE idkr = $id");
                        }
                  }
            if(isset($_POST['deletac'])){
                  $id = $_POST['idactionn'];
                  if(!empty($id)){
                        $mysqli->query("DELETE FROM action WHERE idaction = $id");
                  }
            }

            if(isset($_POST['ok-init']))
            {  
             $stmt = $mysqli -> prepare("INSERT INTO initiative (idinitiative, initiative, description, processus, owner, delay) VALUES (?, ?, ?, ?, ?, ?)");
               $stmt -> bind_param("issssi", $id, $init, $description, $processus, $team, $time);
                // set parameters and execute
                  $id = $_POST['idinit'];
                  $init = $_POST['init'];
                  $description = $_POST['desinit'];
                  $processus = $_POST['pro-init'];
                  $team = $_POST['owner-init'];
                  $time = $_POST['time'];
                  
                  if(!empty($id) && !empty($init))
                  {     $stmt -> execute();
                        $stmt -> close();
                  }
            }

            if(isset($_POST['ok-obj']))
            {  $q = $mysqli -> prepare("INSERT INTO objective (idobjectif, objective, idinitiative, description, owner) VALUES (?, ?, ?, ?, ?)");
               $q -> bind_param("isiss", $obje, $obj,  $idinit, $object, $owner);
                // set parameters and execute
                  $obje = $_POST['idobj']; 
                  $obj = $_POST['obj'];
                  $idinit = $_POST['id-init'];
                  $object = $_POST['desobj'];
                  $owner = $_POST['owner-obj'];
                  
                  if(!empty($obje) && !empty($idinit) && !empty($obj))
                  {     $q -> execute();
                        $q -> close();
                  }
            }

            if(isset($_POST['ok-kr']))
            {   $s = $mysqli -> prepare("INSERT INTO kr (idkr, kr, idobjectif, description, owner) VALUES (?, ?, ?, ?, ?)");
               $s -> bind_param("isiss", $idker, $ker, $idobj, $kr, $ownerkr);
                // set parameters and execute
                  $ker = $_POST['kr'];
                  $idker = $_POST['idkr'];
                  $idobj = $_POST['id-obj'];
                  $kr = $_POST['deskr'];
                  $ownerkr = $_POST['owner-kr'];
                  
                  if(!empty($idker) && !empty($idobj) && !empty($ker))
                  {     $s -> execute();
                        $s -> close();
                  }
            } 

            if(isset($_POST['ok-act']))
            {  $t = $mysqli -> prepare("INSERT INTO action (idaction, action, idkr, description, owner) VALUES (?, ?, ?, ?, ?)");
               $t -> bind_param("isiss", $idacti, $act, $idkrr, $action, $owneract);
                // set parameters and execute
                  $idacti = $_POST['idaction'];
                  $act = $_POST['action'];
                  $idkrr = $_POST['id-kr'];
                  $action = $_POST['desact'];
                  $owneract = $_POST['owner-act'];
                  
                  if(!empty($idacti) && !empty($idkrr) && !empty($act))
                  {     $t -> execute();
                        $t -> close();
                  }
            }  

            ?> 
      


      <?php $mysqli -> close(); ?>
      <footer>
            <p>
                  Copyright &copy; KODADE ILHAME - 2022 - All right reserved
            </p>
      </footer>

</body>
</html>