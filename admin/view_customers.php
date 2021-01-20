<?php
if(!$_COOKIE['username-director']):
    header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;

if(isset($_POST['on'])):
    $id_user = $_POST['id_user'];
    $sql = "update user set account = 'active' where id_user = '$id_user' ";
    $p->multipleFunc($sql);
endif;
if(isset($_POST['off'])):
    $id_user = $_POST['id_user'];
    $sql = "update user set account = 'unactive' where id_user = '$id_user' ";
    $p->multipleFunc($sql);
endif;  
 
    $all_user = $p->show_benh_nhan();                    
?>
<?php
	Include './view-dr/header_admin.php';
	include './view-dr/menu_admin.php';
 ?>
 <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Xem danh sách bệnh nhân</p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ và tên</th>
                                            <th>Hình ảnh</th>
                                            <th>Tuổi</th>
                                            <th>Giới tính</th>
                                            <th>ịa chỉ</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                <tbody>
                            
                                    
                <?php
                    if(!empty($all_user)):
                        foreach ($all_user as $key => $val) {
                             $key++;

                 ?>
                     
                
                                        <tr>
                                            <th scope="row"><?php echo $key;?></th>
                                            <td><?php echo $val['fullname'];?></td>
                                            <td><img src ='assets/anhadmin.jpg'></td>
                                            <td><?php echo $val['age'];?></td>
                                            <td><?php echo $val['gioitinh'];?></td>
                                            <td><?php echo $val['address'];?></td>
                                            <td><?php echo $val['sdt'];?></td>
                                            <td><?php echo $val['email'];?></td>
                                            

                                        </tr>


                                        
        <?php   }
            endif; 
        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
<?php
include './view-dr/end.php';
?>