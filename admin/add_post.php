<?php
session_start();
if(!$_COOKIE['username-director']):
	header('location:index.php');
endif;
include './controller-dr/source-dr.php';
$p = new Mclass_dr;
$title = $content = '';
$error =['title' =>'', 'content'=>''];
if(isset($_POST['save'])):
    if(empty($_POST['title'])):
        $error['title'] = 'Empty title';
    else:
        $title = str_replace(" ' ", " \' ", $_POST['title']);    
    endif;
    if(empty($_POST['editor'])):
        $error['content'] = 'Empty content';
    else:
         $content = str_replace(" ' ", " \' ", $_POST['editor']);    
    endif;

    if(!array_filter($error)):
        $sql = "insert into tintuc(title, content,author) values('$title', '$content','admin') ";
        $p->multipleFunc($sql);
        $selected_tintuc = $p->show_detail_tin_tuc_bytitle($title);
        $_SESSION['id_tintuc'] = $selected_tintuc['id_tintuc'];
        header('location:./detail_post.php');
    endif;    
endif;    
?>

<?php
include './view-dr/header.php';
include './view-dr/sidebar_start.php';
?>
<script src="./controller-dr/ckeditor/ckeditor.js"></script>
<div class="container">
    
    
    <form action="./add_post.php" method="POST" >
        <div class="form-group mt-3">
            <label class="mb-0">Tiêu đề:</label><span class="text-danger"><?php echo $error['title'];?></span>
            <input type="text" class="form-control" name="title" value="<?php echo $title;?>">
        </div>
        <p class="text-danger m-0"><?php echo $error['content'];?></p>  
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