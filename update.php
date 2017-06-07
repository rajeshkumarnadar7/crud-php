<?php
require_once("conn.php");
session_start();
if(!array_key_exists('id', $_SESSION) )
{
	header("Location: index.php?msg=Opps Sorry :(");
}

$nameErr=$emailErr=$rollnoerr=$dateerr=$addresserr=$moberr=$doberr="";
$id=$_POST['id'];
if (empty($_POST["name"])) {
		$nameErr = "Name is required";
		} else {
				$name=$_POST['name'];
				if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				$nameErr = "Only letters and white space allowed";
}
}
if (empty($_POST["roll_no"])) {
$rollnoerr = "Roll No is required";
} else {
$roll_no=$_POST['roll_no'];
if (!preg_match("/^[1-9][0-9]*$/",$roll_no)) {
$rollnoerr = "Invalid Roll No Number";
}
}

if (empty($_POST["mobile"])) {
$moberr = "Mobile Number is required";
} else {
$mobile=$_POST['mobile'];
if (!preg_match("/^\d{10}$/",$mobile)) {
$moberr = "Invalid mobile Number";
}
}

if (empty($_POST["address"])) {
		$addresserr = "Address is required";
		} else {
				$address=$_POST['address'];
				}

if (empty($_POST["date"])) {
		$doberr = "DOB is required";
		} else {
					$dob=$_POST['date'];
					if (!preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]*$/",$dob))
	    			{
	      			 $doberr = "Invalid DOB";
					}
    			}
				 

if(!empty($nameErr) || !empty($rollnoerr) || !empty($moberr) ||  !empty($addresserr) ||  !empty($doberr) )
{

header("Location: edit.php?"."id=".$id."&nameErr=".$nameErr."&rollnoerr=".$rollnoerr."&moberr=".$moberr."&addresserr=".$addresserr."&doberr=".$doberr);
}
else
{
	
	$query_update="update students_details set name='".$name."',roll_no='".$roll_no."',date='".$dob."',address='".$address."',mobile='".$mobile."' where id='".$id."' ";
	$query_execute=mysqli_query($conn,$query_update);

	if($query_execute)
	{
	header("Location: dashboard.php?msg=success");
	}
	else
	{
	header("Location: dashboard.php?msg=fail");	
	}
}
?>