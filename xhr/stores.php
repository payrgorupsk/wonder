<?php
if($f='stores'){

    if($s='get_subcategory'){
        if(!empty($_GET['cat_id'])){
            echo json_encode(ro_storeSubCategory($_GET['cat_id']));
            exit();
        }
    }

if($s='create_store'){   
   if(!empty($_POST['store_title']) || !empty($_POST['store_name']) || !empty($_POST['store_category']) || !empty($_POST['store_subcategory']) || !empty($_POST['owner_name'])){
       if(ro_storeExists($_POST['store_name'])){
        $errors[] = $error_icon . "The Store Name is Taken";
       }
       if (empty($_POST['store_category'])) {
        $_POST['store_category'] = json_encode(1);
    }
    else{
        $_POST['store_category'] = json_encode($_POST['store_category']);
    }
    if (empty($_POST['store_subcategory'])) {
        $_POST['store_category'] = json_encode(1);
    }
    else{
        $_POST['store_subcategory'] = json_encode($_POST['store_subcategory']);
    }
   }
   else{
    $errors[] = $error_icon . $wo['lang']['please_check_details'];
   }


   if(empty($errors)){
    $re_store_data  = array(
        'store_name' =>         Wo_Secure($_POST['store_name']),
        'user_id' =>            Wo_Secure($wo['user']['user_id']),
        'store_title' =>        Wo_Secure($_POST['store_title']),
        'country_code' =>       Wo_Secure($_POST['country']),
        'payment_method' =>     Wo_Secure($_POST['payment_method']),
        'store_description' =>  Wo_Secure($_POST['store_description']),
        'store_address' =>      Wo_Secure($_POST['store_address']),
        'store_category' =>     $_POST['store_category'],
        'sub_category' =>       $_POST['store_subcategory'],
        'active' =>             '1',
        'time' =>               time()
    );
    $register_store = ro_registerStore($re_store_data);
            
            if ($register_store) {
                $data = array(
                    'status' => 200,
                    'location' => Wo_SeoLink('index.php?link1=store?&store=' . Wo_Secure($_POST['store_name']))
                );
            }
   }

   header("Content-type: application/json");
        if (isset($errors)) {
            echo json_encode(array(
                'errors' => $errors
            ));
        } else {
            echo json_encode($data);
        }        
        exit();
    
}


}
