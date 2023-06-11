<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhóm 3 - 71DCTT24 - Quản Lý Siêu Thị MINI - 3HD MART</title>
    <!-- <link rel="stylesheet" href="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Css/msl.css"> -->
    <link rel="stylesheet" href="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Css/button.css">
    <style>
        .content11 {
            width: 10%;
        }
    </style>
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuXuat/HoaDonView">
        <div style="position:relative;">
            <div class="content1">
                <input style="margin-left:92%;margin-top: 18px; position: fixed ;" class="button1" type="submit"
                    name="btnLuuDon" value="Lưu">
                <input style="margin-left:85%;margin-top: 18px; position: fixed ;" class="button1" type="submit"
                    name="btnHuyDon" value="Hủy Đơn">
                <div class="content11">
                    <p class="fs"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/nenview">3HD - MART</p>
                </div>

            </div>
            <div class="content2">
                <ul>
                    <li style="height: 104px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/Mnql">
                            <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/quanly.png" height="80px"
                                width="100px">Quản lý</a></li>
                    <li style="height: 104px;"><a href="">
                            <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/banhang.png" height="80px"
                                width="100px"> &nbsp; Bán hàng</a></li>
                    <li style="height: 104px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap">
                            <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/nhaphang.png" height="80px"
                                width="100px">Nhập hàng</a></li>
                    <li style="height: 104px;"><a href="">
                            <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/thongke.png" height="80px"
                                width="100px">Thống kê</a></li>
                    <li style="height: 104px;"><a href="">
                            <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/hotro.png" height="80px"
                                width="100px"> &nbsp;&nbsp; Hỗ trợ</a></li>
                </ul>
            </div>
        </div>
    
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>Sửa Hóa Đơn</b></caption>
                <tr>
                    <td colspan="2" style="text-align: center;color:red;">
                        <?php
                        if (isset($data['thongbao']))
                            echo $data['thongbao'];
                        ?>
                    </td>
                </tr>
                <?php
                while ($r = mysqli_fetch_array($data['kqsuactpn'])) {
                ?>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtmahh"><b class="text">Mã hàng hóa : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtmahh" value="<?php  echo $r['mahh']; ?>" class="text_align" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txttenhh"><b class="text">Tên hàng hóa : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txttenhh" value="<?php  echo $r['tenhh']; ?>" class="text_align">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtgiaxuat"><b class="text">Giá bán : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtgiaxuat" value="<?php  echo $r['giaxuat']; ?>" class="text_align">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtsoluong"><b class="text">Số lượng :</b></label>
                        </td>
                        <td>
                            <input type="text" name="txtsoluong" value="<?php  echo $r['soluong']; ?>" class="text_align">
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td>
                    </td>
                    <td>
                        <button class="button1" type="submit" name="btnBack">Quay lại</button>
                        <button class="button1" type="submit" name="btnLuuct">Lưu</button>
                    </td>
                </tr>
            </table>
            
        </div>
        <!-- <div class="content5">

        </div> -->
    </form>
</body>

</html>