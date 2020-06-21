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

<body class="bg-warning">

    <!-- Navigation bar -->
    <?php include 'partials/dbconnect.php'; ?>
    <?php require 'partials/header.php'; ?>

    <!-- slider start here -->


    <!--  Categories Star here-->

    <div class="container-fluid mb-2">
        <h3 class="text-center"> About Us </h3>
        <div class="jumbotron">
            <h4 class="text-center"> iDiscuss - coding Forum<!< /h4>
                    <p class="lead">Join this amazing group of coders! Learn to code, build and share
                        successful developments..</p>
                    <hr class="my-4">
                    <p>No Spam / Advertising / Self-promote in the forums.
                        Do not post copyright-infringing material.
                        Do not post “offensive” posts, links or images.
                        Do not cross post questions.
                        Do not PM users asking for help.
                        Remain respectful of other members at all times.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Signup Now</a>
        </div>

    </div>

    <div class="container my-2">

        <div class="row featurette d-flex justify-content-center align-items-center my-2">
            <div class="col-md-7">
                <h2 class="featurette-heading">It is all started with iDiscuss. <span class="text-muted">It’ll blow your
                        mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
                    tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img src="img/card1.jfif" width="200" height="200" class="card-img-top img-fluid mx-auto"
                    alt="card_image">
            </div>
        </div>
        <div class="row featurette d-flex justify-content-center align-items-center my-2">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Our Vision and Mission. <span class="text-muted">It’ll blow
                        your
                        mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
                    tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img src="img/card2.jfif" width="200" height="200" class="card-img-top img-fluid mx-auto"
                    alt="card_image">
            </div>
        </div>
        <div class="row featurette d-flex justify-content-center align-items-center my-2">
            <div class="col-md-7">
                <h2 class="featurette-heading">Our Goal. <span class="text-muted">It’ll blow your
                        mind.</span></h2>
                <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis
                    euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
                    tellus ac cursus commodo.</p>
            </div>
            <div class="col-md-5">
                <img src="img/card3.jfif" width="200" height="200" class="card-img-top img-fluid mx-auto"
                    alt="card_image">
            </div>
        </div>
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