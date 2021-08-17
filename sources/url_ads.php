<?php

if ($wo['loggedin'] == false ) {
  header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
  exit();

}
if ($wo['user']['wallet'] == 0 || $wo['user']['wallet'] == '0.00') {
	$user_id = $wo['user']['user_id'];
	$query = mysqli_query($sqlConnect, "UPDATE " . T_USER_ADS . " SET status = 0 WHERE user_id = '$user_id'");
}
$wo['description'] = $wo['config']['siteDesc'];
$wo['keywords']    = $wo['config']['siteKeywords'];
$wo['page']        = 'ads';
$wo['ap']          = 'url-ads';
$wo['title']       = $wo['lang']['ads'];
// $wo['ads']         = Wo_GetMyAds();
if($_GET['link1']=='url-ads'){
  $wo['content']     = Wo_LoadPage('url_ads/ads');
}
elseif($_GET['link1']=='view-ads'){  
  $wo['content']     = Wo_LoadPage('url_ads/view_ads');
}
elseif($_GET['link1']=='confirm-view-ads'){
  ro_userAdsAssignment($_GET['adid']);
  
  // else{
  //   $_SESSION['ads_notify'] = "Ad is not available yet";
  // }
  //$wo['content']     = Wo_LoadPage('url_ads/ads');
  header("Location: " . $wo['config']['site_url']."/url-ads");
  exit();
}

 ?>