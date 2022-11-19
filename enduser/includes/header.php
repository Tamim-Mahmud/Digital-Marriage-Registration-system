
<navbar class="container">
    <nav style="background-color: green !important;"  class="navbar sticky-top navbar-expand-lg navbar-light shadow pr-5 pl-7 mb-5 bg-body rounded mb-0" >
        <div class="container">
           <a href="dashboard.php" style="align-content: center;" class="am-logo">Digital Marriage Registration System</a>
            <div class="am-header-right">
       
        <div class=" ">
           <ul class="list-unstyled user-profile-nav">
            <li  style="display: inline-block; !important"> <a style="display: inline-block;" href="user-profile.php" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img   src="img/images.png" class="wd-32 rounded-circle" alt="">
            <?php
$uid=$_SESSION['omrsuid'];
$sql="SELECT FirstName,MobileNumber from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
            <span class="logged-name"><span class="hidden-xs-down"><?php  echo $row->FirstName;?></span> <i class="fa fa-angle-down mg-l-3"></i></span><?php $cnt=$cnt+1;}} ?>
          </a></li>
          
           
              <li style="display: inline-block; !important"><a href="user-profile.php"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li  style="display: inline-block; !important"><a href="change-password.php"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li  style="display: inline-block; !important"><a href="logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          
        </div><!-- dropdown -->
      </div><!-- am-header-right -->
            
         
        </div>
      </nav>
</navbar>



