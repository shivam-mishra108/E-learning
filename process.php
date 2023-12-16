<?php
include 'contactDB.php';

if(isset($_POST['submit'])){
    $name=$_POST['contact-name'];  // value inside [] must be matchec with name of input
    $email=$_POST['contact-email'];
    $subject=$_POST['contact-sub'];
    $detail=$_POST['contact-detail'];

    $chk="";
    foreach ($detail as $chk1){
        $chk.=$chk1.",";
    }

    $sql= "INSERT INTO user-query(user_name, user_email, subject, description) VALUES ($name,$email,$subject,$detail)"; 
     $result= mysqli_query($conn,$sql);
     $rowCount=mysqli_num_rows($result);
   if($rowCount>0){
    array_push($errors,"Email already exits"); 
   }

     if($result){
        echo "<script> alert('new record inserted')</script>";
     }
   //   else{ 
   //      echo "error:".mysqli_error($conn);
   //   }
   //   mysqli_close($conn);



}