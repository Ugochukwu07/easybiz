<?php
 include(ROOT_PATH . '/app/database/db.php');
 include(ROOT_PATH . '/app/helpers/login-user.php');
 include(ROOT_PATH . '/app/helpers/middleware.php');
 include(ROOT_PATH . '/app/helpers/paging.php');
 include(ROOT_PATH . '/app/helpers/validation.php');

 $errors = array();
#bio-compelet var
$bname = $bemail = $bphone = $bwelcom = $binstalink = $pinstalink = $about = "";
$bfblink = $pfblink = $baddress = $paddress = $baddress2  = $currency = $plink = "";
$firstname = $lastname = $email = "";

$table = 'stores';


if (isset($_GET['id'])) {
    $store = selectOne($table, ['user_id' => $_GET['id']]);
    $user = selectOne('users', ['id' => $store['user_id']]);
    $id = $store['id'];
    $bname = $store['bname'];
    $bemail = $store['bemail'];
    $bphone = $store['bphone'];
    $bwelcom = $store['bwelcom'];
    $binstalink = $store['binstalink'];
    $pinstalink = $user['pinstalink'];
    $about = $user['about'];
    $bfblink = $store['bfblink'];
    $pfblink = $user['pfblink'];
    $baddress = $store['baddress'];
    $paddress = $user['paddress'];
    $baddress2  = $store['baddress2'];
    $currency = $store['currency'];
    $plink = $store['plink'];
    $planName = selectOne('plans', ['id' => $user['plan_id']]);
    $total = count(selectAll('products', ['store_id' => $_GET['id']]));
}

#delect
if (isset($_GET['del_id'])) {
    $id = $_GET['del_id'];
    $count = delete($table, $id);
    $_SESSION['message'] = ucwords('store deleted successfully');
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . '/users/admin/store/');
    exit();
}

#complet bio
if (isset($_POST['complet-bio'])) {
    usersOnly();
    $errors = bioValidation($_POST);
    if (!empty($_FILES['blogo']['name'])) {
        $image_name = time() . '_' . $_FILES['blogo']['name'];
        $destination = ROOT_PATH . "/users/assets/images/" . $image_name;
  
        $result = move_uploaded_file($_FILES['blogo']['tmp_name'], $destination);
  
        if ($result) {
            $_POST['blogo'] = $image_name;
          } else {
              array_push($errors, 'Failed To Upload Brand Logo');
              }   
      } else {
          array_push($errors, 'Brand Logo Required');
      }
      if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/users/assets/images/" . $image_name;
  
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
  
        if ($result) {
            $_POST['image'] = $image_name;
          } else {
              array_push($errors, 'Failed To Upload Profile Image');
              }   
      } else {
          array_push($errors, 'Post Profile Image Required');
      }
    if(count($errors) === 0){
        $personal = array('email' => $_POST['email'], 'phone_number' => $_POST['phone'], 'pfblink' => $_POST['pfblink'], 'pinstalink' => $_POST['pinstalink'], 'paddress' => $_POST['paddress'], 'about' => $_POST['about'], 'image' => $_POST['image']);
        unset($_POST['complet-bio'], $_POST['pname'], $_POST['email'], $_POST['phone'], $_POST['pfblink'], $_POST['pinstalink'], $_POST['paddress'], $_POST['about'], $_POST['image']);
        $_POST['user_id'] = $_SESSION['id'];
        $store['status'] = 1;
        $store_id = createi($table, $_POST);
        $store = selectOne($table, ['id' => $store_id]);
        $store['store_id'] = $store['id'];
        unset($store['id'], $store['user_id']);
        sessionDeclear($store);
        $personal['store_id'] = $store_id;
        $personal['plan_id'] = 10;
        $user_id = update('users', $_SESSION['id'], $personal);
        $user = selectOne('users', ['id' => $_SESSION['id']]);
        loginUser($user);
        $_SESSION['message'] = ucwords('Store details uploaded successfully <br> please re-login again');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/users/dashboard');
        exit();
    }else{
        $bname = $_POST['bname'];
        $bemail = $_POST['bemail'];
        $bphone = $_POST['bphone'];
        $bwelcom = $_POST['bwelcom'];
        $binstalink = $_POST['binstalink'];
        $pinstalink = $_POST['pinstalink'];
        $about = $_POST['about'];
        $bfblink = $_POST['bfblink'];
        $pfblink = $_POST['pfblink'];
        $baddress = $_POST['baddress'];
        $paddress = $_POST['paddress'];
        $baddress2  = $_POST['baddress2'];
        $currency = $_POST['currency'];
    }
}

