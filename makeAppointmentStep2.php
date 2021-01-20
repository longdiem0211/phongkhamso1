<?php
session_start();
	if(!$_COOKIE['username']):
		header('location:signin.php');	
	endif;
	include './mvc/controller/source.php';
?>
<?php
include './mvc/view/header.php';
include './mvc/view/menu.php';
$p = new Mclass;
//   $username = $_COOKIE['username']; 
//   $user = $p->show_info($username);
if(isset($_POST['next'])):
	$id_khoa = $_POST['id_khoa'] ?? ' ';
	$working_address = $_POST['working_address'] ?? ' ';
	$_SESSION['trieuchung'] = $_POST['trieuchung'] ?? ' ';
	$doctors = $p->show_doctor($id_khoa, $working_address);
endif;	
?>
<div class="container">
	<h3 class="font-weight-bolder text-center mt-4">LỰA CHỌN BÁC SĨ KHÁM</h3>
	<div class="row">
		<?php if(isset($doctors)):
			foreach ($doctors as $doctor) { ?>
		<?php 
			if($doctor['working_address'] == 'govap'):
				$working_address = 'Phòng khám số 1(Quận 1)'; 
			elseif($doctor['working_address'] == 'binhthanh'):
				$working_address = 'Phòng khám số 1(Quận 7)';
			elseif($doctor['working_address'] == 'thuduc'):
				$working_address = 'Phòng khám số 1(Quận 10)';
			endif;
			if($doctor['gioitinh'] == 'Male'):
				$gioitinh = "Nam";
			else:
				$gioitinh = "Nữ";
			endif;		
		?>		
		<div class="col-4">
			<div class="card">
			  <div class="card-body">
			    <h5 class="card-title font-weight-bolder text-center"><?php echo $doctor['fullname'];?></h5>
			    <p class="text-center"><img src="./mvc/view/image/anh_dai_dien/doctor_demo_image.svg" width="45px"></p>
			   	<p class="card-text"><span class="font-weight-bolder">Chuyên khoa: </span><?php echo $p->show_chuyen_khoa($doctor['id_doctor']) ;?></p>
			   	<p class="card-text"><span class="font-weight-bolder">Tuổi: </span><?php echo $doctor['age'] ;?></p>
			   	<p class="card-text"><span class="font-weight-bolder">Giới tính: </span><?php echo $gioitinh ;?></p>
			   	<p class="card-text"><span class="font-weight-bolder">Chi nhánh: </span><?php echo $working_address ;?></p>
			   	<p class="card-text"><span class="font-weight-bolder">Hotline: </span><?php echo $doctor['sdt'] ;?></p>
			   	<div class="row">
			   		<div class="col-4"><a href="makeAppointmentStep1.php"><button class="btn btn-outline-secondary mr-2">QuayLại</button></a></div>
			   	<form action="DatLichKham3.html" method="POST">
			   		<input type="hidden" name="id_doctor" value="<?php echo $doctor['id_doctor']; ?>">
			   		<input type="hidden" name="trieuchung" value="<?php echo $_POST['trieuchung'];?>">	
			   		<div class="col-3 pl-0"><button class="btn btn-outline-primary" type="submit" name="next">Chọn</button></div>
			   	</div>
			   	</form>  
			  </div>
			</div>
		</div>
		<?php } ;?>
		<?php else:
		echo "Không có bác sĩ nào.Vui lòng quay lại."; ?>
		<?php endif; ?>
	</div>
	<!-- div thẻ row -->
</div>