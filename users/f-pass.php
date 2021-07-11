<?php include('../path.php'); 
include(ROOT_PATH . '/app/controllers/users.php');

$title = 'Reset Password';
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
        <?php include(ROOT_PATH . '/app/includes/errors.php'); ?>
        <div class="row login-row min-h-screen">
            <div class="col-12 col-md-5 mx-auto my-md-auto login-col p-4">
                <form class="wow fadeInLeft" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label for="email">Personal Email address*</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="personalemail@email.com" value="<?php echo $email?>">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="bemail">Brand Email<span class="text-danger">*</span></label>
                                <input id="bemail" class="form-control" type="email" name="bemail" placeholder="brandemail@email.com" value="<?php echo $bemail; ?>">
                                <small>We will not share your email with any third party</small>
                            </div>
                            <div class="col-12 col-md-6 mx-auto">
                                <button type="submit" id="reset" name="reset" class="btn btn-primary btn-block">Reset</button>
                            </div>
                </form>
                <div class="col-12 mt-2 text-center">
                    <span class="mt-2">Don't have an account? <a href="#">Sign In</a></span>
                </div>
            </div>
        </div>
    </div>
<?php include(ROOT_PATH . '/app/includes/links-b'); ?>
</body>

</html>

</html>