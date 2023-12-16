<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body style="background-color: rgb(118, 114, 130);">


<div class="container" style="background-color: grey">
<h4>Register</h4>

<?php
// print_r($_POST); to check value enter by user(action="samepagepath")

//to check if form is subbmited or not, code insid run only 
//if form gets successfully submit
if(isset($_POST["submit"])){
    $fullName=$_POST["fullName"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $passwordRepeat=$_POST["repeat_password"];

    //encripting password
    $passwordHash=password_hash($password,PASSWORD_DEFAULT);
    
    $errors=array();
    //for various validation
    if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)){
        array_push($errors,"All Fields are required");
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        array_push($errors,"Email is not valid");
    }
    if(strlen($password)<8){
        array_push($errors,"Password must be at least 8 characters long");
    }
    if($password!==$passwordRepeat){
        array_push($errors,"Password does not match");
    }

    //conneting database
    require_once "database.php";

    //if same email exists
    $sql= "SELECT * FROM users WHERE email = '$email' ";
   $result= mysqli_query($conn, $sql);

   $rowCount=mysqli_num_rows($result);
   if($rowCount>0){
    array_push($errors,"Email already exits"); 
   }

    
    //if there is error then errors is 0 else >0
    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // insert the data in datbase

        $sql="INSERT INTO users (full_name,email,password) VALUES(?,?,?)";

          //given below: return an object
        $stmt=mysqli_stmt_init($conn);
        //given below : retun true or false
       $prepareStmt= mysqli_stmt_prepare($stmt,$sql);

       if($prepareStmt){
        mysqli_stmt_bind_param($stmt,"sss" ,$fullName, $email, $passwordHash);
        mysqli_stmt_execute($stmt);

        echo "<div class='alert alert-success'>You are register Successfully </div>";
       }  else{
        die("Something went Wrong");
       }
    }
}
?>

    <form action="registration.php" method="post">

        <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" name="fullName" id="fullName" class="form-control" placeholder="Your Name">
        </div>

        <div class="form-group">
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Your Name">
        </div>


        <div class="form-group">
        <label for="password">Password: </label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Your Password">
        </div>

        <div class="form-group">
        <label for="password">Confirm: </label>
        <input type="password"  class="form-control" name="repeat_password" id="repeat_password" placeholder="Re-Ener your Password">
        </div>

        <div class="register-flex">
        <div class="form-btn">
        <input type="submit"class="btn btn-primary" value="Register" name="submit"/>
        </div>

        <div style="margin-top: -2rem;">
        <p>Already register?</p>
         <a href="login.php" class="btn btn-primary">Login</a>
        </div>

        </div>

    </form>

    

</div>
    
</body>
</html>