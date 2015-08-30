<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Books Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
    <div class='container'>
        <div class="row">
            <div class="col-md-6 bookmain">
                <h2>Welcome, <?= $this->session->userdata('users')['name'] ?>!</h2>
                <h4><strong>Recent Book Reviews: </strong></h4>
<?php           foreach($reviews as $review) { ?>
                <div class="reviews">
                    <h3><a href="/books/<?= $review['id'] ?>"><?= $review['title'] ?></a></h3>
                    <h5>Rating:
<?php               for ($i = 0; $i < intVal($review['rating']); $i++) {    ?> 
                    <i class="fa fa-star"></i>
<?php               }       ?>
                    <h5>
                    <p><span><a href="users/user/<?= $review['user_id'] ?>"><?= $review['name'] ?></a></span> says: <?= $review['review'] ?></p>
                    <p>Posted on <?= $review['created_at'] ?></p>
                </div>
<?php           } ?>
            </div>
            <div class="booknav">
                <a href="/books/add">Add Book and Review</a>
                <a href="/users/logout">Log Out</a>
            </div>
            <div class="col-md-6">
                <div class="listings">
                    <h4><strong>Other Books with Reviews: </strong></h4>
                    <div class="list">
<?php               foreach($titles as $title) { ?>
                        <p><a href="/books/<?= $title['id'] ?>"><?= $title['title'] ?></a></p>
<?php               } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
