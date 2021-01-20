<?php
include './controller-mb/source-mb.php';
$p = new Mclass_mb;
$username = $password = '';
$error = ['username' => '', 'password' => '', 'all' => ''];
if(isset($_POST['signin'])):
	if(!empty($_POST['username'])):
		$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
		$checkDoctor = $p->exist_doctor($username);
		if($checkDoctor):
			if($checkDoctor['password'] == md5($_POST['password'])):
				// sử dụng cookie trong vòng 30 ngày sau 30 ngày phải đăng nhập lại
				setcookie('username-doctor', $username, strtotime("+30 days"));
				setcookie('id_doctor', $checkDoctor['id_doctor'], strtotime("+30 days"));
				header('location:./info_doctor.php');
			else:
				$error['all'] = "Không hợp lệ.";	
			endif;	
		else:
			$error['all'] = "Incorrect username and password.";	
		endif;	
	else:
		$error['username'] = "Empty value.";	
	endif;
	//kiểm tra password
	if(!empty($_POST['password'])):
	else:
		$error['password'] = "Empty value.";	
	endif;	
endif;
?>
<style type="text/css">
	body{
		background-image: url("../mvc/view/image/aa.jpg");


	}
</style>
<div class="container">
	<div class="row mt-3 mb-2">
		
		</div>
	</div>	
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<form action="index.php" class="card p-3" method="POST">
				<h4 class="font-weight-bold ">Đăng Nhập</h4>
				<p class="m-0 p-0 text-danger"><?php echo $error['all']; ?></p>	
				<div class="form-group">
			    <label class="font-weight-bolder">Tên tài khoản :</label><span class="text-danger"><?php echo $error['username']; ?></span>
			    <input type="text" class="form-control" name="username">
			  </div>
			  <div class="form-group">
			    <label class="font-weight-bolder">Mật khẩu:</label><span class="text-danger"><?php echo $error['password']; ?></span>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<div class="checkbox" width="50%">
				    <label class="inline"><input type="checkbox">         Ghi nhớ tài khoản.</label>
				  	</div>
				</div>
			  </div>	  	
			  <button type="submit" class="btn btn-primary" name="signin">Đăng nhập</button>
			</form>
		</div>
		<div class="col"></div>
	</div>
</div>