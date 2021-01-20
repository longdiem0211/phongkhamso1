<!DOCTYPE html>


<html>
<head>
<style type="text/css">
  #menu ul{
	  
  list-style-type:none;
  background:#ffffff;
  color:#404040;
  text-align:right;
  font-family:sans-serif;
  font-size:16px;
  border: solid 1px #e5e5e5;
  z-index:5;
  
}
#menu li{
  display:inline-block;
  width:250px;
  line-height:40px;
  margin-left:-5px;
  position:relative;
  text-align:left;
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
</head>
<body>

<div id="menu">
  <ul class="mb-0">
          <div class="container">
          <li><a href="info_doctor.php">THÔNG TIN BÁC SĨ</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li class="mr-4"><a href="#">QUẢN LÝ LỊCH KHÁM</a>
             <ul class="menucon">
				<li><a href="processappointment.php">XEM KỊCH KHÁM</a></li>
                <li><a href="workingtimer.php">ĐĂNG KÍ LỊCH NGHỈ</a></li>
                 <li><a href="history_doctor.php" >LỊCH SỬ CHỮA BỆNH</a></li>
               </ul>
          </li>
          <li><a href="private_setup.php">CẬP NHẬT TÀI KHOẢN</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          <li class="mr-4"><a href="signout.php">ĐĂNG XUẤT</a>
            <!-- <ul class="menucon">
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
                  <li><a href="#">xxx</a></li>
               </ul> -->
          </li>
          
         
          
        </div>  
  </ul>
</div>
<br>






