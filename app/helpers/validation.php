<?php 

function signupValidate($user) {
    $errors = array();
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexphone = "/^[\d]+$/";
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexname = "/^[a-zA-Z\s.]{1}+[a-zA-Z\s]+$/";
    $regexpassword = "/^[a-zA-Z\d]+$/";
    $lenght = strlen($user['password']);    
    
    #fname
    if(empty($user['firstname'])){
        array_push($errors, 'First Name Required');
    }
    if(!empty($user['firstname']) && !preg_match($regexname, $user['firstname'])){
        array_push($errors, 'Invalid Charatcers In FirstName');
    }

    #lname
    if(empty($user['lastname'])){
        array_push($errors, 'Last Name Required');
    }
    if(!empty($user['lastname']) && !preg_match($regexname, $user['lastname'])){
        array_push($errors, 'Invalid Charatcers In LastName');
    }

    #email
    if (empty($user['email'])) {
        array_push($errors, 'Email Required');
    }
    if (!empty($user['email']) && !preg_match($regexemail, $user['email'])) {
        array_push($errors, 'Email:Invalid Charaters');
    }

    #phone
    if (empty($user['phone'])) {
        array_push($errors, 'Phone Required');
    }
    if (!empty($user['phone']) && !preg_match($regexphone, $user['phone'])) {
        array_push($errors, 'Phone:Invalid Charaters');
    }

    #password
    if (empty($user['password'])) {
        array_push($errors, 'Password Required');
    }
    if (!empty($user['password']) && !preg_match($regexpassword, $user['password'])) {
        array_push($errors, 'Password:Invalid Charaters');
    }
    if ($lenght <= 8 || $lenght >= 16) {
       array_push($errors, ucwords('Password Must contain 8 to 16 charaters'));
    }

    #cpassword
    if ($user['cpassword'] !== $user['password']) {
        array_push($errors, 'Passwords do not match');
    }

    #existing
    $existingEmail = selectOne('users', ['email' => $user['email']]);
    if($existingEmail){
            array_push($errors, 'Email Already Exists');
    }

    $existingPhone = selectOne('users', ['phone_number' => $user['phone']]);
    if($existingPhone){
            array_push($errors, 'Phone Already Exists');
    }

    if (!isset($user['add-admin'])) {
        #checkbox
        $file = "/support#terms";
        $link = '<a href="' . BASE_URL . $file . '">Terms & Conditions</a>';
        if(!isset($user['terms'])){
            array_push($errors, ucwords("you have to accept our " .  $link . "."));
        }
    }
    $_GET['r'] = 1;
    return $errors;
}

function loginValidate($user) {
    $errors = array();
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexpassword = "/^[a-zA-Z\d]+$/";
    $lenght = strlen($user['password']);   

    #email
    if (empty($user['email'])) {
        array_push($errors, 'Email Required');
    }
    if (!empty($user['email']) && !preg_match($regexemail, $user['email'])) {
        array_push($errors, 'Email:Invalid Charaters');
    }

    #password
    if (empty($user['password'])) {
        array_push($errors, 'Password Required');
    }
    if (!empty($user['password']) && !preg_match($regexpassword, $user['password'])) {
        array_push($errors, 'Password:Invalid Charaters');
    }
    if ($lenght <= 8 || $lenght >= 16) {
       array_push($errors, ucwords('Password Must contain 8 to 16 charaters'));
    }

    return $errors;

}

function contactValidation($user) {
    $errors = array();
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexphone = "/^[\d]+$/";

    #email
    if (empty($user['email'])) {
        array_push($errors, 'Email Required');
    }
    if (!empty($user['email']) && !preg_match($regexemail, $user['email'])) {
        array_push($errors, 'Email:Invalid Charaters');
    }
    #phone
    if (empty($user['phone'])) {
        array_push($errors, 'Phone Required');
    }
    if (!empty($user['phone']) && !preg_match($regexphone, $user['phone'])) {
        array_push($errors, 'Phone:Invalid Charaters');
    }
    #message
    if (empty($user['message'])) {
        array_push($errors, 'Message Required');
    }
    return $errors;
}

