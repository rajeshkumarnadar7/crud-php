<?php
require_once("conn.php");
session_start();


$username=$_POST['username'];
$password=$_POST['password'];
$select_query="select * from user_login where username='".$username."' and password='".md5($password)."'";
$select_query_execute=mysqli_query($conn,$select_query);
$row_count=mysqli_num_rows($select_query_execute);
if($row_count==1)
{
	$_SESSION['id']=$_POST['username'];
	header("Location: dashboard.php");
}
else
{
	
	header("Location: index.php?msg=Login Failed");
}
?>