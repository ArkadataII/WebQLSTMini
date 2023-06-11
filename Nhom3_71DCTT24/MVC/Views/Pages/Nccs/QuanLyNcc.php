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
                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px">
                </dd>
                <dd style="height: 64px;">Quản lý nhân viên
                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px">
                </dd>
                <dd style="height: 64px;">Quản lý khách hàng
                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px">
                </dd>
                <dd style="height: 64px;">Quản lý nhà cung cấp
                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px">
                </dd>
                <dd style="height: 64px;">Quản lý nhóm hàng
                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px">
                </dd>
                <dd style="height: 64px;">Quản lý sản phẩm
                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px">
                </dd>
                <dd style="height: 64px;"><a href="http://localhost/BTWeb/Nhom3_71DCTT24/Mnql">Quay lại
                        <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="57px" width="217px"></a></dd>
            </ul>
        </div>
        <div class="content4">
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center; margin-bottom:20px;">
                <caption style="padding-top: 20px; font-size:24px"><b>QUẢN LÝ NHÀ CUNG CẤP</b></caption>
                <tr>
                    <td colspan="2" style="text-align: center;color:red;">
                        <?php
                        if (isset($data['thongbao']))
                            echo $data['thongbao'];
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtMancc"><b class="text">Mã nhà cung cấp : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtMancc" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtTenncc"><b class="text">Tên nhà cung cấp : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtTenncc" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtDcncc"><b class="text">Địa chỉ : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtDcncc" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtSdtncc"><b class="text">Số điện thoại :</b></label>
                    </td>
                    <td>
                        <input type="text" name="txtSdtncc" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="button1" type="submit" name="btnTimkiem" value="Tìm kiếm">
                        <input class="button1" type="submit" name="btnThem" value="Thêm">
                        <button type="submit" name="btnXuat" class="button1">Xuất excel</button>
                    </td>
                </tr>
            </table>
            <table style="position: center;width: 95%;margin-left:2.5%;border-color:blue;" cellspacing="1" border="1">
                <tr style="background: #155370;color:white;">
                    <th><b>Stt</b></th>
                    <th><b>Mã nhà cung cấp</b></th>
                    <th><b>Tên nhà cung cấp</b></th>
                    <th><b>Địa chỉ</b></th>
                    <th><b>Số điện thoại</b></th>
                    <th colspan="2"><b>Thực thi</b></th>
                </tr>
                <?php
                $i = 1;
                foreach ($data['result'] as $row) {
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['Mancc'] ?></td>
                        <td><?php echo $row['Tenncc'] ?></td>
                        <td><?php echo $row['Dcncc'] ?></td>
                        <td><?php echo $row['Sdtncc'] ?></td>
                        <td> <button class="button2">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/Dsncc/suancc/<?php echo $row['Mancc'] ?>" style="display:flex;align-items:center">Sửa
                                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="20px"></a>
                            </button></td>
                        <td>
                            <button class="button2">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/Dsncc/btnxoa_ncc/<?php echo $row['Mancc'] ?>" style="display:flex;align-items:center">Xóa
                                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="20px"></a>
                            </button>
                        </td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </table>
            <div style="color: red;float:right;">
                <h4>Bảng danh sách các nhà cung cấp</h4>
                &nbsp;&nbsp;
                <input type="file" name="file" id="inputGroupFile04">
                <br>
                <button type="submit" name="btnNhap" class="button1" style="float: right;">Nhập excel</button>
            </div>
        </div>
        <div class="content5">

        </div>
    </form>
</body>

</html>