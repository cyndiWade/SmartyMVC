<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>shopp管理系统</title>
<link rel="stylesheet" type="text/css" href="templates/admin/css/basic.css" />
<link rel="stylesheet" type="text/css" href="templates/admin/css/admin.css" />
<script type="text/javascript" src="templates/admin/js/iframe.js" ></script>
<script type="text/javascript" src="templates/admin/js/channel.js" ></script>

</head>
<body>

<form method="post" action="">
	<input type="text" name="user" /> 
	<br />
	<input type="text" name="pass" /> <input type="text" name="level" /> 
	<br />
	<input type="submit" value="提交" /> 
	
</form>

{foreach from=$content item=vo  key=i} 
<p>{$i+1}</p>
<p>{$vo->id}</p>
<p>{$vo->user}</p>
{/foreach}



</body>
</html>