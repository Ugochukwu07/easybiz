<?php 
include(ROOT_PATH . '/app/database/db.php');
include(ROOT_PATH . '/app/helpers/middleware.php');
include(ROOT_PATH . '/app/helpers/paging.php');
include(ROOT_PATH . '/app/helpers/validation.php');
include(ROOT_PATH . '/app/helpers/mail.php');
$errors = array();
#cat var
$title_cat = $about = "";

$table = 'category';
$categories = selectAll($table);

if (isset($_GET['id'])) {
    $category = selectOne($table, ['id' => $_GET['id']]);
    $id = $category['id'];
    $title_cat = $category['title'];
    $about = $category['about'];
    $store_id = $category['store_id'];
}

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    if ($count) {
        $_SESSION['message'] = ucwords('Category Deleted successfuly.');
        $_SESSION['type'] = 'success';
        if ($_SESSION['Admin'] === 1) {
            header('location:' . BASE_URL . '/users/admin/catigories/');
        }else{
            header('location:' . BASE_URL . '/users/store/products/catigories/');
        }
        exit();
    }else{
        $_SESSION['message'] = ucwords('error in deleting category');
        $_SESSION['type'] = 'error';
    }
}

#add
if (isset($_POST['add-cat'])) {
    $errors = categoryValidation($_POST);
    if (count($errors) === 0) {
        unset($_POST['add-cat']);
        $_POST['store_id'] = $_SESSION['store_id'];
        $cat_id = create($table, $_POST);
        $_SESSION['message'] = ucwords('Category created successfuly.');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/products/catigories/');
        exit();
    }else{
        $title_cat = $_POST['title'];
        $about = $_POST['about'];
    }
}

#edit
if (isset($_POST['edit-cat'])) {
    $errors = categoryValidationedit($_POST);
    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['edit-cat'], $_POST['id']);
        $_POST['store_id'] = $_SESSION['store_id'];
        $cat_id = update($table, $id, $_POST);
        $_SESSION['message'] = ucwords('Category updated successfuly.');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/products/catigories/');
        exit();
    }else{
        $title = $_POST['title'];
        $about = $_POST['about'];
    }
}