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
        min-height: 100vh;
    }
    </style>
</head>

<body class="bg-info">

    <!-- Navigation bar -->
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/header.php'; ?>

    <!-- Search start here -->

    <div class="container my-4" id="ques">
        <h2>Search results for <em>"<?php echo $_GET['search']?>"</em></h2>

        <?php
        $noResults = true;
        $query = $_GET['search'];
        $sql="SELECT * FROM `threads`WHERE MATCH(thread_title,thread_desc) against('$query')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $threadid = $row["thread_id"];
            $title = $row["thread_title"];
            $desc= $row["thread_desc"];
            $thread_user_id= $row["thread_user_id"];
            $noResults =false;
            echo '<div class="results"> 
                    <h3><a href="/phptutorial/Project-2/thread.php?threadid='.$threadid.'">'.$title.'</a></h3>
                    <p>'.$desc.'</p>
                </div>';
            
                
        }
            
            
        if($noResults){
                echo'<div class="jumbotron jumbotron-fluid">
                <div class="container">
                   <h4 class="display-5">No Search Results Found</h4>
                   <p>
                        Your search - did not match any documents.
                        <ul><b>Suggestions:</b>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li>
                        </ul>
                   </p>
                </div>
           </div>';
        }
        ?>
    </div>



    <!-- footer section here-->

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