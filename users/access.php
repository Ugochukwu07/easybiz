<?php include('../path.php'); 
include(ROOT_PATH . '/app/controllers/users.php');

$title = isset($_GET['r']) ? 'Sign Up' : 'Login';
?>
<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/links.php'); ?>

<body>
    <header>
        <div class="header-top wow fadeInDown">
            <div class="container-fluid">
                <div class="row bg-info p-1">
                    <div class="col-12 col-md-6 text-muted text-center">
                        <p class="bg-white p-1 mb-1 d-inline-block">ekwuemeugochukwu83@gmail.com</p>
                    </div>
                    <div class="col-12 col-md-6 text-muted text-center">
                        <p class="bg-white p-1 mb-1 d-inline-block">+23481-4344-0606</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
    <?php 
include(ROOT_PATH . '/app/includes/errors.php');
include(ROOT_PATH . '/app/includes/message.php');?>
    <?php if(!isset($_GET['r'])):?>
        <div class="row login-row min-h-screen">
            <div class="col-12 col-md-4 col-sm-6 mx-auto my-md-auto login-col p-4">
                <form class="wow fadeInLeft" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="text-center">
                                <h2>Sign In</h2>
                                <i class="fa fa-user-circle-o icon"></i>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $email; ?>">
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
                                <button type="submit" id="login-user" name="login-user" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                </form>
                <div class="col-12 mt-2 text-center">
                    <span class="d-block"><a href="<?php echo BASE_URL . '/users/f-pass'?>" class="underline text-center">forget password</a></span>
                    <span class="mt-2">Don't have an account? <a href="./access/1">Sign Up</a></span>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row sign-row min-h-screen">
            <div class="col-12 col-md-8 sign-col mx-auto my-auto p-2">
                <form class="accesss wow fadeInRight row"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="text-center mb-4 col-12">
                        <h2 class="">Sign Up</h2>
                        <i class="fa fa-user-plus icon"></i><br>
                        <small class="text-danger d-block">*Important</small>
                    </div>
                    <div class="col-md-6 col-12">
                    <div class="form-group">
                                <label for="firstname">First Name*</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="phoneHelp" placeholder="John" value="<?php echo $firstname?>">
                            <small>Eg. Paul</small>
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
                    </div>
                    <div class="col-md-6 col-12">
                    <div class="form-group">
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
                    </div>
                    <div class="text-center col-12">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms">
                                <label class="form-check-label" for="terms">Agree to our <a href="<?php echo BASE_URL . '/support.php'; ?>">Terms and Conditions</a></label>
                            </div>
                            <div class="col-12 col-md-4 mx-auto">
                                <button type="submit" name="signup-user" id="signup-user" class="btn btn-primary btn-block">Sign Up</button>
                            </div>
                    </div>
                </form>
                <div class="col-12 mt-2 text-center">
                    <span class="mt-2">Already have an account? <a href="./">Sign In</a></span>
                </div>
            </div>
        </div>
    <?php endif;?>
    </div>
<?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>

</html>