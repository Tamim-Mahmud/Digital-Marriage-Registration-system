<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$cerid=$_GET['cerid'];
$sql="UPDATE certificaterequest SET status='Delivered' WHERE uni_id='$cerid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
header('location:view-certificate-request.php');
?>