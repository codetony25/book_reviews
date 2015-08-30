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
                <div class="users">
                    <h2>User Alias: <?= $users['alias'] ?></h2>
                    <h3>Name: <?= $users['name'] ?></h3>
                    <h3>Email: <?= $users['email'] ?></h3>
                    <h3>Total Reviews: <?= $count ?></h3>
                    <div class="postedreviews">
                        <h3>Posted Reviews on the following books:</h3>
                        <div class="postreviews">
<?php                   foreach($titles as $title) { ?>
                            <p><a href="#"><?= $title['title'] ?></a></p>
<?php                   } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="booknav">
                    <a href="/books">Home</a>
                    <a href="/users/logout">Log Out</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
