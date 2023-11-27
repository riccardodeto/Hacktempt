<?php

function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "admin";
 $dbpass = "admin";
 $db = "hacktempt";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);


 return $conn;
 }

 function getUsers($conn, $id){
   $query = "SELECT username, email FROM users WHERE id=$id";
   $result = $conn->query($query);
   return $result;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }

?>