function bioValidation($user) {
    $errors = array();
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexphone = "/^[\d]+$/";
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexname = "/^[a-zA-Z\s.]{1}+[a-zA-Z\s]+$/";
    $regextext = "/^[a-zA-Z\s.,]{1}+[a-zA-Z\s]+$/";
    $regexcurrency = "/^[A-Z]{3}+$/";
    $table = 'stores';

    #bname
    if(empty($user['bname'])){
        array_push($errors, ucwords('Please you must include a brand name'));
    }
    if (!empty($user['bname']) && !preg_match($regexname, $user['bname'])) {
        array_push($errors, 'Brand Name: Invalid Charaters');
    }
    

    #bemail
    if(empty($user['bemail'])){
        array_push($errors, ucwords('Please you must include a brand Email'));
    }
    if (!empty($user['bemail']) && !preg_match($regexemail, $user['bemail'])) {
        array_push($errors, 'Brand Email: Invalid Charaters');
    }
    #bphone
    if(empty($user['bphone'])){
        array_push($errors, ucwords('Please you must include a brand Phone number'));
    }
    if (!empty($user['bphone']) && !preg_match($regexphone, $user['bphone'])) {
        array_push($errors, 'Brand Phone: Invalid Charaters');
    }

    #bwelcom
    if(empty($user['bwelcom'])){
        array_push($errors, ucwords('Please you must include a brand welcome text'));
    }

    #currency
    if(empty($user['currency'])){
        array_push($errors, ucwords('Please you must include a brand currency'));
    }
    if (!empty($user['currency']) && !preg_match($regexcurrency, $user['currency'])) {
        array_push($errors, 'Brand Welcome Text: Invalid Currency Abbriviation');
    }
    
    #baddress
    if(empty($user['baddress'])){
        array_push($errors, ucwords('Please you must include a brand baddress'));
    }
    
    #link
    if(empty($user['bfblink'] && $user['binstalink'])){
        array_push($errors, ucwords('Please you must include a brand link'));
    }

    #paddress
    if(empty($user['paddress'])){
        array_push($errors, ucwords('Please you must include your home address'));
    }

    #plink
    if(empty($user['pfblink'] && $user['pinstalink'])){
        array_push($errors, ucwords('Please you must include a personal contact link'));
    }

    #about
    if(empty($user['about'])){
        array_push($errors, ucwords('Please you must include about you'));
    }
    
    #if complete-bio
    if (isset($user['complet-bio'])) {
        $existingName = selectOne($table, ['bname' => $user['bname']]);
        if($existingName){
                array_push($errors, ucwords('Brand with the same Name Already Exists'));
        }
        $existingEmail = selectOne($table, ['bemail' => $user['bemail']]);
        if($existingEmail){
                array_push($errors, ucwords('Brand with the same Email Already Exists'));
        }
        $existingPhone = selectOne($table, ['bphone' => $user['bphone']]);
        if($existingPhone){
                array_push($errors, ucwords('Brand with the same Phone number Already Exists'));
        }
    }

    return $errors;
}

