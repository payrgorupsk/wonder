<?php
if (isset($_GET['store'])) {
    if (ro_StoreExists($_GET['store']) === true ) {
        $store_id            = ro_StoreIdFromStorename($_GET['store']);
        $wo['store_profile'] = ro_StoreData($store_id);
    } else {
        header("Location: " . Wo_SeoLink('index.php?link1=404'));
        exit();
    }
} else {
    // header("Location: " . $wo['config']['site_url']);
    // exit();
    $page_id            = Wo_PageIdFromPagename("GolpoKotha");
        $wo['page_profile'] = Wo_PageData($page_id);
}
// if (isset($_GET['boosted']) && $wo['config']['pro'] == 1 && $wo['loggedin'] == true && $wo['page_profile']['boosted'] == 0) {
// 	if ($wo['page_profile']['is_page_onwer'] == true) {
// 		if ($wo['user']['is_pro'] == 1) {
// 			if ($wo['user']['pro_type'] > 1) {
// 				$array = array('boosted' => 1);
// 				$update = Wo_UpdatePageData($page_id, $array);
// 			}
// 		}
// 	}
// }
// if ($wo['config']['pages'] == 0) {
//     header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
//     exit();
// }
$wo['description'] = $wo['store_profile']['store_description'];
$wo['keywords']    = '';
$wo['page']        = 'page';
$wo['title']       = $wo['store_profile']['name'];
$wo['content']     = Wo_LoadPage('store/content');