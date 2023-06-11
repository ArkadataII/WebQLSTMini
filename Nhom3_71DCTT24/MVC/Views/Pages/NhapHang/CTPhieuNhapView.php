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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/DSCTPhieuNhap">
        <div class="content4" style="height:343px;margin-left: 9.2%;width: 90.8%;">
            <input style="margin-left:84%;margin-top: -45px; position: fixed ;" class="button1" type="submit" name="btnLuuDon" value="Lưu">
            <input style="margin-left:77%;margin-top: -45px; position: fixed ;" class="button1" type="submit" name="btnHuyDon" value="Hủy Đơn">
            <?php
            while ($r = mysqli_fetch_array($data['chonpn'])) {
            ?>
                <tr>
                    <td style="width:50%;padding-left:200px;">
                        <label for="txtmanhap"><b class="text">Mã nhập : </b></label>
                    </td>
                    <td>
                        <input type="text" name="txtmanhap" value="<?php echo $r['Manhap']; ?>" class="text_align" style="width:35px;" disabled>
                    </td>
                </tr>

            <?php
            }
            ?>
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>Danh Sách CT Phiếu Nhập</b></caption>
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
                        <label for="listhh"><b class="text">Hàng hóa: </b></label>
                    </td>
                    <td>

                        <input type="text" list="hh" name="listhh" class="text_align" style="width:207px;">
                        <datalist id="hh">
                            <?php
                            while ($row = mysqli_fetch_assoc($data['result1'])) {
                                if (isset($data['Mahh'])) {
                                    if ($row['Mahh'] == $data['Mahh']) {
                                        echo '<option value="' . $row['Mahh'] . ' selected >Tên NCC:' . $row['Tenhh'] . '"';
                                        $mahh = $row['Mahh'];
                                    } else {
                                        echo '<option value=' . $row['Mahh'] . '>Tên NCC:' . $row['Tenhh'] . '';
                                        $mahh = $row['Mahh'];
                                    }
                                } else {
                                    echo '<option value=' . $row['Mahh'] . '>' . $row['Tenhh'] . '';
                                    $mahh = $row['Mahh'];
                                }
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
                        <input type="number" name="txtsoluong" value="" class="text_align" style="width:207px;">
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <button class="button1" type="submit" name="btnThemctpn">Thêm</button>
                        <button type="submit" name="btnXuatctpn" class="button1" style="margin-left: 10px;">Xuất excel</button>
                    </td>
                </tr>
            </table>
            <table style="position: center;width: 80%;margin-left:10%;margin-top:10px;border-color:blue;" cellspacing="1" border="1">
                <tr style="background: #155370;color:white;">
                    <th><b>Mã HH</b></th>
                    <th><b>Hàng hóa</b></th>
                    <th><b>Giá nhập</b></th>
                    <th><b>Số lượng</b></th>
                    <th><b>Thành tiền</b></th>
                    <th colspan="2"><b>Thực thi</b></th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($data['kqctpn'])) {
                ?>
                    <tr>
                        <td><?php echo $row['mahh'] ?></td>
                        <td><?php echo $row['tenhh'] ?></td>
                        <td><?php echo $row['gianhap'] ?></td>
                        <td><?php echo $row['soluong'] ?></td>
                        <td><?php echo $row['thanhtien'] ?></td>
                        <td> <button class="button2">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/suactphieu/<?php echo $row['mahh'] ?>" style="display:flex;align-items:center">Sửa
                                    <img src="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Images/rong.png" height="30px" width="20px"></a>
                            </button></td>
                        <td>
                            <button class="button2">
                                <a href="http://localhost/BTWeb/Nhom3_71DCTT24/PhieuNhap/xoactphieunhap/<?php echo $row['mahh'] ?>" style="display:flex;align-items:center">Xóa
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
                        <label for="txttongtien"><b class="text"><?php echo $data['tongtien'] ?> </b></label>
                    </td>
                    <td colspan="2"></td>
                </tr>
            </table>
            <div style="color: red;float:right;margin-right: 10%;">
                <h4>Danh sách chi tiết phiếu nhập</h4>
                &nbsp;&nbsp;
                <input type="file" name="file" id="inputGroupFile04">
                <br>
                <button type="submit" name="btnNhapctpn" class="button1" style="float: right;">Nhập excel</button>
            </div>
        </div>
        <div class="content5"></div>
    </form>
</body>

</html>