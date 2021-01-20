<?php
if(!$_COOKIE['username-director']):
    header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $_COOKIE['username-director']; 
$director = $p->show_info_director($_COOKIE['id_director']);

if(isset($_POST['update'])):
    $fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);
    $gioitinh = mysqli_real_escape_string($p->connDB(), $_POST['gioitinh']);
    $age = mysqli_real_escape_string($p->connDB(), $_POST['age']);
    $sdt = mysqli_real_escape_string($p->connDB(), $_POST['sdt']);
    $address = mysqli_real_escape_string($p->connDB(), $_POST['address']);
    $sql = "update director 
            set fullname = '$fullname', gioitinh = '$gioitinh', age = '$age', sdt = '$sdt', address = '$address' 
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_director.php');
    else:
      echo 'Lỗi cập nhập.Xin thử lại.';  
    endif;        
  endif;

  if(isset($_POST['change_image'])):
    $name_image = mysqli_real_escape_string($p->connDB(), $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], './view-dr/image/anh_dai_dien' . '/' . $name_image);
    $sql = "update director
            set image = '$name_image'
            where username = '$username' ";
    if($p->multipleFunc($sql)):
      header('location:info_director.php');
    endif;
    // print_r($_FILES['image']);
    // echo './mvc/view/image/anh_dai_dien' . '/' . $name_image;         
  endif;    
?>
<?php
include './view-dr/header_admin.php';
 include './view-dr/menu_admin.php';
?>

<div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Bảng điều khiển</p>
                        <div class="right__cards">
                            <a class="right__card" href="view_doctor.php">
                                <div class="right__cardTitle">Sản Phẩm</div>
                                <div class="right__cardNumber">72</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="view_customers.html">
                                <div class="right__cardTitle">Khách Hàng</div>
                                <div class="right__cardNumber">12</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="view_p_category.html">
                                <div class="right__cardTitle">Danh Mục</div>
                                <div class="right__cardNumber">4</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="view_orders.html">
                                <div class="right__cardTitle">Đơn Hàng</div>
                                <div class="right__cardNumber">72</div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                        </div>
                        <div class="right__table">
                            <p class="right__tableTitle">Lịch khám mới</p>
                            <div class="right__tableWrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th style="text-align: left;">Email</th>
                                            <th>Số Hoá Đơn</th>
                                            <th>ID Sản Phẩm</th>
                                            <th>Số Lượng</th>
                                            <th>Kích thước</th>
                                            <th>Trạng Thái</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        <tr>
                                            <td data-label="STT">1</td>
                                            <td data-label="Email" style="text-align: left;">chibaosinger@gmail.com</td>
                                            <td data-label="Số Hoá Đơn">6577544</td>
                                            <td data-label="ID Sản Phẩm">2</td>
                                            <td data-label="Số Lượng">1</td>
                                            <td data-label="Kích thước">Trung Bình</td>
                                            <td data-label="Trạng Thái"> 
                                                Đã Thanh Toán
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="STT">2</td>
                                            <td data-label="Email" style="text-align: left;">midu@gmail.com</td>
                                            <td data-label="Số Hoá Đơn">4578644</td>
                                            <td data-label="ID Sản Phẩm">4</td>
                                            <td data-label="Số Lượng">2</td>
                                            <td data-label="Kích thước">Nhỏ</td>
                                            <td data-label="Trạng Thái"> 
                                                Đang Xử Lý
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="STT">3</td>
                                            <td data-label="Email" style="text-align: left;">miku@gmail.com</td>
                                            <td data-label="Số Hoá Đơn">2657544</td>
                                            <td data-label="ID Sản Phẩm">3</td>
                                            <td data-label="Số Lượng">5</td>
                                            <td data-label="Kích thước">Lớn</td>
                                            <td data-label="Trạng Thái"> 
                                                Đang Xử Lý
                                            </td>
                                        </tr>
                                        <tr>
                                            <td data-label="STT">4</td>
                                            <td data-label="Email" style="text-align: left;">dangthimydung@gmail.com</td>
                                            <td data-label="Số Hoá Đơn">9659544</td>
                                            <td data-label="ID Sản Phẩm">8</td>
                                            <td data-label="Số Lượng">12</td>
                                            <td data-label="Kích thước">Trung Bình</td>
                                            <td data-label="Trạng Thái"> 
                                                Đang Xử Lý
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="" class="right__tableMore"><p>Xem tất cả các đơn đặt hàng</p> <img src="assets/arrow-right-black.svg" alt=""></a>
                        </div>
                    </div>
                </div>

<?php include './view-dr/end.php' ?>