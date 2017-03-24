<?php
  mysql_connect("127.0.0.1","tandemnsi","iVBjUYpeDsDa8COZ");
			mysql_select_db("wp_tandemnsi");

	$id =$_REQUEST['Id'];
	
	
	// sending query
	mysql_query("DELETE FROM DB_Company WHERE Id = '$id'")
	or die(mysql_error());  	
	
	header("Location: http://www.tandemnsi.com/wp-admin/admin.php?page=settings");
?> 