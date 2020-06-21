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

    <!-- Code to Fetch  Categories from database  start here-->
    <?php
        include 'partials/dbconnect.php';
                // select data into a table
                $catid=$_GET['catid'];
                $sql = "SELECT * FROM `categories`WHERE category_id=$catid";
                $result = mysqli_query($conn, $sql);
                // find the number of records
                $num_row = mysqli_num_rows($result);
                if ($num_row > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $catname = $row["category_name"];
                        $catdesc= $row["category_description"];
                    
                     }
                }

    ?>

    <!--  code to insert a particular thread into threads table here  -->

    <?php 
        $showAlert=false;   
        $method = $_SERVER['REQUEST_METHOD'];
        // echo $method;
        if($method=="POST"){
            // insert record into thread table
            $th_title=$_POST['title'];
            $th_desc=$_POST['desc'];
            $sno=$_SESSION['sno'];
            
            $th_title= str_replace("<","&lt;","$th_title");
            $th_title= str_replace(">","&gt;","$th_title");
            
            $th_desc= str_replace("<","&lt;","$th_desc");
            $th_desc= str_replace(">","&gt;","$th_desc");
            
            $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `thread_tstamp`) VALUES ( '$th_title', '$th_desc', ' $catid', '$sno', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            $showAlert=true;    
            if($showAlert){
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>success!</strong> Your thread has been added successfully.Please wait for the community to respond.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div> ';
            }
        }
    ?>


    <!--  Categories Start here-->

    <div class="container my-2">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forums!</h1>
            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Do not PM users asking for help.
                Remain respectful of other members at all times.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Browse topics</a>
        </div>


    </div>

    <!--  Ask Questions Form Section Start here-->


    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<div class="container">
                 <h3 class="py-2">Start a Discussion </h3>
                <form action=" '.$_SERVER['REQUEST_URI'].'" method="POST">
                    <div class="form-group">
                        <label for="title">Problem Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="">
                        <small id="emailHelp" class="form-text text-muted">keep your title crisp and small.</small>
                    </div>
                    <div class="form-group">
                        <label for="desc">Elaborate your concern</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    </div>
                    <input type="hidden" name="" value='.$_SESSION['sno'].'>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                    </div>
                </form>
            </div>';
    }
    else{
        echo '
        <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Start a Discussion</h1>
            <p class="lead"><b>You are not logged in.Please signup/login to start discussion</b></p>
        </div>
    </div>';
    }
    ?>




    <!--  Fetch  Threads from Threads table Start here-->

    <div class="container">
        <h3 class="py-2">Browse Questions</h3>
        <?php
                include 'partials/dbconnect.php';
                // select data from threads table
                $catid=$_GET['catid'];
                $sql = "SELECT * FROM `threads`WHERE thread_cat_id=$catid";
                $result = mysqli_query($conn, $sql);
                // find the number of records
                $num_row = mysqli_num_rows($result); 
                $noResult=true;
                if ($num_row > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { 
                        
                        $noResult=false; 
                        $threadid = $row["thread_id"];
                        $title = $row["thread_title"];
                        $desc = $row["thread_desc"];
                        $threattime = $row["thread_tstamp"];
                        $thread_user_id = $row["thread_user_id"];
                        
                        $sql2 = "SELECT * FROM `users_idiscuss` WHERE sno=$thread_user_id";
                        $result2 =mysqli_query($conn,$sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $user_name = $row2["user_email"];
                        
                        echo' <div class="media my-2">
                        <img src="img/userdefault.png" width="50px" class="mr-3" alt="userdefault image">
                        <div class="media-body">
                        
                            <h5 class="mt-0"><a class="text-dark" href="/phptutorial/Project-2/thread.php?threadid='.$threadid.'"> '. $title.' </a></h5>
                            '. $desc.'
                        </div>
                        <p class="font-weight-bold my-0"> Asked By: '.$user_name.''. $threattime.'</p>
                    </div>';
                    
                     }
                }
                // echo var_dump($noResult);
                if($noResult){
                    echo'<div class="jumbotron jumbotron-fluid">
                             <div class="container">
                                <h4 class="display-5">No Threads Found</h4>
                                <p>Be the first to ask the question.</p>
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