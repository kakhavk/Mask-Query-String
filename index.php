<?php
/*
 * Created By Kakhaber Kashmadze 
 * @version 0.1
 */
session_start();

if(empty($_SESSION['sequence'])) $_SESSION['sequence']=0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mask Query String With Jquery and Ajax</title>
	<link rel="stylesheet" href="bootstrap.min.css" />
	<script src="jquery.min.js"></script>
	<style type="text/css">
		.wrapper{
			margin:30px 10px 10px 10px;
		}
		
		.field-block{
			display:inline-block;
			clear:both;			
			border:1px solid #CCCCCC;
			padding:10px;
		}
		
		.field-label{
			float:left;
			margin:5px 5px 0 5px;
			width:150px;
			text-align:right;
		}
		
		.field-value{
			float:left;
			margin:5px 5px 0 5px;
			width:185px;
			text-align:left;
		}
		
		.field-submit{
			float:left;
			margin:5px 5px 0 5px;
			width:345px;
			text-align:right;
		}
		
		br{
			clear:both;
			height:1px;
		}
		.github-block{
			margin:10px;
		}
	</style>
</head>
<body>
<div class="wrapper">
	<h3>Mask Query String With Jquery and Ajax</h3>
	<form id="requesttestform" action="index.php">
		<div class="field-block">
			<div class="field-label">Last Name:</div>
			<div class="field-value"><input type="text" class="form-control" id="lname" name="lname" value="" /></div>
		</div>
		<br />
		<div class="field-block">
			<div class="field-label">First Name:</div>
			<div class="field-value"><input type="text" class="form-control" id="fname" name="fname" value="" /></div>
		</div>
		<br />
		<div class="field-block">
			<div class="field-label">Gender:</div>
			<div class="field-value">
				<select class="form-control" id="gender" name="gender">
					<option></option>
					<option value="1">Male</option>
					<option value="2">Female</option>
				</select>
			</div>
		</div>
		<br />
		<div class="field-block">
			<div class="field-label">Country:</div>
			<div class="field-value">
				<div class="field-value"><input class="form-control" type="text" id="country" name="country" value="" /></div>
			</div>
		</div>
		<br />
		<div class="field-block">
			<div class="field-submit"><input class="btn btn-primary" type="submit" id="submit" name="submit" /></div>
		</div>
	</form>
</div>

<div class="github-block">
	Project on Github:<a href="https://github.com/opensoftge/converter-i18n"> https://github.com/kakhavk/Mask-Query-String</a>
</div>
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
</body>
</html>
