<?php

function Wo_GetAdId($type, $admin = true) {
    global $sqlConnect;
    $type      = Wo_Secure($type);
    $query_one = "SELECT `id` FROM " . T_ADS . " WHERE `type` = '{$type}'";
    if ($admin === false) {
        $query_one .= " AND `active` = '1'";
    }
    $sql_query_one = mysqli_query($sqlConnect, $query_one);
    if (mysqli_num_rows($sql_query_one)) {
        $fetched_data  = mysqli_fetch_assoc($sql_query_one);
        return $fetched_data['id'];
    }
    return false;
        
}
function Wo_GetAdPoint($type, $admin = true) {
    global $sqlConnect;
    $type      = Wo_Secure($type);
    $query_one = "SELECT `points` FROM " . T_ADS . " WHERE `type` = '{$type}'";
    if ($admin === false) {
        $query_one .= " AND `active` = '1'";
    }
    $sql_query_one = mysqli_query($sqlConnect, $query_one);
    if (mysqli_num_rows($sql_query_one)) {
        $fetched_data  = mysqli_fetch_assoc($sql_query_one);
        return $fetched_data['points'];
    }
    return false;
        
}

function Wo_GetAdTimer($type, $admin = true) {
    global $sqlConnect;
    $type      = Wo_Secure($type);
    $query_one = "SELECT `timer` FROM " . T_ADS . " WHERE `type` = '{$type}'";
    if ($admin === false) {
        $query_one .= " AND `active` = '1'";
    }
    $sql_query_one = mysqli_query($sqlConnect, $query_one);
    if (mysqli_num_rows($sql_query_one)) {
        $fetched_data  = mysqli_fetch_assoc($sql_query_one);
        return $fetched_data['timer'];
    }
    return false;
        
}

function ro_userAdsAssignment($adid){    
    
    global $wo, $sqlConnect;
    if(ro_hasAds($adid)!=""){                
        if(ro_hasAdsTime($adid)){                   
            if(ro_setAdsViewed($adid)){
                ro_addPointsToProfile($adid);
                return true;
            }
        }
        else{  
             $_SESSION['ads_notify'] = "This ad is not available right now";          
            return false;
        }
    }
    else{
        ro_assignUserAds($adid);
        return true;
    }
}

function ro_setAdsViewed($adid){
    global $wo, $sqlConnect;    
    $query_one = " UPDATE ro_user_ads SET `seen_count` = `seen_count`+1, `view_points` = `view_points`+".Wo_GetAdPoint($adid,true).",`last_view_time` = NOW() WHERE ads_id =". Wo_GetAdId($adid,true)." AND `user_id`=".$wo['user']['user_id'];
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        $_SESSION['ads_notify'] = "You have earned ".Wo_GetAdPoint($adid,true)." points";
        return true;
    }
}


function ro_hasAdsTime($adid){
    global $wo, $sqlConnect;    
    $query_one = "SELECT TIMEDIFF(NOW(),(SELECT last_view_time FROM ro_user_ads  WHERE `ads_id` = ".Wo_GetAdId($adid,true)." AND `user_id`=".$wo['user']['user_id'].")) as cdown";
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        $timediff = mysqli_fetch_array($sql);
        if($timediff['cdown']>="00:20:01"){            
            return true;
        }
        else{            
            return false;
        }
    }
    else{
        $_SESSION['ads_notify'] = $query_one;
        return false;
    }
}

function ro_hasAds($adid){
    global $wo, $sqlConnect;    
    $query_one = "SELECT * FROM ro_user_ads  WHERE `ads_id` = ".Wo_GetAdId($adid,true)." AND `user_id`=".$wo['user']['user_id'];
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        $result = mysqli_fetch_array($sql);
        return $result;
    }
    else{
       return false;
    }
}

