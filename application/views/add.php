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
        <div class="addnav">
            <a href="/books">Home</a>
            <a href="/users/logout">Log Out</a>
        </div>
        <div class="addreview">
           <h2>Add a New Book Title and a Review: </h2>
<?php       echo $this->session->flashdata('book_errors')    ?>
           <form action="/books/add_book_and_review/" method="post">
               <fieldset>
                    <div class="title">
                        <input type="hidden" name="id" value="<?= $this->session->userdata('users')['id'] ?>">
                        <input type="hidden" name="bookid" value="">
                        <label for="title">Book Title: </label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="author_name">
                        <label for="author_name">Author: </label><br>
                        <p>Choose from the list: </p>
                        <select name="author_name" class="form-control" id="author_name_select">
                        <?php foreach($authors as $author) { ?>
                            <option value="<?= $author['author_name'] ?>"><?= $author['author_name'] ?></option>
                        <?php } ?>
                        </select>
                        <p>Or add a new author: </p>
                        <input type="text" name="author_name" id="author_name" class="form-control">
                    </div>
                    <div class="review">
                        <label for="review">Review: </label>
                        <textarea name="review" class="form-control" id="review"></textarea>
                    </div>
                    <div class="rating">
                        <label for="rating">Rating: 1 - 5 Stars</label>
                        <input type="number" min="1" max="5" name="rating" id="rating" class="form-control">
                    </div>
                    <button class="btn btn-success">Add Book and Review</button>
               </fieldset>
           </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="/assets/main.js"></script>
</body>
</html>
