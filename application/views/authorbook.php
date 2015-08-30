<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add Book and Review</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
    <div class='container'>
        <div class="row">
            <div class="col-md-6">
                <h2><?= $books[0]['title'] ?></h2>
                <h4>Author: <?= $books[0]['author_name'] ?></h4>
                <h2>Reviews: </h2>
<?php           foreach($reviews as $review) { ?>
                <div class="reviews">
                    <h5>Rating:
<?php               for ($i = 0; $i < intVal($review['rating']); $i++) {    ?> 
                    <i class="fa fa-star"></i>
<?php               }       ?>
                    <h5>
                    <p><span><a href="#"><?= $review['name'] ?></a></span> says: <?= $review['review'] ?></p>
                    <p>Posted on <?= $review['created_at'] ?></p>
                </div>
<?php           } ?>
            </div>
            <div class="booknav">
                <a href="/books">Home</a>
                <a href="/users/logout">Log Out</a>
            </div>
            <div class="col-md-6">
                <div class="userreview">
                    <form action="/books/add_review_to_book/" method="post">
                        <fieldset>
                            <input type="hidden" name="bookid" value="<?= $books[0]['id'] ?>">
                            <input type="hidden" name="user_id" value="<?= $this->session->userdata('users')['id'] ?>">
                            <label for="review">Add a Review</label>
<?php                       echo $this->session->flashdata('review_errors') ?>
                            <textarea name="review" class="form-control"></textarea><br>
                            <label for="rating">Rating 1-5 Stars</label>
                            <input type="number" min="1" max="5" name="rating" id="rating" class="form-control">
                            <button class="btn btn-success">Submit Review</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
