<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Online Marriage Regitration System :: Home Page</title>


<!--//Meta tag Keywords -->

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
	 
     <script src="script/jquery-3.5.1.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/><!--stylesheet-->
	<link rel="stylesheet" href="css/font-awesome.css"><!--font_aswesome_icons-->
	<link href="//fonts.googleapis.com/css?family=Basic" rel="stylesheet"><!--online-fonts-->
	<link href="//fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"><!--online-fonts-->

	<!-- vendor css -->

    <!-- Amanda CSS -->
   

    <link rel="stylesheet" href="admin/css/amanda.css">


</head>
<body>


		
		
<navbar class="container">
		<nav style="background-color: green !important;"  class="navbar sticky-top navbar-expand-lg navbar-light shadow pr-5 pl-7 mb-5 bg-body rounded mb-0" >
			  <div class="container">
			    <a style="color:white;" class="navbar-brand" href="#">DMRS</a>
			  	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarText">
			      <ul class="navbar-nav  mb-2 ms-auto">
			        <li class="nav-item ms-2">
			          <a style="color:white;" class="nav-link fs-5"  href="index.php">Home</a>
			        </li>
			        <li class="nav-item ms-2">
			          <a style="color:white;" class="nav-link fs-5" href="admin/login.php">Admin Login</a>
			        </li>
			         <li class="nav-item ms-2">
			          <a style="color:white;" class="nav-link fs-5" href="user/login.php">Registrar  Login</a>
			        </li>
			        <li class="nav-item ms-2">
			          <a style="color:white;" class="nav-link fs-5" href="check.php">Check Marital Status</a>
			        </li>
			        
			      </ul>
			      
			    </div>
			  </div>
			</nav>
</navbar>




 
	
<div class="w3ls-head">
		<h1 style="color: green;">Status Check</h1>
</div>
<div class="w3ls-content">
	<form id="basic-form" method="post" enctype="multipart/form-data">
		
	     
         <div class="row mg-t-20">
	                <label class="col-sm-4 form-control-label">Select Gender: <span class="tx-danger">*</span></label>
	                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
	                  <select type="text" name="gender" value="" class="form-control" required='true'>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
	    			 </div>
	 	</div>
		 <div class="row mg-t-20">
	                <label class="col-sm-4 form-control-label">Date of Birth: <span class="tx-danger">*</span></label>
	                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
	                  <input type="text" class="form-control fc-datepicker" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" id="dob" name="dob">
	     </div></div>
	     <div class="row mg-t-20">
	                <label class="col-sm-4 form-control-label">Enter Nid Number: <span class="tx-danger">*</span></label>
	                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
	                 <input type="text" name="nid" value="" required="true" class="form-control" maxlength="12">
	     </div></div>
	     <div class="form-layout-footer mg-t-30">
             <p style="text-align: center;"><button class="btn btn-info mg-r-5"  name="submit" id="submit">Check</button></p>
         </div>
	 </form>

	 <?php

	 		if(isset($_POST['submit']))
  {
  	$gender=$_POST['gender'];
  	$dob=$_POST['dob'];
  	$nid=$_POST['nid'];

  	$sqlmale="SELECT HusbandSBM from tblregistration where Husbanddob='$dob' && HusbandNidno='$nid' ";
  	$sqlfemale="SELECT WusbandSBM from tblregistration where Wusbanddob='$dob' && WusbandNidno='$nid' ";
  	if($gender == "Male")
  	{
  		$query = $dbh -> prepare($sqlmale);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount()>0) {
			
			echo '<div class="d-flex justify-content-center alert alert-success"> This person is 
            <strong> Married</strong> 
        </div>';
		}
		else
			echo '<div class="d-flex justify-content-center alert alert-danger">Marital Status 
            <strong> Unavailable</strong> 
        </div>';
  	}
  	elseif ($gender ="Female") {
  		$query = $dbh -> prepare($sqlfemale);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if ($query->rowCount()>0) {
			
			echo '<div class="d-flex justify-content-center alert alert-success"> This person is 
            <strong> Married</strong> 
        </div>';
		}
		else
			echo '<div class="d-flex justify-content-center alert alert-danger">Marital Status 
            <strong> Unavailable</strong> 
        </div>';


  	}
}

	  ?>

</div>


	
</div>
    <script src="lib/jquery/jquery.js"></script>
   <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
        <script src="lib/spectrum/spectrum.js"></script>
 <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      });

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

		$('#datepickerNoOfMonths').datepicker({
		  showOtherMonths: true,
		  selectOtherMonths: true,
		  numberOfMonths: 2
		});
		$('.hdob').datepicker({
		  multidate: true,
		  format: 'yyyy-mm-dd'
		});

    </script>
</body>
</html>