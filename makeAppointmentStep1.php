<?php
	if(!$_COOKIE['username']):
		header('location:signin.php');	
	endif;
	include './mvc/controller/source.php';
?>
<?php
include './mvc/view/header.php';
include './mvc/view/menu.php';
// $p = new Mclass;
//   $username = $_COOKIE['username']; 
//   $user = $p->show_info($username);   
?>
<div class="container">
	<div class="row mt-4">

		<div class="col-4">  
    </div>

		<div class="col-4">
			<form action="DatLichKham2.html" method="POST">
				<h4 class="font-weight-bold text-center">ĐẶT LỊCH</h4>
				
				<div class="form-group mt-4">
                      <label class="font-weight-bolder">Chuyên khoa: </label>
                      <select class="form-control" name="id_khoa">
                       	<option value="2">Tư vấn (dinh dưỡng, chăm sóc ...)</option>
                        <option value="1">Điều trị (Sốt, tiêu chảy ..)</option>
                        
                        <!-- <option value="khoa_xetnghiem">Khoa xét nghiệm</option>
                        <option value="khoa_dinhduong">Khoa dinh dưỡng</option> -->
                      </select>
                      <small class="form-text text-muted">
                        <p class="m-0">- Xin vui lòng liên hệ qua hotline để được tư vấn chọn chuyên khoa.</p>
                        <p class="m-0">- Phí khám:120.000vnđ/lần</p>
                      </small>
                </div>

				<div class="form-group mb-4">
                      <label class="font-weight-bolder">Chọn chi nhánh: </label>
                      <select class="form-control" name="working_address">
                        <option value="govap">Phòng khám số 1(Quận 1)</option>
                        <option value="binhthanh">Phòng khám số 1(Quận 7)</option>
                        <option value="thuduc">Phòng khám số 1(Quận 10)</option>
                        <!-- <option value="tanbinh">Quận Tân Bình</option>
                        <option value="phunhan">Quận Phú Nhuận</option>
                        <option value="1">Quận 1</option>
                        <option value="5">Quận 5</option>
                        <option value="9">Quận 9</option>
                        <option value="12">Quận 12</option> -->
                      </select>
                </div>
          <div class="form-group">
            <label class="font-weight-bolder">Triệu chứng bệnh:</label>
            <textarea class="form-control" name ='trieuchung' rows="3" required="required"></textarea>
          </div>      
                <div class="text-center mt-4"><button type="submit" name="next" class="btn btn-primary">Xác Nhận</button></div>
			</form>
		</div>

		<div class="col-4"></div>
	</div>
</div>
