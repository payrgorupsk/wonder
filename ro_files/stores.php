<?php

if ($s == 'create_store') {

    var_dump($_POST);
        if (!empty($_POST['store_name']) && ($_POST['store_name'] == 'PayrChat' || $_POST['store_name'] == 'payrchat' || $_POST['store_name'] == $wo['config']['theme']) ) {
            $_POST['store_name'] = "";
        }
        if (empty($_POST['store_name']) || empty($_POST['store_title']) || empty(Wo_Secure($_POST['store_title']))) {
            $errors[] = $error_icon . $wo['lang']['please_check_details'];
        } else {
            $is_exist = Wo_IsNameExist($_POST['store_name'], 0);
            if (in_array(true, $is_exist)) {
                $errors[] = $error_icon . $wo['lang']['page_name_exists'];
            }
            if (in_array($_POST['store_name'], $wo['site_pages'])) {
                $errors[] = $error_icon . $wo['lang']['page_name_invalid_characters'];
            }
            if (strlen($_POST['store_name']) < 5 OR strlen($_POST['store_name']) > 32) {
                $errors[] = $error_icon . $wo['lang']['page_name_characters_length'];
            }
            if (!preg_match('/^[\w]+$/', $_POST['store_name'])) {
                $errors[] = $error_icon . $wo['lang']['page_name_invalid_characters'];
            }
            if (empty($_POST['store_category'])) {
                $_POST['store_category'] = json_encode(1);
            }
            else{
                $category = json_encode($_POST['store_category']);
            }
            if (empty($_POST['store_subcategory'])) {
                $_POST['store_category'] = json_encode(1);
            }
            else{
                $sub_category = json_encode($_POST['store_subcategory']);
            }
        }
        if (empty($errors)) {
            // $sub_category = '';
            // if (!empty($_POST['store_sub_category']) && !empty($wo['page_sub_categories'][$_POST['store_category']])) {
            //     foreach ($wo['page_sub_categories'][$_POST['store_category']] as $key => $value) {
            //         if ($value['id'] == $_POST['store_sub_category']) {
            //             $sub_category = $value['id'];
            //         }
            //     }
            // }

            $re_store_data  = array(
                'store_name' =>         Wo_Secure($_POST['store_name']),
                'user_id' =>            Wo_Secure($wo['user']['user_id']),
                'store_title' =>        Wo_Secure($_POST['store_title']),
                'country_code' =>       Wo_Secure($_POST['country']),
                'payment_method' =>     Wo_Secure($_POST['payment_method']),
                'store_description' =>  Wo_Secure($_POST['store_description']),
                'store_address' =>      Wo_Secure($_POST['store_address']),
                'store_category' =>     $category,
                'sub_category' =>       $sub_category,
                'active' =>             '1',
                'time' =>               time()
            );
            $fields = Wo_GetCustomFields('store'); 
            if (!empty($fields)) {
                foreach ($fields as $key => $field) {
                    if ($field['required'] == 'on' && empty($_POST['fid_'.$field['id']])) {
                        $errors[] = $error_icon . $wo['lang']['please_check_details'];
                        header("Content-type: application/json");
                        echo json_encode(array(
                            'errors' => $errors
                        ));
                        exit();
                    }
                    elseif (!empty($_POST['fid_'.$field['id']])) {
                        $re_store_data['fid_'.$field['id']] = Wo_Secure($_POST['fid_'.$field['id']]);
                    }
                }
            }

             $register_store = ro_registerStore($re_store_data);
            
            if ($register_store) {
                $data = array(
                    'status' => 200,
                    'location' => Wo_SeoLink('index.php?link1=store&store=' . Wo_Secure($_POST['store_name']))
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