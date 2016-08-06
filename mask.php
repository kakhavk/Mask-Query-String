<?php
session_start();
$queryString="";
$i=0;
$sequence=null;

foreach($_REQUEST as $k => $v){
	if($i!=0) $queryString.="&";
	if(!empty($v)) $queryString.=$k."=".$v;
	$i++;
}

$_SESSION['sequence']++;
$sequence=$_SESSION['sequence'];
$_SESSION['request'][$sequence]=$queryString;
echo $sequence;
