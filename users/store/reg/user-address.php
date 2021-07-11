<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/brands.php');
include(ROOT_PATH . '/app/includes/message.php');
include(ROOT_PATH . '/app/includes/errors.php');
usersOnly();
$title = 'User Address';
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
                        <span class="font-bold">User Address <span class="text-danger">(Important)</span></span>
                    </div>
                    <div class="col-md-6 col-12 mx-auto images text-left p-3 rounded">
                    <div class="form-group">
                            <label for="paddress">Home Address<span class="text-danger">*</span></label>
                            <input id="paddress" class="form-control" type="text" name="paddress" value="<?php echo $paddress; ?>">
                            <small>$th Avenue St Luios Cath....</small>
                        </div>
                        <div class="form-group">
                            <label for="pfblink">Personal FaceBook Contact Link</label>
                            <input type="text" class="form-control" id="pfblink" name="pfblink" placeholder="http://facebook.com/official_easibiz" value="<?php echo $pfblink; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pinstalink">Personal Instagram Handel</label>
                            <input type="text" class="form-control" id="pinstalink" name="pinstalink" placeholder="http://instagram.com/easibiz_official" value="<?php echo $pinstalink; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <a href="<?php echo BASE_URL . '/users/store/users/dashboard.php'?>" class="btn btn-danger btn-block next-btn">Previous</a>
                    </div>
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <input type="submit" value="Next" name="u-address" id="u-address" class="btn btn-info btn-block next-btn">
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