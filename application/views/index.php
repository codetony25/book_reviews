<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
    <div class='container'>
        <h1>Welcome</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="/Users/register" method="post" class="form-horizontal register">
                    <fieldset>
                        <legend>Register</legend>
<?php                   echo $this->session->flashdata('register_errors'); ?>
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input type="text" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">    
                            <label for="alias">Alias: </label>
                            <input type="text" name="alias" id="alias" placeholder="Alias">
                        </div>
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="text" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password: </label>
                            <input type="password" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <p>*Password should be at least 8 characters</p>
                            <label for="passconf">Confirm Password: </label>
                            <input type="password" name="passconf" id="passconf" placeholder="Password Confirmation">
                        </div>
                        <button>Register</button>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-6">
                <form action="/Users/login" method="post" class="form-horizontal">
                    <fieldset>
                        <legend>Login</legend>
<?php                   echo $this->session->flashdata('login_errors'); ?>
                        <div class="form-group">
                           <label for="loginemail">Email: </label>
                            <input type="text" name="email" id="loginemail"> 
                        </div>
                        <div class="form-group">
                            <label for="loginpassword">Password: </label>
                            <input type="password" name="password" id="loginpassword">
                        </div>
                        <button>Login</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
