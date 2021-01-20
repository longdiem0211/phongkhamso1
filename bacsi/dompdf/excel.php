<?php
if(isset($_GET['phieukham']))
{
    include '../controller-mb/source-mb.php';
    $p = new Mclass_mb;
    $id_phieukham = $_GET['phieukham'];
    $phieukham = $p->show_infoPK_byid($id_phieukham);
    $id_user = $phieukham['id_user'];
    $user = $p->show_info_byid($id_user);
    $id_doctor = $phieukham['id_doctor'];
    $doctor = $p->show_info_doctor($id_doctor);
    $phieuthuoc = $p->show_info_medicine($id_phieukham);
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:attachment;filename=phieu_kham.xls");
?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <style>
            body{
               
                margin: 0;
                font-family: 'Roboto', sans-serif;
                font-size: 12px;
            }



            .invoice-container{
                max-width: 800px;
                margin: 10px auto;
                background: #fff;
                padding: 20px;
              
            }

            .comp_addr{
                text-align: center;
                line-height: 10px;
            }

            table{
                text-align: center;
                width: 100%;
            }


            table th{
                border-right: 1px solid #ccc;
            }

            table td{
                border-right: 1px solid #ccc;
                padding: 20px 0px;
            }

            .my-address{
                background: #f1e9e9;
                padding: 7px;
            }

        </style>
    </head>
    <body>
        <div class="invoice-container">
            <div class="comp_addr">
                <h3>PHONG KHAM SO 1</h3>
                <hr>
                <div class="my-address">
                    <h1>Phieu kham So : <?php echo $phieukham['id_phieukham']?></h1>
                    <h4>Phong kham quan 1 - thoi gian <?php echo $phieukham['ngayhen']?></h4>
                </div>
            </div>
            <hr>
            <table>
                <tr>
                    <th>Ten benh nhan </th>
                    <th>Bac si phu trach</th>
                    <th>Trieu chung</th>
                    <th>Chi dan</th>
                </tr>
                <tr>
                    <td><?php echo $user['fullname']; ?></td>
                    <td><?php echo $doctor['fullname']; ?></td>
                    <td><?php echo $phieukham['trieuchung']; ?></td>
                    <td><?php echo $phieukham['chidan']; ?></td>
                </tr>
            </table><hr>
            <table>
                <thead>
                <tr>    
                    <th>STT</th>
                    <th>Ten thuoc</th>
                    <th>SL</th>
                    <th>Gia</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php
                    if(!empty($phieuthuoc)):
                        foreach ($phieuthuoc as $key => $val) {
                             $key++;

                 ?>
                     
                
                                        <tr>
                                            <th scope="row"><?php echo $key;?></th>
                                            <td><?php echo $val['name'];?></td>
                                            <td><?php echo $val['sl'];?></td>
                                            <td><?php echo $val['dongia']*1000;?></td>
                                            
                                        </tr>
                                     <?php   }
            endif; 
        ?>

                </tbody>
            </table>
            <hr>
            <table>
                <tr style="text-align: right">
                    <th>Tong tien :</th>
                    <th><?php echo $val['tongtien']*1000;?></th>
                </tr>
            </table>
            <hr>
            <table>
                <tr style="text-align: left;">
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> Director</th>
                </tr>
                <tr style="text-align: left;">
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> Loc & Diem</th>
                </tr>
            </table>
            <center><h4>Cam on quy khach !</h4></center>
        </div>
    </body>
</html>


<?php } 
else
{
    echo "farere";
}
?>