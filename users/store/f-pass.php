<?php include('../../path.php');
include(ROOT_PATH . '/app/controllers/users.php');
if (isset($_GET['e-code']) && isset($_GET['p-code']) && isset($_GET['t'])) {
    $user = selectOne($table, ['e_code' => $_GET['e-code'], 'p_code' => $_GET['p-code'], 'oneTimeT' => $_GET['t']]);
    $id = $user['id'];
    #dd($user);
    sessionDeclear($user);
}else{
    header('location:' . BASE_URL . '/users/access/1');
    exit(0);
}
$title = 'Reset Password ' . $user['firstname'];
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
        <div class="row login-row min-h-screen">
            <div class="col-12 col-md-5 mx-auto my-md-auto login-col p-4">
                <form class="wow fadeInLeft" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="password">New Password*</label>
                                <input type="password" class="form-control" name="password" id="password" value="<?php echo $password?>">
                            </div>
                            <div class="form-group">
                                <label for="cpassword">Confirm New Password*</label>
                                <input type="password" class="form-control" name="cpassword" id="cpassword" value="<?php echo $cpassword?>">
                            </div>
                            <div class="col-12 col-md-6 mx-auto">
                                <button type="submit" id="reset-pass" name="reset-pass" class="btn btn-primary btn-block">Reset & Login</button>
                            </div>
                </form>
                <div class="col-12 mt-2 text-center">
                    <span class="mt-2">Don't have an account? <a href="#">Sign In</a></span>
                </div>
            </div>
        </div>
    </div>
<?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>

</html>