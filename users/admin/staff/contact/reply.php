<?php
include('../../../../path.php');
include(ROOT_PATH . '/app/controllers/contact.php');
adminOnly();
$title = 'Contact';

if (isset($_GET['id'])) {
   $messagec = selectOne($table, ['id' => $_GET['id']]);
}else{
    $_SESSION['message'] = ucwords('not accesseble');
    $_SESSION['type'] = 'error';
    header('location:' . BASE_URL . '/users/admin/staff/contact/');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include(ROOT_PATH . '/app/includes/links.php');?>

<body>
<?php include(ROOT_PATH . '/app/includes/admin-header.php'); ?>
    <div class="container-fluid min-h-screen">
        <div class="row my-2 main-contact">
        <div class="col-3 menu-contact">
                <ul class="contact-menu">
                    <li class="contact-menu-list col-12"><a href="<?php echo BASE_URL . '/users/admin/staff/contact/index.php'; ?>" class="text-dark">Inbox</a>&nbsp;<span class="badge badge-danger text-right ml-5 px-2"><?php echo $inbox; ?></span></li>
                    <li class="contact-menu-list"><a href="<?php echo BASE_URL . '/users/admin/staff/contact/index.php?r=1'; ?>" class="text-dark">Read</a>&nbsp;<span class="badge badge-danger text-left ml-5 px-2"><?php echo $read; ?></span></li>
                    <li class="contact-menu-list"><a href="<?php echo BASE_URL . '/users/admin/staff/contact/index.php?u=0'; ?>" class="text-dark">Unread</a>&nbsp;<span class="badge badge-danger text-left ml-5 px-2"><?php echo $unread; ?></span></li>
                    <li class="contact-menu-list"><a href="<?php echo BASE_URL . '/users/admin/staff/contact/rep.php'; ?>" class="text-dark">Replyed</a>&nbsp;<span class="badge badge-danger text-end ml-5 px-2"><?php echo $reply; ?></span></li>
                </ul>
            </div>
            <div class="col-md-9 single-message">
                <div class="head bg-light rounded p-2 flex justify-between">
                    <img src="<?php echo BASE_URL . '/assets/images/deer-3275594_1920.jpg'; ?>" class="img-fluid rounded-full" alt="">
                    <div class="col-5">
                        <span><?php echo $messagec['email']; ?></span>
                        <span><?php echo $messagec['phone']; ?></span>
                    </div>
                </div>
                <div class="main-message bg-light rounded p-2 mt-2">
                    </p><?php echo $messagec['message']; ?></p>
                </div>
                <div class="reply mt-2">
                    <h5 class="btn btn-success">Reply Below</h5>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="reMail">From</label>
                            <input type="text" name="reMail" id="reMail" class="form-control" placeholder="" value="ekwuemeugochukwu83@gmail.com" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Here is our email</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="reply" class="form-control" name="reply" rows="5"></textarea>
                            <small id="helpId" class="text-muted">Message to reply with.</small>
                        </div>
                        <input type="submit" value="Reply" name="reply-contact" id="reply-contact" class="form-control btn-success btn">
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="row bg-black text-center text-white p-2 footer">
            <div class="col-12 p-1"><i class="fa fa-home"></i>&nbsp;Designed by Ekwueme Ugochukwu</div>
        </div>
    </div>

    <script src="../../../../assets/js/jquery.min.js "></script>
    <script src="../../../../assets/js/popper.min.js "></script>
    <script src="../../../../assets/js/bootstrap.min.js "></script>
    <script src="../../../../assets/js/owl.carousel.min.js "></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="../../../../assets/js/custom.js "></script>
</body>

</html>