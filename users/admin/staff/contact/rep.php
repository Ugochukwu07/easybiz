<?php
include('../../../../path.php');
include(ROOT_PATH . '/app/controllers/contact.php');
adminOnly();
$title = 'Contact';
if (isset($_GET['r'])) {
    $messages = selectAll($table, ['isRead' => $_GET['r']]);
    $title = 'Read Messages';
}
if (isset($_GET['u'])) {
    $messages = selectAll($table, ['isRead' => $_GET['u']]);
    $title = 'UnRead Messages';
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
            <div class="col-md-9 messages">
            <?php foreach ($messages as $key => $message): ?>
                <div class="bg-light rounded message row">
                    <div class="col-2 my-auto ">
                        <img src="<?php echo BASE_URL . '/assets/images/deer-3275594_1920.jpg'; ?>" class="img-fluid rounded-full" alt="">
                    </div>
                    <div class="col-10 p-2">
                        <div class="action">
                            <span class="p-1 bg-blue-300 rounded"><?php echo $message['email']; ?></span>
                            <div class="action-btn col-5 text-center flex justify-between">
                                <a href="?r_id=<?php echo $message['id']; ?>" class="border text-dark border-dark rounded p-1 w-32"><i class="fa fa-check-circle text-dark"></i>&nbsp;Mark As Read</a>
                                <a href="<?php echo BASE_URL . '/users/admin/staff/contact/reply.php?id=' . $message['id']; ?>" class="border text-dark border-dark rounded p-1 w-32"><i class="fa fa-mail-reply"></i>&nbsp;Reply</a>
                            </div>
                            <hr>
                        </div>
                        <div class="message-text col-8 mt-1">
                            <p><?php echo substr($message['message'], 0, 200) . '...';?></p>
                        </div>
                        <div class="seen text-right">
                            <?php if($message['isRead'] === 1): ?>
                                <i class="fa fa-check-circle text-success"></i>&nbsp;<span class="text-success">Seen</span>&nbsp;&nbsp;
                            <?php else:?>
                                <i class="fa fa-times-circle text-danger"></i>&nbsp;<span class="text-danger">Not Seen</span>&nbsp;&nbsp;
                            <?php endif; ?>

                            <?php if($message['reply'] !== ""): ?>
                                <i class="fa fa-mail-reply text-success"></i>&nbsp;<span class="text-success">Replied</span>
                            <?php else:?>
                                <i class="fa fa-mail-reply text-danger"></i>&nbsp;<span class="text-danger">Replied</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
        <!-- Footer -->
        <div class="row bg-black text-center text-white p-2 footer">
            <div class="col-12 p-1"><i class="fa fa-home"></i>&nbsp;Designed by Ekwueme Ugochukwu</div>
        </div>
    </div>
<?php include(ROOT_PATH . '/app/includes/links-b.php'); ?>
</body>

</html>