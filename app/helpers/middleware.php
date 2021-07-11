<?php 

function usersOnly($redirect = '/users/access.php') {
    if (empty($_SESSION['id']) || !empty($_SESSION['admin'])) {
        $_SESSION['message'] = 'You are not logged in!';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function adminOnly($redirect = '/404.php') {
    if (empty($_SESSION['admin']) || empty($_SESSION['id'])) {
        $_SESSION['message'] = 'You are not authorized!!';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}


function headAdminOnly($redirect = '/admin/users/index.php') {
    $heademail = 'ekwuemepddaul68@gmail.com';
    if ($_SESSION['email'] != $heademail) {
        $_SESSION['message'] = 'You are not authorized!!';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit(0);
    }
}

function expiredStore($redirect = '/users/store/expired.php'){
    if (empty($_SESSION['id'])) {
        $store = selectOne('stores', ['id' => $_GET['id'], 'status' => 1]);
        $user = selectOne('users', ['store_id' => $_GET['id']]);
        if (empty($store)) {
            header('location: ' . BASE_URL . $redirect);
            exit(0);
        }
        $date = selectOne('plan_sub', ['trans_ref' => $user['trans_ref']]);
        if (date('Y-m-d') >= $date['endTime']) {
            header('location: ' . BASE_URL . $redirect);
            exit(0);
        }  
    }
}