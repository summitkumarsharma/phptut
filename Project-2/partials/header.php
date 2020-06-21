<?php
include 'partials/dbconnect.php';
$loggedin=false;
$logout=false;
session_start();
$loggedin=true;
echo'
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/phptutorial/Project-2/">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/phptutorial/Project-2/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/phptutorial/Project-2/about.php">About</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/phptutorial/Project-2/" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Top Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                    $sql = "SELECT `category_name`,`category_id` FROM `categories` LIMIT 5";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    $catid = $row["category_id"];
                    $catname = $row["category_name"];
                    echo'<a class="dropdown-item"
                        href="/phptutorial/Project-2/threadlist.php?catid='.$catid.'">'.$catname.'</a>';
                    }
                echo' </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/phptutorial/Project-2/contact.php">Contact-us</a>
            </li>
        </ul>';
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="form-inline my-2  my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            <p class="text-light my-2 ml-2 ">welcome '. $_SESSION['useremail'].'</p>
            <a type="submit" class="btn btn-success mx-2" href="/phptutorial//Project-2/partials/logout.php">Logout</a>
        </form>';
        }
        else{
        echo'<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal"
                data-target="#loginModal">Login</button>
            <button type="button" class="btn btn-outline-success mx-2" data-toggle="modal"
                data-target="#signUpModal">SignUp</button>
        </form>';
        }

        echo'
    </div>
</nav>';


include'partials/loginModal.php';
include'partials/signUpModal.php';



if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
echo ' <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You account has been created now you can login.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';}
else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
echo ' <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> Password do not Match.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
}
else if(isset($_GET['signupexists']) && $_GET['signupexists']=="true"){
echo ' <div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> Email already exits.please login
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
}
else if(isset($_GET['loggedin']) && $_GET['loggedin']=="true"){
echo ' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You are successfully logged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
}
else if(isset($_GET['loggedin']) && $_GET['loggedin']=="false"){
echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong> Invalid Credentials...please login again or signup.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';
}
else if(isset($_GET['logout']) && $_GET['logout']=="true"){
echo ' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You are successfully logged out Please Login again to continue .
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>';}
// else{
// exit();
// }

?>