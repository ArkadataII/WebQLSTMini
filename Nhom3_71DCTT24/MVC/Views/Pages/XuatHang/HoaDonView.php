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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuXuat/DSHoaDon">
        <div style="position:relative;">
        <div class="content2">
            <ul>
                <li style="height: 99.5px;">
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/quanly.png" height="80px" width="100px">Quản lý</a></li>
                <li style="height: 99.5px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuXuat">
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/banhang.png" height="80px" width="100px"> &nbsp; Bán hàng</a></li>
                <li style="height: 99.5px;">
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/nhaphang.png" height="80px" width="100px">Nhập hàng</a></li>
                <li style="height: 99.5px;">
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/thongke.png" height="80px" width="100px">Thống kê</a></li>
                <li style="height: 99.5px;"><img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/hotro.png" height="80px" width="100px"> &nbsp;&nbsp; Hỗ trợ</a></li>
            </ul>
        </div>
    </div>
        <div class="content4" style="height:343px;margin-left: 9.2%;width: 90.8%;">
        <input style="margin-left:82%;margin-top: 18px; position: fixed ;" class="button1" type="submit" name="btnLuuDon" value="Lưu">
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>Hóa Đơn</b></caption>

                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="listhh"><b class="text">Mã Hàng hóa: </b></label>
                    </td>
                    <td>

                        <input type="text" list="hh" name="listhh">
                        <datalist id="hh">
                            <option value="">---Chọn hàng hóa---
                                <?php
                                while ($row = mysqli_fetch_assoc($data['result1'])) {

                                    echo '<option value=' . $row['Mahh'] . '>' . $row['Tenhh'] . '    -Tồn Kho:' . $row['Tonkho'] . '';
                                }
                                ?>
                        </datalist>
                    </td>
                </tr>
                <tr>

                    <td style="width:50%;padding-left:200px;">
                        <label for="txtsoluong"><b class="text">Số lượng : </b></label>
                    </td>
                    <td>
                        <input type="number" name="txtsoluong" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <button class="button1" type="submit" name="btnThem">Thêm</button>
                    </td>
                </tr>
            </table>
            <table style="position: center;width: 96%;margin-left: 2%;" cellspacing="0" border="1">
                <tr style="background: greenyellow;">
                    <th><b>Mã HH</b></th>
                    <th><b>Hàng hóa</b></th>
                    <th><b>Giá bán</b></th>
                    <th><b>Số lượng</b></th>
                    <th><b>Thành tiền</b></th>
                    <th colspan="2"><b>Thực thi</b></th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($data['kqtkhh'])) {
                ?>
                    <tr>
                        <td><?php echo $row['mahh'] ?></td>
                        <td><?php echo $row['tenhh'] ?></td>
                        <td><?php echo $row['giaxuat'] ?></td>
                        <td><?php echo $row['soluong'] ?></td>
                        <td><?php echo $row['thanhtien'] ?></td>
                        <td> <button class="button2">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuXuat/suactphieu/<?php echo $row['mahh'] ?>" style="display:flex;align-items:center">Sửa
                                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="20px"></a>
                            </button>
                        </td>
                        <td> <button class="button2">
                                <a href="" style="display:flex;align-items:center">Xóa
                                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="20px"></a>
                            </button>
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
                        <label for="txttongtien"><b class="text"><?php echo $data['tongtien']; ?> </b></label>
                    </td>
                    <td colspan="2"></td>
                </tr>
            </table>
            <div style="color: red;float:right;margin-right: 2%;">
                <h4>Danh sách chi tiết hóa đơn</h4>
                &nbsp;&nbsp;
                <br>
                <button type="submit" name="btnXuatctpn" class="button1" style="float: right;">Xuất excel</button>
            </div>
        </div>
        <div class="content5">

        </div>
    </form>
</body>

</html>