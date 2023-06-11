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
            <?php
        while ($r = mysqli_fetch_array($data['chonpn'])) {
        ?>
            <tr>
                <td style="width:50%;padding-left:200px;">
                    <label for="txtmanhap"><b class="text">Mã nhập : </b></label>
                </td>
                <td>
                    <input type="text" name="txtmanhap" value="<?php echo $r['Manhap']; ?>" class="text_align"
                        disabled>
                </td>
            </tr>

            <?php
        }
                ?>
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px"><b>Danh sách CT Phiếu Nhập</b></caption>
                <!-- <tr>
                    <td colspan="2" style="text-align: center;color:red;">
                        <?php
                        if (isset($data['thongbao']))
                            echo $data['thongbao'];
                        ?>
                    </td>
                </tr> -->
                <?php
                while ($r = mysqli_fetch_array($data['kqsuactpn'])) {
                ?>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtmahh"><b class="text">Mã hàng : </b></label>
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
                            <input type="text" name="txttenhh" value="<?php  echo $r['tenhh']; ?>" class="text_align" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:50%;padding-left:200px;">
                            <label for="txtgianhap"><b class="text">Giá nhập : </b></label>
                        </td>
                        <td>
                            <input type="text" name="txtgianhap" value="<?php  echo $r['gianhap']; ?>" class="text_align" disabled>
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
        <div class="content5"></div>
    </form>
</body>

</html>