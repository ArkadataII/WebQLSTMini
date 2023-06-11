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
                <caption style="padding-top: 20px; font-size:24px"><b>QUẢN LÝ NHÂN VIÊN</b></caption>
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
                        <label for="txtManv"><b class="text">Mã nhân viên : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtManv" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtTennv"><b class="text">Tên nhân viên: </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtTennv" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="ddlChucvu"><b class="text">Chức vụ : </b></label>
                    </td>
                    <td>
                    <select class="text-align" name="ddlChucvu">
                    <option value="" 
                    <?php if(isset($data['chucvu'])){
                        if($data['chucvu']=='') echo 'selected';
                    } 
                    ?> >--Chọn--</option>
                    <option value="Nhân Viên" 
                    <?php if(isset($data['chucvu'])){
                        if($data['chucvu']=='Nhân viên') echo 'selected';
                    } 
                    ?>>Nhân viên</option>
                    <option value="Quản lý" 
                    <?php if(isset($data['chucvu'])){
                        if($data['chucvu']=='Quản lý') echo 'selected';
                    } 
                    ?> >Quản lý</option>
                </select>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="ddlGioitinh"><b class="text">Giới tính :</b></label>
                    </td>
                    <td>
                        <select class="text-align" name="ddlGioitinh">
                    <option value="" 
                    <?php if(isset($data['chucvu'])){
                        if($data['chucvu']=='') echo 'selected';
                    } 
                    ?> >--Chọn--</option>
                    <option value="Nam" 
                    <?php if(isset($data['gioitinh'])){
                        if($data['gioitinh']=='Nam') echo 'selected';
                    } 
                    ?> >Nam</option>
                    <option value="Nữ" 
                    <?php if(isset($data['gioitinh'])){
                        if($data['gioitinh']=='Nữ') echo 'selected';
                    } 
                    ?>>Nữ</option>
                </select>
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtNamsinh"><b class="text">Năm sinh: </b></label>
                    </td>
                    <td>
                        <input type="date" name="txtNamsinh" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtSdtnv"><b class="text">Số điện thoại: </b></label>
                    </td>
                    <td>
                        <input type="phone" name="txtSdtnv" value="" class="text_align">
                    </td>
                </tr>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtDcnv"><b class="text">Địa chỉ: </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtDcnv" value="" class="text_align">
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
                    <th><b>Mã nhân viên</b></th>
                    <th><b>Tên nhân viên</b></th>
                    <th><b>Chức vụ</b></th>
                    <th><b>Giới tính</b></th>
                    <th><b>Năm sinh</b></th>
                    <th><b>Số điện thoại</b></th>
                    <th><b>Địa chỉ</b></th>
                    <th colspan="2"><b>Thực thi</b></th>
                </tr>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($data['kqtk'])) {
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row['Manv'] ?></td>
                        <td><?php echo $row['Tennv'] ?></td>
                        <td><?php echo $row['Chucvu'] ?></td>
                        <td><?php echo $row['Gioitinh'] ?></td>
                        <td><?php echo $row['Namsinh'] ?></td>
                        <td><?php echo $row['Sdtnv'] ?></td>
                        <td><?php echo $row['Dcnv'] ?></td>
                        <td> <button class="button2">
                            <a href="http://localhost/BTWeb/Nhom3_71DCTT24/DanhSachNhanVien/SuaNhanVien/<?php echo $row['Manv'] ?>" style="display:flex;align-items:center">Sửa
                            <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="20px"></a>
                          </button></td>
                        <td>
                            <button class="button2">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/DanhSachNhanVien/btnXoaNhanVien/<?php echo $row['Manv'] ?>" style="display:flex;align-items:center">Xóa
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
                <h4>Bảng danh sách các nhân viên</h4>
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