function ro_assignUserAds($adid){
    global $wo, $sqlConnect;    
    $query_one = "INSERT INTO `ro_user_ads`(`user_id`, `ads_id`, `seen_count`, `view_points`, `last_view_time`, `status`) VALUES (".$wo['user']['user_id'].",".Wo_GetAdId($adid,true).",1,".Wo_GetAdPoint($adid,true).",NOW(),1);";
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        ro_addPointsToProfile($adid);
        $_SESSION['ads_notify'] = "You have earned ".Wo_GetAdPoint($adid,true)." points";
        return true;
    }
    else{
        $_SESSION['ads_notify'] = "Can't Assign";
    }
}
function ro_addPointsToProfile($adid){
    global $wo, $sqlConnect;
    $p_to_b = Wo_GetAdPoint($adid,true)/$wo['config']['dollar_to_point_cost'];
    $query_one = "UPDATE " . T_USERS . " SET `points` = `points`+".Wo_GetAdPoint($adid,true).",`balance` = `balance`+".$p_to_b." WHERE `user_id` =".$wo['user']['user_id'];  
    // $query_one = "INSERT INTO `ro_user_ads`(`user_id`, `ads_id`, `seen_count`, `view_points`, `last_view_time`, `status`) VALUES (".$wo['user']['user_id'].",".Wo_GetAdId($adid,true).",1,".Wo_GetAdPoint($adid,true).",NOW(),1);";
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        
        return true;
    }
    else{
        return false;
    }
}

function ro_giftPost($post_id, $author_id, $points){
    global $wo, $sqlConnect;
    $p_to_b = $points/$wo['config']['dollar_to_point_cost'];
    $query_one = "UPDATE " . T_USERS . " SET `points` = `points`+".$points.",`balance` = `balance`+".$p_to_b." WHERE `user_id` =".$author_id;  
    // $query_one = "INSERT INTO `ro_user_ads`(`user_id`, `ads_id`, `seen_count`, `view_points`, `last_view_time`, `status`) VALUES (".$wo['user']['user_id'].",".Wo_GetAdId($adid,true).",1,".Wo_GetAdPoint($adid,true).",NOW(),1);";
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        
        ro_pointsToPost($post_id,$points,$author_id);
        return true;
    }
    else{
        return false;
    }
}

function ro_pointsToPost($post_id,$points,$author_id){
    global $wo, $sqlConnect;
    $query_one = "INSERT INTO `ro_gift_points_to_post`(`post_id`, `author_id`, `points`,  `gifted_by`) VALUES (".$post_id.", ".$author_id.", ".$points.",".$wo['user']['user_id'].")";
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        
        return true;
    }
    else{
        return false;
    }
}

function ro_isPostGifted($post_id){
    global $wo, $sqlConnect;
    $query_one = "SELECT * FROM `ro_gift_points_to_post` WHERE post_id = ".$post_id;
     $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        $result = mysqli_num_rows($sql);
        if($result>0){
            return true;
        }
        else{
        return false;
        }
        
    }
    else{
        return false;
    }
}

function ro_giftedPosts(){
    global $wo, $sqlConnect;
    $query_one = "SELECT * FROM `ro_gift_points_to_post` WHERE author_id = ".$wo['user']['id'];
     $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        $result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        if($result>0){
            
            return $result ;
        }
        else{
        return 0;
        }
        
    }
    else{
        return false;
    }
}

function ro_totalGiftedPostsPoints($user_id){
    global $wo, $sqlConnect;
    $result[0][0] = 0;
    $query_one = "SELECT SUM(`points`) FROM `ro_gift_points_to_post` WHERE author_id = ".$user_id;
     $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        $result = mysqli_fetch_all($sql);
        if($result>0){
            return $result[0][0] ;
        }
        else{
        return $result[0];
        }
        
    }
    else{
        return $result[0];
    }
}


function ro_totalGiftedPoints($user_id){
    global $wo, $sqlConnect;
    $total = 0;
    $posts_points = ro_totalGiftedPostsPoints($user_id);
    $total += $posts_points;
    return $total;
}

function ro_storeCategory(){
    global $wo, $sqlConnect;
    $query_one = "SELECT * FROM `ro_store_category`";
     $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        $result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        if($result>0){
               
            return $result ;
        }
        else{
        return 0;
        }
        
    }
    else{
        return false;
    }
}

function ro_storeSubCategory($category_id){
    global $wo, $sqlConnect;
    $query_one = "SELECT * FROM `ro_store_subcategory` WHERE `parent_id` = $category_id";
     $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        $result = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        if($result>0){
               
            return $result ;
        }
        else{
        return 0;
        }
        
    }
    else{
        return false;
    }
}

function ro_registerStore($r_data){
    global $wo, $sqlConnect;   
    $r_data['registered'] = date('n') . '/' . date("Y");
    $fields                          = '`' . implode('`, `', array_keys($r_data)) . '`';
    $data                            = '\'' . implode('\', \'', $r_data) . '\''; 
    $query_one = "INSERT INTO `ro_stores`({$fields}) VALUES ({$data})";
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {       
        return true;
    }
    else{
        return false;
    }
}

