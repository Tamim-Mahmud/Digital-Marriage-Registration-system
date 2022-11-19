<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT MobileNumber FROM tbluser WHERE MobileNumber=:mobile";
$query= $dbh -> prepare($sql);

$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);

$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert(' Mobile no is invalid');</script>"; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>User || Forgot Password Page</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
   
     <script src="script/jquery-3.5.1.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
    <script type="text/javascript">



function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
  </head>

  <body>

    <navbar class="container">
    <nav  style="background-color: green !important;"  class="navbar sticky-top navbar-expand-lg navbar-light shadow mb-5 bg-body rounded mb-0" >
        <div class="container">
          <a style="color:white;" class="navbar-brand" href="#">DMRS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav  mb-2 ms-auto">
              <li class="nav-item ms-2">
                <a style="color:white;" class="nav-link fs-5"  href="../index.php">Home</a>
              </li>
              <li class="nav-item ms-2">
                <a style="color:white;" class="nav-link fs-5" href="../admin/login.php">Admin Login</a>
              </li>
               <li class="nav-item ms-2">
                <a style="color:white;" class="nav-link fs-5" href="login.php">Registrar  Login</a>
              </li>
              <li class="nav-item ms-2">
                <a style="color:white;" class="nav-link fs-5" href="check.php">Check Marital Status</a>
              </li>
              
            </ul>
            
          </div>
        </div>
      </nav>
</navbar>


    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <h2>OMRS</h2>
              <p>Reset Your Passowrd</p>
              <p>Please fill the following detail to reset the password.</p>

              <hr>
              <p>Already have an account| <br> <a href="login.php">Sign In</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Signin to Your Account</h5>
 <form class="form-auth-small" action="" method="post" name="chngpwd" onSubmit="return valid();">
            <div class="form-group">
              <label class="form-control-label">Mobile Number:</label>
              <input type="text" class="form-control" placeholder="Mobile Number" required="true" name="mobile">
            </div><!-- form-group -->

            
            <div class="form-group">
              <label class="form-control-label">New Password:</label>
              <input class="form-control" type="password" name="newpassword" placeholder="New Password" required="true"/>
            </div><!-- form-group -->
            <div class="form-group">
              <label class="form-control-label">Confirm Password:</label>
              <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />
            </div><!-- form-group -->

           

            <button type="submit" class="btn btn-block" name="submit">Reset</button>
             
          </div>
         </form>
        </div><!-- row -->
        <p class="tx-center tx-white-5 tx-12 mg-t-15">Copyright &copy; 2020. Online Marriage Registration Systems</p>
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>
  </body>
</html>
