
<navbar class="container">
    <nav style="background-color: green !important;"  class="navbar sticky-top navbar-expand-lg navbar-light shadow pr-5 pl-7 bg-body rounded mb-0" >
        <div class="container">
           <a href="dashboard.php" style="align-content: center;" class="am-logo">Digital Marriage Registration System</a>
            <div class="am-header-right">
       
        <div class=" ">
            <ul class="list-unstyled user-profile-nav">

            </li>
            <li style="display:inline-block;"  style="display: inline-block; !important"> <a style="display: inline-block;" href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
            <?php
$aid=$_SESSION['omrsaid'];
$sql="SELECT AdminName,Email from  tbladmin where ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
            <span class="logged-name"><span class="hidden-xs-down"><?php  echo $row->AdminName;?></span> <i class="fa fa-angle-down mg-l-3"></i></span><?php $cnt=$cnt+1;}} ?>
          </a></li>
           
              <li style="display: inline-block;"><a href="admin-profile.php"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li style="display: inline-block;"><a href="change-password.php"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li style="display: inline-block;"><a href="logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          
      </div><!-- am-header-right -->
            
         
        </div>
      </nav>
</navbar>




