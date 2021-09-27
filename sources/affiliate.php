<?php 
if ($wo['loggedin'] == false) {
  header("Location: " . $wo['config']['site_url']);
  exit();
}
if (Wo_CanBlog() == false) {
	header("Location: " . $wo['config']['site_url']);
    exit();
}

$wo['description'] = '';
$wo['keywords']    = '';
$wo['page']        = 'Affiliate';
$wo['title']       = $wo['lang']['my_articles'];
$wo['content']     = Wo_LoadPage('affiliate/affiliate');