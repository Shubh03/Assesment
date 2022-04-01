<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
 
  
		
  $vimage1=$_FILES["img1"]["name"];

$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];

$dob=$_POST['dob'];
$adress=$_POST['adress'];
$city=$_POST['city'];
$country=$_POST['country'];
$dlno=$_POST['dlno'];
$dlst=$_POST['dlst'];
$password=md5($_POST['password']); 
move_uploaded_file($_FILES["img1"]["tmp_name"],"uploads/".$_FILES["img1"]["name"]);





$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password,dob,Address,City,Country,DL_NO,dlst,Vimage1) VALUES(:fname,:email,:mobile,:password,:dob,:adress,:city,:country,:dlno,:dlst,:vimage1)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);

$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':adress',$adress,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);

$query->bindParam(':dlno',$dlno,PDO::PARAM_STR);
$query->bindParam(':dlst',$dlst,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}









?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}





</script>








<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("img1").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>
<link rel="stylesheet" href="style.css" type="text/css">
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
    
    
      <div class="modal-body">
      
        <div class="row">
        <center>
			<img id="uploadPreview" src="imgs/avatar.png" class="avatar" width="140px"
	text-align="center"  /><br>
			
    </center>
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
              
    
              <div class="form-group">
              <input type="file" id="img1" name="img1" accept=".jpg,.jpeg,.png" required="required" onchange="PreviewImage();"> <span style="color:red">Upload your profile photo</span>
              </div>

                <div class="form-group">
                <span>Full Name*</span>
                  <input type="text" class="form-control"  required pattern="[A-Z a-z]{1,30}" onBlur="Availability()" title="Name field can not have the number"  name="fullname" placeholder="Full Name" >
                  
                </div>
                <div class="form-group">
                <span>Mobile No*</span>
                  <input pattern="[0-9]{10}" title="Enter the valid mobile number" class="form-control" name="mobileno" placeholder="e.g-7236000339"  required="required">
                </div>
                <div class="form-group">
                <span>Email-id*</span>
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="user@gmail.com" required="required">
                   <span id="user-availability-status" style="font-size:14px;"></span> 
                </div>

                <div class="form-group">
                <span>Date-Of-Birth*</span>
                  <input type="date" class="form-control" id="TxtFrom" name="dob" max="2002-01-02" placeholder="Date of  Birth" required="required">






                </div>
                <div class="form-group">
                <span>Address*</span>
                  <input type="text" class="form-control" name="adress" placeholder="Your Address" required="required">
                </div>
                <div class="form-group">
                <span>City*</span>
                  <input type="text" class="form-control" name="city" placeholder="City" required="required">
                </div>
                <div class="form-group">
                <span>Country*</span>
                  <input type="text" class="form-control" name="country" placeholder="Country" required="required">
                </div>
               
                <div class="form-group">
                <span>DL-NO*</span>
               <br>  
             <select class="selectpicker" style="width:150px"  name="dlst" required>
                  <option value="">Select</option>
                  <option value="az">AZ</option>
                  <option value="fl">FL</option>
                  <option value="oh">OH</option>
                  <option value="ga">GA</option>
                  <option value="id">ID</option>
                  <option value="il">IL</option>
                  <option value="in">IN</option>
                  <option value="ia">IA</option>
                  <option value="ms">MS</option>
                  <option value="nv">NV</option>
                  <option value="nj">NJ</option>
                  

                  </select>     <span style="color:red">  *</span>  Select The State Code
                  <input  class="form-control" name="dlno"  pattern="[0-9]{13}" minlength="13" maxlength="13" title="Enter The valid DL Number" placeholder="Dl_No" required="required">
                </div>

<style>
  .selectpicker{
    color:red;
    border: 1px solid blue;
  }
</style>



                     
                <div class="form-group">
                <span>Password*</span>
                  <input type="text" class="form-control" name="password"    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"    placeholder="Password" required="required">
                </div>
                <!-- <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div> -->
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="page.php?type=terms">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-body text-center">
        <p>Already have an account? <a href="login.php" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>

 

  </div>
</div> 