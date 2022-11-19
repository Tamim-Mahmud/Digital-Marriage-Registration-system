<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['omrsuid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   

    <title>Online Marriage Registration System || Verified Marriage Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
   
     <script src="script/jquery-3.5.1.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Amanda CSS -->
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>

<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>



    <div class="am-mainpanel">
      <div class="am-pagebody">

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Verified Marriage Application</h6>
        

          <div class="table-wrapper" style="padding-top: 20px">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">S.No</th>
                
                  <th class="wd-15p">Name</th>
                  <th class="wd-20p">Mobile</th>
                  
                  <th class="wd-10p">Full Address</th>
                  <th class="wd-10p">Status</th>
                  <th class="wd-25p">Download</th>
                  <th class="wd-25p">Delivery Status Update</th>

                </tr>
              </thead>
              <tbody> 
                <?php
                 $uid=$_SESSION['omrsuid'];



$sql="SELECT certificaterequest.uni_id, certificaterequest.name, certificaterequest.mobile, certificaterequest.fullAddress, certificaterequest.status,tblregistration.ID, tblregistration.Status FROM certificaterequest INNER JOIN tblregistration ON  certificaterequest.register_id=tblregistration.UserID AND (certificaterequest.mobile=tblregistration.HusbandMobno OR certificaterequest.mobile=tblregistration.WifeMobNo)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);


$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php  echo htmlentities($row->name);?></td>
                  <td><?php  echo htmlentities($row->mobile);?></td>
                  <td><?php  echo htmlentities($row->fullAddress);?></td>
                <?php if($row->status=="pending"){ ?>

                     <td><?php echo "Not Delivered"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->status);?>
                  </td>
                  <?php } ?>
                   <?php if($row->Status=="Verified"){ ?>
                  <td><a href="view-marriage-application-detail.php?viewid=<?php echo htmlentities ($row->ID);?>"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                  <?php } else { ?> 
                    <td><i class="fa fa-exclamation-circle"></i></td> <?php } ?>
                  <td> <a href="delivered.php?cerid=<?php echo $row->uni_id ?>"> <?php if($row->status=="pending")  echo "Mark as Delivered";  else {  echo "Already Delivered"; } ?> </td>

                </tr>
              <?php $cnt=$cnt+1;}} ?> 
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

    
      </div><!-- am-pagebody -->
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>
<?php }  ?>
