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
                            <a class="right__card" href="view_customers.php">
                                <div class="right__cardTitle">Bệnh nhân</div>
                                <div class="right__cardNumber">
                                    <?php 
                                        $count = $p->show_all_user("select * from user");
                                        if(!empty($count)):
                                            foreach ($count as $key => $val) {
                             $key++;
                                        }
                                        endif;
                                        echo $key;

                                     ?>
                    
                 
                                    
                                </div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="view_doctor.php">
                                <div class="right__cardTitle">Bác sĩ</div>
                                <div class="right__cardNumber">
                                    <?php 
                                        $count = $p->show_all_user("select * from doctor");
                                        if(!empty($count)):
                                            foreach ($count as $key => $val) {
                             $key++;
                                        }
                                        endif;
                                        echo $key;

                                     ?>

                                </div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            
                           <a class="right__card" href="view_medicine.php">
                                <div class="right__cardTitle">Tổng Số loại Thuốc</div>
                                <div class="right__cardNumber">
                                     <?php 
                                        $count = $p->show_all_medicine("select * from khothuoc");
                                        if(!empty($count)):
                                            foreach ($count as $key => $val) {
                             $key++;
                                        }
                                        endif;
                                        echo $key;

                                     ?>
                                </div>
                                <div class="right__cardDesc">NULL <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="">
                                <div class="right__cardTitle">Tổng số phiếu khám</div>
                                <div class="right__cardNumber">
                                    <?php 
                                        $count = $p->show_all_user("select * from phieukham");
                                        if(!empty($count)):
                                            foreach ($count as $key => $val) {
                             $key++;
                                        }
                                        endif;
                                        echo $key;

                                     ?>
                                </div>
                            </a>
                        </div>

                        <?php 
                            $sql = "select TOP 5 PERCENT id_phieukham FROM phieukham;";
                            $allmedicine = $p->multipleFunc($sql);
                        ?>
                        <div class="right__table"><center>
                            <p class="right__tableTitle"><h2>Phòng Khám Số 1</h2></p>
                            <p><h3>Director </h3> </p><p><h4>Tạ Đức Lộc - Huỳnh Long Diệm </h4></p>
                            <hr style="width: 50%">
                            </center>
                            
                        </div>
                    </div>
                </div>
<?php include './view-dr/end.php'; ?>