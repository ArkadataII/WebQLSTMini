<?php
class thongkemodel extends connectDB
{
    function hanghoa(){
        $sql = 'SELECT Mahh,Tenhh from hanghoa';
        return mysqli_query($this->con, $sql);;
    }
    function thongke($mahh){
        $sql = 'SELECT Soluong from chitietphieuxuat
        Where Mahh= "'.$mahh.'"';
        return mysqli_query($this->con, $sql);;
    }
    }
?>