function brandVal($user) {
    $errors = array();
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexphone = "/^[\d]+$/";
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexname = "/^[a-zA-Z\s.]{1}+[a-zA-Z\s]+$/";
    $regexcurrency = "/^[A-Z]{3}+$/";
    $table = 'stores';

    #bname
    if(empty($user['bname'])){
        array_push($errors, ucwords('Please you must include a brand name'));
    }
    if (!empty($user['bname']) && !preg_match($regexname, $user['bname'])) {
        array_push($errors, 'Brand Name: Invalid Charaters');
    }
    

    #bemail
    if(empty($user['bemail'])){
        array_push($errors, ucwords('Please you must include a brand Email'));
    }
    if (!empty($user['bemail']) && !preg_match($regexemail, $user['bemail'])) {
        array_push($errors, 'Brand Email: Invalid Charaters');
    }
    #bphone
    if(empty($user['bphone'])){
        array_push($errors, ucwords('Please you must include a brand Phone number'));
    }
    if (!empty($user['bphone']) && !preg_match($regexphone, $user['bphone'])) {
        array_push($errors, 'Brand Phone: Invalid Charaters');
    }

    #bwelcom
    if(empty($user['bwelcom'])){
        array_push($errors, ucwords('Please you must include a brand welcome text'));
    }

    #currency
    if(empty($user['currency'])){
        array_push($errors, ucwords('Please you must include a brand currency'));
    }
    if (!empty($user['currency']) && !preg_match($regexcurrency, $user['currency'])) {
        array_push($errors, 'Brand Welcome Text: Invalid Currency Abbriviation');
    }

     #if brand-btn
     if (isset($user['brand-btn'])) {
        $existingName = selectOne($table, ['bname' => $user['bname']]);
        if($existingName){
                array_push($errors, ucwords('Brand with the same Name Already Exists'));
        }
        $existingEmail = selectOne($table, ['bemail' => $user['bemail']]);
        if($existingEmail){
                array_push($errors, ucwords('Brand with the same Email Already Exists'));
        }
        $existingPhone = selectOne($table, ['bphone' => $user['bphone']]);
        if($existingPhone){
                array_push($errors, ucwords('Brand with the same Phone number Already Exists'));
        }
    }

    return $errors;
}

function brandAddress($user) {
    $errors = array();

    #baddress
    if(empty($user['baddress'])){
        array_push($errors, ucwords('Please you must include a brand address'));
    }

    #link
    if(empty($user['bfblink'] && $user['binstalink'])){
        array_push($errors, ucwords('Please you must include a brand social media link'));
    }

    return $errors;
}

function userVal($user) {
    $errors = array();
    $regexemail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\.]+$/";
    $regexphone = "/^[\d]+$/";
    $regexname = "/^[a-zA-Z\s.]{1}+[a-zA-Z\s]+$/";   
    
    #fname
    if(empty($user['firstname'])){
        array_push($errors, 'First Name Required');
    }
    if(!empty($user['firstname']) && !preg_match($regexname, $user['firstname'])){
        array_push($errors, 'Invalid Charatcers In FirstName');
    }

    #lname
    if(empty($user['lastname'])){
        array_push($errors, 'Last Name Required');
    }
    if(!empty($user['lastname']) && !preg_match($regexname, $user['lastname'])){
        array_push($errors, 'Invalid Charatcers In LastName');
    }

    #email
    if (empty($user['email'])) {
        array_push($errors, 'Email Required');
    }
    if (!empty($user['email']) && !preg_match($regexemail, $user['email'])) {
        array_push($errors, 'Email:Invalid Charaters');
    }

    #phone
    if (empty($user['phone'])) {
        array_push($errors, 'Phone Required');
    }
    if (!empty($user['phone']) && !preg_match($regexphone, $user['phone'])) {
        array_push($errors, 'Phone:Invalid Charaters');
    }

        #about
        if(empty($user['about'])){
            array_push($errors, ucwords('Please you must include about you'));
        }

    return $errors;
}

function userAddress($user) {
    $errors = array();

    #paddress
    if(empty($user['paddress'])){
        array_push($errors, ucwords('Please you must include your home address'));
    }

    #plink
    if(empty($user['pfblink'] && $user['pinstalink'])){
        array_push($errors, ucwords('Please you must include a personal contact link'));
    }

    return $errors;
}

