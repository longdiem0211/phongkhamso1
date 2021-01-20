<?php
include './source-dr.php';
$p = new Mclass_dr;
if(isset($_POST['change'])):
   if(!empty($_POST['soluong'])):
      $soluong = $_POST['soluong'];
      $id_medicine = $_POST['id_thuoc'];
      $sql = "update khothuoc set soluong = '$soluong' where id_thuoc='$id_medicine' ";
      $p->multipleFunc($sql);
      header('location:../view_medicine.php'); 
   else:
      header('location:../view_product.php');   
   endif;   
endif;   
?>