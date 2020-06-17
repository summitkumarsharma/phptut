<?php

$login=false;
$showError=false;
$logout=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';  
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql = " Select * from myusers where username = '$username'  ";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
      while($row=mysqli_fetch_assoc($result)){
          if(password_verify($password,$row['password'])){
            $login=true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location:welcome.php");
          }
          else{
            $showError="Invalid Credentials...please login again or signup";
          }
      }  
    }
   
    else{
      $showError="Invalid Credentials...please login again or signup";
    }
 }
 
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login to our website!</title>
</head>

<body>

    <?php 
        require 'partials/_nav.php';
    ?>
    <?php   
    if($login){ 
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in .
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>' ;} 
    if($logout==true){ 
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> You are successfully logged out Please Login again to continue .
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>' ;} 
    ?>
    <?php 
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Errro!</strong> ' . $showError. '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';}
    ?>
    <div class="container my-4">
        <h2 class="text-center">Login to our Website</h2>
        <form action="/phptutorial/LoginSystem/login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" maxlength="15" class="form-control" id="username" name="username"
                    aria-describedby="textHelp" placeholder="Enter Username">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" maxlength="15" class="form-control" id="password" name="password"
                    placeholder="Enter Password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>