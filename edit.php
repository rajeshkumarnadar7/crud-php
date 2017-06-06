<?php 
require_once("conn.php");
session_start();
if(!array_key_exists('id', $_SESSION))
{
	header("Location: index.php?msg=Opps Sorry :(");
}
error_reporting(E_ALL);
$id=$_GET['id'];
$query="select * from students_details where id=".$id;
$query_execute=mysqli_query($conn,$query);
$fetch_data=mysqli_fetch_assoc($query_execute);
?>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  	  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
  	  
    <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd',maxDate: new Date() });
   
  } );
    
  </script>

<title>EDIT</title>
</head>
<body>
	<h3 align="center">Admin Dashboard</h3>
	<table width="1200px" height="35px" cellpadding="5" cellspacing="5" border="0" align="center">
		<tr>
			<td width="300px" align="left">Welcome <?php echo ucwords($_SESSION['id'])?></td>
			<td width="300px"></td>
			<td width="300px" align="right"><a href="logout.php"> Logout </a></td>
		</tr>	
	</table>
	<br>
<form method="post" action="update.php" name="update">
	    <table width="600px" height="35px" cellpadding="5" cellspacing="5" border="0" align="center">
		<tr>
			<td width="300px" align="left">Name</td>
			<td width="300px" align="left"><input type="text" name="name" id="name" value="<?php echo $fetch_data['name'];?>"></td>
      <td  width="300px" align="left">
        <font size="3" color="red"> 
        <?php if (array_key_exists('nameErr', $_GET)) {
          echo $_GET['nameErr'];
        } ?>
      </font></td>
		</tr>
		<tr>
			<td width="300px" align="left">Roll No</td>
			<td width="300px" align="left"><input type="text" name="roll_no" id="roll_no" value="<?php echo $fetch_data['roll_no']; ?>" ></td>
      <td width="300px" align="left"><font size="3" color="red"> 
        <?php if (array_key_exists('rollnoerr', $_GET)) {
          echo $_GET['rollnoerr'];
        } ?>
      </font></td>
		</tr>
		<tr>
			<td width="300px" align="left">DOB</td>
			<td width="300px" align="left"><input type="text" id="datepicker" name="date" value="<?php echo $fetch_data['date']; ?>" ></td>
      <td width="300px" align="left"><font size="3" color="red"> 
        <?php if (array_key_exists('doberr', $_GET)) {
          echo $_GET['doberr'];
        } ?>
      </font></td>
		</tr>

		<tr>
			<td width="300px" align="left">Address</td>
			<td width="300px" align="left"><textarea cols="20" rows="5" type="text" name="address" id="address" ><?php echo $fetch_data['address']; ?></textarea></td>
      <td width="300px" align="left"><font size="3" color="red"> 
        <?php if (array_key_exists('addresserr', $_GET)) {
          echo $_GET['addresserr'];
        } ?>
      </font></td>
		</tr>
		<tr>
			<td width="300px" align="left">Mobile</td>
			<td width="300px" align="left"><input type="text" name="mobile" id="mobile" value="<?php echo $fetch_data['mobile']; ?>" placeholder="+91"></td>
		  <td width="300px" align="left"><font size="3" color="red"> 
        <?php if (array_key_exists('moberr', $_GET)) {
          echo $_GET['moberr'];
        } ?>
      </font></td>
    </tr>
		<tr>
			<td width="300px" align="left">Email</td>
			<td width="300px" align="left"><input type="text" name="email" id="email" value="<?php echo $fetch_data['email'];?> "required readonly ></td>
		  <td width="300px" align="left"><font size="3" color="red"></td>
    </tr>
		<tr>

		</tr>	
		<tr>
			<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
			<td width="300px" align="center"><input type="submit" id="login" name="login" value="Update"></td>
		
		</tr>
	</form>
</body>
 <script>

$(function() {
  
  $("form[name='insert']").validate({
    
    rules: {
      
      name: {
        required: true,
        lettersonly: true,
        maxlength: 30,
        minlength: 5
        
      },
      roll_no: {
        required: true,
        number: true,
        maxlength: 11,
        minlength: 3
        
      },
      address: {
        required: true,
        maxlength: 255,
        minlength: 10
        
      },
      date: {
        required: true,
        date: true
      },
      email: {
        required: true,
        email: true
      },
      mobile: {
        required: true,
        number: true,
        maxlength: 10,
        minlength: 10
        
      }
    },
   
     messages: {
      name: {
      	 required: "Please provide Your Name",
        maxlength: "Please Enter Less Then 30 Character",
        minlength: "Please Enter More Then 3 Character",
        lettersonly: "Please Enter Alphabet"
  		},
  		address: {
      	 required: "Please provide Your Address",
        maxlength: "Please Enter Less Then 255 Character",
        minlength: "Please Enter More Then 10 Character",
        number: "Please Enter Alphabet"
  		},
      date: "Pleae Select the DOB",
      roll_no: {
      	required: "Please provide Your Roll Number",
        maxlength: "Please Enter Less Then 11 Character",
        minlength: "Please Enter More Then 3 Character",
        number: "Please Enter Number"
  		},
      mobile: {
        required: "Please provide a mobile",
        maxlength: "Please Enter Your 10 Digit Mobile Number",
        minlength: "Please Enter Your 10 Digit Mobile Number",
        number: "Please Enter Number"
      },
      email: "Please enter a valid email address"
    },
    
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>


</html>
