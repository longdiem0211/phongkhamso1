<style type="text/css">
  #menu {
    background-color:#e5e5e5;
  }
  #menu ul{
  list-style-type:none;
  background:#ffffff;
  color:#404040;
  text-align:left;
  font-family:sans-serif;
  font-size:16px;
  border: solid 1px #e5e5e5;
  z-index:5;
}
#menu li{
  display:inline-block;
  width:200px;
  line-height:40px;
  margin-left:-5px;
  position:relative;
  text-align: center;
}
 a{
  color:#404040;
  text-decoration:none;
  display:block;
  
}
a:hover{
 text-decoration:none;  
  color:#1273eb;
  /*border: 1px solid;*/
}

.menucon{
  display:none;
  position:absolute;
}
.menucon li{
  display:block;
  margin-left: 0 !important;
}
#menu li:hover .menucon{
  display:block;
}
</style>
 <div id="menu">
  <ul class="mb-0">
      <?php if(isset($_GET['email'])){
        $email = $_GET['email'];
        ?>


        <div class="container">
          <li><?php echo '<a href="TrangChu.html?email='.$_GET['email'].'">TRANG CHỦ</a>';?>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li class="mr-4"><?php echo '<a href="DatLichKham1.html?email='.$_GET['email'].'">ĐẶT LỊCH</a>';?>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li><a href="https://video-call-1.glitch.me/ " target="_blank">LIÊN HỆ</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          
          
          <li><a href="TrangChu.html#MEOVAT">BÉ KHỎE BÉ NGOAN</a>  
          </li>

            <li><a href="#">TÀI KHOẢN</a>
              <ul class="menucon">
                  <li>
                    <?php echo '<a href="ThongTinCaNhan.html?email='.$_GET['email'].'">THÔNG TIN CHUNG</a>';?>

                    </li>
                  <li><a href="https://video-call-1.glitch.me/" target="_blank">LIÊN HỆ</li>
                  <li><a href="signout.php">ĐĂNG XUẤT</a></li>
                  <!-- <li><a href="#">xxx</a></li> -->
               </ul>
            </li> 
        </div>  
  </ul>
</div>


      <?php } ?>

<?php if (!isset($_GET['email'])) {?>
      
          <div class="container">
          <li><a href="TrangChu.html">TRANG CHỦ</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li class="mr-4"><a href="DatLichKham1.html">ĐẶT LỊCH</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li><a href="https://video-call-1.glitch.me/ " target="_blank">LIÊN HỆ</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          
          
          <li><a href="TrangChu.html#MEOVAT">BÉ KHỎE BÉ NGOAN</a>  
          </li>
          <?php if(isset($_COOKIE['username'])): ?>
            <li><a href="#">TÀI KHOẢN</a>
              <ul class="menucon">
                  <li><a href="ThongTinCaNhan.html">THÔNG TIN CHUNG</a></li>
                  <li><a href="https://video-call-1.glitch.me/" target="_blank">LIÊN HỆ</li>
                  <li><a href="signout.php">ĐĂNG XUẤT</a></li>
                  <!-- <li><a href="#">xxx</a></li> -->
               </ul>
            </li>
          <?php else: ?>
            <li><a href="signin.php">ĐĂNG NHẬP</a></li>
          <?php endif; ?>  
          
        </div>  
  </ul>
</div>
<?php } ?>
  
