<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_POST['update']))
{
$vimage1=$_FILES["img1"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"uploads/".$_FILES["img1"]["name"]);
$email=$_SESSION['login'];
$sql="update tblusers set Vimage1=:vimage1 where EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->execute();
echo "<script>alert('Your Profile Updated Successfully');</script>";
echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
// $msg="Image updated successfully";




}
?>


<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style> 


  <?php  include('includes/header.php'); ?> 
									
										
											
  	    
                    <section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Your Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>


<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<form method="post" class="form-horizontal" enctype="multipart/form-data"> 
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo">  <img src="uploads/<?php echo htmlentities($result->Vimage1);?>" class="user1" width="250" height="250" alt="">
      
      
    </div>

    <div class="">
      <h5></h5>
        <h5><?php ;?></h5>
        <p><?php ;?><br>
          <?php ;?>&nbsp;<?php ;?></p>
          
         

      </div>
     
    <div class="form-group">
    
                        <label class="col-sm-4 control-label"><span style="color:red"></span></label>
                       
												<div class="col-sm-8">
                        <h5>Your current profile pic:</h5>
                        <button class="btn btn-primary" name="update" type="submit" style="left:150px">Update</button>
												</div>
											</div> <br>
                      <input type="file" name="img1" required="required">	
                     
</br>
                     
                      
    </div>

<?php }}?>

										
												
													
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
  <script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>

</html>
<?php } ?> 