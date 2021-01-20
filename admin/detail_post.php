<?php
session_start();
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
if(isset($_POST['otherdetail']) || isset($_POST['detail'])):
    $_SESSION['id_tintuc'] = $_POST['id_tintuc'];
    // $id_tintuc = $_SESSION['id_tintuc'];
endif;    
$tintuc = $p->show_detail_tin_tuc($_SESSION['id_tintuc']);      
$title = isset($tintuc['title']) ? $tintuc['title'] : '';
$content = isset($tintuc['content']) ? $tintuc['content'] : '';   
?>

<?php
include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>
<script src="./controller-dr/ckeditor/ckeditor.js"></script>
<div class="container">
    
    
    <form action="./controller-dr/update_post.php" method="POST" >
        <div class="form-group mt-3">
            <label class="mb-0">Tiêu đề:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
          </div>
        <textarea id="editor" name="editor">
            <?php echo $content ?? '' ;?>
        </textarea>
        <div class="row justify-content-center mt-2">
            <div>
                <button type="submit" class="btn btn-primary py-1 mr-2" name="save">Lưu</button>
                <a href="manage_posts.php" class="btn btn-secondary py-1">Quay lại</a>
            </div>
        </div>
    </form>
    <script>
        CKEDITOR.replace( 'editor');
    </script>    
</div>
<?php
include './view-dr/sidebar_end.php';
?>