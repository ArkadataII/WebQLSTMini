<?php
class Dshhmodel extends connectDB{

    public function hh_all()
    {
        $sql = "SELECT * FROM hanghoa";
        return mysqli_query($this->con, $sql);
    }

    public function ncc()
    {
        $sql = "SELECT Mancc,Tenncc FROM nhacungcap";
        return mysqli_query($this->con, $sql);
    }

    public function nh()
    {
        $sql = "SELECT Manh,Tennh FROM nhomhang";
        return mysqli_query($this->con, $sql);
    }

    public function hh_ins($mahh, $mancc, $manh, $tenhh,$gianhap,$giaxuat,$tonkho)
    {
        $sql = "INSERT INTO hanghoa VALUES('$mahh', '$mancc', '$manh', '$tenhh', '$gianhap', '$giaxuat', '$tonkho')";
        $kq = mysqli_query($this->con, $sql);
        return $kq;
    }

    public function checktrungmhh($mahh)
    {
        $sql = "SELECT mahh FROM hanghoa WHERE mahh ='$mahh'";
        $ds = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($ds) > 0) {
            $kq = true;
        }
        return $kq;
    }

    public function Timkiemhh($mahh, $mancc, $manh, $tenhh,$gianhap,$giaxuat,$tonkho)
    {
        $sql = 'SELECT * FROM hanghoa WHERE hanghoa.mahh LIKE "%' . $mahh . '%"
        AND   hanghoa.mancc LIKE "%' . $mancc . '%"
        AND   hanghoa.manh LIKE "%' . $manh . '%"
        AND   hanghoa.tenhh LIKE "%' . $tenhh . '%"
        AND   hanghoa.gianhap LIKE "%' . $gianhap . '%"
        AND   hanghoa.giaxuat LIKE "%' . $giaxuat . '%"
        AND   hanghoa.tonkho LIKE "%' . $tonkho . '%"
        '
        ;
        return mysqli_query($this->con, $sql);
    }

    public function Deletehh($mahh){
        $sql = "DELETE FROM hanghoa WHERE mahh='$mahh'";
        mysqli_query($this->con,$sql);
        $sql = "DELETE FROM hanghoa Where mahh='$mahh'";
        return mysqli_query($this->con,$sql);
         
    }

    public function Updatehh($mahh, $mancc, $manh, $tenhh,$gianhap,$giaxuat,$tonkho){
        $sql = "UPDATE hanghoa SET
                mancc = '$mancc',
                manh = '$manh',
                tenhh = '$tenhh',
                gianhap = '$gianhap',
                giaxuat = '$giaxuat',
                tonkho = '$tonkho'
                WHERE mahh='$mahh'";
        return mysqli_query($this->con,$sql);
    }
}
?>