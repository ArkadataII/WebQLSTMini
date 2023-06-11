<?php
class Loginmodel extends ConnectDB{
    public function CheckUser_Pass($user,$pass){
        $sql="Select * From taikhoan Where Manv='$user' and Matkhau='$pass'";
        $data=mysqli_query($this->con,$sql);
        $kq=false;
        if(mysqli_num_rows($data)>0){
            $kq=true;
        }
        return $kq;
    }
}
?>