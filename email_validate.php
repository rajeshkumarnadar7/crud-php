<?php 
require_once("conn.php");
$email=$_POST['email'];
$select_query="select * from students_details where email='".$email."'";
$select_query_execute=mysqli_query($conn,$select_query);
$row_count=mysqli_num_rows($select_query_execute);
if($row_count==1)
{
	
	 $user="User Already Exists";
}
else
{
	  //$user="User Not Exists";
	
}

?>
<h4 id="email_response" name="email_response"><?php echo $user ?></h4>


	 