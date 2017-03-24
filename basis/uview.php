<?php
mysql_connect("127.0.0.1","tandemnsi","iVBjUYpeDsDa8COZ");
			mysql_select_db("wp_tandemnsi");
$id =$_REQUEST['Id'];

//$result = mysql_query("SELECT * FROM DB_Company WHERE Id  = '$id'");
$result = mysql_query("SELECT wp_usermeta.user_id,  wp_usermeta.meta_value as first_name,m2.meta_value as last_name
  FROM wp_usermeta
  INNER JOIN wp_usermeta as m2 ON wp_usermeta.user_id = m2.user_id
  WHERE (wp_usermeta.meta_key = 'first_name' 
  AND m2.meta_key = 'last_name')");
$tests = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$first_name=$tests['first_name'] ;
				$last_name= $tests['last_name'] ;					
				/* $website=$test['website'] ;
				$Category=$test['Category'] ;
				$Category2=$test['Category2'] ;
				$liner1=$test['liner1'] ;
				$address_1=$test['address_1'] ;
				$address_2=$test['address_2'] ;
				$city=$test['city'] ;
				$state=$test['state'] ;
				$zip_code=$test['zip_code'] ;
				$lat=$test['lat'] ;
				$lng=$test['lng'] ; */

if(isset($_POST['save']))
{	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
/* 	$website = $_POST['website'];
	$Category = $_POST['Category'];
	$Category2 = $_POST['Category2'];
	$liner1 = $_POST['liner1'];
	$address_1 = $_POST['address_1'];
	$address_2 = $_POST['address_2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip_code = $_POST['zip_code'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng']; */

	mysql_query("UPDATE DB_Company SET nameCompany ='$nameCompany', address ='$address',
		 website ='$website', Category ='$Category', Category2 ='$Category2', liner1 ='$liner1', address_1 ='$address_1', address_2 ='$address_2',  city ='$city',  state ='$state', zip_code ='$zip_code', lat ='$lat', lng ='$lng' 
		 
		 WHERE Id = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	//header("Location: http://www.tandemnsi.com/wp-admin/admin.php?page=settings");		
}
mysql_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
</head>

<body>
<form method="post">
<table>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="first_name" value="<?php $_POST['last_name']; ?>"/></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><input type="text" name="last_name" value="<?php echo $last_name; ?>"/></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" value="<?php echo $email ?>"/></td>
	</tr>
	<tr>
		<td>Organization</td>
		<td><input type="text" name="organization" value="<?php echo $organization ?>"/></td>
	</tr>
	<tr>
		<td>Title</td>
		<td><input type="text" name="title" value="<?php echo $title ?>"/></td>
	</tr>
	<tr>
		<td>User street address</td>
		<td><input type="text" name="street_address" value="<?php echo $street_address ?>"/></td>
	</tr>
	<tr>
		<td>User city</td>
		<td><input type="text" name="user_city" value="<?php echo $user_city ?>"/></td>
	</tr>
	<tr>
		<td>User state</td>
		<td><input type="text" name="user_state" value="<?php echo $user_state ?>"/></td>
	</tr>
	<tr>
		<td>User phone</td>
		<td><input type="text" name="user_phone" value="<?php echo $user_phone ?>"/></td>
	</tr>
	
	<!--<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save"  class="button-primary"/></td>
	</tr>-->
		<a class="button" href="http://www.tandemnsi.com/wp-admin/admin.php?page=user_settings">Back to user list</a>

</table>
</body>
</html>