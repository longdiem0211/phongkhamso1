<?php
	if(!$_COOKIE['username']):
		header('location:index.php');	
	endif;
	include './mvc/controller/source.php';
	$p = new Mclass;
	$username = $_COOKIE['username'];
	$error = '';
	if(isset($_POST['changeEmail'])):
		$email = mysqli_real_escape_string($p->connDB(), $_POST['email']);
		if($p->exist_email($email)):
				$error = 'Exist email.';
		endif;
		if(!$error):
			$sql = "update user set email ='$email' where username = '$username'";
			if($p->multipleFunc($sql)):
				$success = "Wait 5s for saving your changing.";
				header("Refresh: 3.5; url=private_setup.php");
			endif;	
			
		endif;	
	endif;	
?>
<?php
  include './mvc/view/header.php';
  include './mvc/view/menu.php';
  include './mvc/view/sidebar_start.php';
?>
<div class="container mt-3">
	<div class="col-3"></div>
	<div class="col-5">
		<form action="change_email.php" method="POST">
			<div class="form-group">
			    <label class="font-weight-bolder">Email mới: </label><span class="text-danger"><?php echo $error; ?></span>
			    <input type="email" class="form-control" name="email" required="required">
			 </div>
			 <button type="submit" class="btn btn-primary" name="changeEmail">Xác nhận</button>
		</form>
		<p class="text-success"><?php echo $success ?? ''; ?></p>
	</div>
</div>
<?php include './mvc/view/sidebar_end.php'; ?>	