<?php
if (isset($_GET['store'])) {
    if (Wo_PageExists($_GET['store']) === true && Wo_PageActive($_GET['store'])) {
        $page_id            = Wo_PageIdFromPagename($_GET['store']);
        $wo['page_profile'] = Wo_PageData($page_id);
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
if (isset($_GET['boosted']) && $wo['config']['pro'] == 1 && $wo['loggedin'] == true && $wo['page_profile']['boosted'] == 0) {
	if ($wo['page_profile']['is_page_onwer'] == true) {
		if ($wo['user']['is_pro'] == 1) {
			if ($wo['user']['pro_type'] > 1) {
				$array = array('boosted' => 1);
				$update = Wo_UpdatePageData($page_id, $array);
			}
		}
	}
}
if ($wo['config']['pages'] == 0) {
    header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description'] = $wo['page_profile']['page_description'];
$wo['keywords']    = '';
$wo['page']        = 'page';
$wo['title']       = $wo['page_profile']['name'];
$wo['content']     = Wo_LoadPage('store/content');