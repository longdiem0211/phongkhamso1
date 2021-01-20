<style type="text/css">
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
          <div class="container">
          <li><a href="index.php">TRANG CHỦ</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li class="mr-4"><a href="makeAppointmentStep1.php">ĐẶT LỊCH</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li><a href="#">LIÊN HỆ</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          
          
          <li><a href="index.php#MEOVAT">MẮT KHỎE MỖI NGÀY</a>  
          </li>
          <?php if(isset($_COOKIE['username'])): ?>
            <li><a href="#">TÀI KHOẢN</a>
              <ul class="menucon">
                  <li><a href="info_Patient.php">THÔNG TIN CHUNG</a></li>
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

  
