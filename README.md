### Mask Query String With jQuery and Ajax

Sometime query string puts many information, also it is not good as visual in address bar to view query string.
Because I was created script which can help to solve this problem.

At this moment script is controled with php session, but can run in another programing languages. Instead session possible with cookie and database.
Query string will be stored in session and page will only request session sequence number which is id for query string in session.
Also possible convert numbers to charater codes.

Demo http://maskquerystring.hiutils.org/

Required:
jQuery, PHP


index.php
```sh

// Initialize sequence with session

session_start();
if(empty($_SESSION['sequence'])) $_SESSION['sequence']=0;

```

Use with form
```sh
// parse form fields and put to ajax and recieve sequence id from mask.php

<script>	
	$('#requesttestform').bind('keypress', function(e){
		if(e.keyCode==13){
			e.preventDefault();
			prepareRequest();
		}
		
	});
	
	$('#requesttestform').submit(function(e){
		e.preventDefault();
		prepareRequest();
	});
	
	function prepareRequest(){
		var queryString=$('#requesttestform').serialize();
		$.get('mask.php?'+queryString, function(data, status){
			if(data!=null && data.trim()!=""){
				window.location='result.php?c='+data;
			}
		});
	}
</script>

```
Use by clicking on element
```sh
<a onclick="parseRequest(<?php echo $id; ?>)">Click</a>

<script>
function prepareRequest(id){
	var queryString='serviceid=23&category=22&countryid=1';
	$.get('mask.php?id='+id+"&"+queryString, function(data, status){
		if(data!=null && data.trim()!=""){
			window.location='result.php?c='+data;
		}
	});
}
</script>

```



mask.php

```sh

// returns sequence number as request id

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

```

result.php
```sh
// recieve query strings id in session with c parameter, parse and assign to array $request 

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


echo ' Last Name : '.$request['lname'];
echo ' First Name : '.$request['fname'];
echo ' Gender : '.$gender[($request['gender'])];
echo ' Country : '.$request['country'];

```
