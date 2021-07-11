<?php
 include(ROOT_PATH . '/app/database/db.php');
 include(ROOT_PATH . '/app/helpers/middleware.php');
 include(ROOT_PATH . '/app/helpers/validation.php');
 include(ROOT_PATH . '/app/helpers/mail.php');
 include(ROOT_PATH . '/app/helpers/paging.php');
$errors = array();

$table = 'contact';

$read = count(selectAll($table, ['isRead' => 1]));
$unread = count(selectAll($table, ['isRead' => 0]));
$inbox = count(selectAll($table));
$rely = count(selectAll($table, ['reply' => '']));
$reply = $inbox - $rely;

if (isset($_GET['m_id'])) {
    $message = delete($table, $_GET['m_id']);
    $_SESSION['message'] = ucwords('message delected successfuly');
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/users/admin/staff/contact/');
    exit();
}

if (isset($_GET['r_id'])) {
    $message_id = update($table, $_GET['r_id'], ['isRead' => 1]); 
}

if (isset($_POST['reply-contact'])) {
    $id = $_POST['id'];
    unset($_POST['reply-contact'], $_POST['id']);
    $_POST['repliedBy'] = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
    $message_id = update($table, $id, $_POST);
    if ($message_id) {
        $_SESSION['message'] = ucwords('message is replied');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/admin/staff/contact/');
        exit();
    }else{
        $_SESSION['message'] = ucwords('message not replied');
        $_SESSION['type'] = 'error';
        header('location:' . BASE_URL . '/users/admin/staff/contact/');
        exit();
    }
}

$messages = selectAll($table);