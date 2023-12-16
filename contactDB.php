<!-- to connect contact frontend with database -->

<?php

$serverame="localhost";
$username="root";
$password="";
$database="inner-form";

// mysql return ture or false (here it stored in conn variable

$conn= mysqli_connect($serverame, $username ,$password, $database);

if(!$conn){
    die("Error deleting record:".mysqli_error($con));
}
?>