#step 1 - Image Btn
if (isset($_POST['image-btn'])) {
    usersOnly();
    if (!empty($_FILES['blogo']['name'])) {
        $image_name = time() . '_' . $_FILES['blogo']['name'];
        $destination = ROOT_PATH . "/users/assets/images/" . $image_name;
  
        $result = move_uploaded_file($_FILES['blogo']['tmp_name'], $destination);
  
        if ($result) {
            $_POST['blogo'] = $image_name;
          } else {
              array_push($errors, 'Failed To Upload Brand Logo');
              }   
    } else {
          array_push($errors, 'Brand Logo Required');
    }
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/users/assets/images/" . $image_name;
  
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
  
        if ($result) {
            $_POST['image'] = $image_name;
          } else {
              array_push($errors, 'Failed To Upload Profile Image');
            }   
    } else {
        array_push($errors, 'Post Profile Image Required');
       }

    if (count($errors) === 0) {
       $store_id = createi($table, ['blogo' => $_POST['blogo'], 'user_id' => $_SESSION['id']]);
       $user_id = update('users', $_SESSION['id'], ['image' => $_POST['image'], 'store_id' => $store_id]);
       $store = selectOne($table, ['id' => $store_id]);
       $user = selectOne('users', ['id' => $_SESSION['id']]);
       $store['store_id'] = $store['id'];
       unset($store['id']);
       sessionDeclear($store);
       sessionDeclear($user);
        $_SESSION['message'] = ucwords('Images Uploaded');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/reg/brand.php');
        exit();
    }
    
}

#step 2 - brand-btn
if (isset($_POST['brand-btn'])) {
   usersOnly();
   #dd($_POST);
   $errors = brandVal($_POST);
   if (count($errors) === 0) {
       unset($_POST['brand-btn']);
       $store = update($table, $_SESSION['store_id'], $_POST);
       sessionDeclear($_POST);
       $_SESSION['message'] = ucwords('Brand Information Uploaded');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/reg/brand-address.php');
        exit();
   }else{
        $bname = $_POST['bname'];
        $bemail = $_POST['bemail'];
        $bphone = $_POST['bphone'];
        $bwelcom = $_POST['bwelcom'];
        $currency = $_POST['currency'];
   }
}

#step 3 - brand-address
if (isset($_POST['b-address'])) {
    usersOnly();
    $errors = brandAddress($_POST);
    if (count($errors) === 0) {
        unset($_POST['b-address']);
        $_POST['status'] = 1;
        $_POST['plimit'] = 5;
        $store = update($table, $_SESSION['store_id'], $_POST);
        sessionDeclear($_POST);
        $_SESSION['message'] = ucwords('Brand Address Uploaded');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/reg/user.php');
        exit();
    }else{
        $binstalink = $_POST['binstalink'];
        $bfblink = $_POST['bfblink'];
        $baddress = $_POST['baddress'];
        $baddress2  = $_POST['baddress2'];
        $plink  = $_POST['plink'];
    }
}

#step 3 - user-info
if (isset($_POST['user-info'])) {
    usersOnly();
    $errors = userVal($_POST);
    if (count($errors) === 0) {
        $_POST['phone_number'] = $_POST['phone'];
        unset($_POST['user-info'], $_POST['phone']);
        $user_id = update('users', $_SESSION['id'], $_POST);
        sessionDeclear($_POST);
        $_SESSION['message'] = ucwords('User Information Uploaded');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/reg/user-address.php');
        exit();
    }else{
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
    }
}

