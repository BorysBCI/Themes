 <?php  
 $connect = mysqli_connect("127.0.0.1", "tandemnsi", "iVBjUYpeDsDa8COZ", "wp_tandemnsi");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE DB_Company SET ".$column_name."='".$text."' WHERE id='".$id."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>  