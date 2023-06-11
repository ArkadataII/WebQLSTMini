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
    <form method="POST" enctype="multipart/form-data" action="http://localhost/BTWeb/Nhom3_71DCTT24/Banhang/thucthi_px">
        <div class="content4" style="height:343px;margin-left: 9.2%;width: 90.8%;">
            <table style="width: 100%;padding: 20px 20px 0px 20px; align-items:center;">
                <caption style="padding-top: 20px; font-size:24px">
                    <b>THỐNG KÊ</b>
                </caption>
            </table>
            <table style="position: center;width: 65%;margin-left:20%;margin-top:10px;border-color:blue;" cellspacing="1" border="1">
                <tr style="background: #155370;color:white;">
                    <th><b>Stt</b></th>
                    <th><b>Mã hàng hóa</b></th>
                    <th><b>Tên hàng hóa</b></th>
                    <th><b>Số lượng</b></th>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($data['kqtk'])) {
                ?>
                    <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $row['Mahh'] ?></td>
                        <td><?php echo $row['Tenhh'] ?></td>
                        <td><?php echo $_SESSION['thongke'][$i];?></td>
                    </tr>
                <?php
                    $i++;
                }
                ?>
            </table>
        </div>
        <div class="content5"></div>
    </form>
</body>

</html>