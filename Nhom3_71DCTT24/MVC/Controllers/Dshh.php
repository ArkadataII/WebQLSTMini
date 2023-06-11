<?php
class Dshh extends controller
{
    public $hh;

    function __construct()
    {
        $this->hh = $this->model('Dshhmodel');
    }

    function Getdata()
    {
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'Hanghoa/QuanLyHh',
            'ncc' => $this->hh->ncc(),
            'nh' => $this->hh->nh(),
            'kqtk' => $this->hh->Timkiemhh('', '', '', '', '', '', ''),
            'mahh' => '',
            'tenhh' => ''
        ]);
    }

    function thucthi_hh()
    {
        if (isset($_POST['btnTimkiem'])) {
            $mahh = $_POST['txtMahh'];
            $mancc = $_POST['ddlncc'];
            $manh = $_POST['ddlnh'];
            $tenhh = $_POST['txtTenhh'];
            $gianhap =  $_POST['txtGianhap'];
            $giaxuat =  $_POST['txtGiaxuat'];
            $tonkho =  $_POST['txtTonkho'];
            $kq = $this->hh->Timkiemhh($mahh, $mancc, $manh, $tenhh, $gianhap, $giaxuat, $tonkho);
            $this->view('Masterlayout', [
                'page' => 'Hanghoa/QuanLyHh',
                'ncc' => $this->hh->ncc(),
                'nh' => $this->hh->nh(),
                'mahh' => $mahh,
                'tenhh' => $tenhh,
                'thongbao' => '',
                'kqtk' => $kq
            ]);
        }

        if (isset($_POST['btnThem'])) {
            $mahh = $_POST['txtMahh'];
            $mancc = $_POST['ddlncc'];
            $manh = $_POST['ddlnh'];
            $tenhh = $_POST['txtTenhh'];
            $gianhap =  $_POST['txtGianhap'];
            $giaxuat =  $_POST['txtGiaxuat'];
            $tonkho =  $_POST['txtTonkho'];
            if ($mahh == '' || $mancc == '' || $manh == '' || $tenhh == '' || $gianhap == '' || $giaxuat == '' || $tonkho == '') {
                $this->view('Masterlayout', [
                    'page' => 'Hanghoa/QuanLyHh',
                    'result' => $this->hh->hh_all(),
                    'ncc' => $this->hh->ncc(),
                    'nh' => $this->hh->nh(),
                    'thongbao' => 'Bạn chưa nhập đủ thông tin',
                    'kqtk' => $this->hh->Timkiemhh('', '', '', '', '', '', '')
                ]);
            } else {
                $kq1 = $this->hh->checktrungmhh($mahh);
                if (!$kq1) {
                    $this->hh->hh_ins($mahh, $mancc, $manh, $tenhh, $gianhap, $giaxuat, $tonkho);
                    $this->view('Masterlayout', [
                        'page' => 'Hanghoa/QuanLyHh',
                        'ncc' => $this->hh->ncc(),
                        'nh' => $this->hh->nh(),
                        'result' => $this->hh->hh_all(),
                        'thongbao' => 'Thêm mới thành công',
                        'mahh' => $mahh,
                        'tenhh' => $tenhh,
                        'kqtk' => $this->hh->Timkiemhh('', '', '', '', '', '', '')
                    ]);
                } else {
                    $this->view('Masterlayout', [
                        'page' => 'Hanghoa/QuanLyHh',
                        'ncc' => $this->hh->ncc(),
                        'nh' => $this->hh->nh(),
                        'result' => $this->hh->hh_all(),
                        'thongbao' => 'Mã sản phẩm đã tồn tại',
                        'kqtk' => $this->hh->Timkiemhh('', '', '', '', '', '', '')
                    ]);
                }
            }
        }

        if (isset($_POST['btnNhap'])) {
            $file = $_FILES['file']['tmp_name'];
            $objReader = PHPExcel_IOFactory::createReaderForFile($file);
            $objExcel = $objReader->load($file);
            //Lấy sheet hiện tại
            $sheet = $objExcel->getSheet(0);
            $sheetData = $sheet->toArray(null, true, true, true);
            for ($i = 2; $i <= count($sheetData); $i++) {
                $mahh = $sheetData[$i]["A"];
                $mancc = $sheetData[$i]["B"];
                $manh = $sheetData[$i]["C"];
                $tenhh = $sheetData[$i]["D"];
                $gianhap = $sheetData[$i]["E"];
                $giaxuat = $sheetData[$i]["F"];
                $tonkho = $sheetData[$i]["G"];
                $kq = $this->hh->hh_ins($mahh, $mancc, $manh, $tenhh, $gianhap, $giaxuat, $tonkho);
            }
            $this->view('Masterlayout', [
                'page' => 'Hanghoa/QuanLyHh',
                'ncc' => $this->hh->ncc(),
                'nh' => $this->hh->nh(),
                'kqtk' => $this->hh->Timkiemhh('', '', '', '', '', '', '')
            ]);
            echo "<script type='text/javascript'>alert('Nhập dữ liệu thành công!');</script>";
        }

        if (isset($_POST['btnLuu'])) {
            $mahh = $_SESSION['mahh']; //biến toàn cục dùng để lưu giá trị từ trang này sang trang khác
            $mancc = $_POST['txtMancc'];
            $manh = $_POST['txtManh'];
            $tenhh = $_POST['txtTenhh'];
            $gianhap = $_POST['txtGianhap'];
            $giaxuat = $_POST['txtGiaxuat'];
            $tonkho = $_POST['txtTonkho'];
            $kq = $this->hh->Updatehh($mahh, $mancc, $manh, $tenhh, $gianhap, $giaxuat, $tonkho);
            if ($kq) {
                $this->view('Masterlayout', [
                    'page' => 'Hanghoa/QuanLyHh',
                    'result' => $this->hh->hh_all(),
                    'ncc' => $this->hh->ncc(),
                    'nh' => $this->hh->nh(),
                    'kqtk' => $this->hh->Timkiemhh('', '', '', '', '', '', '')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thành công!');</script>";
            } else {
                $this->view('Masterlayout', [
                    'page' => 'Hanghoa/QuanLyHh',
                    'result' => $this->hh->hh_all(),
                    'ncc' => $this->hh->ncc(),
                    'nh' => $this->hh->nh(),
                    'kqtk' => $this->hh->Timkiemhh('', '', '', '', '', '', '')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thất bại!');</script>";
            }
        }

        if (isset($_POST['btnXuat'])) {
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('DSSP');
            $rowCount = 1;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'Mã sản phẩm');
            $sheet->setCellValue('B' . $rowCount, 'Mã nhà cung cấp');
            $sheet->setCellValue('C' . $rowCount, 'Mã nhóm hàng');
            $sheet->setCellValue('D' . $rowCount, 'Tên sản phẩm');
            $sheet->setCellValue('E' . $rowCount, 'Gía nhập');
            $sheet->setCellValue('F' . $rowCount, 'Gía xuất');
            $sheet->setCellValue('G' . $rowCount, 'Tồn kho');
            //định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            //gán màu nền
            $sheet->getStyle('A1:G1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            //căn giữa
            $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $mahh = $_POST['txtMahh'];
            $mancc = $_POST['ddlncc'];
            $manh = $_POST['ddlnh'];
            $tenhh = $_POST['txtTenhh'];
            $gianhap = $_POST['txtGianhap'];
            $giaxuat = $_POST['txtGiaxuat'];
            $tonkho = $_POST['txtTonkho'];
            $kq = $this->hh->Timkiemhh($mahh, $mancc, $manh, $tenhh, $gianhap, $giaxuat, $tonkho);

            while ($row = mysqli_fetch_array($kq)) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['Mahh']);
                $sheet->setCellValue('B' . $rowCount, $row['Mancc']);
                $sheet->setCellValue('C' . $rowCount, $row['Manh']);
                $sheet->setCellValue('D' . $rowCount, $row['Tenhh']);
                $sheet->setCellValue('E' . $rowCount, $row['Gianhap']);
                $sheet->setCellValue('F' . $rowCount, $row['Giaxuat']);
                $sheet->setCellValue('G' . $rowCount, $row['Tonkho']);
            }
            //Kẻ bảng 
            $styleAray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $sheet->getStyle('A1:' . 'G' . ($rowCount))->applyFromArray($styleAray);
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'SanPham.xls';
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

    function suahh($mahh)
    {
        $_SESSION['mahh'] = $mahh;
        $this->view('Masterlayout', [
            'page' => 'Hanghoa/SuaHh',
            'ncc' => $this->hh->ncc(),
            'nh' => $this->hh->nh(),
            'result' => $this->hh->hh_all(),
            'thongbao' => '',
            'kqtk' => $this->hh->Timkiemhh($mahh, '', '', '', '', '', '')
        ]);
    }

    function btnxoa_hh($mahh)
    {
        $this->hh->Deletehh($mahh);
        $this->view('Masterlayout', [
            'page' => 'Hanghoa/QuanLyHh',
            'ncc' => $this->hh->ncc(),
            'nh' => $this->hh->nh(),
            'result' => $this->hh->hh_all(),
            'mahh' => $mahh,
            'kqtk' => $this->hh->Timkiemhh('', '', '', '', '', '', '')
        ]);
        echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
    }
}
?>
