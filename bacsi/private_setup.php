<?php
	if(!$_COOKIE['username-doctor']):
		header('location:index.php');	
	endif;
	include './controller-mb/source-mb.php';
?>
<?php
  include './view-mb/header.php';
  include './view-mb/sidebar_start.php';
  $p = new Mclass_mb;
  $id_doctor = $_COOKIE['id_doctor']; 
  $doctor = $p->show_info_doctor($id_doctor);
  
?>
<div class = "container">
	<br>
	<center><h3> Cập nhật tài khoản</h3></center>
	<br>
	<div class="row mt-2">
		<div class="col-4">
		</div>
		<div class="col-1">
			<p class="font-weight-bolder">Username:<p>
			<p class="font-weight-bolder">Password:</p>
			<p class="font-weight-bolder">Email:</p>
		</div>
		<div class="col-2">
			<?php if($doctor): ;?>
			<p><?php echo $doctor['username'];?></p>	
			<p>********</p>
			<p><?php echo $doctor['email'];?></p>
			<?php endif; ?>
		</div>
		<div class="col-2">
			<p style="padding-bottom: 24px;"></p>
			<p><a href="change_pass.php">Change<img src="./view-mb/image/edit.svg" width="20px" class="ml-1"></a></p>
			
			<p><a href="change_email.php">Change<img src="./view-mb/image/edit.svg" width="20px" class="ml-1"></a></p>
		</div>
	</div>
</div>
<?php include './view-mb/sidebar_end.php'; ?> 
