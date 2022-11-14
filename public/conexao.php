<?php
$host = "www.softeng.com.br";
$user = "u246849716_root";
$pass = "Base@321";
$db = "u246849716_engclinica";

$mysqli = new mysqli($host, $user, $pass, $db);
/* check erro
*/
if($mysqli->connect_errno) { 
    echo" conect failed".$mysqli->connect_error;
    exit();
}
