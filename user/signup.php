<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $mobno=$_POST['mobno'];
    $add=$_POST['address'];
    $password=md5($_POST['password']);
    $ret="select MobileNumber from tbluser where MobileNumber=:mobno";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FirstName,LastName,MobileNumber,Address,Password)Values(:fname,:lname,:mobno,:add,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':add',$add,PDO::PARAM_STR);

$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Succesfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('This Mobile Number already exist. Please try again');</script>";
}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System||Sign Up page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
   
     <script src="script/jquery-3.5.1.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>




<navbar class="container">
    <nav style="background-color: green !important;"  style="background-color: green !important;"  class="navbar sticky-top navbar-expand-lg navbar-light shadow mb-5 bg-body rounded mb-0" >
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
              <h2>amanda</h2>
              <p>The Responsive Bootstrap 4 Admin Template</p>
              <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate.</p>

              <hr>
              <p><br> <a href="../index.php">Back Home</a></p>
            </div>
          </div>
          <div class="col-lg-7">
            <h5 class="tx-gray-800 mg-b-25">Registrar Registration Form</h5>
 <form class="form-auth-small" action="" method="post">
            <div class="form-group">
              <label class="form-control-label">First Name:</label>
              <input type="text" class="form-control" placeholder="First Name" required="true" name="fname" value="" >
            </div><!-- form-group -->
<div class="form-group">
              <label class="form-control-label">Last Name:</label>
              <input type="text" class="form-control" placeholder="Last Name" required="true" name="lname" value="" >
            </div>
            <div class="form-group">
              <label class="form-control-label">Mobile Number:</label>
              <input type="text" class="form-control" placeholder="Mobile Number" required="true" name="mobno"  maxlength="10" pattern="[0-9]+" value="" >
            </div>
            <div class="form-group">
              <label class="form-control-label">Address:</label>
              <input type="text" class="form-control" placeholder="Address" required="true" name="address" value="" >
            </div>
            <div class="form-group">
              <label class="form-control-label">Password:</label>
              <input type="password" class="form-control" placeholder="Password" name="password" required="true" value="">
            </div><!-- form-group -->

           

            <button type="submit" class="btn btn-block" name="submit">Sign Up</button>
             <div class="form-group mg-b-20" style="padding-top: 20px"><a href="login.php">Do you have an account ? || signin</a></div>
          </div>
         </form>
        </div><!-- row -->
        <p class="tx-center tx-white-5 tx-12 mg-t-15">Copyright &copy; 2017. All Rights Reserved. Amanda by ThemePixels</p>
      </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>
  </body>
</html>
