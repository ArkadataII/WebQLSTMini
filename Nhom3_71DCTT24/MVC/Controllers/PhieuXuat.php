<?php
class PhieuXuat extends controller
{
    public $phieuxuat;

    function __construct()
    {
        $this->phieuxuat = $this->model('PhieuXuatModel');
    }

    function Getdata()
    {
        $_SESSION['tongtien'] = 0;
        $this->phieuxuat->PhieuXuat_ins('', $_SESSION['user'], '2021-12-5', '', '');
        $mx = $this->phieuxuat->ChonPhieuXuat();
        while ($r = mysqli_fetch_array($mx)) {
            $maxuat = $r['Maxuat'];
        };
        $this->view('Masterlayout', [
            'page' => 'XuatHang/HoaDonView',
            'kqtkhh' => $this->phieuxuat->TimkiemHangHoa($maxuat),
            'result1' => $this->phieuxuat->hh_all($maxuat),
            'tongtien' => $_SESSION['tongtien'],
            'maxuat' => ''


        ]);
    }
    function DSHoaDon()
    {
        if (isset($_POST['btnThem'])) {
            $mahh = $_POST['listhh'];
            $mx = $this->phieuxuat->ChonPhieuXuat();
            while ($r = mysqli_fetch_array($mx)) {
                $maxuat = $r['Maxuat'];
            };
            $gx = $this->phieuxuat->giaxuat_hh_all($mahh);
            while ($r = mysqli_fetch_array($gx)) {
                $giaxuat = $r['Giaxuat'];
            };
            $soluong = $_POST['txtsoluong'];
            $tk = $this->phieuxuat->Timkiemhh($mahh);
            while ($r1 = mysqli_fetch_assoc($tk)) {
                $tonkho = $r1['Tonkho'];
                if ($tonkho < $soluong) {
                    echo "<script type='text/javascript'>alert('Số lượng tồn kho không đủ!');</script>";
                } else {
                    $thanhtien = $giaxuat * $soluong;
                    $_SESSION['tongtien'] += $thanhtien;
                    $this->phieuxuat->CTPhieuXuat_ins($maxuat, $mahh, $giaxuat, $soluong, $thanhtien);
                }
            };
            $this->view('Masterlayout', [
                'page' => 'XuatHang/HoaDonView',
                'maxuat' => $maxuat,
                'kqtkhh' => $this->phieuxuat->TimkiemHangHoa($maxuat),
                'result1' => $this->phieuxuat->hh_all($maxuat),
                'mahh' => $mahh,
                'maxuat' => $maxuat,
                'giaxuat' => $giaxuat,
                'soluong' => $soluong,
                'thanhtien' => $thanhtien,
                'tongtien' => $_SESSION['tongtien']
            ]);
        }
        if (isset($_POST['btnLuuDon'])) {
            $mahh = $_POST['listhh'];
            $mx = $this->phieuxuat->ChonPhieuXuat();
            while ($r = mysqli_fetch_array($mx)) {
                $maxuat = $r['Maxuat'];
            };
            $tongtien = $_SESSION['tongtien'];
            $sl = $this->phieuxuat->TimkiemHangHoa($maxuat);
            while ($r = mysqli_fetch_assoc($sl)) {
                $mahh = $r['mahh'];
                $soluong = $r['soluong'];
                $tk = $this->phieuxuat->Timkiemhh($mahh);
                while ($r1 = mysqli_fetch_assoc($tk)) {
                    $tonkho = $r1['Tonkho'];
                    $tong = $tonkho - $soluong;
                    $this->phieuxuat->UpdateTonkho($mahh, $tong);
                };
            };
            $this->phieuxuat->Updatephieuxuat($maxuat, $tongtien);
            $this->view('Masterlayout', [
                'page' => 'Masterlayout1',
                'maxuat' => $maxuat,
                'kqtkhh' => $this->phieuxuat->TimkiemHangHoa($maxuat),
                'result1' => $this->phieuxuat->hh_all($maxuat),
                'tongtien' => $_SESSION['tongtien']
            ]);
        }
        if (isset($_POST['btnLuuct'])) {
            $mahh = $_SESSION['mahh'];
            $gx = $this->phieuxuat->giaxuat_hh_all($mahh);
            while ($r = mysqli_fetch_array($gx)) {
                $giaxuat = $r['Giaxuat'];
            };
            $soluong = $_POST['txtsoluong'];
            $thanhtien = $giaxuat * $soluong;
            $_SESSION['tongtien'] += $thanhtien;

            $mx = $this->phieuxuat->ChonPhieuXuat();
            while ($r = mysqli_fetch_array($mx)) {
                $maxuat = $r['Maxuat'];
            };
            // $tongtien =$_SESSION['tongtien'];
            $kq = $this->phieuxuat->UpdateCTPhieuXuat($maxuat, $mahh, $soluong, $thanhtien);
            if ($kq) {
                $this->view('Masterlayout', [
                    'page' => 'XuatHang/HoaDonView',
                    'maxuat' => $maxuat,
                    'kqtkhh' => $this->phieuxuat->TimkiemHangHoa($maxuat),
                    'result1' => $this->phieuxuat->hh_all($maxuat),
                    'mahh' => $mahh,
                    'maxuat' => $maxuat,
                    'giaxuat' => $giaxuat,
                    'soluong' => $soluong,
                    'thanhtien' => $thanhtien,
                    'tongtien' => $_SESSION['tongtien']
                ]);
                echo "<script type='text/javascript'>alert('Sửa thành công!');</script>";
            } else {
                $this->view('Masterlayout', [
                    'page' => 'XuatHang/HoaDonView',
                    'maxuat' => $maxuat,
                    'kqtkhh' => $this->phieuxuat->TimkiemHangHoa($maxuat),
                    'result1' => $this->phieuxuat->hh_all($maxuat),
                    'mahh' => $mahh,
                    'maxuat' => $maxuat,
                    'giaxuat' => $giaxuat,
                    'soluong' => $soluong,
                    'thanhtien' => $thanhtien,
                    'tongtien' => $_SESSION['tongtien']
                ]);
                echo "<script type='text/javascript'>alert('Sửa thất bại!');</script>";
            }
        }
        if (isset($_POST['btnBack'])) {
            $mancc = $_SESSION['mancc'];
            $mahh = $_SESSION['mahh'];
            $mn = $this->phieuxuat->ChonPhieuNhap();
            while ($r = mysqli_fetch_array($mn)) {
                $manhap = $r['Manhap'];
            };
            $gn = $this->phieuxuat->gianhap_hh_all($mahh);
            while ($r = mysqli_fetch_array($gn)) {
                $gianhap = $r['Gianhap'];
            };
            $soluong = $_POST['txtsoluong'];
            $thanhtien = $gianhap * $soluong;
            $_SESSION['tongtien'] += $thanhtien;
            $this->view('Masterlayout', [
                'page' => 'NhapHang/CTPhieuNhapView',
                'chonpn' => $this->phieuxuat->ChonPhieuXuat(),
                'kqctpn' => $this->phieuxuat->TimkiemnCTPhieuNhap($manhap),
                'result1' => $this->phieuxuat->hh_all($manhap, $mancc),
                'mancc' => $mancc,
                'mahh' => $mahh,
                'manhap' => $manhap,
                'tongtien' => $_SESSION['tongtien']
            ]);
        }
        if (isset($_POST['btnXuatctpn'])) {
            $mx = $this->phieuxuat->ChonPhieuXuat();
            while ($r = mysqli_fetch_array($mx)) {
                $maxuat = $r['Maxuat'];
            };
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('PN');
            $rowCount = 1;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'Mã HH');
            $sheet->setCellValue('B' . $rowCount, 'Hàng hóa');
            $sheet->setCellValue('C' . $rowCount, 'Giá xuất');
            $sheet->setCellValue('D' . $rowCount, 'Số lượng');
            $sheet->setCellValue('E' . $rowCount, 'Thành tiền');

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            //gán màu nền
            $sheet->getStyle('A1:G1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            //căn giữa
            $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $kq = $this->phieuxuat->TimkiemHangHoa($maxuat);

            while ($row = mysqli_fetch_array($kq)) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['mahh']);
                $sheet->setCellValue('B' . $rowCount, $row['tenhh']);
                $sheet->setCellValue('C' . $rowCount, $row['giaxuat']);
                $sheet->setCellValue('D' . $rowCount, $row['soluong']);
                $sheet->setCellValue('E' . $rowCount, $row['thanhtien']);
            }
            $rowCount++;
            $sheet->setCellValue('A' . $rowCount, 'Tổng tiền:');
            $sheet->setCellValue('E' . $rowCount, $_SESSION['tongtien']);
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
            $fileName = 'CTPhieuXuat.xls';
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
    function suactphieu($mahh)
    {
        $_SESSION['mahh'] = $mahh;
        $mx = $this->phieuxuat->ChonPhieuXuat();
        while ($r = mysqli_fetch_array($mx)) {
            $maxuat = $r['Maxuat'];
        };
        $tt = $this->phieuxuat->TimkiemnSuaCTHoaDon($maxuat, $mahh);
        while ($r = mysqli_fetch_array($tt)) {
            $thanhtien = $r['thanhtien'];
        };
        $_SESSION['tongtien'] -= $thanhtien;
        $this->view('Masterlayout', [
            'page' => 'XuatHang/SuaCTHoaDonView',
            'chonpn' => $this->phieuxuat->Chonphieuxuat(),
            'kqsuactpn' => $this->phieuxuat->TimkiemnSuaCTHoaDon($maxuat, $mahh),
            'result1' => $this->phieuxuat->hh_all($maxuat),
            'tongtien' => $_SESSION['tongtien']
        ]);
    }
}