function ro_StoreExists($store_name = '') {
    global $sqlConnect;
    if (empty($store_name)) {
        return false;
    }
    $store_name = Wo_Secure($store_name);
    $query     = mysqli_query($sqlConnect, "SELECT COUNT(`store_id`) FROM `ro_stores` WHERE `store_name`= '{$store_name}' AND `active` = '1'");
    return (Wo_Sql_Result($query, 0) == 1) ? true : false;
}

function ro_StoreActive($store_name) {
    global $sqlConnect;
    if (empty($store_name)) {
        return false;
    }
    $store_name = Wo_Secure($store_name);
    $query     = mysqli_query($sqlConnect, "SELECT COUNT(`store_id`) FROM `ro_stores`  WHERE `store_name`= '{$store_name}' AND `active` = '1'");
    return (Wo_Sql_Result($query, 0) == 1) ? true : false;
}

function ro_StoreIdFromStorename($store_name = '') {
    global $sqlConnect;
    if (empty($store_name)) {
        return false;
    }
    $store_name = Wo_Secure($store_name);
    $query     = mysqli_query($sqlConnect, "SELECT `store_id` FROM `ro_stores` WHERE `store_name` = '{$store_name}'");
    return Wo_Sql_Result($query, 0, 'store_id');
}


function ro_StoreData($store_id = 0) {
    global $wo, $sqlConnect, $cache;
    if (empty($store_id) || !is_numeric($store_id) || $store_id < 0) {
        return false;
    }
    $data           = array();
    $store_id        = Wo_Secure($store_id);
    $query_one      = "SELECT * FROM `ro_stores` WHERE `store_id` = {$store_id}";
    $hashed_store_Id = md5($store_id);
    if ($wo['config']['cacheSystem'] == 1) {
        $fetched_data = $cache->read($hashed_store_Id . '_STORE_Data.tmp');
        if (empty($fetched_data)) {
            $sql          = mysqli_query($sqlConnect, $query_one);
            if (mysqli_num_rows($sql)) {
                $fetched_data = mysqli_fetch_assoc($sql);
                $cache->write($hashed_store_Id . '_STORE_Data.tmp', $fetched_data);
            }
                
        }
    } else {
        $sql          = mysqli_query($sqlConnect, $query_one);
        if (mysqli_num_rows($sql)) {
            $fetched_data = mysqli_fetch_assoc($sql);
        }
            
    }
    if (empty($fetched_data)) {
        return array();
    }
    $fetched_data['avatar']   = Wo_GetMedia($fetched_data['avatar']);
    $fetched_data['cover']    = Wo_GetMedia($fetched_data['cover']);
    $fetched_data['about']    = $fetched_data['store_description'];
    $fetched_data['id']       = $fetched_data['store_id'];
    $fetched_data['type']     = 'store';
    $fetched_data['url']      = Wo_SeoLink('index.php?link1=timeline&u=' . $fetched_data['store_name']);
    $fetched_data['name']     = $fetched_data['store_title'];
    $fetched_data['rating']   = ro_StoreRating($fetched_data['store_id']);
    $fetched_data['category'] = '';
    $fetched_data['store_sub_category'] = '';
    $fetched_data['is_reported'] = Wo_IsReportExists($fetched_data['store_id'], 'store');
    if (!empty($wo['store_categories'][$fetched_data['store_category']])) {
        $fetched_data['category'] = $wo['store_categories'][$fetched_data['store_category']];
    }
    if (!empty($fetched_data['sub_category']) && !empty($wo['store_sub_categories'][$fetched_data['store_category']])) {
        foreach ($wo['store_sub_categories'][$fetched_data['store_category']] as $key => $value) {
            if ($value['id'] == $fetched_data['sub_category']) {
                $fetched_data['store_sub_category'] = $value['lang'];
            }
        }
    }
    $fetched_data['is_store_onwer'] = false;
    $fetched_data['username']      = $fetched_data['store_name'];
    if ($wo['loggedin'] == true) {
        $fetched_data['is_store_onwer'] = (ro_IsStoreOnwer($fetched_data['store_id'])) ? true : false;
    }
    $fetched_data['fields'] = array();
    $fields = Wo_GetCustomFields('store'); 
    if (!empty($fields)) {
        foreach ($fields as $key => $field) {
            if (in_array($field['fid'], array_keys($fetched_data)) ) {
                $fetched_data['fields'][$field['fid']] = $fetched_data[$field['fid']];
            }
        }
    }

    return $fetched_data;
}



