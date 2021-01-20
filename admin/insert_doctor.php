<?php
if(!$_COOKIE['username-director']):
    header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$username = $fullname = '';
$error = ['username' => '', 'password' => '', 'fullname' => '','id_khoa'=>'', 'working_address'=>''];
if(isset($_POST['add'])):

    if(!empty($_POST['username'])):
            $username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
            $existDoctor = $p->exist_doctor($username);
            if($existDoctor):
                $error['username'] = 'Exist username.Choose the other';     
            endif;  
    else:
            $error['username'] = 'Empty value.';
    endif;

    if(!empty($_POST['password'])):
            $password = mysqli_real_escape_string($p->connDB(), $_POST['password']);
            if( strlen($password) < 2 && strlen($password) >= 30){ 
                $error['password'] = "Invalid password!";
            }else {
            $password = md5($password);
            }   
    else:
            $error['password'] = 'Empty value.';
    endif;

    if(!empty($_POST['fullname'])):
            $fullname = mysqli_real_escape_string($p->connDB(), $_POST['fullname']);    
    else:
            $error['fullname'] = 'Empty value.';
    endif;

    if(!empty($_POST['id_khoa'])):
            $id_khoa = mysqli_real_escape_string($p->connDB(), $_POST['id_khoa']);  
    else:
            $error['id_khoa'] = 'Empty value.';
    endif;

    if(!empty($_POST['working_address'])):
            $working_address = mysqli_real_escape_string($p->connDB(), $_POST['working_address']);  
    else:
            $error['working_address'] = 'Empty value.';
    endif;

    //kiểm tra tất cả dữ liệu
    if(!array_filter($error)):
        $sql = "insert into doctor(username, password, fullname,id_khoa, working_address, account) values('$username', '$password', '$fullname', '$id_khoa', '$working_address','active')";
        if($p->multipleFunc($sql)):
            header('location:view_doctor.php');
            endif;
    endif;  
endif;  
?>

<?php
include './view-dr/header_admin.php';
 include './view-dr/menu_admin.php';
?>
<script type="text/javascript" src="./js/jquery-3.5.1.min.js"></script>
<script >
    $(document).ready(function(){
        $("#username").blur(function(){
            var u = $(this).val();
            $.get("checkuser.php",{un:u},function(data){
                
                if( data == '1'){
                    $("#loi").html("Tên đã tồn tại vui lòng  nhập tên khác");}
                else{
                    $("#loi").html("");
                }

                });
            })
        });

</script>
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">THÊM BÁC SĨ</p>
                        <div class="right__formWrapper">
                            <form action="insert_doctor.php" method="post" enctype="multipart/form-data">
                                <div class="right__inputWrapper">
                                    <label for="title">Tên tài khoản</label><span class="text-danger"><div id="loi"></div><?php echo $error['username']; ?></span>
                                    <input type="text" name="username" id="username" required="required" value="<?php echo $username;?>">
                                </div>


                                <div class="right__inputWrapper">
                                    <label for="title">Mật khẩu</label><span class="text-danger"><?php echo $error['password']; ?></span>
                                    <input type="password" class="form-control" name="password" required="required">
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="title">Họ và tên</label>
                                    <input type="text" name="fullname" required="required" value="<?php echo $fullname;?>">
                                </div>
                    
                                <div class="right__inputWrapper">
                                    <label for="p_category">Chọn chuyên khoa</label>
                                    <span class="text-danger"><?php echo $error['id_khoa']; ?></span>
                                    <select name="id_khoa">
                                        <option disabled selected>Mời bạn chọn chuyên khoa</option>
                                        <option value="1"
                          <?php 
                            if(isset($_POST['add'])):
                                if($_POST['id_khoa'] == '1'):
                                    echo "selected";
                                endif;  
                            endif;  
                          ?>>Khoa tật về mắt.</option>
                          <option value="2"
                          <?php 
                            if(isset($_POST['add'])):
                                if($_POST['id_khoa'] == '2'):
                                    echo "selected";
                                endif;  
                            endif;  
                          ?>>Khoa bệnh về mắt.</option>
                                    </select>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="category">Chọn chi nhánh</label>
                                    <span class="text-danger"><?php echo $error['working_address']; ?></span>
                                    <select name="working_address">
                                        <option>Mời bạn chọn chi nhánh.</option>
                          <option value="govap"
                          <?php 
                            if(isset($_POST['add'])):
                                if($_POST['working_address'] == 'govap'):
                                    echo "selected";
                                endif;  
                            endif;  
                          ?>>Phòng khám số 1(Quận 1)</option>
                          <option value="binhthanh"
                          <?php 
                            if(isset($_POST['add'])):
                                if($_POST['working_address'] == 'binhthanh'):
                                    echo "selected";
                                endif;  
                            endif;  
                          ?>>Phòng khám số 1(Quận 7)</option>
                          <option value="thuduc"
                          <?php 
                            if(isset($_POST['add'])):
                                if($_POST['working_address'] == 'thuduc'):
                                    echo "selected";
                                endif;  
                            endif;  
                          ?>>Phòng khám số 1(Quận 10)</option>
                                    </select>
                                </div>
                                
                                <button class="btn btn-outline-info" type="submit" name="add">Thêm</button>
                            </form>
                        </div>
                    </div>
                </div>
<?php include './view-dr/end.php'; ?>