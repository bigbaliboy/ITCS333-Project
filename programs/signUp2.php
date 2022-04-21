<!doctype html>
<html lang="en">

<head>
    <title>Sign Up page</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css-reset.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="signIn.css">

        <style>
      body{
        height: 100%;
        background-repeat: no-repeat;
         background-size: cover;
        opacity: 0.7;
        background-position: center;
        background-attachment: fixed;
      }
    </style>
    
</head>

<body class="" style="background-image: url(images/hero-bg.jpg);">
    <section class="section">
        <div class="container text-light">

            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="p-0">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center ">
                                <h3 class="py-2">SignUp </h3>
                                <h4 class="mb-2 text-center">Already you have one?</h4>
                                <a href="signIn.php" class="font-weight-lighter  text-warning font-italic btn-block btn submit px-1 mb-2" style="color: #fff;">Sign In now</a>
                            </div>
                        </div>
                        <div class="container">
                            <form action="signUp.php" method="POST">
                                <div class="form-group">
                                    <label for="firstName" class="lead text-bold">First Name:</label>
                                    <input type="text" id="firstName" class="form-control" name="firstName" placeholder="first Name">
                                    <small></small>
                                </div>
                                <div class="form-group">
                                    <label for="lastName" class="lead text-bold">Last Name:</label>
                                    <input type="text" id="lastName" class="form-control" name="lastName" placeholder="last Name">
                                    <small></small>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="lead text-bold">Email:</label>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                                    <small>
                                    <?php 
                                    if (isset($_GET['errorEmail']))
                                    echo $_GET['errorEmail'];
                                    ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="lead text-bold">Password:</label>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                    <small></small>
                                    <!-- <span toggle="#password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword" class="lead text-bold">Confirm Password:</label>
                                    <input id="confirmPassword" name="confirmPassword" type="password" class="form-control" placeholder="ConfrimPassword">
                                    <small></small>
                                    <!-- <span toggle="#password-field" class=" fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                </div>
                                <div class="form-group">
                                    <label for="mobilePhone" class="lead text-bold">Mobile phone:</label>
                                    <input id="mobilePhone" name="mobilePhone" type="text" class="form-control" placeholder="Mobile Phone">
                                    <small></small>
                                </div>
                                <!-- <button class="signin-btn btn-lg btn-block btn submit px-3" name="submitSignUp">Sign Up</button> -->
                                <input type="submit" class="signin-btn btn-lg btn-block btn submit px-3" name="submitSignUp" value="Sign Up">
                                <!-- <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class=" checkbox-wrap checkbox-primary pt-4">Remember Me
									  <input  type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right text-align-sm-center pt-4">
									<a href="#" style="color: #fff;">Forgot Password</a>
								</div>
	            </div> -->
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="signUp.js"></script>

</body>

</html>