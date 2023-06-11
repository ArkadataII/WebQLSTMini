<?php
class Dsncc extends controller
{
    public $ncc;

    function __construct()
    {
        $this->ncc = $this->model('Dsnccmodel');
    }

    function Getdata()
    {
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'Nccs/QuanLyNcc',
            'result' => $this->ncc->ncc_all(),
            'mancc' => '',
            'tenncc' => '',
            'dcncc' => '',
            'sdtncc' => ''
        ]);
    }

    function thucthi_ncc()
    {
        if (isset($_POST['btnTimkiem'])) {
            $mancc = $_POST['txtMancc'];
            $tenncc = $_POST['txtTenncc'];
            $dcncc = $_POST['txtDcncc'];
            $sdtncc = $_POST['txtSdtncc'];
            $kq = $this->ncc->Timkiemncc($mancc, $tenncc, $dcncc, $sdtncc);
            $this->view('Masterlayout', [
                'page' => 'Nccs/QuanLyNcc',
                'result' => $kq,
                'mancc' => $mancc,
                'tenncc' => $tenncc,
                'dcncc' => $dcncc,
                'sdtncc' => $sdtncc
            ]);
        }

        if (isset($_POST['btnThem'])) {
            $mancc = $_POST['txtMancc'];
            $tenncc = $_POST['txtTenncc'];
            $dcncc = $_POST['txtDcncc'];
            $sdtncc = $_POST['txtSdtncc'];
            if ($mancc == '' || $tenncc == '' || $dcncc == '' || $sdtncc == '') {
                $this->view('Masterlayout', [
                    'page' => 'Nccs/QuanLyNcc',
                    'result' => $this->ncc->ncc_all(),
                    'thongbao' => 'Bạn chưa nhập đủ thông tin',
                ]);
            } else {
                $kq1 = $this->ncc->checktrungmncc($mancc);
                if (!$kq1) {
                    $this->ncc->ncc_ins($mancc, $tenncc, $dcncc, $sdtncc);
                    $this->view('Masterlayout', [
                        'page' => 'Nccs/QuanLyNcc',
                        'result' => $this->ncc->ncc_all(),
                        'thongbao' => 'Thêm mới thành công',
                        'mancc' => $mancc,
                        'tenncc' => $tenncc,
                        'dcncc' => $dcncc,
                        'sdtncc' => $sdtncc,
                    ]);
                } else {
                    $this->view('Masterlayout', [
                        'page' => 'Nccs/QuanLyNcc',
                        'result' => $this->ncc->ncc_all(),
                        'thongbao' => 'Mã nhà cung cấp đã tồn tại',
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
                $mancc = $sheetData[$i]["A"];
                $tenncc = $sheetData[$i]["B"];
                $dcncc = $sheetData[$i]["C"];
                $sdtncc = $sheetData[$i]["D"];
                $kq = $this->ncc->ncc_ins($mancc, $tenncc, $dcncc, $sdtncc);
            }
            $this->view('Masterlayout', [
                'page' => 'Nccs/QuanLyNcc',
                'kqtk' => $this->ncc->Timkiemncc('', '', '', '')
            ]);
            echo "<script type='text/javascript'>alert('Nhập dữ liệu thành công!');</script>";
        }

        if (isset($_POST['btnLuu'])) {
            $mancc = $_SESSION['mancc']; //biến toàn cục dùng để lưu giá trị từ trang này sang trang khác
            $tenncc = $_POST['txtTenncc'];
            $dcncc = $_POST['txtDcncc'];
            $sdtncc = $_POST['txtSdtncc'];
            $kq = $this->ncc->Updatencc($mancc, $tenncc, $dcncc, $sdtncc);
            if ($kq) {
                $this->view('Masterlayout', [
                    'page' => 'Nccs/QuanLyNcc',
                    'result' => $this->ncc->ncc_all(),
                    'thongbao' => '',
                    'kqtk' => $this->ncc->Timkiemncc('', '', '', '')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thành công!');</script>";
            } else {
                $this->view('Masterlayout', [
                    'page' => 'Nccs/QuanLyNcc',
                    'result' => $this->ncc->ncc_all(),
                    'thongbao' => '',
                    'kqtk' => $this->ncc->Timkiemncc('', '', '', '')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thất bại!');</script>";
            }
        }

        if (isset($_POST['btnXuat'])) {
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('DSNCC');
            $rowCount = 1;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'Mã nhà cung cấp');
            $sheet->setCellValue('B' . $rowCount, 'Tên nhà cung cấp');
            $sheet->setCellValue('C' . $rowCount, 'Địa chỉ');
            $sheet->setCellValue('D' . $rowCount, 'Số điện thoại');
            //định dạng cột tiêu đề
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            //gán màu nền
            $sheet->getStyle('A1:D1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            //căn giữa
            $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $mancc = $_POST['txtMancc'];
            $tenncc = $_POST['txtTenncc'];
            $dcncc = $_POST['txtDcncc'];
            $sdtncc = $_POST['txtSdtncc'];
            $kq = $this->ncc->Timkiemncc($mancc, $tenncc, $dcncc, $sdtncc);

            while ($row = mysqli_fetch_array($kq)) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['Mancc']);
                $sheet->setCellValue('B' . $rowCount, $row['Tenncc']);
                $sheet->setCellValue('C' . $rowCount, $row['Dcncc']);
                $sheet->setCellValue('D' . $rowCount, $row['Sdtncc']);
            }
            //Kẻ bảng 
            $styleAray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $sheet->getStyle('A1:' . 'D' . ($rowCount))->applyFromArray($styleAray);
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'NhaCungCap.xls';
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

    function suancc($mancc)
    {
        $_SESSION['mancc'] = $mancc;
        $this->view('Masterlayout', [
            'page' => 'Nccs/SuaNcc',
            'result' => $this->ncc->ncc_all(),
            'thongbao' => '',
            'kqtk' => $this->ncc->Timkiemncc($mancc, '', '', '')
        ]);
    }

    function btnxoa_ncc($mancc)
    {
        $this->ncc->Deletencc($mancc);
        $this->view('Masterlayout', [
            'page' => 'Nccs/QuanLyNcc',
            'result' => $this->ncc->ncc_all(),
            'thongbao' => '',
            'kqtk' => $this->ncc->Timkiemncc('', '', '', '')
        ]);
        echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
    }
}
?>