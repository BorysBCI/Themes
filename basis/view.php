<?php
mysql_connect("127.0.0.1","tandemnsi","iVBjUYpeDsDa8COZ");
			mysql_select_db("wp_tandemnsi");
$id =$_REQUEST['Id'];

$result = mysql_query("SELECT * FROM DB_Company WHERE Id  = '$id'");
$test = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$nameCompany=$test['nameCompany'] ;
				$address= $test['address'] ;					
				$website=$test['website'] ;
				$Category=$test['Category'] ;
				$Category2=$test['Category2'] ;
				$liner1=$test['liner1'] ;
				$address_1=$test['address_1'] ;
				$address_2=$test['address_2'] ;
				$city=$test['city'] ;
				$state=$test['state'] ;
				$zip_code=$test['zip_code'] ;
				$lat=$test['lat'] ;
				$lng=$test['lng'] ;

if(isset($_POST['save']))
{	
	$nameCompany = $_POST['nameCompany'];
	$address = $_POST['address'];
	$website = $_POST['website'];
	$Category = $_POST['Category'];
	$Category2 = $_POST['Category2'];
	$liner1 = $_POST['liner1'];
	$address_1 = $_POST['address_1'];
	$address_2 = $_POST['address_2'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip_code = $_POST['zip_code'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];

	mysql_query("UPDATE DB_Company SET nameCompany ='$nameCompany', address ='$address',
		 website ='$website', Category ='$Category', Category2 ='$Category2', liner1 ='$liner1', address_1 ='$address_1', address_2 ='$address_2',  city ='$city',  state ='$state', zip_code ='$zip_code', lat ='$lat', lng ='$lng' 
		 
		 WHERE Id = '$id'")
				or die(mysql_error()); 
	echo "Saved!";
	
	header("Location: http://www.tandemnsi.com/wp-admin/admin.php?page=settings");		
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
		<td>nameCompany:</td>
		<td><input type="text" name="nameCompany" value="<?php echo $nameCompany ?>"/></td>
	</tr>
	<tr>
		<td>address</td>
		<td><input type="text" name="address" value="<?php echo $address ?>"/></td>
	</tr>
	<tr>
		<td>website</td>
		<td><input type="text" name="website" value="<?php echo $website ?>"/></td>
	</tr>
	<tr>
		<td>Category</td>
		<td><input type="text" name="Category" value="<?php echo $Category ?>"/></td>
	</tr>
	<tr>
		<td>Category2</td>
		<td><input type="text" name="Category2" value="<?php echo $Category2 ?>"/></td>
	</tr>
	<!--<tr>
		<td>liner1</td>
		<td><input type="text" name="liner1" value="<?php echo $liner1 ?>"/></td>
	</tr>-->
	<tr>
		<td>address_1</td>
		<td><input type="text" name="address_1" value="<?php echo $address_1 ?>"/></td>
	</tr>
	<tr>
		<td>address_2</td>
		<td><input type="text" name="address_2" value="<?php echo $address_2 ?>"/></td>
	</tr>
	<tr>
		<td>city</td>
		<td><input type="text" name="city" value="<?php echo $city ?>"/></td>
	</tr>
	<tr>
		<td>state</td>
		<td><input type="text" name="state" value="<?php echo $state ?>"/></td>
	</tr>
	<tr>
		<td>zip_code</td>
		<td><input type="text" name="zip_code" value="<?php echo $zip_code ?>"/></td>
	</tr>
	<tr>
		<td>lat</td>
		<td><input type="text" name="lat" value="<?php echo $lat ?>"/></td>
	</tr>
	<tr>
		<td>lng</td>
		<td><input type="text" name="lng" value="<?php echo $lng ?>"/></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save"  class="button-primary"/></td>
	</tr>
		<a class="button" href="http://www.tandemnsi.com/wp-admin/admin.php?page=settings">Back to edit list</a>

</table>
</body>
</html>