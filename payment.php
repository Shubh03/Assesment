<?php 
 session_start();
// include( 'payment/config.php' );
    include('includes/config.php');
    if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
 
else{   


//error_reporting(0);

if(isset($_POST['signup']))
{
  
$cnno=$_POST['cn'];
$exp=$_POST['expdate']; 
$cv=$_POST['cvvno'];
$name=($_POST['cname']); 
$userId=$_SESSION['userId'];


	
	
   
 $sql="INSERT INTO  tblpayment(cardno,expdate,cvvno,cname,userId) VALUES(:cnno,:exp,:cv,:name,:userId)";

$query = $dbh -> prepare($sql);
$query->bindParam(':cnno',$cnno,PDO::PARAM_STR);
$query->bindParam(':exp',$exp,PDO::PARAM_STR);
$query->bindParam(':cv',$cv,PDO::PARAM_STR);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':userId',$userId,PDO::PARAM_STR);
	

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('payment successfull. ');</script>";
echo "<script>alert('Booking successfull.');</script>";
echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
 }
 
?>





<header>
<div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logo.png" alt="image"/></a> </div>
        </div>
        

</header>

<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8" />
<title>car rental services payment mode</title>
<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
<link rel = "stylesheet" type = "text/css" href = "payment/bootstrap/css/bootstrap.min.css" />
<link rel = "stylesheet" type = "text/css" href = "payment/font-awesome/css/font-awesome.min.css" />

<script type = "text/javascript" src = "js/jquery-1.10.2.min.js"></script>
<script type = "text/javascript" src = "bootstrap/js/bootstrap.min.js"></script>
</head>
<body>





<div class = "container">

<div class = "page-header">
<h1>Car Rental Services <small>Payment Mode</small></h1>
</div>

<!-- Credit Card Payment Form - START -->

<div class = "container">
<div class = "row">
<div class = "col-xs-12 col-md-4 col-md-offset-4">
<div class = "panel panel-default">
<div class = "panel-heading">
<div class = "row">
<h3 class = "text-center">Payment Details</h3>
<img class = "img-responsive cc-img" src = "http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
</div>
</div>
<div class = "panel-body">

<div class = "row">
<div class = "col-xs-12">
<form  action="" method="post" name="signup" onSubmit="return valid();" >
<div class = "form-group">
<label>CARD NUMBER</label>

<div class = "form-group">

<input pattern="\d*" maxlength="16" minlength="16" class = "form-control" name = "cn" title="Enter Your 16 Digit Vaild Card Number" placeholder = "Valid Card Number" required = "required">
</div>

<span class = "input-group-addon"><span class = "fa fa-credit-card"></span></span>
</div>
</div>
</div>


</div>
<div class = "row">
<div class = "col-xs-7 col-md-7">
<div class = "form-group">
<label><span class = "hidden-xs">Expiry</span><span class = "visible-xs-inline">EXP</span> / Validity Date</label>
<input  class = "form-control" id="TxtFrom" name = "expdate" placeholder = "MM / YY" required="required" />
</div>
</div>
<div class = "col-xs-5 col-md-5 pull-right">
<div class = "form-group">
<label>CVV </label>
<input pattern="\d*" maxlength="3" minlength="3" class = "form-control" name = "cvvno" placeholder = "CVV " title="Enter Your 3 Digit Valid CVV Number"  required />
</div>
</div>
</div>
<div class = "row">
<div class = "col-xs-12">
<div class = "form-group">
<label>Name On Card</label>
<input type = "text" id="cname" class = "form-control"  name = "cname" placeholder = "Card Owner Names"  required="required" />
</div>
</div>

</div>

</div>

<div class = "panel-footer">
<div class = "row">
<div class = "col-xs-12">
<div class="form-group">

<input type="submit" value="Pay Now" name="signup" style="background-color:green" class="btn btn-block">



</form>
            </div>




</div>

</div>
</div>
</div>
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(function(){
  $("#TxtFrom").datepicker({
    numberOfMonths:1,
    minDate:0,
    // maxDate:2 ,
    dateFormat:'yy-mm-dd',
    onSelect:function(selectdate){
      var dt = new Date(selectdate);
      dt.setDate(dt.getDate()+1)
      $("#TxtTo").datepicker("option","minDate",dt);
    }
  });

  $("#TxtTo").datepicker({
    numberOfMonths:1,
    minDate:1,


    dateFormat:'yy-mm-dd',
    onSelect:function(selectdate){
      var dt=new Date(selectdate);
      dt.setDate(dt.getDate()-1)
      $("#TxtFrom").datepicker("option","maxDate",dt);
    }
  });

});

</script>










<style>
.cc-img {
    margin: 0 auto;
}

</style>
<!-- Credit Card Payment Form - END -->
<!-- <?php include('includes/login.php');?> -->
</body>
</html>
<?php } ?> 