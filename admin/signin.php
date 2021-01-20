<?php
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $password = '';
$error = ['username' => '', 'password' => '', 'all' => ''];
if(isset($_POST['signin'])):
	if(!empty($_POST['username'])):
		$username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
		$checkDirector = $p->exist_director($username);
		if($checkDirector):
			if($checkDirector['password'] == $_POST['password']):
				// sử dụng cookie trong vòng 30 ngày sau 30 ngày phải đăng nhập lại
				setcookie('username-director', $username, strtotime("+30 days"));
				setcookie('id_director', $checkDirector['id_director'], strtotime("+30 days"));
				header('location:./home.php');
			else:
				$error['all'] = "Tài khoảng không hợp lệ.";	
			endif;	
		else:
			$error['all'] = "Tài khoảng và mật khẩu không hợp lệ.";	
		endif;	
	else:
		$error['username'] = "Tài khoảng không được trống.";	
	endif;
	//kiểm tra password
	if(!empty($_POST['password'])):
	else:
		$error['password'] = "Mật khẩu không được trống.";	
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
			    <label class="font-weight-bolder">Tên tài khoản :</label><span class="text-danger"></div><?php echo $error['username']; ?></span>
			    <input type="text" class="form-control" name="username">
			  <div class="form-group">
			    <label class="font-weight-bolder">Mật khẩu:</label><span class="text-danger"><?php echo $error['password']; ?></span>
			    <input type="password" class="form-control" name="password">
			  </div>
			  <div class="row">
			  	<div class="col">
			  		<div class="checkbox" width="50%">
				    <label class="inline"><input type="checkbox"> Nhớ tài khoản.</label>
				  	</div>
				</div>
			  	
			  </div>	  	
			  <button type="submit" class="btn btn-primary" name="signin">Đăng nhập</button>
			</form>
		</div>
		<div class="col"><img src="mvc/view/image/google.png"></div>
	</div>
</div>