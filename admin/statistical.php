<?php include './controller-dr/source-dr.php';
$p = new Mclass_dr;

?>
<?php
include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>
<center><h2 style="margin-top:50px">Thống kê chi tiết.</h2><hr style="width:200px"></center>
<div class = "container">
<center>
	<table class="table table-hover" style = "width:500px; margin-top:50px">
		<tr>
	      <th scope="row">Số lượng bệnh nhân :</th>
	      <td><?php
$con=mysqli_connect("localhost", "root", '', "tmdt");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT id_user,username FROM user";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("%d Bệnh nhân.",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($con);
?></td>
		</tr>
		<tr>
	      <th scope="row">Số lượng bác sĩ :</th>
	      <td><?php
$con=mysqli_connect("localhost", "root", '', "tmdt");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT id_doctor,username FROM doctor";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("%d Bác sĩ.",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($con);
?></td>
		</tr>
		<tr>
	      <th scope="row">Tổng số phiếu khám :</th>
	      <td><?php
$con=mysqli_connect("localhost", "root", '', "tmdt");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT id_phieukham FROM phieukham";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("%d Phiếu khám.",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($con);
?></td>
		</tr>
		<tr>
	      <th scope="row">Số lượng phiếu khám hoàn thành :</th>
	      <td><?php
$con=mysqli_connect("localhost", "root", '', "tmdt");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT id_phieukham FROM phieukham where chidan!=''";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  printf("%d Phiếu khám.",$rowcount);
  // Free result set
  mysqli_free_result($result);
  }

mysqli_close($con);
?></td>
		</tr>
	
<?php
include './view-dr/sidebar_end.php';
?>