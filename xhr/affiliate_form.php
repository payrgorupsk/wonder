<?php

global $wo, $sqlConnect;

$user_id =  $wo['user']['user_id'];
$platform = $_POST['prom_platform'];
$platform_id = $_POST['prom_id'];

$sql = mysqli_query($sqlConnect, "INSERT INTO " . T_AFFILIATE . " (`user_id`, `platform`, `platform_id`) VALUES (".$user_id.", '".$platform."', '".$platform_id."')");

if($sql){

	echo 'Successfully Submitted for Affiliate Market';
}
else{

	echo 'Oops ! Something Went Wrong...Try Again !!!';
}
exit();
?>