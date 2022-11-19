<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {

    $nidno=$_POST['nidno'];
    $mobno=$_POST['mobno'];
    $name=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret="SELECT MobileNumber from enduser where MobileNumber=:mobno";
    $ret2="SELECT UserID from tblregistration where HusbandMobno=:mobno OR WifeMobNo=:mobno";
    $query= $dbh -> prepare($ret);
    $query2= $dbh -> prepare($ret2);
    $query-> bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query2-> bindParam(':mobno', $mobno, PDO::PARAM_STR);
    $query-> execute();
    $query2-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
    $results2 = $query2 -> fetch();
    
  
if($query -> rowCount() == 0)
{
// $sql="Insert Into enduser(Name,MobileNumber,password,email)Values(:name,:mobno,:password:email)";
  $userid=$results2['UserID'];
$sql="INSERT INTO `enduser`(`Name`, `MobileNumber`, `password`, `email`,`under_register_id`) VALUES ('$name','$mobno','$password','$email','$userid')";
$query = $dbh->prepare($sql);
// $query->bindParam(':name',$name,PDO::PARAM_STR);
// $query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
// $query->bindParam(':email',$email,PDO::PARAM_STR);
// $query->bindParam(':password',$password,PDO::PARAM_STR);
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
                <a style="color:white;" class="nav-link fs-5" href="login.php">User  Login</a>
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
              <label class="form-control-label">Nid Number:</label>
              <input type="text" class="form-control" placeholder="Nid Number" required="true" name="nidno"  maxlength="10" pattern="[0-9]+" value="<?php if(isset($_POST['nidno'])) echo $_POST['nidno']?>" >
            </div>
            <div class=" form-group">
              <label class=" form-control-label">Mobile Number:</label>
              <div class="d-flex justify-content-center">
                <input type="text" class="form-control" placeholder="Mobile Number" required="true" name="mobno"  maxlength="11" pattern="[0-9]+" value="<?php if(isset($_POST['mobno'])) echo $_POST['mobno']?>"  >
              <button type="submit" class="btn btn-flex" name="validate">Validate</button>
              </div>
            </div>






          <!--   <div class=" form-group">
              <label class=" form-control-label">Enter Code to verify:</label>
              <div class="d-flex justify-content-center">
                <input type="text" class="form-control" placeholder="Enter Code" required="false" name="mobno"  maxlength="10" pattern="[0-9]+" value="" >
              <button type="submit" class="btn btn-flex" name="verify">Verify</button>
              </div>
            </div> -->

             
            <div class="form-group">
              <label class="form-control-label">First Name:</label>
              <input type="text" class="form-control" placeholder="First Name" readonly="readonly" id="fname"  name="fname" required="true" value="" >
            </div><!-- form-group -->
          
            
<?php 
                  $nidno=$_POST['nidno'];
                  $mobno=$_POST['mobno'];

                  if (isset($_POST['validate'])) {
                    $ret1=" SELECT HusbandName from tblregistration where HusbandMobno='$mobno' && HusbandNidno='$nidno'";
                    $ret2=" SELECT WifeName from tblregistration where WifeMobno='$mobno' && WifeNidno='$nidno' ";
                    $query1= $dbh -> prepare($ret1);
                    $query2= $dbh -> prepare($ret2);
                    $query1-> execute();
                    $query2-> execute();
                    $result1=$query1->fetch();
                    // $result1 = $query1 -> fetchAll(PDO::FETCH_OBJ);
                    $result2 ==$query2->fetch();
                   
                     if($query1 -> rowCount() > 0)
                    {
                          $name=$result1['HusbandName'];  
                                 
                         echo '<script>document.getElementById("fname").value="'.$name.'";</script>';
                      // echo '<script>alert("Provide Information doesnt matching with database!!'.$name.'");</script>';
                    }
                    elseif($query2 -> rowCount() > 0)
                        {
                          $name=$result1['WifeName'];  
                         echo '<script>document.getElementById("fname").value = "'.$name.'";</script>';
                        }
                    
                     else
                        {
                                              echo '<script>alert("Provide Information doesnt matching with database!!");</script>';
                        }
               
                  }
 ?>
            
            <div class="form-group">
              <label class="form-control-label">Email Address:</label>
              <input type="text" class="form-control" placeholder="Address" required="true" name="email" value="" >
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
              </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>


    <!--Firebase-->
    <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.11/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAM1p5Y0yOYwxpMQ8CZE8c6Q7gR3X65PFI",
    authDomain: "connection-php-81ba4.firebaseapp.com",
    projectId: "connection-php-81ba4",
    storageBucket: "connection-php-81ba4.appspot.com",
    messagingSenderId: "998971727009",
    appId: "1:998971727009:web:18d6ecfef2bfb45801a4e0",
    measurementId: "G-L30G0HG2X4"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>

  </body>
</html>
