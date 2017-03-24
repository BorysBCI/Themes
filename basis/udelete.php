<?php
  mysql_connect("127.0.0.1","tandemnsi","iVBjUYpeDsDa8COZ");
			mysql_select_db("wp_tandemnsi");

	//$id =$_REQUEST['id'];
	$id = $_GET['id'];
	//mysql_query("DELETE FROM wp_users WHERE id = '$id'")
	mysql_query("DELETE FROM wp_users WHERE id = '$id'")
	or die(mysql_error());  	
	
	//header("Location: http://www.tandemnsi.com/wp-admin/admin.php?page=settings");
	header("Location: http://www.tandemnsi.com/wp-admin/admin.php?page=user_settings");
?> 