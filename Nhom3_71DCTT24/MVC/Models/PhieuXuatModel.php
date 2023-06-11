<?php
class PhieuXuatModel extends connectDB
{
    public function TimkiemHangHoa($maxuat)
    {
        $sql = 'SELECT hanghoa.mahh,tenhh,hanghoa.giaxuat,soluong,thanhtien FROM hanghoa,chitietphieuxuat
         WHERE 
            hanghoa.mahh = chitietphieuxuat.mahh AND
            chitietphieuxuat.maxuat LIKE "%'. $maxuat .'%"';
        return mysqli_query($this->con, $sql);
    }
    public function Timkiemhh($mahh)
    {
        $sql = 'SELECT * FROM hanghoa
        WHERE Mahh LIKE "%' . $mahh . '%"';
        return mysqli_query($this->con, $sql);
    }
    public function giaxuat_hh_all($mahh)
    {
        $sql = 'SELECT Giaxuat from hanghoa 
        where Mahh LIKE "%' . $mahh . '%"';
        $kqgx = mysqli_query($this->con, $sql);
        return $kqgx;   
    }
    public function hh_all($maxuat)
    {
        $sql = 'SELECT Mahh,Tenhh,Giaxuat,Tonkho from hanghoa 
        where mahh not in ( SELECT mahh from chitietphieuxuat where maxuat LIKE "%' . $maxuat . '%") ';
        return mysqli_query($this->con, $sql);
        
    }
    public function UpdateTonkho($mahh, $tonkho){
        $sql = "UPDATE hanghoa SET
                tonkho = '$tonkho' 
                WHERE mahh='$mahh'";
        return mysqli_query($this->con,$sql);
    }
    public function ChonPhieuXuat(){
        $sql = 'SELECT Maxuat FROM phieuxuat where Maxuat = (select max(Maxuat) from phieuxuat)';
        $kqpx = mysqli_query($this->con, $sql);
        return $kqpx;
    }
    public function PhieuXuat_ins($maxuat, $manv, $ngayxuat, $tongtien,$makh)
    {
        $sql = "INSERT INTO phieuxuat VALUES('$maxuat','$manv','$ngayxuat','$tongtien','$makh')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    public function UpdatePhieuXuat($maxuat,$tongtien){
        $sql = "UPDATE phieuxuat SET
                tongtien = '$tongtien' WHERE maxuat='$maxuat'";
        return mysqli_query($this->con,$sql);
    }
    public function CTPhieuXuat_ins($maxuat,$mahh,$giaxuat,$soluong,$thanhtien)
    {   $sql = "INSERT INTO chitietphieuxuat VALUES('$maxuat','$mahh','$giaxuat','$soluong','$thanhtien')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }
    public function TimkiemnSuaCTHoaDon($maxuat,$mahh)
    {      
        
        $sql = 'SELECT hanghoa.mahh,tenhh,hanghoa.giaxuat,soluong,thanhtien FROM hanghoa,chitietphieuxuat
        WHERE 
            hanghoa.mahh = chitietphieuxuat.mahh AND
            chitietphieuxuat.maxuat LIKE "%'. $maxuat .'%" AND
            chitietphieuxuat.mahh LIKE "%'. $mahh .'%"';
        return mysqli_query($this->con, $sql);
    }
    public function UpdateCTPhieuXuat($maxuat,$mahh, $soluong, $thanhtien){
        $sql = "UPDATE chitietphieuxuat SET
                soluong = '$soluong' ,
                thanhtien = '$thanhtien' WHERE mahh='$mahh'AND maxuat+
                ='$maxuat'";
        return mysqli_query($this->con,$sql);
    }
}
?>