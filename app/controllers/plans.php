<?php
 include(ROOT_PATH . '/app/database/db.php');
 include(ROOT_PATH . '/app/helpers/middleware.php');
 include(ROOT_PATH . '/app/helpers/paging.php');
 include(ROOT_PATH . '/app/helpers/validation.php');

$errors = array();

#add var
$icon = $name = $group = $duration = $exduration = $price = $about = $limit = '';

$table = 'plans';

if (isset($_GET['id'])) {
    $plan = selectOne($table, ['id' => $_GET['id']]);
    $icon = $plan['icon'];
    $name = $plan['name'];
    $group = $plan['pgroup'];
    $duration = $plan['duration'];
    $exduration = $plan['exduration'];
    $price = $plan['price'];
    $about = $plan['about'];
    $limit = $plan['plimit'];
    $id = $plan['id'];
}

if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = ucwords('plan delected successfuly');
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/users/admin/store/plans/');
    exit();
}

#add
if (isset($_POST['add-plan'])) {
    $errors = planValidation($_POST);
    if (count($errors) === 0) {
        unset($_POST['add-plan']);
        #dd($_POST);
        #$table = selectAll($table);
        #dd($table);
        $plan_id = create($table, $_POST);
        $_SESSION['message'] = 'Plan Added Successfully';
        $_SESSION['type'] = "success";
        header('location:' . BASE_URL . '/users/admin/store/plans/');
        exit();
    }else {
        $icon = $_POST['icon'];
        $name = $_POST['name'];
        $group = $_POST['pgroup'];
        $duration = $_POST['duration'];
        $exduration = $_POST['exduration'];
        $price = $_POST['price'];
        $about = $_POST['about'];
        $limit = $_POST['plimit'];
    }
}

#edit
if (isset($_POST['update-plan'])) {
    $errors = planValidation($_POST);
    if (count($errors) === 0) {
        $id =  $_POST['id'];
        unset($_POST['update-plan'], $_POST['id']);
        $plan_id = update($table, $id, $_POST);
        $_SESSION['message'] = ucwords('plan updated successfully');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/admin/store/plans/');
        exit();
    }else{
        $icon = $_POST['icon'];
        $name = $_POST['name'];
        $group = $_POST['pgroup'];
        $duration = $_POST['duration'];
        $exduration = $_POST['exduration'];
        $price = $_POST['price'];
        $about = $_POST['about'];
        $limit = $_POST['plimit'];
    }
}


