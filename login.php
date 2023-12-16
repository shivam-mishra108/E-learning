<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    


<div class="login">
      <video id="video1" autoplay muted loop>
        <source src="images/play.mp4" type="video/mp4" />
      </video>
      <audio controls autoplay loop>
        <source src="images/assets_mp3_video.mp3" type="audio/mpeg" />
      </audio>



        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.html");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      

    
      <form action="login.php" method="post" class="form">
        <h1 class="head">Login</h1>

        <div class="content">
          <div class="box">
            <i class="ri-user-3-line login__icon"></i>

            <div class="box-input">
              <input
                type="email"
                name="email"
                required
                class="input"
                id="login-email"
                placeholder=" "
              />
              <label for="login-email" class="login__label">Email</label>
            </div>
          </div>

          <div class="box">
            <i class="ri-lock-2-line login__icon"></i>

            <div class="box-input">
              <input
                type="password"
                name="password"
                required
                class="input"
                id="login-pass"
                placeholder=" "
              />
              <label for="login-pass" class="login__label">Password</label>
              <i class="ri-eye-off-line login__eye" id="login-eye"></i>
            </div>
          </div>
        </div>

        <div class="tick">
          <div class="tick-group">
            <input type="checkbox" class="tick-input" id="login-check" />
            <label for="login-check" class="tick-label">Remember me</label>
          </div>

          <a href="#" class="forgot">Forgot Password?</a>
        </div>

        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
             <br><br>
        <p>Not registered yet <a href="registration.php">Register Here</a></p>
        
      </form>
    </div>

    <script src="loginvideo.js"></script>


</body>
</html>