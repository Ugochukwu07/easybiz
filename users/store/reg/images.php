<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/brands.php');
include(ROOT_PATH . '/app/includes/message.php');
include(ROOT_PATH . '/app/includes/errors.php');
usersOnly();
$title = 'Logo & Image Upload';
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
        <div class="col-12 col-md-9 mx-auto mt-5">
                <div class="progress rounded-full" style="height: 15px;">
                    <div class="progress-bar bg-success rounded-full" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Step 1</div>
                </div>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="col-12 my-auto" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 text-center my-2">
                        <h4>Profile Image and Brand Logo.</h4><br>
                        <span class="text-danger">(Important)</span>
                    </div>
                    <div class="col-md-4 col-12 mx-auto images text-left p-3 rounded">
                        <div class="col-12 image-preview text-center">
                            <i class="fa fa-image icon"></i><br>
                            <span>Select A Brand Logo</span>
                        </div>
                        <div class="form-group">
                            <label for="blogo">Brand Logo <span class="text-danger">*</span></label>
                            <input id="blogo" class="form-control" type="file" name="blogo">
                            <small>Please Please upload a High Quality Logo</small>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 mt-md-0 mt-2 mx-auto images p-2 rounded">
                        <div class="col-12 image-preview text-center">
                            <i class="fa fa-users icon"></i><br>
                            <span>Select A Profile Image</span>
                        </div>
                        <div class="form-group">
                            <label for="image">User Image <span class="text-danger">*</span></label>
                            <input id="image" class="form-control" type="file" name="image">
                            <small>Please provide us with a high quality image</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <input type="submit" value="Next" name="image-btn" id="image-btn" class="btn btn-info btn-block next-btn">
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