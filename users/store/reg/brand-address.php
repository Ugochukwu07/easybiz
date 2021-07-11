<?php 
include('../../../path.php');
include(ROOT_PATH . '/app/controllers/brands.php');
include(ROOT_PATH . '/app/includes/message.php');
include(ROOT_PATH . '/app/includes/errors.php');
usersOnly();
$title = 'Address';
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
                    <div class="progress-bar bg-success rounded-full" style="width: 60%" role="progressbar" aria-valuenow="60" aria-valuemin="40" aria-valuemax="100">Step 3</div>
                </div>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="col-12 my-auto">
                <div class="row mt-2">
                    <div class="col-12 text-center p-2">
                        <span class="font-bold">Brand Address Information <span class="text-danger">(Important)</span></span>
                    </div>
                    <div class="col-md-5 col-12 mx-auto images text-left p-3 rounded">
                        <div class="form-group">
                            <label for="plink">Brand Subdomain<span class="text-danger">*</span></label>
                            <input id="plink" class="form-control" type="text" name="plink" value="<?php echo $plink; ?>">
                            <small>This used to generate the domain you will share to your customers. eg. https://easybiz.com/subdomain</small>
                        </div>
                        <div class="form-group">
                            <label for="baddress">Brand Address<span class="text-danger">*</span></label>
                            <input id="baddress" class="form-control" type="text" name="baddress" value="<?php echo $baddress; ?>">
                            <small>Where to locate you.</small>
                        </div>
                        <div class="form-group">
                            <label for="baddress2">Brand Address(Google Map)<span class="text-danger">(optional)</span></label>
                            <input id="baddress2" class="form-control" type="text" name="baddress2" value="<?php echo $baddress2; ?>">
                            <small>Copy your google map embeded location code and paste here.</small>
                        </div>
                        <div class="form-group">
                            <label for="bfblink">FaceBook Page Link</label>
                            <input type="text" class="form-control" id="bfblink" name="bfblink" placeholder="http://facebook.com/official_easibiz" value="<?php echo $bfblink; ?>">
                        </div>
                        <div class="form-group">
                            <label for="binstalink">Instagram Handel</label>
                            <input type="text" class="form-control" id="binstalink" name="binstalink" placeholder="http://instagram.com/easibiz_official" value="<?php echo $binstalink; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <a href="<?php echo BASE_URL . '/users/store/reg/brand.php'?>" class="btn btn-danger btn-block next-btn">Previous</a>
                    </div>
                    <div class="col-12 col-md-3 mx-auto text-center my-4">
                        <input type="submit" value="Next" name="b-address" id="b-address" class="btn btn-info btn-block next-btn">
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