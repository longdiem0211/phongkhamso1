<?php

  //Visist http://http://esms.vn/SMSApi/ApiSendSMSNormal for more information about API
  //� 2013 esms.vn
  //Website: http://esms.vn/
  //Hotline: 0901.888.484      
   
  //Huong dan chi tiet cach su dung API: http://esms.vn/blog/3-buoc-de-co-the-gui-tin-nhan-tu-website-ung-dung-cua-ban-bang-sms-api-cua-esmsvn
  //De lay Key cac ban dang nhap eSMS.vn v� vao quan Quan li API 
// if(isset($_POST['submit'])):
//   $APIKey="8EB0C319FB3F1145C6B766BCC32298";
//   $SecretKey="C29CFA7A5B5A25941CF5CF0CDC1F42";
//   $YourPhone = $_POST['phone'];
//   $Content="test sms from php";
//   echo $YourPhone .'<br>';
//   $SendContent=urlencode($Content);
//   //De dang ky brandname rieng vui long lien he hotline 0901.888.484 hoac nhan vien kinh Doanh cua ban
//   $data="http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&Brandname=konnimart&SmsType=2";
//   // http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&Brandname=XXXX&SmsType=2
//   $curl = curl_init($data); 
//   curl_setopt($curl, CURLOPT_FAILONERROR, true); 
//   curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
//   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
//   $result = curl_exec($curl); 
    
//   $obj = json_decode($result,true);
//     if($obj['CodeResult']==100)
//     {
//         print "<br>";
//         print "CodeResult:".$obj['CodeResult'];
//         print "<br>";
//         print "CountRegenerate:".$obj['CountRegenerate'];
//         print "<br>";     
//         print "SMSID:".$obj['SMSID'];
//         print "<br>";
//     }
//     else
//     {
//         print "ErrorMessage:".$obj['ErrorMessage'];
//     }
  
// endif; 
// include './mvc/controller/source.php'; 
// $p = new Mclass;  
// $id_doctor = 1;
// $lichhen = $p->show_lich_hen($id_doctor);
// foreach ($lichhen as $val) {
// 	$val['ngayhen'] = explode('_', $val['ngayhen']);
// 	print_r($val['ngayhen']);
// }
// foreach ($array_busy as $key => $value):
    // if(true):
    //     echo 'a';
    // else:
    //     echo 'b';    
    // endif;    
    // endforeach;
// $array_busy = [
//   ['1,2,3,4','20'],
//   ['1,2', '21']
// ];
// foreach ($array_busy as $key => $val) {
//   $caban = explode(',', $val[0]);
//   //[1,2,3,4]
//   //[1,2]
//   print_r($caban);
//   print_r(array_diff([1], $caban)); 
// }
include './mvc/view/header.php';
$ngayduocchon = '';
if(isset($_POST['submit'])):
  $ngayduocchon = $_POST['ngayduocchon'];
endif;  
$button = '<button class="btn btn-primary">7:00-9:00</button><button class="btn btn-primary">9:00-11:00</button><button class="btn btn-primary">15:00-17:00</button><button class="btn btn-primary">17:00-19:00</button>';
//ngày bệnh nhân chọn hẹn vs bác sĩ
$array_busy = [['1', '2020-06-19'],['2', '2020-06-19'],['3', '2020-06-23']];
// $ngayduocchon = '2020-06-19';
foreach ($array_busy as $key => $val) {
  if($val[1] == $ngayduocchon):
  switch ($val[0]) {
    case '1':
      $button = str_replace('<button class="btn btn-primary">7:00-9:00</button>', '<button class="btn btn-warning" disabled>7:00-9:00</button>', $button);
      break;
    case '2':
      $button = str_replace('<button class="btn btn-primary">9:00-11:00</button>', '<button class="btn btn-warning" disabled>9:00-11:00</button>', $button);
      break;
    case '3':
      $button = str_replace('<button class="btn btn-primary">15:00-17:00</button>', '<button class="btn btn-warning" disabled>15:00-17:00</button>', $button);
      break;
    case '4':
      $button = str_replace('<button class="btn btn-primary">17:00-19:00</button>', '<button class="btn btn-warning" disabled>17:00-19:00</button>', $button);
      break;    
    default:
      break;
  }
  endif; 
}
echo $button.'<br>'; 
?>
<!-- 
// <!DOCTYPE html>
// <html>
// <head>
//   <title></title>
// </head>
// <body>
//   <form action="test.php" method="POST">
//     Phone:<br>
//     <input type="text" name="phone">
//     <button type="submit" name="submit">Gửi</button>
//   </form>
// </body>
// </html>   -->  
<!-- <!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<button type="radio" name="demo1" value="test"><a href="test1.php">alo123</a></button>
</body>
</html> -->
<form method="POST">
<input type="date" name="ngayduocchon" value="<?php echo $ngayduocchon;?>">
<button type="submit" name="submit" id="submit" style="display: none;"></button>
</form>
<script type="text/javascript">
  $('input[type=date]').change(function(){
      $('#submit').click();
  })
</script>

