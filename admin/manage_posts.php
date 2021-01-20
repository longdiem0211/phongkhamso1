<?php
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$tintuc = $p->show_tin_tuc();  
?>

<?php
include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>
<div class="container">
    <div class="row justify-content-end my-2">
        <div class="col-2 text-right">
            <a href="add_post.php" class="btn btn-outline-primary py-0">Tạo mới</a>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered text-center">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tiêu đề</th>
              <th scope="col">Tác giả</th>
              <th scope="col">Xuất bản</th>
              <th scope="col">Hiệu chỉnh</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                if(!empty($tintuc)):
                    foreach ($tintuc as $key => $val) {
                        $key++;
            ?>
            <tr>
              <th scope="row"><?php echo $key;?></th>
              <td class="text-truncate" style="max-width: 300px;">
                <a href="#" id="linkdetail<?php echo $key;?>"><?php echo $val['title'];?></a>
                <form action="detail_post.php" method="POST" id="detailform<?php echo $key;?>">
                    <input type="hidden" name="id_tintuc" value="<?php echo$val['id_tintuc'];?>">
                    <input type="submit" name="detail" id="detail<?php echo $key;?>" style="display: none;">
                </form>
                <script type="text/javascript">
                            $("#linkdetail<?php echo $key;?>").click(function(){
                                $("#detail<?php echo $key;?>").click();
                            })
                </script>
              </td>  
              <td><?php echo $val['author'];?></td>
              <td><?php echo date('H:i / j-m-Y',strtotime($val['created_at']));?></td>
              <td>
                <form action="detail_post.php" method="POST" id="otherdetailform<?php echo $key;?>">
                    <input type="hidden" name="id_tintuc" value="<?php echo$val['id_tintuc'];?>">
                    <input type="submit" name="otherdetail" id="otherdetail<?php echo $key;?>" style="display: none">
                </form>
                <button type="button" class="btn btn-outline-info py-0" id="btndetail<?php echo $key;?>">Chi tiết</button>
                <script type="text/javascript">
                            $("#btndetail<?php echo $key;?>").click(function(){
                                $("#otherdetail<?php echo $key;?>").click();
                            })
                </script>
                <button type="button" class="btn btn-outline-danger py-0" data-toggle="modal" data-target="#delpost<?php echo $key;?>">Xóa</button>
                <!-- Modal -->
                <div class="modal fade" id="delpost<?php echo $key;?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content ">
                      <div class="modal-body">
                        <p class="mb-0 font-weight-bold">Bạn thực sự muốn xóa bài viết này?</p>
                      </div>
                      <div class="modal-footer">
                        <form action="./controller-dr/delete_post.php" method="POST">
                            <input type="hidden" name="id_tintuc" value="<?php echo $val['id_tintuc'];?>">
                            <button type="submit" class="btn btn-danger py-0" name="del">Xác nhận</button>
                        </form>
                        <button type="button" class="btn btn-secondary py-0" data-dismiss="modal">Đóng</button>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            <?php            
                    }
                else:
                    echo 'Không có tin tức nào';
                endif;    
            ?>
          </tbody>
        </table>
    </div>
</div>
<?php
include './view-dr/sidebar_end.php';
?>