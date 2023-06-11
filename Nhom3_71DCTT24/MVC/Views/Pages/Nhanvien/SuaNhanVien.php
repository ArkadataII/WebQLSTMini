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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/DanhSachNhanVien/Action_Nhanvien">
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
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>CẬP NHẬT THÔNG TIN NHÂN VIÊN</b></caption>
                <tr>
                    <td colspan="2" style="text-align: center;color:red;">
                        <?php
                        if (isset($data['thongbao']))
                            echo $data['thongbao'];
                        ?>
                    </td>
                </tr>
                <?php
                while ($r = mysqli_fetch_array($data['kqtk'])) {
                ?>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtManv"><b class="text">Mã nhân viên : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtManv" value="<?php  echo $r['Manv']; ?>" class="text_align" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtTennv"><b class="text">Tên nhân viên : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtTennv" value="<?php  echo $r['Tennv']; ?>" class="text_align">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="ddlChucvu"><b class="text">Chức vụ : </b></label>
                        </td>
                        <td>
                        <select class="text_align" name="ddlChucvu">
                    <option value="Nhân viên" 
                    <?php 
                        if($r['Chucvu']=='Nhân viên') echo 'selected';
                    
                    ?> >Nhân viên</option>
                    <option value="Quản lý" 
                    <?php 
                        if($r['Chucvu']=='Quản lý') echo 'selected';
                    
                    ?>>Quản lý</option>
                </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="ddlGioitinh"><b class="text">Giới tính : </b></label>
                        </td>
                        <td>
                        <select class="text_align" name="ddlGioitinh">
                    <option value="Nam" 
                    <?php 
                        if($r['Gioitinh']=='Nam') echo 'selected';
                    
                    ?> >Nam</option>
                    <option value="Nữ" 
                    <?php 
                        if($r['Gioitinh']=='Nữ') echo 'selected';
                    
                    ?>>Nữ</option>
                    <option value="Khác" 
                    <?php 
                        if($r['Gioitinh']=='Khác') echo 'selected';
                   
                    ?>>Khác</option>
                </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtNamsinh"><b class="text">Năm sinh :</b></label>
                        </td>
                        <td>
                            <input type="date" name="txtNamsinh" value="<?php  echo $r['Namsinh']; ?>" class="text_align">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtSdtnv"><b class="text">Số điện thoại :</b></label>
                        </td>
                        <td>
                            <input type="phone" name="txtSdtnv" value="<?php  echo $r['Sdtnv']; ?>" class="text_align">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtDcnv"><b class="text">Địa chỉ :</b></label>
                        </td>
                        <td>
                            <input type="text" name="txtDcnv" value="<?php  echo $r['Dcnv']; ?>" class="text_align">
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