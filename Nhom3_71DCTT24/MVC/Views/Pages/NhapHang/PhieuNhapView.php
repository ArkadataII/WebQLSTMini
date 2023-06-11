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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/DSPhieuNhap">
        <div class="content4" style="height:343px;margin-left: 9.2%;width: 90.8%;">
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <button type="submit" name="btnNhaphang" class="button1" style="position:fixed; margin-top:20px;margin-left:82%">Nhập hàng</button>
                <caption style="padding-top: 20px; font-size:24px"><b>Danh Sách Phiếu Nhập</b></caption>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtmanhap"><b class="text">Mã phiếu nhập : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtmanhap" value="" class="text_align" style="width:207px;">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtmancc"><b class="text">Nhà cung cấp : </b></label>
                    </td>
                    <td>

                        <input type="text" list="ncc" name="listncc" class="text_align" style="width:207px;">
                        <datalist id="ncc">
                            <?php
                            while ($row = mysqli_fetch_assoc($data['result'])) {
                                if (isset($data['Mancc'])) {
                                    if ($row['Mancc'] == $data['Mancc']) {
                                        echo '<option value="' . $row['Mancc'] . ' selected >Tên NCC:' . $row['Tenncc'] . '"';
                                    } else {
                                        echo '<option value=' . $row['Mancc'] . '>Tên NCC:' . $row['Tenncc'] . '';
                                    }
                                } else {
                                    echo '<option value=' . $row['Mancc'] . '>' . $row['Tenncc'] . '';
                                }
                            }
                            ?>
                            <!-- </select> -->
                        </datalist>
                    </td>
                </tr>
                <td style="width:50%;padding-left:200px;">
                    <label for="txtngaynhap"><b class="text">Ngày nhập : </b></label>
                </td>
                <td>
                    <input type="date" name="txtngaynhap" value="" class="text_align" style="width:207px;">
                </td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                        <button class="button1" type="submit" name="btnTimkiempn">Tìm kiếm</button>
                        <button type="submit" name="btnXuatpn" class="button1" style="margin-left: 10px;">Xuất excel</button>
                    </td>
                </tr>
            </table>
            <table style="position: center;width: 80%;margin-left:10%;margin-top:10px;border-color:blue;" cellspacing="1" border="1">
                <tr style="background: #155370;color:white;">
                    <th><b>Mã phiếu </b></th>
                    <th><b>Nhà cung cấp</b></th>
                    <th><b>Người Nhập</b></th>
                    <th><b>Ngày nhập</b></th>
                    <th><b>Tổng tiền</b></th>
                    <th colspan="2"><b>Thực thi</b></th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($data['kqpn'])) {
                ?>
                    <tr>
                        <td><?php echo $row['manhap'] ?></td>
                        <td><?php echo $row['tenncc'] ?></td>
                        <td><?php echo $row['tennv'] ?></td>
                        <td><?php echo $row['ngaynhap'] ?></td>
                        <td><?php echo $row['tongtien'] ?></td>
                        <td> <button class="button2">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/xemctphieu/<?php echo $row['manhap'] ?>" style="display:flex;align-items:center">Xem
                                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="40px"></a>
                            </button></td>
                        <td>
                            <button class="button2">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/xoaphieunhap/<?php echo $row['manhap'] ?>" style="display:flex;align-items:center">Xóa
                                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="40px"></a>
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div style="color: red;float:right;margin-right: 10%;">
                <h4>Danh sách phiếu nhập</h4>
                &nbsp;&nbsp;
                <br>
            </div>
        </div>
        <div class="content5"></div>
    </form>
</body>

</html>