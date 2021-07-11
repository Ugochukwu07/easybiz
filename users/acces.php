<?php include('../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
include(ROOT_PATH . '/app/includes/errors.php');
$page = 'index';
if(isset($_GET['role'])){
    if ($_GET['role'] == 1) {
    $title = 'Login';
    $state = 'active';
    $state_t = 'true';
    $state_1 = '';
    }
    if ($_GET['role'] == 2){
    $title = 'Sign Up';
    $state = '';
    $state_1 = 'active';
    }
}else{
    $title = 'Login';
    $state = 'active';
    $state_t = 'true';
    $state_1 = '';
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH . '/app/includes/links.php');?>

<body>
<?php include(ROOT_PATH . '/app/includes/header_open.php'); ?>

    <div class="container-fluid icc">
        <div class="row p-3 navigation">
            <div class="col-12 col-md-4 mx-auto main rounded-full text-left text-md-center">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="bg-white rounded-l-full">
                        <a class="pl-4 pr-2 rounded-l-full nav-link <?php echo $state; ?>" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                    </li>
                    <li class="rounded-r-full">
                        <a class="nav-link <?php echo $state_1; ?>" id="signup-tab" data-toggle="tab" href="#signuptab" role="tab" aria-controls="signuptab" aria-selected="false">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show <?php echo $state; ?> wow fadeInLeft" id="login" role="tabpanel" aria-labelledby="login-tab">
                <div class="row log-form p-md-4 p-1">
                    <div class="col-md-6 d-none d-sm-block left-form text-center offset-1 p-5 text-white wow fadeInLeft">
                        <h3 class="text-5xl mt-5">Welcome to those who believe in the power of dreams and who would like to join me in my exploration of life. </h3>
                        <div class="blockquote-footer text-2xl text-white">Bertrand Piccard</div>
                    </div>
                    <div class="col-md-4 col-12 bg-white p-4">
                        <form class="wow fadeInLeft" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="text-center">
                                <h2>Login</h2>
                                <i class="fa fa-user-circle-o icon"></i><br>
                                <small class="text-primary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, voluptatibus.</small>
                                <hr class="bg-dark">
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $email; ?>">
                                <small id="emailhelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remeber-me">
                                <label class="form-check-label" for="remeber-me">Remember Me</label>
                            </div>
                            <div class="col-12 col-md-4 mx-auto">
                                <button type="submit" id="login-user" name="login-user" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        <span class="text-center">Or</span>
                        <a class="nav-link btn btn-primary btn-block mt-4" id="signup-tab" data-toggle="tab" href="#signuptab" role="tab" aria-controls="signuptab" aria-selected="false">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade <?php echo $state_1; ?> wow fadeInRight" id="signuptab" role="tabpanel" aria-labelledby="signup-tab">
                <div class="row log-form p-md-4 p-1">
                    <div class="col-md-5 col-12 bg-white p-md-4 p-3 offset-md-1">
                        <form class="accesss wow fadeInRight"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="text-center mb-4">
                                <h2 class="">Sign Up</h2>
                                <i class="fa fa-user-plus icon"></i><br>
                                <small class="text-primary">Lorem ipsum dolor sit amet, consectetur adipisicing <br class="d-xl-none"> elit. Expedita, voluptatibus.</small>
                                <small class="text-danger d-block">*Important</small>
                            </div>
                            <div class="form-group">
                                <label for="firstname">First Name*</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="phoneHelp" placeholder="John" value="<?php echo $firstname?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name*</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="phoneHelp" placeholder="Doe" value="<?php echo $lastname?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number*</label>
                                <input type="number" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="+2348143440606" value="<?php echo $phone?>">
                                <small id="phonelHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email address*</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $email?>">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password*</label>
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo $password?>">
                            </div>
                            <div class="form-group">
                                <label for="cpassword">Confirm Password*</label>
                                <input type="password" class="form-control" name="cpassword" id="cpassword" value="<?php echo $cpassword?>">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms">
                                <label class="form-check-label" for="terms">Agree to our <a href="<?php echo BASE_URL . '/support.php'; ?>">Terms and Conditions</a></label>
                            </div>
                            <div class="col-12 col-md-4 mx-auto">
                                <button type="submit" name="signup-user" id="signup-user" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                        </form>
                        <span class="text-center">Or</span>
                        <a class="btn btn-primary btn-block mt-4" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
                    </div>
                    <div class="col-5 wow fadeInRight d-none d-sm-block left-form text-white p-5">
                        <h3 class="text-5xl mt-32">If people are doubting how far you can go, go so far that you can’t hear them anymore.</h3>
                        <div class="blockquote-footer text-2xl text-white mt-4">Michele Ruiz</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer bg-gray-900 text-white text-center text-md-left">
            <div class="col-12 col-md-12 bg-dark p-2 text-center">
                <span>eazibiz.com <i class="fa fa-copyright"></i></span>
            </div>
        </div>
    </div>
    <?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>

</html>