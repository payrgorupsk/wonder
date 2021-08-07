
<?php 



session_start();

require_once('../assets/includes/cache.php');
require_once('../assets/includes/functions_general.php');
require_once('../assets/includes/tabels.php');
require_once('../assets/includes/functions_one.php');
// require_once('includes/functions_two.php');
require_once('../assets/includes/functions_three.php');
if(isset($_SESSION) && isset($_SESSION['user_id'])){
    require_once('../config.php');
    require_once('../assets/libraries/DB/vendor/autoload.php');
    $wo           = array();
// Connect to SQL Server
$sqlConnect   = $wo['sqlConnect'] = mysqli_connect($sql_db_host, $sql_db_user, $sql_db_pass, $sql_db_name, 3306);
// Handling Server Errors
$ServerErrors = array();
if (mysqli_connect_errno()) {
    $ServerErrors[] = "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (!function_exists('curl_init')) {
    $ServerErrors[] = "PHP CURL is NOT installed on your web server !";
}
if (!extension_loaded('gd') && !function_exists('gd_info')) {
    $ServerErrors[] = "PHP GD library is NOT installed on your web server !";
}
if (!extension_loaded('zip')) {
    $ServerErrors[] = "ZipArchive extension is NOT installed on your web server !";
}

$query = mysqli_query($sqlConnect, "SET NAMES utf8mb4");
if (isset($ServerErrors) && !empty($ServerErrors)) {
    foreach ($ServerErrors as $Error) {
        echo "<h3>" . $Error . "</h3>";
    }
    die();
}
$config              = Wo_GetConfig();
$db                  = new MysqliDb($sqlConnect);

$all_langs           = Wo_LangsNamesFromDB();

foreach ($all_langs as $key => $value) {
    $insert = false;
    if (!in_array($value, array_keys($config))) {
        $db->insert(T_CONFIG,array('name' => $value, 'value' => 1));
        $insert = true;
    }
}
if ($insert == true) {
    $config = Wo_GetConfig();
}

if( ISSET( $_GET['theme'] ) && in_array($_GET['theme'], ['default', 'sunshine', 'wowonder'])){
    $_SESSION['theme'] = $_GET['theme'];
}

if( ISSET( $_SESSION['theme'] )   && !empty($_SESSION['theme'])){
    $config['theme'] = $_SESSION['theme'];
    if( $_SERVER["REQUEST_URI"] == "/v2/wonderful" || $_SERVER["REQUEST_URI"] == "/v2/wowonder" ){
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

// Config Url
$config['theme_url'] = $site_url . '/themes/' . $config['theme'];

$config['site_url']  = $site_url;
$wo['site_url']      = $site_url;
$s3_site_url         = 'https://test.s3.amazonaws.com';
if (!empty($config['bucket_name'])) {
    $s3_site_url = "https://{bucket}.s3.amazonaws.com";
    $s3_site_url = str_replace('{bucket}', $config['bucket_name'], $s3_site_url);
}
$config['s3_site_url'] = $s3_site_url;

$s3_site_url_2         = 'https://test.s3.amazonaws.com';
if (!empty($config['bucket_name_2'])) {
    $s3_site_url_2 = "https://{bucket}.s3.amazonaws.com";
    $s3_site_url_2 = str_replace('{bucket}', $config['bucket_name_2'], $s3_site_url_2);
}
$config['s3_site_url_2'] = $s3_site_url_2;


$wo['config']              = $config;
$ccode                     = Wo_CustomCode('g');
$ccode                     = (is_array($ccode))  ? $ccode    : array();
$wo['config']['header_cc'] = (!empty($ccode[0])) ? $ccode[0] : '';
$wo['config']['footer_cc'] = (!empty($ccode[1])) ? $ccode[1] : '';
$wo['config']['styles_cc'] = (!empty($ccode[2])) ? $ccode[2] : '';

$wo['site_pages'] = array(
    'home',
    'welcome',
    'activate',
    'search',
    'timeline',
    'pages',
    'page',
    'groups',
    'group',
    'create-group',
    'group-setting',
    'create-page',
    'setting',
    'page-setting',
    'messages',
    'logout',
    '404',
    'post',
    'games',
    'saved-posts',
    'hashtag',
    'terms',
    'contact-us',
    'albums',
    'album',
    'game',
    'go_pro',
    'upgraded',
    'oops',
    'user_activation',
    'boosted-pages',
    'boosted-posts',
    'video-call',
    'read-blog',
    'blog',
    'My-Blogs',
    'edit-blog',
    'create_blog',
    'developers',
    'ads',
    'password-reset',
    'admin-cp',
    'admincp',
    'adminPages',
    'start-up',
    'activated',
    'ads-create',
    'app',
    'messages',
    'terms',
    'video-call',
    'video-call-api',
    'post',
    'game',
    'upgraded',
    'get_news_feed',
    'new-game',
    'go-pro',
    'oops',
    'user-activation',
    'hashtag',
    'follow-requests',
    '404',
    'register',
    'confirm-sms',
    'forgot-password',
    'activate',
    'pages',
    'create-group',
    'create-page',
    'logout',
    'contact-us',
    'setting',
    'messages',
    'albums',
    'album',
    'products',
    'my-products',
    'blogs',
    'sharer',
    'app_api',
    'api_request',
    'authorize',
    'advertise'
);

$wo['script_version']  = $wo['config']['version'];
$http_header           = 'http://';
if (!empty($_SERVER['HTTPS'])) {
    $http_header = 'https://';
}
$wo['actual_link']   = $http_header . $_SERVER['HTTP_HOST'] . urlencode($_SERVER['REQUEST_URI']);
// Define Cache Vireble
$cache               = new Cache();

if (!is_dir('cache')) {
    $cache->Wo_OpenCacheDir();
}

$wo['purchase_code'] = '';
if (!empty($purchase_code)) {
    $wo['purchase_code'] = $purchase_code;
}
$wo['title']= "Ads";
$wo['description']= "Ads";
$wo['keywords']= "Ads";

include('../sources/url_ads.php');
    echo 'working';
}
?>