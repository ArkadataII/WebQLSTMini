<?php
class thongke extends controller
{
    public $tk;

    function __construct()
    {
        $this->tk = $this->model('thongkemodel');
    }

    function Getdata()
    {
        $kq = $this->tk->hanghoa();
        $_SESSION['thongke']=array();
        $i=0;
        while ($row = mysqli_fetch_array($kq)) {
            $kq2 = $this->tk->thongke($row['Mahh']);
            $_SESSION['thongke'][$i]=0;
            while ($r = mysqli_fetch_array($kq2)){
                $_SESSION['thongke'][$i]+=$r['Soluong'];
            }
            $i++;
        }
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'Thongkeview',
            'kqtk' => $this->tk->hanghoa()
        ]);
    }
}
?>