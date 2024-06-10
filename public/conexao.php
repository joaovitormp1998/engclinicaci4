<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "engclinica";

$mysqli = new mysqli($host, $user, $pass, $db);
/* check erro
*/
if($mysqli->connect_errno) { 
    echo" conect failed".$mysqli->connect_error;
    exit();
}
