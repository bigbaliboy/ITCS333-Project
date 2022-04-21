<!doctype html>
<html lang="en">

<head>
    <title>Sign In page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css-reset.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="signIn.css">
    <style>
      body{
        height: 100%;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.9;
        background-position: center;
        background-attachment: fixed;
      }
    </style>
</head>

<body class="" style="background-image: url(images/au-bg3.jpg);">
    <section class="section">
        <div class="container text-light">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <h2 class="shadow">SignIn </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <p class="mb-2 text-center font-weight-bolder">Don't have an account ?</p>
                        <!-- <h3 class="mb-2 text-center font-weight-bolder">Have an account?</h3> -->
                        <a href="signUp2.php" class="font-weight-lighter  text-warning font-italic btn-block btn submit px-1 mb-2" style="color: #fff;">Sign Up?</a>
                        <div class="container">
                            <form action="signIn.php" id="signInForm" method="POST">
                                <div class="form-group">
                                    <label for="email" class="lead text-bold">Email:</label>

                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email">


                                    <small></small>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="lead text-bold">Password:</label>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <!-- <small></small> -->

                                    <!-- <span toggle="#password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                    <span>
                                        <?php
                                        if (isset($_GET['passWrong']))
                                            echo $_GET['passWrong'];                              ?>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <!-- <button type="submit" name="submitSignIn" class="signin-btn btn-lg btn-block btn submit px-3">Sign In</button> -->
                                    <input type="submit" name="submitSignIn" class="signin-btn btn-lg btn-block btn submit px-3" value="Sign In">

                                </div>
                            </form>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class=" checkbox-wrap checkbox-primary pt-4">Remember Me
                                        <input type="checkbox" checked="checked">

                                    </label>
                                </div>
                                <div class="w-50 text-md-right text-align-sm-center pt-4">
                                    <a href="#" class="text-monospace" style="color: #fff;">Forgot Password</a>
                                </div>
                            </div>

                        </div>
                        <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                        <div class=" row justify-content-center social d-flex text-center ">

                            <a href="#" class=" col-3 fa fa-facebook"></a>
                            <a href="#" class=" col-3 fa fa-twitter"></a>
                            <a href="#" class=" col-3 fa fa-google"></a>
                            <!-- <a href="#" class="fa fa-google"></a>
               <a href="#" class="fa fa-instagram"></a> -->

                            <!-- <a href="#" class="px-2 py-2 mr-md-1 rounded m-2"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded m-2"><span class="ion-logo-twitter mr-2"></span> Twitter</a> -->
                        </div>

                        <!--<div class="w-100">
              <p class="social-media d-flex justify-content-center">
                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
              </p>
            </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="signIn.js"></script>
</body>

</html>