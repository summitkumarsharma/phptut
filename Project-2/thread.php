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
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
</head>

<body class="bg-info">

    <!-- Navigation bar -->
    <?php include 'partials/header.php'; ?>



    <!-- Code to Fetch threads from threads table  start here-->
    <?php
        include 'partials/dbconnect.php';
                // select data into a table
                $threadid =$_GET['threadid'];
                $sql = "SELECT * FROM `threads`WHERE thread_id=$threadid";
                $result = mysqli_query($conn, $sql);
                // find the number of records
                $num_row = mysqli_num_rows($result);
                if ($num_row > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row["thread_title"];
                        $desc= $row["thread_desc"];
                        $thread_user_id= $row["thread_user_id"];
                       
                        // query to fetch username from users table who start discussion
                        $sql2 = "SELECT * FROM `users_idiscuss` WHERE sno=$thread_user_id";
                        $result2 =mysqli_query($conn,$sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $posted_by = $row2["user_email"];
                     }
                }

    ?>

    <!--  code to insert a particular comment into comments table here  -->

    <?php 
        $showAlert=false;   
        $method = $_SERVER['REQUEST_METHOD'];
        // echo $method;
        if($method=="POST"){
            // insert record into comment table
            $th_comment=$_POST['comment'];
            $sno = $_SESSION['sno'];
            $th_comment= str_replace("<","&lt;","$th_comment");
            $th_comment= str_replace(">","&gt;","$th_comment");
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$th_comment', '$threadid', '$sno', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $showAlert=true;    
            if($showAlert){
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>success!</strong> Your comment has been added successfully posted.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> ';
            }
        }
    ?>

    <!--  Categories Start here-->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $title;?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <hr class="my-4">
            <p>No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Do not PM users asking for help.
                Remain respectful of other members at all times.
            </p>
            <p>Posted by:<b><?php echo $posted_by;?></b></p>
        </div>


    </div>

    <!--  Post a Comment Form Section Start here-->

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<div class="container">
        <h3 class="py-2">Post a Comment</h3>
        <form action="'.$_SERVER['REQUEST_URI'].'" method="POST">
            <div class="form-group">
                <label for="desc">Type your Comment</label><input type="hidden" name="" value="'.$_SESSION['sno'].'">
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">Post Comment</button>
            </div>
        </form>

    </div>';
    }
    else{
        echo '<div class="container">
                <div class="jumbotron">
                    <h1 class="display-4">Post a Comment</h1>
                    <p class="lead"><b>You are not logged in.Please signup/login to post comment</b></p>
                </div>
            </div>';
    }
    ?>

    <!--  Fetch  Comments from comments table Start here-->
    <div class="container" id="ques">
        <h3 class="py-2">Discussions</h3>
        <?php
                include 'partials/dbconnect.php';
                // select data from comment table
                $threadid=$_GET['threadid'];
                $sql = "SELECT * FROM `comments`WHERE thread_id=$threadid";
                $result = mysqli_query($conn, $sql);
                // find the number of records
                $num_row = mysqli_num_rows($result);
                $noResult=true; 
                if ($num_row > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        $noResult=false; 
                        $commentid = $row["comment_id"];
                        $content = $row["comment_content"];
                        $commenttime = $row["comment_time"];
                        
                        $thread_user_id = $row["comment_by"];
                        
                        $sql2 = "SELECT * FROM `users_idiscuss` WHERE sno=$thread_user_id";
                        $result2 =mysqli_query($conn,$sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $user_name = $row2["user_email"];
                        echo' <div class="media my-3">
                        <img src="img/userdefault.png" width="50px" class="mr-3" alt="userdefault image">
                        <div class="media-body">
                            <p>'.  $content.'</p>
                        </div>
                        <p class="font-weight-bold my-0">Comment By : '.$user_name.',At :'. $commenttime.'</p>
                    </div>';
                    
                     }
                }
                if($noResult){
                    echo'<div class="jumbotron jumbotron-fluid">
                             <div class="container">
                                <h4 class="display-5">No Comments Found</h4>
                                <p>Be the first to post comment </p>
                             </div>
                        </div>';
                }
                

        ?>



    </div>

    <!-- footer section-->

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