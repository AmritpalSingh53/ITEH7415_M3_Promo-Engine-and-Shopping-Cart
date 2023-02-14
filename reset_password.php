<?php
include 'db.php';
	

	 $email =  $_POST['email'];
	 $pwd1 =  $_POST['pwd1'];
	 $pwd2 =  $_POST['pwd2'];
	
if($pwd1==$pwd2){
	$sql4 = "SELECT * FROM user_info WHERE email='$email'";
$result = mysqli_query($con, $sql4);
if (mysqli_num_rows($result) > 0) {
$sql5 = "UPDATE user_info SET password='$pwd1' WHERE email='$email'";
if(mysqli_query($con,$sql5)){
	echo '<script type="text/javascript">';
echo ' alert("You have successfully reset your password")';  //not showing an alert box.
echo '</script>';

}
}

                    echo"<script>window.location.href='index.php'</script>";
	
	
	}
	else {
		echo '<script type="text/javascript">';
echo ' alert("Password does not match")';  //not showing an alert box.
echo '</script>';
echo"<script>window.location.href='index.php'</script>";
		}
	
	?>