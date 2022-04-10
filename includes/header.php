
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logo.png" alt="image"/>
        </a> 
        
        </div>
        
        
        </div>
        
        <div class="col-sm-9 col-md-10">
        <!-- <img src="assets/images/wheel.png" alt="image" height="50" width="50" class="wheel" id="wheel"/>
        <span> Let's Drive</span>
        <img src="assets/images/wheel.png" alt="image" height="50" width="50" class="wheel" id="wheel"/>
        </span> -->
        <div class="header_info">
          
       

            <!-- <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Support Mail us </p>
              <a href="mailto:<?php echo htmlentities($email);?>"><?php echo htmlentities($email);?></a> </div>
              <span></span>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Service Helpline No  </p>
              <a href="tel:<?php echo htmlentities($contactno);?>"><?php echo htmlentities($contactno);?></a> </div>
            <div class="social-follow">
            
            </div> -->
   <?php   if(strlen($_SESSION['login'])==0)
	{	
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{ 

echo "Welcome To Car rental portal";
 } ?>
  
          </div>
        </div>
      </div>
    </div>
  </div>
 
  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
      
      <div class="user_login">
      <?php if($_SESSION['login']){?>
      <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i  aria-hidden="true"></i> 
<!-- <?php 
$email=$_SESSION['login'];
$sql ="SELECT * FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{
    echo htmlentities($result->FullName);
    
   
  
   }}?> -->
   
             <i class="fa fa-angle-down" aria-hidden="true"></i></a>
            <img src="uploads/<?php echo htmlentities($result->Vimage1);?>" class="header-user"width="30" height="30" >
            <ul class="dropdown-menu">
            
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
            <li><a href="post-testimonial.php">Post a Testimonial</a></li>
          <li><a href="my-testimonials.php">My Testimonial</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
        <div class="header_search">
          
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php"><i class="fa fa home" aria-hidden="true"></i> Home</a>    </li>
<!--           	 
          <li><a href="page.php?type=aboutus">About Us</a></li>
          <li><a href="car-listing.php">Car List</a>
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li> -->

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  <link rel="stylesheet" href="includes/style.css?v=<?php echo time(); ?>" type="text/css"> 
</header>