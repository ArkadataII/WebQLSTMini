<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhóm 3 - 71DCTT24 - Quản Lý Siêu Thị MINI - 3HD MART</title>
    <link rel="stylesheet" href="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Css/msl.css">
    <link rel="stylesheet" href="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Css/button.css">
</head>

<body>
    <form method="POST" enctype="multipart/form-data"action="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/Xuatxemctphieu">
        <div class="content4" style="height:343px;margin-left: 9.2%;width: 90.8%;">
        <img style="margin-left: 84.5%;margin-top:-30px;position: fixed ;"
                    src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/arrowback_111142.png" height="20px"
                    width="20px">
                <a style="margin-left: 86%;margin-top:-30px;position: fixed ;"
                    href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap">Nhập hàng</a>
            <tr>
                <td style="width:50%;padding-left:200px;">
                    <label for="txtmanhap"><b class="text">Mã nhập : </b></label>
                </td>
                <td>
                    <input type="text" name="txtmanhap" value="<?php echo $data['manhap']; ?>" class="text_align" style="width:35px;" disabled>
                </td>
            </tr>
            
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>Danh Sách CT Phiếu Nhập</b></caption>

            </table>
            <table style="position: center;width: 80%;margin-left:10%;margin-top:10px;border-color:blue;" cellspacing="1" border="1">
                <tr style="background: #155370;color:white;">
                    <th><b>Mã HH</b></th>
                    <th><b>Hàng hóa</b></th>
                    <th><b>Giá nhập</b></th>
                    <th><b>Số lượng</b></th>
                    <th><b>Thành tiền</b></th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($data['kqctpn'])) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['mahh'] ?>
                    </td>
                    <td>
                        <?php echo $row['tenhh'] ?>
                    </td>
                    <td>
                        <?php echo $row['gianhap'] ?>
                    </td>
                    <td>
                        <?php echo $row['soluong'] ?>
                    </td>
                    <td>
                        <?php echo $row['thanhtien'] ?>
                    </td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td style="padding-left:5px;">
                        <label for="txttongtien"><b class="text">Tổng tiền : </b></label>
                    </td>
                    <td colspan="3"></td>
                    <td>
                        <label for="txttongtien"><b class="text">
                                <?php echo $data['tongtien']; ?>
                            </b></label>
                    </td>
                </tr>
            </table>
            <div style="color: red;float:right;margin-right: 10%;">
                <h4>Danh sách chi tiết phiếu nhập</h4>
                &nbsp;&nbsp;
                <br>
                <button type="submit" name="btnXuatxemctpn" class="button1" style="float: right;">Xuất excel</button>
            </div>
        </div>
        <div class="content5"></div>
    </form>
</body>

</html>