<?php
	if(!$_COOKIE['username']):
		header('location:index.php');	
	endif;
	include './mvc/controller/source.php';
?>
<?php
  include './mvc/view/header.php';
  include './mvc/view/menu.php';
  include './mvc/view/sidebar_start.php';
  $p = new Mclass;
  if(isset($_COOKIE['username'])&&!isset($_COOKIE['email'])){
  $username = $_COOKIE['username'];
  $user = $p->show_info($username);
	}

	if(isset($_COOKIE['username'])&&isset($_COOKIE['email'])){
  $username = $_COOKIE['username'];
  $email = $_COOKIE['email'];
  $user = $p->show_info_email($username,$email);
  }
?>
<div class = "container">
<center><h2>Thông tin tài khoản.</h2></center>
<center><hr width="200"></center>
	<div class="row mt-2">
		<div class="col-2"></div>
		<div class="col-1.5">
			<p class="font-weight-bolder">Tên tài khoản<p>
			<p class="font-weight-bolder">Mật khẩu</p>
			<p class="font-weight-bolder">Email</p>
		</div>
		<div class="col-1">
			<p class="font-weight-bolder">:<p>
			<p class="font-weight-bolder">:</p>
			<p class="font-weight-bolder">:</p>
		</div>
		<div class="col-3">
			<?php if($user): ;?>
			<p><?php echo $user['username']== false ? "<span class='font-italic font-weight-light'>Chưa cung cấp</span>": $user['username']; ?></p>
			<p>********</p>
			<p><?php echo $user['email'];?></p>
			<?php endif; ?>
		</div>
		<div class="col-6.5">
			<p style="padding-bottom: 24px;"></p>
			<p><a href="change_pass.php">Cập Nhật<img src="./mvc/view/image/edit.svg" width="20px" class="ml-1"></a></p>
			
			<p><a href="change_email.php">Cập Nhật<img src="./mvc/view/image/edit.svg" width="20px" class="ml-1"></a></p>
		</div>
	</div>
</div>
<?php include './mvc/view/sidebar_end.php'; ?> 
