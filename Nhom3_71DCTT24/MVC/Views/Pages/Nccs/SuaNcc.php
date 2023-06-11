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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/Dsncc/thucthi_ncc">
        <div class="content3">
            <ul style="padding:0%;">
                <dd style="height: 64px;">Quản lý tài khoản
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;">Quản lý nhân viên
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;">Quản lý khách hàng
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;">Quản lý nhà cung cấp
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;">Quản lý nhóm hàng
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;">Quản lý sản phẩm
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
                <dd style="height: 64px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/Mnql">Quay lại
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
            </ul>
        </div>
        <div class="content4">
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;margin-bottom:20px;">
                <caption style="padding-top: 20px; font-size:24px"><b>CẬP NHẬT THÔNG TIN NHÀ CUNG CẤP</b></caption>
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
                            <label for="txtMancc"><b class="text">Mã nhà cung cấp : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtMancc" value="<?php  echo $r['Mancc']; ?>" class="text_align" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtTenncc"><b class="text">Tên nhà cung cấp : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtTenncc" value="<?php  echo $r['Tenncc']; ?>" class="text_align">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtDcncc"><b class="text">Địa chỉ : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtDcncc" value="<?php  echo $r['Dcncc']; ?>" class="text_align">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtSdtncc"><b class="text">Số điện thoại :</b></label>
                        </td>
                        <td>
                            <input type="text" name="txtSdtncc" value="<?php  echo $r['Sdtncc']; ?>" class="text_align">
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