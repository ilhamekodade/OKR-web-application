<?php  $mysqli = new mysqli("localhost","root","");
       $mysqli->query("CREATE DATABASE IF NOT EXISTS okr");
       $mysqli-> close();
       $mysqli = new mysqli("localhost","root","","okr");
       $mysqli->query("CREATE TABLE initiative (idinitiative int PRIMARY KEY NOT NULL  AUTO_INCREMENT, initiative text DEFAULT '----', description text, processus text, owner text, delay int, construction int DEFAULT 0, deployment int DEFAULT 0, objectives int DEFAULT 0, krs int DEFAULT 0, actions int DEFAULT 0)");
       $mysqli->query("CREATE TABLE objective (idobjectif int PRIMARY KEY NOT NULL, objective text DEFAULT '----', description text, owner text, construction int DEFAULT 0, deployment int DEFAULT 0, idinitiative int)");
       $mysqli->query("CREATE TABLE kr (idkr int PRIMARY KEY NOT NULL, kr text DEFAULT '----', description text, owner text, construction int DEFAULT 0, deployment int DEFAULT 0, idobjectif int)");
       $mysqli->query("CREATE TABLE action (idaction int PRIMARY KEY NOT NULL, action text DEFAULT '----', description text, owner text, construction int DEFAULT 0, deployment int DEFAULT 0, idkr int)");
            // Check connection
            if ($mysqli -> connect_errno) {
                        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                        exit();
                                    }

      ?>                                    