<?php
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;

if(isset($_POST['on'])):
	$id_doctor = $_POST['id_doctor'];
	$sql = "update doctor set account = 'active' where id_doctor = '$id_doctor' ";
	$p->multipleFunc($sql);
endif;
if(isset($_POST['off'])):
	$id_doctor = $_POST['id_doctor'];
	$sql = "update doctor set account = 'unactive' where id_doctor = '$id_doctor' ";
	$p->multipleFunc($sql);
endif;	

if(isset($_POST['search'])):

	if(!empty($_POST['chuyenkhoa'])):
		$chuyenkhoa = $_POST['chuyenkhoa'];
		$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa where b.name = '$chuyenkhoa' order by b.id_khoa asc,account asc";
		// order by b.id_khoa asc"
		if(!empty($_POST['account'])):
			$account = $_POST['account'];
			$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa where b.name = '$chuyenkhoa' and a.account = '$account' order by b.id_khoa asc,account asc";	
		endif;
		$alldoctors = $p->show_all_doctor($sql);	
	elseif(!empty($_POST['account'])):
		$account = $_POST['account'];
		$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa where a.account = '$account' order by b.id_khoa asc,account asc";	
		$alldoctors = $p->show_all_doctor($sql);
	else:
		$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa order by b.id_khoa asc,account asc";	
		$alldoctors = $p->show_all_doctor($sql);		
	endif;	
else:
	$sql = "select * from doctor a join khoa b on a.id_khoa = b.id_khoa order by b.id_khoa asc,account asc";	
	$alldoctors = $p->show_all_doctor($sql);					
endif;	
?>
<?php
include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>
<center><h1>- Quản lí tài khoản bác sĩ -</h1></center>
<hr style="width:200px">

