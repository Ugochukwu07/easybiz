<?php

function loginUser($user) {
    sessionDeclear($user);
    unset($_SESSION['password']);
    $_SESSION['message'] = 'You are now Logged In';
    $_SESSION['type'] = 'success';
    if ($_SESSION['verified'] === 0) {
        mailer($user['email'], 'ugochukwu.ekwueme@yahoo.com', require(ROOT_PATH . '/app/includes/everification.php') , 'Email Verify');
        header('location:' . BASE_URL . '/verify');
    }else{
        if ($_SESSION['admin']) {
            header('location:' . BASE_URL . '/users/admin/index.php');
        } else {
            $store = selectOne('stores', ['user_id' => $_SESSION['id']]);
            if ($store) {
                sessionDeclear($store);
                $_SESSION['id'] = $user['id'];
                $_SESSION['store_id'] = $store['id'];
                header('location:' . BASE_URL . '/users/store/users/dashboard');
            }else{
                header('location:' . BASE_URL . '/users/store/reg/images.php');
            }
        }
    }
    exit();
}