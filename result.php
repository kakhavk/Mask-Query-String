<?php
/*
 * Created By Kakhaber Kashmadze 
 * @version 0.1.1
 */
session_start();

$queryString=array();
$query=array();

$request=array();
$gender=array(null, 'Male', 'Female');


if(!empty($_REQUEST['c'])){
	$c=trim($_REQUEST['c']);
	$queryString=explode('&', $_SESSION['request'][$c]);
	foreach($queryString as $v){
		$query=explode('=',$v);
		$request[($query[0])]=$query[1];
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mask Query String With jQuery and Ajax</title>
	<link rel="stylesheet" href="bootstrap.min.css" />
	<script src="jquery.min.js"></script>
	<style type="text/css">
		.wrapper{
			margin:30px 10px 10px 40px;
		}
	</style>
</head>
<body>	
<div class="wrapper">
	<a href="index.php"><h4>Home</h4></a>
	<h3>Mask Query String With Jquery and Ajax</h3>
	
	<?php	
		echo 'Last Name : '.$request['lname']."<br />";
		echo 'First Name : '.$request['fname']."<br />";
		echo 'Gender : '.$gender[($request['gender'])]."<br />";
		echo 'Country : '.$request['country']."<br />";
	?>
</div>
</body>
</html>
