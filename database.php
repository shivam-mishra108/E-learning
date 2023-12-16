
<!-- to connect frontend with database -->

<?php

$hostName="localhost";
$dbUser="root";
$dbPassword="";
$dbName="login-register";

// mysql return ture or false (here it stored in conn variable

$conn= mysqli_connect($hostName, $dbUser ,$dbPassword, $dbName);

if(!$conn){
    die("Someting went wrong");
}
?>
