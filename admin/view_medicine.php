<?php
if(!$_COOKIE['username-director']):
    header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
	$sql="select * from khothuoc";
    $allmedicine = $p->show_all_medicine($sql);                    
?>
<?php
include './view-dr/header_admin.php';
 include './view-dr/menu_admin.php';
?>
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Kho thuốc</p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên thuốc</th>
                                            <th>Số lượng</th>
                                            <th>Đơn vị tính</th>
                                            <th>Giá / Đơn vị</th>
                                        </tr>
                                    </thead>
                                <tbody>
                            
                                    
                <?php
                    if(!empty($allmedicine)):
                        foreach ($allmedicine as $key => $val) {
                             $key++;

                 ?>
                     
                
                                        <tr>
                                            <th scope="row"><?php echo $key;?></th>
                                            <td><?php echo $val['tenthuoc'];?></td>
                                            <td><?php echo $val['soluong'];?>
                                            	<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#updatemedicine<?php echo $key;?>">Cập nhật</button>

                 <div class="modal fade" id="updatemedicine<?php echo $key;?>" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content">
                      <div class="modal-body">
                        <p class="font-weight-bolder">Cập nhật số lượng thuốc.</p>
                        <form action="./controller-dr/soluongupdate.php" method="POST">
                        	<label for="title">Số lượng</label>
                        	<input type="hidden" name="id_thuoc" value="<?php echo $val['id_thuoc'];?>">
                                    <input type="number" name="soluong" required="required" value="<?php echo $val['soluong'];?>">
                            
                                    

                      </div>
                      <div class="modal-footer">
                            <button type="submit" class="btn btn-primary py-0" name="change">Thay đổi</button>
                        </form>
                        <a href="#" type="button" class="btn btn-secondary py-0" data-dismiss="modal">Đóng</a>
                      </div>
                    </div>
                  </div>
                </div>



                                            </td>
                                            <td><?php echo $val['dvt'];?></td>
                                            <td><?php echo $val['dongia'];?></td>
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