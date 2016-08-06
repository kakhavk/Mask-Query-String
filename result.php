<?php
/*
 * Created By Kakhaber Kashmadze 
 * @version 0.1
 */
session_start();

$queryString=array();
$query=array();

$request=array();
$gender=array('Female','Male');


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
	<title>request test</title>
</head>
<body>	
<a href="index.php">Home</a><br ><br ><br >
<?php	
	echo 'Last Name : '.$request['lname']."<br />";
	echo 'First Name : '.$request['fname']."<br />";
	echo 'Gender : '.$gender[($request['gender'])]."<br />";
	echo 'Country : '.$request['country']."<br />";
?>
</body>
</html>
