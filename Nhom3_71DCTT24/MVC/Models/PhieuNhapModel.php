<?php
class PhieuNhapModel extends connectDB
{
    public function ncc_all()
    {
        $sql = "SELECT * FROM nhacungcap";
        return mysqli_query($this->con, $sql);
    }
    public function hh_all($manhap,$mancc)
    {
        $sql = 'SELECT Mahh,Tenhh,Gianhap from hanghoa 
        where Mancc LIKE "%' . $mancc . '%" AND
        mahh not in ( SELECT mahh from chitietphieunhap where manhap LIKE "%' . $manhap . '%") ';
        return mysqli_query($this->con, $sql);
        
    }
    public function Timkiemhh($mahh)
    {
        $sql = 'SELECT * FROM hanghoa
        WHERE Mahh LIKE "%' . $mahh . '%"';
        return mysqli_query($this->con, $sql);
    }
    public function gianhap_hh_all($mahh)
    {
        $sql = 'SELECT Gianhap from hanghoa 
        where Mahh LIKE "%' . $mahh . '%"';
        $kqgn = mysqli_query($this->con, $sql);
        return $kqgn;
        
    }
    public function Timkiemncc($mancc, $tenncc)
    {
        $sql = 'SELECT * FROM nhacungcap
        WHERE nhacungcap.Mancc LIKE "%' . $mancc . '%" AND
              nhacungcap.Tenncc LIKE "%' . $tenncc . '%" ';
        return mysqli_query($this->con, $sql);
    }
    public function ChonPhieuNhap(){
        $sql = 'SELECT Manhap FROM phieunhap where manhap = (select max(manhap) from phieunhap)';
        $kqpn = mysqli_query($this->con, $sql);
        return $kqpn;
    }
    public function TimkiemnPhieuNhap($manhap, $mancc, $ngaynhap)
    {      
        $sql = 'SELECT manhap,nhacungcap.tenncc,tennv,ngaynhap,tongtien FROM phieunhap,nhanvien,nhacungcap
        WHERE phieunhap.manhap LIKE "%' . $manhap . '%" AND
              phieunhap.ngaynhap LIKE "%' . $ngaynhap . '%" AND
              nhacungcap.mancc LIKE "%' . $mancc . '%" AND
              nhacungcap.mancc = phieunhap.mancc AND
              nhanvien.manv = phieunhap.manv';
        return mysqli_query($this->con, $sql);
    }
    public function PhieuNhap_ins($manhap, $mancc, $manv, $ngaynhap, $tongtien)
    {
        $sql = "INSERT INTO phieunhap VALUES('$manhap','$mancc','$manv','$ngaynhap','$tongtien')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    public function UpdatePhieuNhap($manhap, $mancc, $manv, $ngaynhap, $tongtien){
        $sql = "UPDATE phieunhap SET
                mancc = '$mancc' ,
                tongtien = '$tongtien' WHERE manhap='$manhap'";
        return mysqli_query($this->con,$sql);
    }
    public function DeletePhieuNhap($manhap){
        $sql = "DELETE FROM phieunhap WHERE manhap='$manhap'";
        return mysqli_query($this->con,$sql);
    }
    public function TimkiemnCTPhieuNhap($manhap)
    {      
        
        $sql = 'SELECT hanghoa.mahh,tenhh,hanghoa.gianhap,soluong,thanhtien FROM hanghoa,chitietphieunhap
        WHERE 
            hanghoa.mahh = chitietphieunhap.mahh AND
            chitietphieunhap.manhap LIKE "%'. $manhap .'%"';
        return mysqli_query($this->con, $sql);
    }
    public function TimkiemnSuaCTPhieuNhap($manhap,$mahh)
    {      
        
        $sql = 'SELECT hanghoa.mahh,tenhh,hanghoa.gianhap,soluong,thanhtien FROM hanghoa,chitietphieunhap
        WHERE 
            hanghoa.mahh = chitietphieunhap.mahh AND
            chitietphieunhap.manhap LIKE "%'. $manhap .'%" AND
            chitietphieunhap.mahh LIKE "%'. $mahh .'%"';
        return mysqli_query($this->con, $sql);
    }
    public function CTPhieuNhap_ins($mahh, $manhap, $gianhap, $soluong, $thanhtien)
    {
        $sql = "INSERT INTO chitietphieunhap VALUES('$mahh','$manhap','$gianhap','$soluong','$thanhtien')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    public function UpdateCTPhieuNhap($mahh,$manhap, $soluong, $thanhtien){
        $sql = "UPDATE chitietphieunhap SET
                soluong = '$soluong' ,
                thanhtien = '$thanhtien' WHERE mahh='$mahh'AND manhap='$manhap'";
        return mysqli_query($this->con,$sql);
    }
    public function DeleteCTPhieuNhap($mahh,$manhap){
        $sql = "DELETE FROM chitietphieunhap WHERE mahh='$mahh' AND manhap='$manhap'";
        return mysqli_query($this->con,$sql);
    }
    public function DeleteCTPN($manhap){
        $sql = "DELETE FROM chitietphieunhap WHERE manhap='$manhap'";
        return mysqli_query($this->con,$sql);
    }
    public function UpdateTonkho($mahh, $tonkho){
        $sql = "UPDATE hanghoa SET
                tonkho = '$tonkho' 
                WHERE mahh='$mahh'";
        return mysqli_query($this->con,$sql);
    }

    

    
}
