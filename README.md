### Mask Query String With jQuery and Ajax

Sometime query string puts many information, also it is not good as visual in address bar to view query string.
Because I was created script which can help to solve this problem.

At this moment script is controled with php session, but can run in another programing languages. Instead session possible with cookie and database.
Query string willb e stored in session and page will only request session sequence number which is id for query string in session.
Also possible convert numbers to charater codes.

Demo http://maskquerystring.hiutils.org/

Required:
jQuery, PHP


```sh

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