#step 4 - u-address
if (isset($_POST['u-address'])) {
    usersOnly();
    $errors = userAddress($_POST);
    if (count($errors) === 0) {
        unset($_POST['u-address']);
        $user_id = update('users', $_SESSION['id'], $_POST);
        sessionDeclear($_POST);
        $_SESSION['message'] = ucwords('User Address Uploaded');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/users/dashboard');
        exit();
    }else{
        $pinstalink = $_POST['pinstalink'];
        $pfblink = $_POST['pfblink'];
        $paddress = $_POST['paddress'];
    }
}

#upgrade-brand
if (isset($_POST['upgrade-brandi'])) {
    usersOnly();
    $errors = bioValidation($_POST);
    if (!empty($_FILES['blogo']['name'])) {
        $image_name = time() . '_' . $_FILES['blogo']['name'];
        $destination = ROOT_PATH . "/users/assets/images/" . $image_name;
  
        $result = move_uploaded_file($_FILES['blogo']['tmp_name'], $destination);
  
        if ($result) {
            $_POST['blogo'] = $image_name;
          } else {
              array_push($errors, 'Failed To Upload Brand Logo');
              }   
      } else {
          array_push($errors, 'Brand Logo Required');
      }
      if (!empty($_FILES['image']['name'])) {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/users/assets/images/" . $image_name;
  
        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
  
        if ($result) {
            $_POST['image'] = $image_name;
          } else {
              array_push($errors, 'Failed To Upload Profile Image');
              }   
      } else {
          array_push($errors, 'Post Profile Image Required');
      }
    
    if (count($errors) === 0) {
        $id = $_POST['id'];
        $personal = array('email' => $_POST['email'], 'phone_number' => $_POST['phone'], 'pfblink' => $_POST['pfblink'], 'pinstalink' => $_POST['pinstalink'], 'paddress' => $_POST['paddress'], 'about' => $_POST['about'], 'image' => $_POST['image']);
        unset($_POST['id'], $_POST['upgrade-brandi'], $_POST['pname'], $_POST['email'], $_POST['phone'], $_POST['pfblink'], $_POST['pinstalink'], $_POST['paddress'], $_POST['about'], $_POST['image']);
        $_POST['user_id'] = $_SESSION['id'];
        $store_id = update($table, $id, $_POST);
        $store = selectOne($table, ['id' => $store_id]);
        $store['store_id'] = $store['id'];
        unset($store['id'], $store['user_id']);
        sessionDeclear($store);
        $personal['store_id'] = $store_id;
        $personal['plan_id'] = 10;
        $user_id = update('users', $_SESSION['id'], $personal);
        $user = selectOne('users', ['id' => $_SESSION['id']]);
        $_SESSION['message'] = ucwords('store updated');
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/store/users/dashboard');
        exit();
    }
}

#upgrade-brand-plan
if (isset($_POST['upgrade-brand'])) {
    $errors = valUpgrade($_POST);
    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['upgrade-brand'], $_POST['id']);
        $user_id = selectOne($table, ['id' => $id]);
        $count = update('users', $user_id['user_id'], $_POST);
        $plan = selectOne('plans', ['id' => $_POST['plan_id']]);
        $_SESSION['message'] = ucwords('store upgraded to ') . $plan['name'];
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/users/admin/store/');
        exit();
    }
}

#deactivate
if (isset($_GET['status']) && isset($_GET['deactive_id'])) {
    $status = $_GET['status'];
    $deactive = $_GET['deactive_id'];
    /// update activate
    $count = update($table, $deactive, ['status' => $status]);
    $_SESSION['message'] = ucwords('store activate STATUS CHANGED');
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . "/users/admin/store/");
    exit();

}
