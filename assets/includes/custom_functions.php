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
        if($timediff['cdown']>="01:00:01"){            
            return true;
        }
        else{            
            return false;
        }
    }
    else{
        $_SESSION['ads_notify'] = "failed";
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
    $query_one = "UPDATE `wo_users` SET `points` = `points`+".Wo_GetAdPoint($adid,true)." WHERE `user_id` =".$wo['user']['user_id'];  
    // $query_one = "INSERT INTO `ro_user_ads`(`user_id`, `ads_id`, `seen_count`, `view_points`, `last_view_time`, `status`) VALUES (".$wo['user']['user_id'].",".Wo_GetAdId($adid,true).",1,".Wo_GetAdPoint($adid,true).",NOW(),1);";
    $sql       = mysqli_query($sqlConnect, $query_one);
    if ($sql) {
        
        return true;
    }
    else{
        return false;
    }
}
?>