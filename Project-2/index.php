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
    #loading {
        position: absolute;
        width: 100%;
        height: 100vh;
        background: #fff url('img/loader.gif') no-repeat center center;
        z-index: 99999;

    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0px;
            opacity: 1
        }
    }

    @keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0;
            opacity: 1
        }
    }
    </style>


</head>

<body class="bg-info" onload="myFunction()">

    <!--CSS Spinner-->
    <div id="loading"></div>

    <!-- Navigation bar -->
    <?php include 'partials/dbconnect.php'; ?>
    <?php include 'partials/header.php'; ?>

    <!-- slider start here -->
    <div style="display:none;" id="myDiv" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myDiv" data-slide-to="0" class="active"></li>
            <li data-target="#myDiv" data-slide-to="1"></li>
            <li data-target="#myDiv" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/slider5.jfif" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider3.jfif" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/slider7.jfif" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#myDiv" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myDiv" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--  Categories Start here-->
    <div class="container animate-bottom my-4">
        <h3 class=" text-center"> iDiscuss - Browse Categories</h3>
        <div class="row">
            <?php
                include 'partials/dbconnect.php';
                // Fetch categories from categories table
                $sql = "SELECT * FROM `categories`";
                $result = mysqli_query($conn, $sql);
                // find the number of records
                $num_row = mysqli_num_rows($result);
                if ($num_row > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $catid = $row["category_id"];
                        $catname = $row["category_name"];
                        $catdesc= $row["category_description"];
                        echo ' <div class="col-md-4 my-2">
                                    <div class="card" style="width: 18rem;">
                                        <img src="img/card'.$catid.'.jfif" class="card-img-top" alt="card_image">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="/phptutorial/Project-2/threadlist.php?catid='.$catid.'">'.$catname.'</a></h5>
                                            <p class="card-text">'.substr($catdesc,0,100).'...</p>
                                            <a href="/phptutorial/Project-2/threadlist.php?catid='.$catid.'" class="btn btn-primary">View Threads</a>
                                        </div>
                                    </div>
                                </div>';
                    }
                }

            ?>
        </div>
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

    <script>
    var preloader = document.getElementById("loading");
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 5000);
    }

    function showPage() {
        preloader.style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    };
    </script>


</body>

</html>