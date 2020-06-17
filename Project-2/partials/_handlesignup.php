<?php 
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    
    include 'dbconnect.php';
    
    $useremail = $_POST['signupEmail'];
    $password = $_POST['signupPassword'];
    $cpassword = $_POST['signupcPassword'];


    // check whether user email exists or not

    $existsql = "SELECT * FROM `users_idiscuss` WHERE user_email='$useremail';";
    // echo $existsql;
    $result = mysqli_query($conn,$existsql);
    // echo $result;
    // exit();
    $num_exit_rows = mysqli_num_rows($result);
    if($num_exit_rows > 0){
        $showError="Email already exits";
        header("location:/phptutorial/Project-2/index.php?signupexists=true");
        exit();
    }
    else{
        if($password == $cpassword){
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `users_idiscuss` (`user_email`, `user_pass`) VALUES ('$useremail','$hash');";
            $result = mysqli_query($conn,$sql);
            echo $result;
            if($result){
                $showAlert = true;
                header("location:/phptutorial/Project-2/index.php?signupsuccess=true");
                exit();
            }
         }
        else{
            $showError ="Password do not Match";
            header("location:/phptutorial/Project-2/index.php?signupsuccess=false");
            exit();
        }
    }
    // header("location:/phptutorial/Project-2/index.php?signupsuccess=false&error='.$showError.'");
}

?>