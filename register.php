<?php 
$con = mysqli_connect("localhost", "root", "", "social"); //connection to mysql variable

if(mysqli_connect_errno())
{
 	echo "Failed to connect:" . mysqli_connect_errno();
}

//Variables to prevent errors

$fname = ""; //First name
$lname = ""; //Last name
$em = ""; //Email
$em2 = ""; //Email 2
$password = ""; //password
$password2 = ""; //password 2
$date = ""; //Sign up date
$error_array = ""; //Holds error messages

if(isset($_POST['register_button'])){

 	//Registration form values

 	//First name 
 	$fname = strip_tags($_POST['reg_fname']); // Remove html tags
 	$fname = str_replace(" ", '', $fname); // Removes Space
 	$fname = ucfirst(strtolower($fname)); // Uppercase first letter

 	//Last name 
 	$lname = strip_tags($_POST['reg_lname']); // Remove html tags
 	$lname = str_replace(" ", '', $lname); // Removes Space
 	$lname = ucfirst(strtolower($lname)); // Uppercase first letter

 	//Email 
 	$em = strip_tags($_POST['reg_email']); // Remove html tags
 	$em = str_replace(" ", '', $em); // Removes Space
 	$em = ucfirst(strtolower($em)); // Uppercase first letter

 	//Email 2 
 	$em2 = strip_tags($_POST['reg_email2']); // Remove html tags
 	$em2 = str_replace(" ", '', $em2); // Removes Space
 	$em2 = ucfirst(strtolower($em2)); // Uppercase first letter

 	//password 
 	$password = strip_tags($_POST['reg_password']); // Remove html tags

 	//password 2
 	$password2 = strip_tags($_POST['reg_password2']); // Remove html tags

 	$date = date("d-m-Y"); // Current date of Sign up

 	if ($em == $em2) {
 		//Checking Email in valid format (example@email.com)

 		if(filter_var($em, FILTER_VALIDATE_EMAIL)) {

 			$em = filter_var($em, FILTER_VALIDATE_EMAIL);

 			// Check if the email already exists
 			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$em'");

 			//Count the number of the query returned
 			$num_rows = mysqli_num_rows($e_check);

 			if ($num_rows > 0) {
 				echo "Email already in use";
 			}



 		}
 		else {
 			echo "Invalid Format";
 		}
 	}
 	else {

 		echo "Emails don't match";
 	}
}
 ?>


<html>
<head>
	<title>Welcome to Walid's World</title>
</head>
<body>

	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First name" required>
		<br>
		<input type="text" name="reg_lname" placeholder="Last name" required>
		<br>
		<input type="email" name="reg_email" placeholder="Email" required>
		<br>
		<input type="email" name="reg_email2" placeholder="Confirm Email" required>
		<br>
		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<input type="submit" name="register_button" value="Register">


	</form>


</body>

</html>