<div class="container">
	<div class="row">
		<div class="col-8">
			<div class="row" >
			
			<form action="manage_doctor.php" method="POST" class="form-inline">
				<select class="custom-select custom-select-sm my-1 mr-1" name="chuyenkhoa">
				  <option value="">Chuyên khoa</option>
				  <option value="khoa_noi" 
				  <?php 
				  	if(isset($_POST['search'])):
				  		if($_POST['chuyenkhoa'] == 'khoa_noi'):
				  			echo "selected";
				  		endif;	
				  	endif;	
				  ?> >Tật về mắt.</option>
				  <option value="khoa_ngoai"
				  <?php 
				  	if(isset($_POST['search'])):
				  		if($_POST['chuyenkhoa'] == 'khoa_ngoai'):
				  			echo "selected";
				  		endif;	
				  	endif;	
				  ?>>Bệnh về mắt.</option>
				 
				</select>
			
		
				<select class="custom-select custom-select-sm m-1" name="account">
				  <option value="">Quyền truy cập</option>
				  <option value="active"
				  <?php 
				  	if(isset($_POST['search'])):
				  		if($_POST['account'] == 'active'):
				  			echo "selected";
				  		endif;	
				  	endif;	
				  ?>>Có quyền truy cập</option>
				  <option value="unactive"<?php 
				  	if(isset($_POST['search'])):
				  		if($_POST['account'] == 'unactive'):
				  			echo "selected";
				  		endif;	
				  	endif;	
				  ?>>Không được phép</option>
				</select>
				<button class="btn btn-outline-info py-0 m-1" type="submit" name="search">Tìm kiếm</button>
			</form>	
			</div>
		</div>
		<!--<div class="col-4 text-right mt-3"><a href="add_doctor.php" class="btn btn-outline-primary">Thêm bác sĩ</a></div>-->
	</div>

	<div class="row">
		<table class="table table-bordered text-center">
		  <thead class="table-info">
		    <tr>
		      <th scope="col">STT</th>
		      <th scope="col">Họ và Tên</th>
		      <th scope="col">Chuyên khoa</th>
		      <th scope="col">Khu vực làm việc</th>
		      <th scope="col">Thông tin chi tiết</th>
			  <th scope="col">Mật khẩu</th>
		      <th scope="col">Cấp phát quyền.</th>
		    </tr>
		  </thead>
		  <tbody>
		<?php
			if(!empty($alldoctors)):
				foreach ($alldoctors as $key => $val) 
				{

					$key++;
		?>			
		    <tr>
		      <th scope="row"><?php echo $key;?></th>
		      <td><?php echo $val['fullname'];?></td>
		      <td><?php echo $val['nameF'];?></td>
		      <td><?php  
		      			if($val['working_address']=='govap'):
		      				echo 'Phòng khám số 1(Quận 1)';
		      			elseif($val['working_address'] =='binhthanh'):
		      				echo 'Phòng khám số 1(Quận 7)';
		      			else:
		      				echo 'Phòng khám số 1(Quận 10)';		
		  				endif;
		      ?><a href="#">Cập nhật<img src="./view-dr/image/edit.svg" width="10px" class="ml-1" data-toggle="modal" data-target="#editworkingaddress<?php echo $key;?>"></a></td>
		      <!-- Modal khu vực làm việc -->
				<div class="modal fade" id="editworkingaddress<?php echo $key;?>" tabindex="-1" role="dialog"  aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered modal-sm">
				    <div class="modal-content">
				      <div class="modal-body">
				      	<p class="font-weight-bolder">Khu vực làm việc:</p>
				        <form action="./controller-dr/changeworkingaddress.php" method="POST">
				        	<input type="hidden" name="id_doctor" value="<?php echo $val['id_doctor'];?>">
				        	<select class="custom-select custom-select-sm" name="working_address">
				        		<?php 
				        			if($val['working_address'] == 'govap'):
				        				echo "selected";	
				        			endif;	
				        		?>
							  <option selected value="">--Chọn khu vực làm việc--</option>
							  <option value="thuduc"
							  <?php 
				        			if($val['working_address'] == 'thuduc'):
				        				echo "selected";	
				        			endif;	
				        		?>>Phòng khám số 1(Quận 10)</option>
							  <option value="govap" 
							  <?php 
				        			if($val['working_address'] == 'govap'):
				        				echo "selected";	
				        			endif;	
				        		?>>Phòng khám số 1(Quận 1)</option>
							  <option value="binhthanh"
							  <?php 
				        			if($val['working_address'] == 'binhthanh'):
				        				echo "selected";	
				        			endif;	
				        		?>>Phòng khám số 1(Quận 7)</option>
							</select>
				      </div>
				      <div class="modal-footer">
				      		<button type="submit" class="btn btn-primary py-0" name="change">Thay đổi</button>
				      	</form>
				        <a href="#" type="button" class="btn btn-secondary py-0" data-dismiss="modal">Đóng</a>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- end modal -->
		      <td><button class="btn btn-outline-info py-0" data-toggle="modal" data-target="#xem<?php echo $key;?>">Xem</button>
		      	<div class="modal fade" id="xem<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body text-left">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
						<center><h2>Thông tin bác sĩ.</h2></center>
				        <p><span class="font-weight-bolder">Họ và tên: </span><span><?php echo $val['fullname'];?></span></p>
				        <p><span class="font-weight-bolder">Tuổi: </span><span><?php echo $val['age'];?></span></p>
				        <p><span class="font-weight-bolder">Giới tính: </span><span><?php echo ($val['gioitinh'] == 'Male') ? 'Nam' : 'Nữ' ;?></span></p>
				        <p><span class="font-weight-bolder">Email: </span><span><?php echo $val['email'];?></span></p>
				        <p><span class="font-weight-bolder">Số điện thoại: </span><span><?php echo $val['sdt'];?></span></p>
				        <p><span class="font-weight-bolder">Địa chỉ nhà: </span><span><?php echo $val['address'];?></span></p>
				        <p><span class="font-weight-bolder">Chuyên khoa: </span><span><?php echo $p->show_chuyen_khoa($val['id_doctor']);?></span></p>
				        <p><span class="font-weight-bolder">Chi nhánh: </span><span><?php 
				        if($val['working_address']=='govap'):
		      				echo 'Phòng khám số 1(Quận 1)';
		      			elseif($val['working_address'] =='binhthanh'):
		      				echo 'Phòng khám số 1(Quận 7)';
		      			else:
		      				echo 'Phòng khám số 1(Quận 10)';		
		  				endif;?></span></p>
				        <p><span class="font-weight-bolder">Ngày tạo: </span><span><?php echo date('H-i d-m-Y',strtotime($val['created_at']));?></span></p>
				        
				        
				      </div>
				      <div class="modal-footer">
				        <a href="#" class="btn btn-secondary py-0" data-dismiss="modal">Close</a>
				      </div>
				    </div>
				  </div>
				</div></td>
				<td><button class="btn btn-outline-info py-0" data-toggle="modal" data-target="#chitiet<?php echo $key;?>">Reset</button>
		      	<div class="modal fade" id="chitiet<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body text-left">
				      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				       
				        <center><h2 style="color:red">Lưu ý !!!</h2></center>
						<p style="color:red">Chỉ được reset khi có giấy yêu cầu của bác sĩ.</p>
						<p style="color:red">Mật khẩu sau khi reset là "123".</p>
				        <form action="./controller-dr/resetpasswordfordoctor.php" method="POST" id="formresetpass<?php echo $key;?>">
							
				        	<center><p class="font-italic mb-0 pb-0" id="reset<?php echo $key;?>"><a href="#">XÁC NHẬN</a></p></center>
				        	<input type="hidden" name="id_doctor" value="<?php echo $val['id_doctor'];?>">
				        	<button type="submit" id='resetpassword<?php echo $key;?>' name="resetpassword" style="display: none"></button>
				        </form>
				        <script type="text/javascript">
				        	$("#reset<?php echo $key;?>").click(function(){
				        		$("#resetpassword<?php echo $key;?>").click();
				        	})
				        </script>
				        
				      </div>
				      <div class="modal-footer">
				        <a href="#" class="btn btn-secondary py-0" data-dismiss="modal">Close</a>
				      </div>
				    </div>
				  </div>
				</div></td>
		      <td>
		      	
		      	<?php
		      		if($val['account'] =='active'):
		      	?>
		      	<button class="btn btn-outline-danger py-0" data-toggle="modal" data-target="#unactive_modal<?php echo $key;?>">Hủy quyền truy cập</button>
		      	<!-- modal OFF -->
		      	<div class="modal fade" id="unactive_modal<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body">
				        <p class="m-0">Vô hiệu hóa tài khoản này?</p>
				        <small>Lưu ý:Sau khi vô hiệu hóa tài khoản,người dùng sẽ không thể truy cập vào hệ thống.</small>
				      </div>
				      <div class="modal-footer">
				      	<form action="manage_doctor.php" method="POST">
				      		<input type="hidden" name="id_doctor" value="<?php echo $val['id_doctor'] ;?>" >
				        	<button type="submit" class="btn btn-danger py-0" name="off">Xác nhận</button>
				        </form>
				        <a href="#" class="btn btn-secondary py-0" data-dismiss="modal">Đóng</a>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- end modal OFF -->
		      	<?php	
		      		else:
		      	?>
		      	<button class="btn btn-outline-success py-0" data-toggle="modal" data-target="#active_modal<?php echo $key;?>">Cho phép truy cập</button>
		      	<!-- modal ON -->
		      	<div class="modal fade" id="active_modal<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      <div class="modal-body">
				        <p class="m-0">Kích hoạt tài khoản này?</p>
				        <small>Lưu ý:Sau khi kích hoạt tài khoản,người dùng có quyền truy cập vào hệ thống.</small>
				      </div>
				      <div class="modal-footer">
				      	<form action="manage_doctor.php" method="POST">
				      		<input type="hidden" name="id_doctor" value="<?php echo $val['id_doctor'] ;?>" >
				      		<button type="submit" class="btn btn-success py-0" name="on">Xác nhận</button>
				      	</form>	
				        <a href="#" class="btn btn-secondary py-0" data-dismiss="modal">Đóng</a>
				      </div>
				    </div>
				  </div>
				</div>
				<!-- end modal ON -->		
		      	<?php	
		      		endif; 
		      	?>
		      </td>
		    </tr>
		<?php	}
			endif; 
		?>    
		  </tbody>
		</table>
	</div>
</div>
<?php
include './view-dr/sidebar_end.php';
?>