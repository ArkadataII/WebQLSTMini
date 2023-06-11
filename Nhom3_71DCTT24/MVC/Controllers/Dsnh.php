<?php

class Dsnh extends controller {
    public $nh;

    function __construct()
{
    $this->nh = $this->model('Dsnhmodel');
}

function Getdata()
{
    //tham số page gọi đến trang bằng cách =>
    $this->view('Masterlayout', [
        'page' => 'Nhomhang/QuanLyNh',
        'result' => $this->nh->nh_all(),
        'manh' => '',
        'tennh' => '',
    ]);
}

function thucthi_nh()
{
    if (isset($_POST['btnTimkiem'])) {
        $manh = $_POST['txtManh'];
        $tennh = $_POST['txtTennh'];
        $kq = $this->nh->Timkiemnh($manh, $tennh);
        $this->view('Masterlayout', [
            'page' => 'Nhomhang/QuanLyNh',
            'result' => $kq,
            '$manh' => $manh,
            'tennh' => $tennh,
        ]);
    }

    if (isset($_POST['btnThem'])) {
        $manh = $_POST['txtManh'];
        $tennh = $_POST['txtTennh'];
        if ($manh == '' || $tennh == '') {
            $this->view('Masterlayout', [
                'page' => 'Nhomhang/QuanLyNh',
                'result' => $this->nh->nh_all(),
                'thongbao' => 'Bạn chưa nhập đủ thông tin',
            ]);
        } else {
            $kq1 = $this->nh->checktrungmnh($manh);
            if ($kq1['message'] === 'Nhóm hàng không tồn tại') {
                $this->nh->nh_ins($manh, $tennh);
                    $this->view('Masterlayout', [
                        'page' => 'Nhomhang/QuanLyNh',
                        'result' => $this->nh->nh_all(),
                        'thongbao' => 'Thêm mới thành công',
                        'manh$manh' => $manh,
                        'tennh' => $tennh,
                    ]);
            } else {
                $this->view('Masterlayout', [
                    'page' => 'Nhomhang/QuanLyNh',
                    'result' => $this->nh->nh_all(),
                    'thongbao' => 'Mã nhóm hàng đã tồn tại',
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
            $manh=$sheetData[$i]["A"];
            $tennh=$sheetData[$i]["B"];
            $kq=$this->nh->nh_ins($manh,$tennh);
            
        }
         $this->view('Masterlayout', [
            'page'=>'Nhomhang/QuanLyNh',
            'kqtk' => $this->nh->Timkiemnh('','')
         ]);
         echo "<script type='text/javascript'>alert('Nhập dữ liệu thành công!');</script>";
    }

    if (isset($_POST['btnLuu'])) {
        $manh = $_SESSION['$manh']; //biến toàn cục dùng để lưu giá trị từ trang này sang trang khác
        $tennh = $_POST['txtTennh'];
        $kq = $this->nh->Updatenh($manh, $tennh);
        if ($kq) {
            $this->view('Masterlayout', [
                'page' => 'Nhomhang/QuanLyNh',
                'result' => $this->nh->nh_all(),
                'thongbao' => '',
            ]);
            echo "<script type='text/javascript'>alert('Sửa thành công!');</script>";
        } else {
            $this->view('Masterlayout', [
                'page' => 'Nhomhang/QuanLyNh',
                'result' => $this->nh->nh_all(),
                'thongbao' => '',
            ]);
            echo "<script type='text/javascript'>alert('Sửa thất bại!');</script>";
        }
    }

    if (isset($_POST['btnXuat'])) {
        $objExcel = new PHPExcel();
        $objExcel->setActiveSheetIndex(0);
        $sheet = $objExcel->getActiveSheet()->setTitle('DSNH');
        $rowCount = 1;
        //Tạo tiêu đề cho cột trong excel
        $sheet->setCellValue('A' . $rowCount, 'Mã nhóm hàng');
        $sheet->setCellValue('B' . $rowCount, 'Tên nhóm hàng');
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        //gán màu nền
        $sheet->getStyle('A1:B1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
        //căn giữa
        $sheet->getStyle('A1:B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
        $manh = $_POST['txtManh'];
        $tennh =$_POST['txtTennh'];
        $kq = $this->nh->Timkiemnh($manh, $tennh);

        while ($row = mysqli_fetch_array($kq)) {
            $rowCount++;
            $sheet->setCellValue('A' . $rowCount, $row['Manh']);
            $sheet->setCellValue('B' . $rowCount, $row['Tennh']);
        }
        //Kẻ bảng 
        $styleAray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        $sheet->getStyle('A1:' . 'B' . ($rowCount))->applyFromArray($styleAray);
        $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
        $fileName = 'NhomHang.xls';
        $objWriter->save($fileName);
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
        header('Content-Length: ' . filesize($fileName));
        header('Content-Transfer-Encoding:binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: no-cache');
        readfile($fileName);
    }
}

function suanh($manh)
{
    $_SESSION['$manh'] = $manh;
    $this->view('Masterlayout', [
        'page' => 'Nhomhang/Suanh',
        'result' => $this->nh->nh_all(),
        'thongbao' => '',
        'kqtk' => $this->nh->Hienthi($manh)
    ]);
}

function btnxoa_nh($manh)
{
        $this->nh->Deletenh($manh);
        $this->view('Masterlayout', [
            'page' => 'Nhomhang/QuanLyNh',
            'result' => $this->nh->nh_all(),
            'thongbao' => '',
        ]);
        echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
}
}
?>