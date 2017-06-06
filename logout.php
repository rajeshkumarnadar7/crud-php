<?php
session_start();
if(!array_key_exists('id', $_SESSION))
{
	header("Location: index.php?msg=Opps Sorry :(");
}
else
{
	header("Location: index.php?msg=Log Out ");
		session_destroy();
}	
?>