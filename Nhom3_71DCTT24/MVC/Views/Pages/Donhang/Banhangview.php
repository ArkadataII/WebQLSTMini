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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/Banhang/thucthi_px">
        <div class="content4" style="height:343px;margin-left: 9.2%;width: 90.8%;">
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>DANH SÁCH ĐƠN HÀNG</b></caption>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtMaxuat"><b class="text">Mã đơn hàng : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtMaxuat" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="ddlncc"><b class="text">Mã nhân viên : </b></label>
                    </td>
                    <td>
                        <input type="text" list="nv" class="text_align" name="ddlnv">
                        <datalist id="nv">
                            <?php
                            while ($row = mysqli_fetch_assoc($data['nv'])) {
                                echo '<option value=' . $row['Manv'] . '>' . $row['Tennv'] . '</option>';
                            }
                            ?>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="ddlncc"><b class="text">Mã khách hàng : </b></label>
                    </td>
                    <td>
                        <input type="text" list="kh" class="text_align" name="ddlkh">
                        <datalist id="kh">
                            <?php
                            while ($row = mysqli_fetch_assoc($data['kh'])) {
                                echo '<option value=' . $row['Makh'] . '>' . $row['Tenkh'] . '</option>';
                            }
                            ?>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <td>
                    <fieldset style="border: 1px solid; width: 400px;
                    height: 50px;padding-top: 15px;margin-left:195px;">
                        <legend><b>Thời gian: </b></legend>
                        <label>Từ</label>&nbsp;&nbsp;
                        <input type="date" name="txtTu" class="text_align" style="width:120px" value="2002-03-15">&nbsp;&nbsp;
                        <label>Đến</label>&nbsp;&nbsp;
                        <input type="date" name="txtDen" class="text_align" style="width:120px" value="2023-03-15">&nbsp;&nbsp;
                    </td>
                    <td>
                        <input style="margin-left: 110px;margin-top:40px;" class="button1" type="submit" name="btnTimkiem" value="Tìm kiếm">
                    </td>
                </tr>
            </table>
            <table style="position: center;width: 80%;margin-left:10%;border-color:blue;margin-top:10px;" cellspacing="1" border="1">
                <tr style="background: #155370;color:white;">
                    <th><b>Stt</b></th>
                    <th><b>Mã đơn hàng</b></th>
                    <th><b>Mã nhân viên</b></th>
                    <th><b>Ngày xuất</b></th>
                    <th><b>Tổng tiền</b></th>
                    <th><b>Thực thi</b></th>
                </tr>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($data['kqtk'])) {
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['Maxuat'] ?></td>
                        <td><?php echo $row['Manv'] ?></td>
                        <td><?php echo $row['Ngayxuat'] ?></td>
                        <td><?php echo $row['Tongtien'] ?></td>
                        <td style="width:80px;"><button class="button2" style="width: 100%;">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/Banhang/chitiet/<?php echo $row['Maxuat'] ?>" style="display:flex;align-items:center;">Chi tiết
                                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="20px"></a>
                            </button></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </table>
        </div>
        <div class="content5"></div>
    </form>
</body>

</html>