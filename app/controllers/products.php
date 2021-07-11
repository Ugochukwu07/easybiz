<?php 
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/validation.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/paging.php');
include(ROOT_PATH . '/app/helpers/mail.php');
$errors = array();

#price var
$about = $name = $old_price = $new_price = "";
$table = "products";

$products = selectAll($table);
$categories = selectAll('category');

function checkLimit() {
    $store = selectOne('stores', ['id' => $_SESSION['store_id']]);
    $limit = $store['plimit'];
    if($limit !== 0){
        $newLimit = $limit - 1;
        update('stores', $_SESSION['store_id'], ['plimit' => $newLimit]);
    }else {
        $_SESSION['message'] = 'Upload Limit Reached <br> Please Subcribe for a new plan. Thanks';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . "/users/store/users/dashboard");
        exit();
    }
}

if (isset($_GET['id'])) {
    $product = selectOne($table, ['id' => $_GET['id']]);
    $id = $product['id'];
    $name = $product['name'];
    $new_price = $product['price_new'];
    $old_price = $product['price_old'];
    $about = $product['about'];
    $cat_id = $product['cat_id'];
    $ava = $product['status'];
}

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = ucwords('product delected successfuly');
    $_SESSION['type'] = 'success';
    if ($_SESSION['admin']) {
        header('location:' . BASE_URL . '/users/admin/');
        exit();
    }else{
        header('location:' . BASE_URL . '/users/store/products/');
        exit();
    }
}

if (isset($_GET['status']) && isset($_GET['p_id'])) {
    $status = $_GET['status'];
    $p_id = $_GET['p_id'];
    /// update stauts
    $count = update($table, $p_id, ['status' => $status]);
    if($_SESSION['admin'] === 1){
        $_SESSION['message'] = 'Publish State Changed';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/users/admin/");
        exit();  
    }else{
        $_SESSION['message'] = 'Publish State Changed';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/users/store/products/");
        exit();}
}

#add
if (isset($_POST['create-product'])) {
    $errors = productValidation($_POST);
    require(ROOT_PATH . '/app/helpers/pimage-upload.php');
    if (count($errors) === 0) {
        checkLimit();
        $_POST['store_id'] = $_SESSION['store_id'];
        $_POST['status'] = isset($_POST['ava']) ? 1 : 0;
        $_POST['cat_id'] = $_POST['cat'];
        unset($_POST['create-product'], $_POST['cat'], $_POST['ava']);
        $product = create($table, $_POST);
        $_SESSION['message'] = 'Product Added Successfully';
        $_SESSION['type'] = "success";
        header('location:' . BASE_URL . '/users/store/products/');
        exit();
    }else {
        $about = $_POST['about'];
        $name = $_POST['name'];
        $old_price = $_POST['price_old'];
        $new_price = $_POST['price_new'];
    }
}


#edit
if (isset($_POST['update-product'])) {
    $errors = productValidation($_POST);
    require(ROOT_PATH . '/app/helpers/pimage-upload.php');
    if (count($errors) === 0) {
        $id = $_POST['id'];
        $_POST['cat_id'] = $_POST['cat'];
        $_POST['status'] = isset($_POST['ava']) ? 1 : 0;
        unset($_POST['update-product'], $_POST['cat'], $_POST['ava']);
        $_POST['store_id'] = $_SESSION['store_id'];
        $product_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'Product Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . "/users/store/products/");
        exit();
    }else{
        $id = $_POST['id'];
        $name = $_POST['name'];
        $new_price = $_POST['price_new'];
        $old_price = $_POST['price_old'];
        $about = $_POST['about'];
        $cat_id = $_POST['cat'];
        $ava = isset($_POST['ava']) ? 1 : 0;
    }
}


?>