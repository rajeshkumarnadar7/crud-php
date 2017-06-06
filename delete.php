<?php
require_once("conn.php");
session_start();
if(!array_key_exists('id', $_SESSION))
{
	header("Location: index.php?msg=Opps Sorry :(");
}
if(!array_key_exists('id',$_GET))
{
     header("Location: dashboard.php?msg=id not found");	
}
else
{	
$id=$_GET['id'];
$query_delete="delete from students_details where id=".$id;
$query_delete_execute=mysqli_query($conn,$query_delete);
if($query_delete_execute)
{
header("Location: dashboard.php?msg=success");
}
else
{
header("Location: dashboard.php?msg=fail");	
}	 
}
?>
