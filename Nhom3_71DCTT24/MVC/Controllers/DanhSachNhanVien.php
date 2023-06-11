<?php
class DanhSachNhanVien extends controller
{
    public $nhanvien;

    function __construct()
    {
        $this->nhanvien = $this->model('DSNhanVien_model');
    }

    function Getdata()
    {
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'Nhanvien/QuanLyNhanVien',
            'result' => $this->nhanvien->Nhanvien_all(),
            'kqtk' => $this->nhanvien->Nhanvien_all(),
            'manv' => '',
            'tennv' => '',
            'chucvu' => '',
            'gioitinh' => '',
            'namsinh' => '',
            'sdtnv' => '',
            'dcnv' => ''
        ]);
    }

    function Action_Nhanvien()
    {
        if (isset($_POST['btnTimkiem'])) {
            $manv = $_POST['txtManv'];
            $tennv = $_POST['txtTennv'];
            $chucvu = $_POST['ddlChucvu'];
            $gioitinh = $_POST['ddlGioitinh'];
            $namsinh = $_POST['txtNamsinh'];
            $sdtnv = $_POST['txtSdtnv'];
            $dcnv = $_POST['txtDcnv'];
            $kq = $this->nhanvien->TimKiemNhanVien($manv,$tennv, $chucvu,$gioitinh,$namsinh,$sdtnv,$dcnv);
            $this->view('Masterlayout', [
                'page' => 'Nhanvien/QuanLyNhanVien',
                'result' => $this->nhanvien->Nhanvien_all(),
                'manv' => $manv,
                'tennv' => $tennv,
                'chucvu' => $chucvu,
                'gioitinh' => $gioitinh,
                'namsinh' => $namsinh,
                'sdtnv' => $sdtnv,
                'dcnv' => $dcnv,
                'kqtk' => $kq
            ]);
        }

        if (isset($_POST['btnThem'])) {
            $manv = $_POST['txtManv'];
            $tennv = $_POST['txtTennv'];
            $chucvu = $_POST['ddlChucvu'];
            $gioitinh = $_POST['ddlGioitinh'];
            $namsinh = $_POST['txtNamsinh'];
            $sdtnv = $_POST['txtSdtnv'];
            $dcnv = $_POST['txtDcnv'];
            if ($manv == '' || $tennv == '' || $chucvu == '' || $gioitinh == '' || $namsinh == '' || $sdtnv == '' || $dcnv == '') {
                $this->view('Masterlayout', [
                    'page' => 'Nhanvien/QuanLyNhanVien',
                    'result' => $this->nhanvien->Nhanvien_all(),
                    'thongbao' => 'Bạn chưa nhập đủ thông tin',
                    'kqtk' => $this->nhanvien->TimKiemNhanVien('', '', '', '','','','')
                ]);
            } else {
                $kq1 = $this->nhanvien->ChecktrungManv($manv);
                if (!$kq1) {
                    $this->nhanvien->Nhanvien_ins($manv,$tennv, $chucvu,$gioitinh,$namsinh,$sdtnv,$dcnv);
                        $this->view('Masterlayout', [
                            'page' => 'Nhanvien/QuanLyNhanVien',
                            'result' => $this->nhanvien->Nhanvien_all(),
                            'thongbao' => 'Thêm mới thành công',
                            'manv' => $manv,
                            'tennv' => $tennv,
                            'chucvu' => $chucvu,
                            'gioitinh' => $gioitinh,
                            'namsinh' => $namsinh,
                            'sdtnv' => $sdtnv,
                            'dcnv' => $dcnv,
                            'kqtk' => $this->nhanvien->TimKiemNhanVien('', '', '', '','','','')
                        ]);
                } else {
                    $this->view('Masterlayout', [
                        'page' => 'Nhanvien/QuanLyNhanVien',
                        'result' => $this->nhanvien->Nhanvien_all(),
                        'thongbao' => 'Mã nhân viên đã tồn tại',
                        'kqtk' => $this->nhanvien->TimKiemNhanVien('', '', '', '','','','')
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
                $manv=$sheetData[$i]["A"];
                $tennv=$sheetData[$i]["B"];
                $chucvu=$sheetData[$i]["C"]; 
                $gioitinh=$sheetData[$i]["D"];
                $namsinh=$sheetData[$i]["E"];
                $sdtnv=$sheetData[$i]["F"];
                $dcnv=$sheetData[$i]["G"];
                $kq=$this->nhanvien->Nhanvien_ins($manv,$tennv, $chucvu,$gioitinh,$namsinh,$sdtnv,$dcnv);
                
            }
             $this->view('Masterlayout', [
                'page' => 'Nhanvien/QuanLyNhanVien',
                'kqtk' => $this->nhanvien->TimKiemNhanVien('', '', '', '','','','')
             ]);
             echo "<script type='text/javascript'>alert('Nhập dữ liệu thành công!');</script>";
        }

        if (isset($_POST['btnLuu'])) {
            $manv = $_SESSION['manv']; //biến toàn cục dùng để lưu giá trị từ trang này sang trang khác
            $tennv = $_POST['txtTennv'];
            $chucvu = $_POST['ddlChucvu'];
            $gioitinh = $_POST['ddlGioitinh'];
            $namsinh = $_POST['txtNamsinh'];
            $sdtnv = $_POST['txtSdtnv'];
            $dcnv = $_POST['txtDcnv'];
            $kq = $this->nhanvien->Update_NhanVien($manv,$tennv, $chucvu,$gioitinh,$namsinh,$sdtnv,$dcnv);
            if ($kq) {
                $this->view('Masterlayout', [
                    'page' => 'Nhanvien/QuanLyNhanVien',
                    'result' => $this->nhanvien->Nhanvien_all(),
                    'thongbao' => '',
                    'kqtk' => $this->nhanvien->TimKiemNhanVien('', '', '', '','','','')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thành công!');</script>";
            } else {
                $this->view('Masterlayout', [
                    'page' => 'Nhanvien/QuanLyNhanVien',
                    'result' => $this->nhanvien->Nhanvien_all(),
                    'thongbao' => '',
                    'kqtk' => $this->nhanvien->TimKiemNhanVien('', '', '', '','','','')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thất bại!');</script>";
            }
        }
    }

    function SuaNhanVien($manv)
    {
        $_SESSION['manv'] = $manv;
        $this->view('Masterlayout', [
            'page' => 'Nhanvien/SuaNhanVien',
            'result' => $this->nhanvien->Nhanvien_all(),
            'thongbao' => '',
            'kqtk' => $this->nhanvien->TimKiemNhanVien($manv, '', '', '','','','')
        ]);
    }

    function btnXoaNhanVien($manv)
    {
            $this->nhanvien->Delete_NhanVien($manv);
            $this->view('Masterlayout', [
                'page' => 'Nhanvien/QuanLyNhanVien',
                'result' => $this->nhanvien->Nhanvien_all(),
                'thongbao' => '',
                'kqtk' => $this->nhanvien->TimKiemNhanVien('', '', '', '','','','')
            ]);
            echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
    }
}
?>