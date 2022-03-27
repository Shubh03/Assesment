<?php 
require_once("includes/config.php");
// code user email availablity







if(!empty($_POST["emailid"]))


{
	$email= $_POST["emailid"];

	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]{3,5}+(\.[a-z]{2,3})$/";

	if(!preg_match($emailValidation,$email)){

		echo "<span style='color:red'>Error : $email Is Invalid Email.</span><span style='color:blue'>  * Please Enter The Valid Email Address.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";

	}


	








	// if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {
			// 	echo "<span style='color:red'>error : Invalid email.</span>";
	// }



	else {
		$sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}

if(!empty($_POST["TxtFrom"])) {
	
$ret="SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
$query1 = $dbh -> prepare($ret);
$query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query1->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query1->bindParam(':todate',$todate,PDO::PARAM_STR);
$query1->bindParam(':BookingNumber',$BookingNumber,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query1->rowCount()>0)
{
	if($fromdate && $todate="$BookingNumber" )
	{
		echo "<span style='color:red'> Email already exists .</span>";
		 echo "<script>$('#submit').prop('disabled',true);</script>";
		}
		 else{
			
			echo "<span style='color:green'> Email available for Registration .</span>";
		 echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	}
}



?>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
   </script>