<?php
if(!$_COOKIE['username-director']):
    header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$tenthuoc = $dvt = $soluong = $dongia ='';
$error = ['tenthuoc' => '', 'soluong' => '', 'dvt' =>'', 'dongia' => ''];
if(isset($_POST['add'])):

    if(!empty($_POST['tenthuoc'])):
            $tenthuoc = mysqli_real_escape_string($p->connDB(), $_POST['tenthuoc']);
            //$existthuoc = $p->exist_medicine($tenthuoc);
           // if($existthuoc):
               // $error['tenthuoc'] = 'Exist tenthuoc.Choose the other';     
            //endif;  
    else:
            $error['tenthuoc'] = 'Empty value.';
    endif;

   if(!empty($_POST['soluong'])):
            $soluong = mysqli_real_escape_string($p->connDB(), $_POST['soluong']);
    else:
            $error['soluong'] = 'Empty value.';
    endif;

    if(!empty($_POST['dvt'])):
            $dvt = mysqli_real_escape_string($p->connDB(), $_POST['dvt']);    
    else:
            $error['dvt'] = 'Empty value.';
    endif;

    if(!empty($_POST['dongia'])):
            $dongia= mysqli_real_escape_string($p->connDB(), $_POST['dongia']);  
    else:
            $error['dongia'] = 'Empty value.';
    endif;

    //kiểm tra tất cả dữ liệu
    if(!array_filter($error)):
        $sql = "insert into khothuoc(tenthuoc, soluong, dvt, dongia) values('$tenthuoc','$soluong','$dvt','$dongia')";
        if($p->multipleFunc($sql)):
            //header('location:view_medicine.php');
            echo "<script> alert('thêm thành công.')</script>";
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
        $("#tenthuoc").blur(function(){
            var u = $(this).val();
            $.get("checkthuoc.php",{un:u},function(data){
                
                if( data == '1'){
                    $("#loi").html("Thuốc đã tồn tại vui lòng  nhập tên khác");}
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
                        <p class="right__desc">Quản lí kho thuốc.</p><a href="view_medicine.php"> Xem tất cả danh sách thuốc.</a>
                        <hr>
                    </br>
                        <div class="right__formWrapper">
                            <form action="insert_medicine.php" method="post" enctype="multipart/form-data">
                                <div class="right__inputWrapper">
                                    <label for="name">Tên thuốc</label><span class="text-danger"><div id="loi"></div><?php echo $error['tenthuoc']; ?></span>
                                    <input type="text" name="tenthuoc" id="tenthuoc" required="required" value="<?php echo $tenthuoc;?>">
                                </div>


                                <div class="right__inputWrapper">
                                    <label for="title">Số lượng</label><span class="text-danger"><?php echo $error['soluong']; ?></span>
                                    <input type="number" name="soluong" required="required" value="<?php echo $soluong;?>">
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="title">Đơn vị tính</label>
                                    <input type="text" name="dvt" required="required" value="<?php echo $dvt;?>">
                                </div>
                    
                                <div class="right__inputWrapper">
                                    <label for="title">Giá / Đơn vị</label>
                                    <input type="text" name="dongia" required="required" value="<?php echo $dongia;?>">
                                </div>
                         
                                
                                <button class="btn btn-outline-info" type="submit" name="add">Thêm</button>
                            </form>

                        </div>
                    </div>
                </div>



 <?php include './view-dr/end.php';?>