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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/NCC">
        <div class="content4" style="height:343px;margin-left: 9.2%;width: 90.8%;">
        <img style="margin-left: 84.5%;margin-top:-30px;position: fixed ;"
                    src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/arrowback_111142.png" height="20px"
                    width="20px">
                <a style="margin-left: 86%;margin-top:-30px;position: fixed ;"
                    href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap">Nhập hàng</a>
        
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>Chọn Nhà Cung Cấp</b></caption>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtMancc"><b class="text">Mã nhà cung cấp : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtMancc" value="" class="text_align" style="width:207px;">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtTenncc"><b class="text">Tên nhà cung cấp : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtTenncc" value="" class="text_align" style="width:207px;">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="button1" type="submit" name="btnTimkiemncc" value="Tìm kiếm">
                        <input class="button1" type="submit" name="btnThemncc" value="Thêm"  style="margin-left: 10px;">
                    </td>
                </tr>
            </table>
            <table style="position: center;width: 80%;margin-left:10%;margin-top:10px;border-color:blue;" cellspacing="1" border="1";>
                <tr style="background: #155370;color:white;">
                    <th><b>Mã nhà cung cấp</b></th>
                    <th><b>Tên nhà cung cấp</b></th>
                    <th><b>Địa chỉ</b></th>
                    <th><b>Số điện thoại</b></th>
                    <th><b>Chọn</b></th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($data['kqncc'])) {
                ?>
                    <tr>
                        <td><?php echo $row['Mancc'] ?></td>
                        <td><?php echo $row['Tenncc'] ?></td>
                        <td><?php echo $row['Dcncc'] ?></td>
                        <td><?php echo $row['Sdtncc'] ?></td>
                        <td> <button class="button2">
                            <a href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/CTPhieuNhap/<?php echo $row['Mancc'] ?>" style="display:flex;align-items:center">Chọn
                            <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="40px" width="40px">
                        </a> 
                          </button></td>
                    </tr>
                <?php
                }
                ?>
            </table> 
            <div style="color: red;float:right;margin-right: 10%;">
                <h4>Danh sách nhà cung cấp</h4>
            </div>
        </div>
        <div class="content5"></div>
    </form>
</body>

</html>