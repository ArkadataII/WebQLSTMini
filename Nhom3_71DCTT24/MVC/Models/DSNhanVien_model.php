<?php
class DSNhanVien_model extends connectDB
{

    public function Nhanvien_all()
    {
        $sql = "SELECT Manv, Tennv, Chucvu,(Case When Gioitinh = 'True' then N'Nam' Else N'Nữ' end) as Gioitinh,Namsinh, Sdtnv, Dcnv from nhanvien";
        return mysqli_query($this->con, $sql);
    }

    public function Nhanvien_ins($manv, $tennv, $chucvu,$gioitinh,$namsinh,$sdtnv,$dcnv)
    {
        $sql = "INSERT INTO nhanvien VALUES('$manv','$tennv','$chucvu','$gioitinh','$namsinh','$sdtnv','$dcnv')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function ChecktrungManv($manv)
    {
        $sql = "SELECT Manv FROM nhanvien WHERE Manv ='$manv'";
        $ds = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($ds) > 0) {
            $kq = true;
        }
        return $kq;
    }

    public function TimKiemNhanVien($manv, $tennv, $chucvu, $gioitinh, $namsinh, $sdtnv, $dcnv)
    {
        $sql = "SELECT Manv, Tennv, Chucvu,(Case When Gioitinh = 'True' then N'Nam' Else N'Nữ' end) as Gioitinh,Namsinh, Sdtnv, Dcnv FROM nhanvien
        WHERE nhanvien.Manv LIKE '%" . $manv . "%' AND
              nhanvien.Tennv LIKE N'%" . $tennv . "%' AND
              nhanvien.Chucvu LIKE N'%" . $chucvu . "%' AND
              nhanvien.Gioitinh LIKE N'%" . $gioitinh . "%' AND
              nhanvien.Namsinh LIKE '%" . $namsinh . "%' AND
              nhanvien.Sdtnv LIKE '%" . $sdtnv . "%' AND
              nhanvien.Dcnv LIKE N'%" . $dcnv . "%'";
        return mysqli_query($this->con, $sql);
    }

    public function Delete_NhanVien($manv){
        $sql = "DELETE FROM nhanvien WHERE Manv='$manv'";
        return mysqli_query($this->con,$sql);
    }

    public function Update_NhanVien($manv, $tennv, $chucvu, $gioitinh, $namsinh, $sdtnv, $dcnv){
        $sql = "UPDATE nhanvien SET
                Tennv = '$tennv',
                Chucvu = '$chucvu',
                Gioitinh = '$gioitinh',
                Namsinh = '$namsinh',
                Sdtnv = '$sdtnv',
                Dcnv = '$dcnv' WHERE Manv='$manv'";
        return mysqli_query($this->con,$sql);
    }
}
