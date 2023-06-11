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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/DanhSachKhachHang/Action_KhachHang">
        <div class="content3">
            <ul style="padding:0%;">
                <dd style="height: 64px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/Account_list">Quản lý tài khoản
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/DanhSachNhanVien">Quản lý nhân viên
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/DanhSachKhachHang">Quản lý khách hàng
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/Dsncc">
                        Quản lý nhà cung cấp
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;"><a href="">Quản lý nhóm hàng
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;"><a href="">Quản lý sản phẩm
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/Views/Masterlayout.php">Quay lại
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
            </ul>
        </div>
        <div class="content4">
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>CẬP NHẬT THÔNG TIN KHÁCH HÀNG</b></caption>
                <tr>
                    <td colspan="2" style="text-align: center;color:red;">
                        <?php
                        if (isset($data['thongbao']))
                            echo $data['thongbao'];
                        ?>
                    </td>
                </tr>
                <?php
                foreach ($data['kqtk'] as $r) {
                ?>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtMakh"><b class="text">Mã khách hàng : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtMakh" value="<?php  echo $r['Makh']; ?>" class="text_align" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtTenkh"><b class="text">Tên khách hàng : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtTenkh" value="<?php  echo $r['Tenkh']; ?>" class="text_align">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtTichdiem"><b class="text">Tích điểm :</b></label>
                        </td>
                        <td>
                            <input type="tel" name="txtTichdiem" value="<?php  echo $r['Tichdiem']; ?>" class="text_align">
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="button1" type="submit" name="btnLuu" value="Lưu">
                    </td>
                </tr>
            </table>
        </div>
        <div class="content5">

        </div>
    </form>
</body>

</html>