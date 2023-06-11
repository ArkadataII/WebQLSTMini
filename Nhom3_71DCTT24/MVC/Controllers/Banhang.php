<?php
class Banhang extends controller
{
    public $bh;

    function __construct()
    {
        $this->bh = $this->model('Banhangmodel');
    }

    function Getdata()
    {
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'DonHang/Banhangview',
            'nv' => $this->bh->nv(),
            'kh' => $this->bh->kh(),
            'kqtk' => $this->bh->Timkiempx('', '','2002-3-15','2023-3-15')
        ]);
    }
    function thucthi_px()
    {
        if (isset($_POST['btnTimkiem'])) {
            $maxuat = $_POST['txtMaxuat'];
            $manv = $_POST['ddlnv'];
            $makh = $_POST['ddlkh'];
            $tu  = $_POST['txtTu'];
            $den  = $_POST['txtDen'];
            $this->view('Masterlayout', [
                'page' => 'DonHang/Banhangview',
                'nv' => $this->bh->nv(),
                'kh' => $this->bh->kh(),
                'maxuat' => $maxuat,
                'thongbao' => '',
                'kqtk' => $this->bh->Timkiempx($maxuat, $manv, $makh,$tu,$den)
            ]);
        }
        if (isset($_POST['btnXuat'])) {
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('CTPX');
            $sheet->setCellValue('A' . 1, 'Mã phiếu: '. $_SESSION['$maxuat']);
            $sheet->setCellValue('E' . 1, 'Tổng tiền: '. $_SESSION['tongtien']);
            $rowCount = 2;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'Mã hàng hóa');
            $sheet->setCellValue('B' . $rowCount, 'Tên hàng hóa');
            $sheet->setCellValue('C' . $rowCount, 'Gía xuất');
            $sheet->setCellValue('D' . $rowCount, 'Số lượng');
            $sheet->setCellValue('E' . $rowCount, 'Thành tiền');
            //định dạng cột tiêu đề
            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            //gán màu nền
            $sheet->getStyle('A2:E2')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            //căn giữa
            $sheet->getStyle('A2:E2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
            $maxuat = $_SESSION['$maxuat'];
            $kq = $this->bh->Chitietpx($maxuat);

            while ($row = mysqli_fetch_array($kq)) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['Mahh']);
                $sheet->setCellValue('B' . $rowCount, $row['Tenhh']);
                $sheet->setCellValue('C' . $rowCount, $row['Giaxuat']);
                $sheet->setCellValue('D' . $rowCount, $row['Soluong']);
                $sheet->setCellValue('E' . $rowCount, $row['Thanhtien']);
            }
            //Kẻ bảng 
            $styleAray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );
            $sheet->getStyle('A1:' . 'E' . ($rowCount))->applyFromArray($styleAray);
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $fileName = 'Chitietpx.xls';
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
    function chitiet($maxuat)
    {
        $_SESSION['$maxuat'] = $maxuat;
        $this->view('Masterlayout', [
            'page' => 'DonHang/Chitietview',
            'nv' => $this->bh->nv(),
            'kh' => $this->bh->kh(),
            'maxuat'=> $maxuat,
            'tongtien' => $this->bh->Tongtien($maxuat),
            'thongbao' => '',
            'kqtk' => $this->bh->Chitietpx($maxuat)
        ]);
    }
}
?>