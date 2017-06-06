<?php
session_start();
if(!array_key_exists('id', $_SESSION))
{
	header("Location: index.php?msg=Opps Sorry :(");
}

$servername="localhost";
$username="root";
$password="root";
$db="rajesh";
$conn=mysqli_connect($servername,$username,$password,$db);
if($conn)
{
//echo "connected";
}
else
{
echo "not connected";
}

?>