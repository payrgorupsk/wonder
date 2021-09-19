<?php
if ($wo['loggedin'] == false) {
  header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
  exit();
}
if ($wo['config']['pages'] == 0) {
	header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
    exit();
}
$wo['description']      = $wo['config']['siteDesc'];
$wo['keywords']         = $wo['config']['siteKeywords'];
$wo['page']             = 'create_store';
$wo['title']            = 'Create New Store';
$wo['store_categories'] = ro_storeCategory();
foreach($wo['store_categories'] as $key=>$category){
  $wo['store_subcategories'][$category['id']] = ro_storeSubCategory($category['id']);
}
$wo['content']          = Wo_LoadPage('store/create-page');