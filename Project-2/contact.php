<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Welcome to iDiscuss - coding Forum</title>
</head>

<body class="bg-info">

    <!-- Navigation bar -->
    <?php require 'partials/header.php'; ?>

    <!--  code to save contact details into database   -->

    <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_num'];
    $address = $_POST['address'];
    $msg = $_POST['msg'];
    
    //connecting to the database
    $servername="localhost";
    $username="root";
    $password="";
    $database="idiscuss";

    //create a connection
    $conn=mysqli_connect($servername,$username,$password,$database);

    //die if connection was not successful

    if(!$conn){
      // die("sorry we failed to connect:".mysqli_connect_error());
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> we are facing some technical problem, your entry has not been saved successfully. 
        we are regret for  the inconvinience caused !!!!!!!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
         </div>';
    }

    else{
        // insert data into a table
        $sql="INSERT INTO `contact_idiscuss` (`name`, `email`, `phone`, `address`, `msg`, `tstamp`) VALUES ( '$name', '$email', '$phone', '$address', '$msg', current_timestamp());";
        $result=mysqli_query($conn,$sql);

        //check for insert data  success
        if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Entry has been submitted successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        </div>';}
        
        else{ 
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> we are facing some technical problem, your entry has not been saved successfully. 
        we are regret for  the inconvinience caused !!!!!!!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
         </div>';}
    }
}

    
?>

    <!-- contact slider start here -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://source.unsplash.com/1600x400/?contact,phone" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/1600x400/?telephone,reliance"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://source.unsplash.com/1600x400/?mobile,wirelessphone"
                    alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--  Contact form Section Start here-->
    <div class="container my-3">
        <h3 class="text-center"> Contact Us </h3>
        <form action="/phptutorial/Project-2/contact.php" method="post">
            <div class="form-group">
                <label for="Name">Enter Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="email">Enter Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone_num" placeholder="">
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="">
            </div>

            <div class="form-group">
                <label for="description">Message</label>
                <textarea class="form-control" name="msg" id="msg" cols="10" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>


    </div>





    <?php include 'partials/footer.php'; ?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>