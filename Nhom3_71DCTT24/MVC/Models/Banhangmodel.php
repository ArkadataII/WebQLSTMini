<?php
class Banhangmodel extends connectDB
{

    public function px_all()
    {
        $sql = "SELECT * FROM phieuxuat";
        return mysqli_query($this->con, $sql);
    }

    public function nv()
    {
        $sql = "SELECT Manv,Tennv FROM nhanvien";
        return mysqli_query($this->con, $sql);
    }

    public function kh()
    {
        $sql = "SELECT Makh,Tenkh FROM khachhang";
        return mysqli_query($this->con, $sql);
    }

    public function Timkiempx($maxuat, $manv, $tu, $den)
    {
        $sql = 'SELECT * FROM phieuxuat WHERE phieuxuat.maxuat LIKE "%' . $maxuat . '%" 
        AND   phieuxuat.manv LIKE "%' . $manv . '%"
        AND   phieuxuat.ngayxuat >= "'. $tu .'"
        AND   phieuxuat.ngayxuat <= "'. $den .'"';
        return mysqli_query($this->con, $sql);
    }

    public function Chitietpx($maxuat)
    {
        $sql = 'SELECT chitietphieuxuat.Mahh,hanghoa.Tenhh,chitietphieuxuat.Giaxuat,chitietphieuxuat.Soluong,chitietphieuxuat.Thanhtien FROM hanghoa,chitietphieuxuat
        WHERE chitietphieuxuat.Maxuat = "'.$maxuat.'"
        AND hanghoa.Mahh = chitietphieuxuat.Mahh';
        return mysqli_query($this->con, $sql);
    }

    public function Tongtien($maxuat)
    {
        $sql = 'SELECT tongtien FROM phieuxuat WHERE Maxuat = "'.$maxuat.'"';
        return mysqli_query($this->con, $sql);
    }
}
?>