function productValidation($product) {
    $errors = array();
    $regexphone = "/^[\d]+$/";

    #name
    if(empty($product['name'])){
        array_push($errors, 'Product Name Required');
    }

    #price_old
    if (empty($product['price_old'])) {
        array_push($errors, ucwords('must include an old price'));
    }
    if (!empty($product['price_old']) && !preg_match($regexphone, $product['price_old'])) {
        array_push($errors, ucwords('Invalid Charatcers at old price'));
    }

    #price_old
     if (empty($product['price_new'])) {
        array_push($errors, ucwords('must include an new/Current price'));
    }
    if (!empty($product['price_new']) && !preg_match($regexphone, $product['price_new'])) {
        array_push($errors, ucwords('Invalid Charatcers at new/Current price'));
    }

    #about
    if (empty($product['about'])) {
        array_push($errors, ucwords('about product must not be empty'));
    }
    return $errors;
}

function categoryValidation($category) {
    $errors = array();

    #name
    if (empty($category['title'])) {
        array_push($errors, ucwords('please add an category name or title'));
    }

    #about
    if(empty($category['about'])){
        array_push($errors, ucwords('add a decribtion'));
    }

    #existing
    $existingTitle = selectOne('category', ['title' => $category['title'], 'store_id' => $_SESSION['store_id']]);
    if($existingTitle){
            array_push($errors, ucwords('category Already Exists'));
    }
    return $errors;
}

function categoryValidationedit($category) {
    $errors = array();

    #name
    if (empty($category['title'])) {
        array_push($errors, ucwords('please add an category name or title'));
    }

    #about
    if(empty($category['about'])){
        array_push($errors, ucwords('add a decribtion'));
    }
    
    return $errors;
}

function planValidation($plan) {
    $errors = array();
    $regexnumber = "/^[\d]+$/";
    $regexname = "/^[a-zA-Z\d\._-]+$/";

    #icon
    if (empty($plan['icon'])) {
        array_push($errors, ucwords('please icon must not be empty'));
    }
    if (!empty($plan['icon'])) {
        $plan['icon'] =  htmlentities($plan['icon']);
    }

    #name
    if (empty($plan['name'])) {
        array_push($errors, ucwords('Plan name must not be empty'));
    }
    if (!empty($user['name']) && !preg_match($regexname, $user['name'])) {
        array_push($errors, ucwords('plan Name: Invalid Charaters'));
    }

    #group
    if (empty($plan['pgroup'])) {
        array_push($errors, ucwords('Plan group must not be empty'));
    }

    #limt
    if (empty($plan['plimit'])) {
        array_push($errors, ucwords('Product upload limit must not be empty'));
    }
    if (!empty($user['limit']) && !preg_match($regexnunber, $user['limit'])) {
        array_push($errors, ucwords('Product upload limit: Invalid Charaters'));
    }

    #duration
    if (empty($plan['duration'])) {
        array_push($errors, ucwords('Plan duration must not be empty'));
    }
    if (!empty($user['duration']) && !preg_match($regexnunber, $user['duration'])) {
        array_push($errors, ucwords('Plan duration: Invalid Charaters'));
    }

    #ex_duration
    if (empty($plan['exduration'])) {
        array_push($errors, ucwords('Plan extra duration must not be empty'));
    }
    if (!empty($user['exduration']) && !preg_match($regexnunber, $user['exduration'])) {
        array_push($errors, ucwords('Plan extra duration: Invalid Charaters'));
    }

    #price
    if (empty($plan['price'])) {
        array_push($errors, ucwords('Plan price must not be empty'));
    }
    if (!empty($user['price']) && !preg_match($regexnunber, $user['price'])) {
        array_push($errors, ucwords('Plan price: Invalid Charaters'));
    }

    #about
    if (empty($plan['about'])) {
        array_push($errors, ucwords('about plan must not be empty'));
    }

    return $errors;
}

function valUpgrade($plan) {
    $errors = array();
    #select
    if(empty($plan['plan_id'])){
        array_push($errors, ucwords('must select a new plan'));
    }
    return $errors;
}

?>