function ro_IsStoreOnwer($store_id) {
    global $sqlConnect, $wo;
    if ($wo['loggedin'] == false) {
        return false;
    }
    if (empty($store_id) || !is_numeric($store_id) || $store_id < 0) {
        return false;
    }
    $user_id = Wo_Secure($wo['user']['user_id']);
    if (empty($user_id) || !is_numeric($user_id) || $user_id < 0) {
        return false;
    }
    if (Wo_IsAdmin() || Wo_IsModerator()) {
        return true;
    }
    $query = mysqli_query($sqlConnect, " SELECT COUNT(`user_id`) FROM `ro_stores` WHERE `store_id` = {$store_id} AND `user_id` = {$user_id} AND `active` = '1'");
    return (Wo_Sql_Result($query, '0') == 1 || Wo_IsstoreAdminExists($user_id,$store_id)) ? true : false;
}


function Wo_IsStoreAdminExists($user_id = false, $store_id = false) {
    global $sqlConnect, $wo;
    if ($wo['loggedin'] == false || !is_numeric($user_id) || !is_numeric($store_id)) {
        return false;
    }
    $sql       = " SELECT `id` FROM `ro_store_admins` WHERE `user_id` = {$user_id} AND `store_id` = {$store_id} ";
    $data_rows = mysqli_query($sqlConnect, $sql);
    return mysqli_num_rows($data_rows) > 0;
}

function ro_StoreRating($store_id = false, $user_id = 0) {
    global $sqlConnect, $wo;
    if ($wo['loggedin'] == false || !$store_id || !is_numeric($store_id)) {
        return false;
    }
    $sql   = " SELECT `valuation` FROM `ro_stores_rating` WHERE `store_id` = {$store_id}";
    if (!empty($user_id) && is_numeric($user_id)) {
        $sql .= " AND user_id = '{$user_id}'";
    }
    $query = mysqli_query($sqlConnect, $sql);
    $one   = 0;
    $two   = 0;
    $three = 0;
    $four  = 0;
    $five  = 0;
    if ($query) {
        while ($fetched_data = mysqli_fetch_assoc($query)) {
            if ($fetched_data['valuation'] == 1) {
                $one += $fetched_data['valuation'];
            } else if ($fetched_data['valuation'] == 2) {
                $two += $fetched_data['valuation'];
            } else if ($fetched_data['valuation'] == 3) {
                $three += $fetched_data['valuation'];
            } else if ($fetched_data['valuation'] == 4) {
                $four += $fetched_data['valuation'];
            } else {
                $five += $fetched_data['valuation'];
            }
        }
    }
    if (($five + $four + $three + $two + $one) > 0) {
        return ($five * 5 + $four * 4 + $three * 3 + $two * 2 + $one * 1) / ($five + $four + $three + $two + $one);
    } else {
        return 0;
    }
}

function ro_IsStoreLiked($store_id = 0, $user_id = 0) {
    global $wo, $sqlConnect;
    if ($wo['loggedin'] == false) {
        return false;
    }
    if (empty($store_id) || !is_numeric($store_id) || $store_id < 0) {
        return false;
    }
    if (empty($store_id) || !is_numeric($user_id) || $user_id < 0) {
        $user_id = Wo_Secure($wo['user']['user_id']);
    }
    $query_one = mysqli_query($sqlConnect, "SELECT COUNT(`id`) FROM `ro_stores` WHERE `user_id` = '{$user_id}' AND `store_id` = {$store_id} AND `active` = '1'");
    return (Wo_Sql_Result($query_one, 0) == 1) ? true : false;
}

function ro_CountStoreLikes($store_id = 0) {
    global $wo, $sqlConnect;
    $data = array();
    if (empty($store_id) or !is_numeric($store_id) or $store_id < 1) {
        return false;
    }
    $store_id      = Wo_Secure($store_id);
    $query        = mysqli_query($sqlConnect, "SELECT COUNT(`store_id`) AS count FROM `ro_store_likes` WHERE `store_id` = {$store_id} AND `active` = '1' ");
    if (mysqli_num_rows($query)) {
        $fetched_data = mysqli_fetch_assoc($query);
        return $fetched_data['count'];
    }
    return false;
        
}









?>