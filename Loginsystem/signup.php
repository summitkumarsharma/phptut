<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';  
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    
    // check whether user exits 
    $exitsql = " Select * from myusers where username = '$username' ";
    $result = mysqli_query($conn,$exitsql);
    $num_exit_rows = mysqli_num_rows($result);
    if($num_exit_rows > 0){
        $showError="user already exits";
    }
    else{
        if(($password == $cpassword)){
            $hashpassword=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `myusers` ( `username`, `password`) VALUES ( '$username', '$hashpassword')";
            $result = mysqli_query($conn,$sql);
            if($result){
                $showAlert=true;
            }
        }
        else{
            $showError="password do not match  ";
        }
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

    <title>Signup!</title>
</head>

<body>
    <?php
        require 'partials/_nav.php';
    ?>
    <?php 
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You account has been created now you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';}
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
        <h2 class="text-center">Sign Up to our Website</h2>
        <form action="/phptutorial/Loginsystem/signup.php" method="POST">
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
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" maxlength="15" class="form-control" id="cpassword" name="cpassword"
                    placeholder="Password">
                <small id="cpassword" class="form-text text-muted">Make sure to type the same password</small>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
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