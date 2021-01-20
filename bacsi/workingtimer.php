<?php
if(!$_COOKIE['username-doctor']):
	header('location:index.php');
endif;
 include './controller-mb/source-mb.php';
$p = new Mclass_mb;
 $id_doctor = $_COOKIE['id_doctor'];
 if(isset($_POST['nghilam'])):
 	if(isset($_POST['mui_gio_ban1'])):
 		$ngaynghi = $_POST['mui_gio_ban1'].'_'.$_POST['ngay_ban'];
 		$sql = "insert into lichnghi(ngaynghi, id_doctor) values('$ngaynghi', '$id_doctor')";
 		$p->multipleFunc($sql);
 	endif;	
 	if(isset($_POST['mui_gio_ban2'])):
 		$ngaynghi = $_POST['mui_gio_ban2'].'_'.$_POST['ngay_ban'];
 		$sql = "insert into lichnghi(ngaynghi, id_doctor) values('$ngaynghi', '$id_doctor')";
 		$p->multipleFunc($sql);
 	endif;
 	if(isset($_POST['mui_gio_ban3'])):
 		$ngaynghi = $_POST['mui_gio_ban3'].'_'.$_POST['ngay_ban'];
 		$sql = "insert into lichnghi(ngaynghi, id_doctor) values('$ngaynghi', '$id_doctor')";
 		$p->multipleFunc($sql);
 	endif;
 	if(isset($_POST['mui_gio_ban4'])):
 		$ngaynghi = $_POST['mui_gio_ban4'].'_'.$_POST['ngay_ban'];
 		$sql = "insert into lichnghi(ngaynghi, id_doctor) values('$ngaynghi', '$id_doctor')";
 		$p->multipleFunc($sql);
 	endif;
 endif;
$lichnghi = $p->show_lich_nghi($id_doctor);
?>
<?php 
include './view-mb/header.php';
include './view-mb/sidebar_start.php';
?>
<div class="container">
	<div class="row" style="border-bottom: solid 1px #e5e5e5;">
		<div class="col-2">
		</div>
		<div class="col-3" style="padding-top: 50px">
			<form action="workingtimer.php" method="POST">
			<div class="form-group">
			    <label class="m-0 font-weight-bolder">Đăng kí ngày nghỉ:</label>
			    <input type="date" class="form-control" name="ngay_ban" min="<?php echo date('Y-m-j',time()) ;?>">
			</div>
			<p class="m-0 font-weight-bolder">Chọn thời gian nghỉ: (Lưu ý: nếu nghỉ nguyên ngày chọn tất cả.)</p>
			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="customCheck1" name="mui_gio_ban1" value="1">
			  <label class="custom-control-label" for="customCheck1">07:00 - 09:00</label>
			</div>
			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="customCheck2" name="mui_gio_ban2" value="2">
			  <label class="custom-control-label" for="customCheck2">09:00 - 11:00</label>
			</div>
			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="customCheck3" name="mui_gio_ban3" value="3">
			  <label class="custom-control-label" for="customCheck3" >15:00 - 17:00</label>
			</div>
			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="customCheck4" name="mui_gio_ban4" value="4">
			  <label class="custom-control-label" for="customCheck4">17:00 - 19:00</label>
			</div>
			
			<button type="submit" class="btn btn-primary py-0 mb-2" name="nghilam">Xác nhận</button>
			</form>
		</div>
		<div class="col-1"></div>
		<div class="col-4">
		<h5 class="text-center mt-3 font-weight-bolder">THỜI GIAN NGHỈ</h5>
		<table class="table table-bordered text-center">
		  <thead>
		    <tr class="bg-dark" style="color: white">
		      <th scope="col">Số thứ tự</th>
		      <th scope="col">Thời gian nghỉ</th>
		      <th scope="col">Ngày Nghỉ</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	if(!empty($lichnghi)):
		  		foreach ($lichnghi as $key => $val) { ?>		
		    <tr>
		      <th scope="row"><?php echo $key+1 ?></th>
		      <td><?php 
		      		$array_ngaynghi = explode('_', $val['ngaynghi']);
		      		if($array_ngaynghi[0] == 1): echo '07:00 - 09:00';
		      		elseif($array_ngaynghi[0] == 2):echo '09:00 - 11:00';
		      		elseif($array_ngaynghi[0] == 3):echo '13:00 - 17:00';
		      		else:echo '17:00 - 19:00';
		      		endif;	
		       ?></td>
		      <td><?php echo date('j-m-Y', strtotime($array_ngaynghi['1'])); ?></td>
		    </tr>
			<?php }	
		  	else:
		  		echo 'Không có ngày nghỉ nào.';	
		  	endif;	
		  	?>
		  </tbody>
		</table>
		</div>
	</div>
</div>
<?php
include './view-mb/sidebar_end.php';
?>