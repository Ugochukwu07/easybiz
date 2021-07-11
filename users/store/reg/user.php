<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/brands.php');
include(ROOT_PATH . '/app/includes/message.php');
include(ROOT_PATH . '/app/includes/errors.php');
usersOnly();
$title = 'User Information';
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
    <div class="container-fluid">
        <div class="row min-h-screen bg-white">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="col-12 my-auto">
                <div class="row mt-2">
                    <div class="col-12 text-center p-2">
                        <span class="font-bold">User Information <span class="text-danger">(Important)</span></span>
                    </div>
                    <div class="col-md-6 col-12 mx-auto images text-left p-3 rounded">
                        <div class="form-group">
                            <label for="firstname">First Name*</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="phoneHelp" placeholder="John" value="<?php echo $_SESSION['firstname']?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name*</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="phoneHelp" placeholder="Doe" value="<?php echo $_SESSION['lastname']?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Personal Email<span class="text-danger">*</span></label>
                            <input id="email" class="form-control" placeholder="example@email.com" type="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                            <small>Eg. johndoe1234@gmail.com</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Personal Phone<span class="text-danger">*</span></label>
                            <input id="phone" class="form-control" placeholder="+2348143440606" type="number" name="phone"  value="<?php echo $_SESSION['phone_number']; ?>">
                            <small>Please include your country code eg. +234, +442 etc.</small>
                        </div>
                        <div class="form-group">
                            <label for="about">About You<span class="text-danger">*</span></label>
                            <textarea rows="7" cols="7" class="form-control" placeholder="My name is...." id="about" name="about"><?php echo $about; ?></textarea>
                            <small>Please write extensively about yourself.</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <a href="<?php echo BASE_URL . '/users/store/reg/brand-address.php'?>" class="btn btn-danger btn-block next-btn">Previous</a>
                    </div>
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <input type="submit" value="Next" name="user-info" id="user-info" class="btn btn-info btn-block next-btn">
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="row bg-black text-center text-white p-2 footer">
            <div class="col-12 p-1"><i class="fa fa-home"></i>&nbsp;Designed by Ekwueme Ugochukwu</div>
        </div>
    </div>

    <?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>