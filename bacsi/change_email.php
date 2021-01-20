<?php
	if(!$_COOKIE['username-doctor']):
		header('location:index.php');	
	endif;
	include './controller-mb/source-mb.php';
	$p = new Mclass_mb;
	$id_doctor = $_COOKIE['id_doctor'];
	$error = '';
	if(isset($_POST['changeEmail'])):
		$email = mysqli_real_escape_string($p->connDB(), $_POST['email']);
		if($p->exist_email($email)):
				$error = 'Exist email.';
		endif;
		if(!$error):
			$sql = "update doctor set email ='$email' where id_doctor = '$id_doctor'";
			if($p->multipleFunc($sql)):
				$success = "Wait 5s for saving your changing.";
				header("Refresh: 3.5; url=private_setup.php");
			endif;	
			
		endif;	
	endif;	
?>
<?php
  include './view-mb/header.php';
  include './view-mb/sidebar_start.php'; 
?>
<div class="container mt-3">
	<div class="col-5">
		<form action="change_email.php" method="POST">
			<div class="form-group">
			    <label class="font-weight-bolder">Email: </label><span class="text-danger"><?php echo $error; ?></span>
			    <input type="email" class="form-control" name="email" required="required">
			 </div>
			 <button type="submit" class="btn btn-primary" name="changeEmail">Change</button>
		</form>
		<p class="text-success"><?php echo $success ?? ''; ?></p>
	</div>
</div>
<?php include './view-mb/sidebar_end.php'; ?>	