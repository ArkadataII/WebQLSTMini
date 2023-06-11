<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nhóm 3 - 71DCTT24 - Quản Lý Siêu Thị MINI - 3HD MART</title>
  <link rel="stylesheet" href="http://localhost/BTWeb/Nhom3_71DCTT24/Public/Css/login.css">
</head>

<body>
  <div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="http://localhost/BTWeb/Nhom3_71DCTT24/LoginC/checkuser_pass">
      <h6 style="text-align: center; color: red;">
        <?php
        if (isset($dulieu['thongbao'])) {
          echo $dulieu['thongbao'];
        }
        ?>
        <div class="user-box">
          <input type="text" name="username" required="">
          <label>Tài khoản</label>
        </div>
        <div class="user-box">
          <input type="password" name="pass" required="">
          <label>Mật khẩu</label>
        </div>
        <a>
          <button style="background-color:rgba(0,0,0,.5); color:white;font-size:15px;" name="btnDangnhap"> Đăng nhập</button>
        </a>
    </form>
  </div>
</body>

</html>