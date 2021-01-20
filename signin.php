<?php
include './mvc/controller/source.php';
$p = new Mclass;
$username = $password = '';
$error = ['username' => '', 'password' => '', 'all' => ''];
if(isset($_POST['signin'])):
    if(!empty($_POST['username'])):
        $username = mysqli_real_escape_string($p->connDB(), $_POST['username']);
        $checkUser = $p->exist_user($username);
        if($checkUser):
            if($checkUser['password'] == md5($_POST['password'])):
                // sử dụng cookie trong vòng 30 ngày sau 30 ngày phải đăng nhập lại
                setcookie('username', $username,strtotime("+30 days"));
                header('location:index.php');
            else:
                $error['all'] = "Thông tin không chính xác.";   
            endif;  
        else:
            $error['all'] = "Thông tin không chính xác.";   
        endif;  
    else:
        $error['username'] = "Không được để trống.";    
    endif;
    //kiểm tra password
    if(!empty($_POST['password'])):
    else:
        $error['password'] = "Không được để trống.";    
    endif;  
endif;  
?>
        <?php
        session_start();
        if (!empty($_SESSION['current_user'])) {
            $currentUser = $_SESSION['current_user'];
            ?>
           <center><h2>Xin chào <?= $currentUser['fullname'] ?></h2>
           	<br/><h4>Co phai email cua ban : <?= $currentUser['email'] ?></h4>
                <!-- <a href="./index.php?email=<?= $currentUser['email'] ?>">Truy caap</a> --><br/>
                <form action="index.php" method="POST">
                  
                  <?php 
                  setcookie('username',$currentUser['email'],strtotime("+30 days"));
                  setcookie('email',$currentUser['email'],strtotime("+30 days"));
                    
                  ?>
                   <button type="submit" class="btn btn-primary" name="signin">Đăng nhập</button>
                </form>
                <a href="./signout.php">Đăng xuất</a></center>
                
            </div>
            <?php
        } else {
            include './google_source.php';
            ?>
            <?php
            include './mvc/view/header.php';
                ?>
                <style type="text/css">
                body{
                 background-image: url("mvc/view/image/aa.jpg");


                    }
                    </style>
            <div class="container" style="border-top: solid 1px #e5e5e5;">
                 <div class="row mt-3 mb-2">
            
                </div>
             </div>  


           <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="signin.php" class="card p-3" method="POST">
                <h4 class="font-weight-bold ">Đăng Nhập</h4>
                <p class="m-0 p-0 text-danger"><?php echo $error['all']; ?></p> 
                <div class="form-group">
                <label class="font-weight-bolder">Tên tài khoản :</label><span class="text-danger"><?php echo $error['username']; ?></span>
                <input type="text" class="form-control" name="username">
              </div>
              <div class="form-group">
                <label class="font-weight-bolder">Mật khẩu:</label><span class="text-danger"><?php echo $error['password']; ?></span>
                <input type="password" class="form-control" name="password">
              </div>
              <div class="row">
                <div class="col">
                    <div class="checkbox" width="50%">
                    <?php if(isset($authUrl)){ ?>
                    <a href="<?= $authUrl ?>"><img src="./mvc/view/image/google.png" alt='google login' title="Google Login" height="100%" width="100%" /></a>
                    <?php } ?>
                    </div>

                </div>
                <div class="col">
                    <a href="signup.php">Đăng kí tài khoản</a>
                </div>
              </div>
              <hr>        
              <button type="submit" class="btn btn-primary" name="signin">Đăng nhập</button>

            </form>
        </div>
<div class="col"></div>

    </div>
</div>
        <?php } ?>
    </body>
</html>