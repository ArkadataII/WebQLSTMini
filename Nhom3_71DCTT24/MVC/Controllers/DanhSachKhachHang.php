<?php
class DanhSachKhachHang extends controller
{
    public $khachhang;

    function __construct()
    {
        $this->khachhang= $this->model('DSKhachHang_model');
    }

    function Getdata()
    {
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'KhachHang/QuanLyKhachHang',
            'result' => $this->khachhang->Khachhang_all(),
            'makh' => '',
            'tenkh' => '',
            'tichdiem' => ''
        ]);
    }

    function Action_KhachHang()
    {
        if (isset($_POST['btnTimkiem'])) {
            $makh = $_POST['txtMakh'];
            $tenkh = $_POST['txtTenkh'];
            $tichdiem = $_POST['txtTichdiem'];
            $kq = $this->khachhang->TimKiemKhachHang($makh,$tenkh, $tichdiem);
            $this->view('Masterlayout', [
                'page' => 'KhachHang/QuanLyKhachHang',
                'result' => $kq,
                'makh' => $makh,
                'tenkh' => $tenkh,
                'tichdiem' => $tichdiem,
            ]);
        }

        if (isset($_POST['btnThem'])) {
            $makh = $_POST['txtMakh'];
            $tenkh = $_POST['txtTenkh'];
            $tichdiem = $_POST['txtTichdiem'];
            if ($makh == '' || $tenkh == '' || $tichdiem == '') {
                $this->view('Masterlayout', [
                    'page' => 'KhachHang/QuanLyKhachHang',
                    'result' => $this->khachhang->Khachhang_all(),
                    'thongbao' => 'Bạn chưa nhập đủ thông tin'
                ]);
            } else {
                $kq1 = $this->khachhang->ChecktrungMakh($makh);
                if (!$kq1) {
                    $this->khachhang->Khachhang_ins($makh,$tenkh, $tichdiem);
                        $this->view('Masterlayout', [
                            'page' => 'KhachHang/QuanLyKhachHang',
                            'result' => $this->khachhang->Khachhang_all(),
                            'thongbao' => 'Thêm mới thành công',
                            'makh' => $makh,
                            'tenkh' => $tenkh,
                            'tichdiem' => $tichdiem
                        ]);
                } else {
                    $this->view('Masterlayout', [
                        'page' => 'KhachHang/QuanLyKhachHang',
                        'result' => $this->khachhang->Khachhang_all(),
                        'thongbao' => 'Mã nhân viên đã tồn tại'
                    ]);
                }
            }
        }

        if (isset($_POST['btnNhap'])){
            $file=$_FILES['file']['tmp_name'];
            $objReader=PHPExcel_IOFactory::createReaderForFile($file);
            $objExcel=$objReader->load($file);
            //Lấy sheet hiện tại
            $sheet=$objExcel->getSheet(0);
            $sheetData=$sheet->toArray(null,true,true,true);
            for($i=2;$i<=count($sheetData);$i++){
                $makh=$sheetData[$i]["A"];
                $tenkh=$sheetData[$i]["B"];
                $tichdiem=$sheetData[$i]["C"]; 
                $kq=$this->khachhang->Khachhang_ins($makh,$tenkh, $tichdiem);
                
            }
             $this->view('Masterlayout', [
                'page' => 'KhachHang/QuanLyKhachHang',
                'kqtk' => $this->khachhang->TimKiemKhachHang('', '', '')
             ]);
             echo "<script type='text/javascript'>alert('Nhập dữ liệu thành công!');</script>";
        }

        if (isset($_POST['btnLuu'])) {
            $makh = $_SESSION['makh']; //biến toàn cục dùng để lưu giá trị từ trang này sang trang khác
            $tenkh = $_POST['txtTenkh'];
            $tichdiem = $_POST['txtTichdiem'];
            $kq = $this->khachhang->Update_KhachHang($makh,$tenkh, $tichdiem);
            if ($kq) {
                $this->view('Masterlayout', [
                    'page' => 'KhachHang/QuanLyKhachHang',
                    'result' => $this->khachhang->Khachhang_all(),
                    'thongbao' => '',
                    'kqtk' => $this->khachhang->TimKiemKhachHang('', '', '')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thành công!');</script>";
            } else {
                $this->view('Masterlayout', [
                    'page' => 'KhachHang/QuanLyKhachHang',
                    'result' => $this->khachhang->Khachhang_all(),
                    'thongbao' => '',
                    'kqtk' => $this->khachhang->TimKiemKhachHang('', '', '')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thất bại!');</script>";
            }
        }
    }

    function SuaKhachHang($makh)
    {
        $_SESSION['makh'] = $makh;
        $this->view('Masterlayout', [
            'page' => 'KhachHang/SuaKhachHang',
            'thongbao' => '',
            'kqtk' => $this->khachhang->TimKiemKhachHang($makh, '', '')
        ]);
    }

    function btnXoaKhachHang($makh)
    {
            $this->khachhang->Delete_KhachHang($makh);
            $this->view('Masterlayout', [
                'page' => 'KhachHang/QuanLyKhachHang',
                'result' => $this->khachhang->Khachhang_all(),
                'thongbao' => ''
            ]);
            echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
    }
}
?>