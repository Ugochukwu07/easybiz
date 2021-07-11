<?php 
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/mail.php');
include(ROOT_PATH . '/app/helpers/login-user.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/paging.php');
include(ROOT_PATH . '/app/helpers/validation.php');
$errors = array();
#signup var
$firstname = $lastname = $phone = $email = $password = $cpassword = $bemail = "";

$table = "users";

#calls
$users = selectAll($table);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = selectOne($table, ['id' => $_GET['id']]);
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $email = $user['email'];
    $phone = $user['phone_number'];
}


#Login
if (isset($_POST['login-user'])) {
    $errors = loginValidate($_POST);
    if(count($errors) === 0){
        unset($_POST['login-user']);
            $user = selectOne($table, ['email' => $_POST['email']]);
            if ($user && password_verify($_POST['password'], $user['password'])) {
            // login and redirect
            loginUser($user);
            }else {
                array_push($errors, ucwords('wrong email or password'));
                $email = $_POST['email'];
                $password = $_POST['password'];
            }
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
}

#sign up || admin user
if (isset($_POST['signup-user']) || isset($_POST['add-admin'])) {
    $errors = signupValidate($_POST);
    if(count($errors) === 0){
        unset($_POST['signup-user'], $_POST['cpassword'], $_POST['terms']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['e_code'] = generateRandomString($e_code, 32);
        $_POST['p_code'] = generateRandomString($p_code, 7);
        $_POST['phone_number'] = $_POST['phone'];
        unset($_POST['phone']);
        if(isset($_POST['add-admin'])){
            unset($_POST['add-admin']);
            $_POST['admin'] = 1;
            $user_id = createi($table, $_POST);
            $_SESSION['message'] = "Admin User Created Succesfully";
            $_SESSION['type'] = "success";
            header('location:' . BASE_URL . '/users/admin/users/');
            exit();
        }else{
            $_POST['plan_id'] = 10;
            $user_id = createi($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            /* $verify = mailer($user['email'], 'ugochukwu.ekwueme@yahoo.com', require(ROOT_PATH . '/app/includes/everification.php'), 'Email Verify'); */
            $message = 'Verify Your email<br> Click the link below<br>';
            $message .= BASE_URL . '/verify.php?id=' . $user['id'] . '&ekey=' . $user['e_code'];
            $_SESSION['message'] = "User Created Succesfully";
            $_SESSION['type'] = "success";
            header('location:' . BASE_URL . '/verify');
            exit();
        }
    }else{
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
    }
}

if (isset($_POST['edit-admin'])) {
    $errors = signupValidate($_POST);
    if (count($errors) === 0) {
        dd($_POST);
    }
}

if (isset($_POST['reset'])) {
    if (empty($_POST['email']) || empty($_POST['bemail'])) {
        array_push($errors, ucwords('No fileds must me empty'));
    }
    if (count($errors) === 0) {
        unset($_POST['reset']);
        $user = selectOne($table, ['email' => $_POST['email']]);
        $user_id = update($table, $user['id'], ['oneTimeT' => generateRandomString($user_key, 60)]);
        $user = selectOne($table, ['email' => $_POST['email']]);
        $store = selectOne('stores', ['user_id' => $user['id'], 'bemail' => $_POST['bemail']]);
        if (!empty($store)) {
            $subject = 'Password Reset';
            $mesage = BASE_URL . '/users/store/f-pass/' . $user['e_code'] . '/' . $user['p_code'] . '/' . $user['oneTimeT'];
            $headers = "From:" . 'ekwuemeugochukwu83@gmail.com';
            mail($user['email'], $subject, $mesage, $headers);
            #header('location:' . BASE_URL . '/users/store/f-pass/' . $user['e_code'] . '/' . $user['p_code'] . '/' . $user['oneTimeT']);
            #exit();
        }
    }else{
        $email = $_POST['email'];
        $bemail = $_POST['bemail'];
    }
}

if (isset($_POST['reset-pass'])) {
    $regexpassword = "/^[a-zA-Z\d]+$/";
    $lenght = strlen($_POST['password']);    
    if (empty($_POST['password'])) {
        array_push($errors, 'Password Required');
    }
    if (!empty($_POST['password']) && !preg_match($regexpassword, $_POST['password'])) {
        array_push($errors, 'Password:Invalid Charaters');
    }
    if ($lenght <= 8 || $lenght >= 16) {
       array_push($errors, ucwords('Password Must contain 8 to 16 charaters'));
    }
    if ($_POST['cpassword'] !== $_POST['password']) {
        array_push($errors, 'Passwords do not match');
    }
    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['reset-pass'], $_POST['id'], $_POST['cpassword']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = update($table, $id, ['password' => $_POST['password']]);
        loginUser(selectOne($table, ['id' => $id]));
    }else{
        header('location:' . BASE_URL . '/users/store/f-pass/' . $_SESSION['e_code'] . '/' . $_SESSION['p_code'] . '/' . $_SESSION['oneTimeT']);
        exit();
    }
}

?>