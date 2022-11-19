<?php
session_start();

error_reporting(0);
include('includes/dbconnection.php');
$stata='disabled';
$statpm='';




if($_SESSION['paid']==1)
{

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("abc6269abcccdf51");
$store_passwd=urlencode("abc6269abcccdf51@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);
$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

  # TO CONVERT AS ARRAY
  # $result = json_decode($result, true);
  # $status = $result['status'];

  # TO CONVERT AS OBJECT
  $result = json_decode($result);

  # TRANSACTION INFO
  $status = $result->status;
  $tran_date = $result->tran_date;
  $tran_id = $result->tran_id;
  $val_id = $result->val_id;
  $amount = $result->amount;
  $store_amount = $result->store_amount;
  $bank_tran_id = $result->bank_tran_id;
  $card_type = $result->card_type;

  # EMI INFO
  $emi_instalment = $result->emi_instalment;
  $emi_amount = $result->emi_amount;
  $emi_description = $result->emi_description;
  $emi_issuer = $result->emi_issuer;

  # ISSUER INFO
  $card_no = $result->card_no;
  $card_issuer = $result->card_issuer;
  $card_brand = $result->card_brand;
  $card_issuer_country = $result->card_issuer_country;
  $card_issuer_country_code = $result->card_issuer_country_code;

  # API AUTHENTICATION
  $APIConnect = $result->APIConnect;
  $validated_on = $result->validated_on;
  $gw_version = $result->gw_version;
  $stata='';
  $statpm='disabled';
} else {

  echo "Failed to connect with SSLCOMMERZ";
}


}

if (strlen($_SESSION['omrsuid']==0)) {
  header('location:logout.php');
  } else{




if(isset($_POST['submit']))
{
  $id=$_SESSION['omrsuid'];
  $name=$_POST['name'];
  $mob=$_POST['mobno'];
  $add=$_POST['add'];
  
  $sql="INSERT INTO certificaterequest(id, name, mobile, fullAddress, transId,register_id) VALUES ('$id','$name','$mob','$add','$tran_id',$_SESSION['rid'])";

  $query=$dbh->prepare($sql);
   $query-> execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);

    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
 

}



  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System !! Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
   
     <script src="script/jquery-3.5.1.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="lib/spectrum/spectrum.css" rel="stylesheet">
    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>
 <?php include_once('includes/header.php');
include_once('includes/sidebar.php');

 ?>


    <div class="am-mainpanel">
      <div class="am-pagebody">

      

       
          
                    <div class="am-signin-wrapper">
      <div class="am-signin-box">
        <div class="row no-gutters">
          <div class="col-lg-5">
            <div>
              <h2>Home Delivery</h2>
              <p>Get your certificate to your Doorsteps..</p>
              <p>It will cost only 100 Taka for delivery charge...</p>

              <hr>
            </div>
          </div>
          <div class="col-lg-7">
            <h3 class="tx-gray-800 mg-b-25">Application For Certificate</h3>
            <h5 class="tx-gray-800 mg-b-25">Billing Information</h5>

 <form class="form-auth-small" action="" method="post">
             <button onclick="location.href='checkout.php?amount=100'" class="btn btn-outline-success" type="button" <?php echo $statpm ?>>Pay now</button>

            <div class="form-group">
              <label class="form-control-label">Full Name</label>
              <input type="text" class="form-control" placeholder="Full Name" required="true" name="name"  maxlength="30" value="<?php if(isset($_POST['name'])) echo $_POST['name']?>" >
            </div>
            <div class=" form-group">
              <label class=" form-control-label">Active Mobile Number:</label>
              <div class="d-flex justify-content-center">
                <input type="text" class="form-control" placeholder="Mobile Number" required="true" name="mobno"  maxlength="11" pattern="[0-9]+" value="<?php if(isset($_POST['mobno'])) echo $_POST['mobno']?>"  >
              
              </div>
            </div>

 
            
            <div class="form-group">
              <label class="form-control-label">Full Address:</label>
              <input type="text" class="form-control" placeholder="Full Address" required="true" name="add" value="" >
            </div>
          

           

            <button type="submit" class="btn btn-block" name="submit" <?php echo $stata;?>>Apply</button>
            
         </form>
        </div><!-- row -->
              </div><!-- signin-box -->
    </div><!-- am-signin-wrapper -->
 


      </div><!-- am-pagebody -->
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
   <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
        <script src="lib/spectrum/spectrum.js"></script>

    <script src="js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      })

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

$('#datepickerNoOfMonths').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true,
  numberOfMonths: 2
})
$('.hdob').datepicker({
  multidate: true,
  format: 'yyyy-mm-dd'
});



    </script>
    <script>
      
      (function (window, document) {
  var loader = function () {
      var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
      script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
      tag.parentNode.insertBefore(script, tag);
  };

  window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
})(window, document);
    
(function (window, document) {
  var loader = function () {
    var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
    script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
    tag.parentNode.insertBefore(script, tag);
  };

  window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
})(window, document);
  <button class="payam" id="payam"
     token="if you have any token validation"
     postdata="your javascript arrays or objects which requires in backend"
     order="If you already have the transaction generated for current order"
     endpoint="An URL where backend code will initiate the payment to SSLCOMMERZ"> Pay Now
</button>
               

    </script>
  </body>
</html>
<?php }  ?>