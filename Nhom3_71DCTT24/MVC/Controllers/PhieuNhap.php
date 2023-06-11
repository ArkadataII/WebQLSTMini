<?php
class PhieuNhap extends controller
{
    public $phieunhap;

    function __construct()
    {
        $this->phieunhap = $this->model('PhieuNhapModel');
    }

    function Getdata()
    {
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'NhapHang/PhieuNhapView',
            'result' => $this->phieunhap->ncc_all(),
            'kqpn' => $this->phieunhap->TimkiemnPhieuNhap('', '', ''),
            'kqtk' => $this->phieunhap->Timkiemncc('', '', '', ''),
            'manhap' => '',
            'mancc' => '',
            'ngaynhap' => ''
        ]);
    }
    function NCC()
    {
        if (isset($_POST['btnTimkiemncc'])) {
            // $manhap = $_POST['txtmanhap'];
            // $_SESSION['manhap'] = $manhap; 
            $mancc = $_POST['txtMancc'];
            $tenncc = $_POST['txtTenncc'];
            $kqncc = $this->phieunhap->Timkiemncc($mancc, $tenncc);
            $this->view('Masterlayout', [
                'page' => 'NhapHang/ThemPhieuNhapView',
                'result' => $this->phieunhap->ncc_all(),
                'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                'mancc' => $mancc,
                'tenncc' => $tenncc,
                'kqncc' => $kqncc
            ]);
        }
        if (isset($_POST['btnThemncc'])) {
            $this->view('Masterlayout', [
                'page' => 'Nccs/QuanLyNcc',
                'result' => $this->phieunhap->ncc_all(),
                'kqncc' => $this->phieunhap->Timkiemncc('', '', '', ''),
                'kqtk' => $this->phieunhap->Timkiemncc('', '', '', ''),
                'mancc' => '',
                'tenncc' => '',
                'dcncc' => '',
                'sdtncc' => ''
            ]);
        }
    }
    function DSCTPhieuNhap()
    {
        if (isset($_POST['btnThemctpn'])) {
            $mancc = $_SESSION['mancc'];
            $mahh = $_POST['listhh'];
            $gn = $this->phieunhap->gianhap_hh_all($mahh);
            while ($r = mysqli_fetch_array($gn)) {
                $gianhap = $r['Gianhap'];
            };
            $soluong = $_POST['txtsoluong'];

            $mn = $this->phieunhap->ChonPhieuNhap();
            while ($r = mysqli_fetch_array($mn)) {
                $manhap = $r['Manhap'];
            };
            if ($mahh == '' || $soluong == '') {
                $this->view('MasterLayout', [
                    'page' => 'NhapHang/CTPhieuNhapView',
                    'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                    'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
                    'result1' => $this->phieunhap->hh_all($manhap, $mancc),
                    'mancc' => $mancc,
                    'mahh' => $mahh,
                    'manhap' => $manhap,
                    'gianhap' => $gianhap,
                    'soluong' => $soluong,
                    // 'thanhtien' => $thanhtien,
                    'thongbao' => 'Bạn chưa nhập đủ thông tin',
                    'tongtien' => $_SESSION['tongtien']
                ]);
            } else {
                $thanhtien = $gianhap * $soluong;
                $_SESSION['tongtien'] += $thanhtien;
                $this->phieunhap->CTPhieuNhap_ins($mahh, $manhap, $gianhap, $soluong, $thanhtien);
                $this->view('MasterLayout', [
                    'page' => 'NhapHang/CTPhieuNhapView',
                    'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                    'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
                    'result1' => $this->phieunhap->hh_all($manhap, $mancc),
                    'mancc' => $mancc,
                    'mahh' => $mahh,
                    'manhap' => $manhap,
                    'gianhap' => $gianhap,
                    'soluong' => $soluong,
                    'thanhtien' => $thanhtien,
                    'tongtien' => $_SESSION['tongtien']
                ]);
            }
        }
        if (isset($_POST['btnHuyDon'])) {
            $mancc = $_SESSION['mancc'];
            $mahh = $_POST['listhh'];
            $mn = $this->phieunhap->ChonPhieuNhap();
            while ($r = mysqli_fetch_array($mn)) {
                $manhap = $r['Manhap'];
            };
            $this->phieunhap->DeletePhieuNhap($manhap);
            $this->phieunhap->DeleteCTPN($manhap);
            $this->view('Masterlayout', [
                'page' => 'NhapHang/PhieuNhapView',
                'result' => $this->phieunhap->ncc_all(),
                'kqpn' => $this->phieunhap->TimkiemnPhieuNhap('', '', ''),
                'manhap' => '',
                'mancc' => '',
                'ngaynhap' => ''
            ]);
        }
        if (isset($_POST['btnLuuDon'])) {
            $mancc = $_SESSION['mancc'];
            $mahh = $_POST['listhh'];
            $mn = $this->phieunhap->ChonPhieuNhap();
            while ($r = mysqli_fetch_array($mn)) {
                $manhap = $r['Manhap'];
            };
            $tongtien = $_SESSION['tongtien'];
            $sl = $this->phieunhap->TimkiemnCTPhieuNhap($manhap);
            while ($r = mysqli_fetch_assoc($sl)) {
                $mahh = $r['mahh'];
                $soluong = $r['soluong'];
                $tk = $this->phieunhap->Timkiemhh($mahh);
                while ($r1 = mysqli_fetch_assoc($tk)) {
                    $tonkho = $r1['Tonkho'];
                    $tong = $soluong + $tonkho;
                    $this->phieunhap->UpdateTonkho($mahh, $tong);
                };
            };
            if ($tongtien == 0) {
                $this->view('MasterLayout', [
                    'page' => 'NhapHang/CTPhieuNhapView',
                    'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                    'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
                    'result1' => $this->phieunhap->hh_all($manhap, $mancc),
                    'mancc' => $mancc,
                    'mahh' => $mahh,
                    'manhap' => $manhap,
                    // 'gianhap' => $gianhap,
                    // 'soluong' => $soluong,
                    // 'thanhtien' => $thanhtien,
                    'tongtien' => $_SESSION['tongtien']
                ]);
                echo "<script type='text/javascript'>alert('Vui lòng chọn sản phẩm trước!');</script>";
            } else {
                $this->phieunhap->UpdatePhieuNhap($manhap, $mancc, '', '', $tongtien);
                $this->view('Masterlayout', [
                    'page' => 'NhapHang/PhieuNhapView',
                    'result' => $this->phieunhap->ncc_all(),
                    'kqpn' => $this->phieunhap->TimkiemnPhieuNhap('', '', ''),
                    'manhap' => '',
                    'mancc' => '',
                    'ngaynhap' => ''
                ]);
            }
        }
        if (isset($_POST['btnLuuct'])) {
            $mancc = $_SESSION['mancc'];
            $mahh = $_SESSION['mahh'];

            $mn = $this->phieunhap->ChonPhieuNhap();
            while ($r = mysqli_fetch_array($mn)) {
                $manhap = $r['Manhap'];
            };
            $tt = $this->phieunhap->TimkiemnSuaCTPhieuNhap($manhap, $mahh);
            while ($r = mysqli_fetch_array($tt)) {
                $thanhtien = $r['thanhtien'];
            };
            $_SESSION['tongtien'] -= $thanhtien;
            $gn = $this->phieunhap->gianhap_hh_all($mahh);
            while ($r = mysqli_fetch_array($gn)) {
                $gianhap = $r['Gianhap'];
            };
            $soluong = $_POST['txtsoluong'];
            $thanhtien = $gianhap * $soluong;
            $_SESSION['tongtien'] += $thanhtien;
            $tongtien = $_SESSION['tongtien'];
            $kq = $this->phieunhap->UpdateCTPhieuNhap($mahh, $manhap, $soluong, $thanhtien);
            if ($kq) {
                $this->view('MasterLayout', [
                    'page' => 'NhapHang/CTPhieuNhapView',
                    'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                    'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
                    'result1' => $this->phieunhap->hh_all($manhap, $mancc),
                    'mancc' => $mancc,
                    'mahh' => $mahh,
                    'manhap' => $manhap,
                    'gianhap' => $gianhap,
                    'soluong' => $soluong,
                    'thanhtien' => $thanhtien,
                    'tongtien' => $_SESSION['tongtien']
                ]);
                echo "<script type='text/javascript'>alert('Sửa thành công!');</script>";
            } else {
                $this->view('MasterLayout', [
                    'page' => 'NhapHang/CTPhieuNhapView',
                    'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                    'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
                    'result1' => $this->phieunhap->hh_all($manhap, $mancc),
                    'mancc' => $mancc,
                    'mahh' => $mahh,
                    'manhap' => $manhap,
                    'gianhap' => $gianhap,
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
            $mn = $this->phieunhap->ChonPhieuNhap();
            while ($r = mysqli_fetch_array($mn)) {
                $manhap = $r['Manhap'];
            };
            $gn = $this->phieunhap->gianhap_hh_all($mahh);
            while ($r = mysqli_fetch_array($gn)) {
                $gianhap = $r['Gianhap'];
            };
            $this->view('MasterLayout', [
                'page' => 'NhapHang/CTPhieuNhapView',
                'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
                'result1' => $this->phieunhap->hh_all($manhap, $mancc),
                'mancc' => $mancc,
                'mahh' => $mahh,
                'manhap' => $manhap,
                'tongtien' => $_SESSION['tongtien']
            ]);
        }
        if (isset($_POST['btnNhapctpn'])) {
            $mn = $this->phieunhap->ChonPhieuNhap();
            while ($r = mysqli_fetch_array($mn)) {
                $manhap = $r['Manhap'];
            };
            $file = $_FILES['file']['tmp_name'];
            $objReader = PHPExcel_IOFactory::createReaderForFile($file);
            $objExcel = $objReader->load($file);
            //Lấy sheet hiện tại
            $sheet = $objExcel->getSheet(0);
            $sheetData = $sheet->toArray(null, true, true, true);
            for ($i = 2; $i <= count($sheetData); $i++) {
                $mahh = $sheetData[$i]["A"];
                $gianhap = $sheetData[$i]["C"];
                $soluong = $sheetData[$i]["D"];
                $thanhtien = $sheetData[$i]["E"];
                $_SESSION['tongtien'] += $thanhtien;
                $kq = $this->phieunhap->CTPhieuNhap_ins($mahh, $manhap, $gianhap, $soluong, $thanhtien);
            }
            $this->view('Masterlayout', [
                'page' => 'NhapHang/CTPhieuNhapView',
                'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
                'result1' => $this->phieunhap->hh_all($manhap, $mancc),
                'tongtien' => $_SESSION['tongtien']
            ]);
            echo "<script type='text/javascript'>alert('Nhập dữ liệu thành công!');</script>";
        }
        if (isset($_POST['btnXuatctpn'])) {
            $mn = $this->phieunhap->ChonPhieuNhap();
            while ($r = mysqli_fetch_array($mn)) {
                $manhap = $r['Manhap'];
            };
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('PN');
            $rowCount = 1;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'Mã HH');
            $sheet->setCellValue('B' . $rowCount, 'Hàng hóa');
            $sheet->setCellValue('C' . $rowCount, 'Giá nhập');
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
            $kq = $this->phieunhap->TimkiemnCTPhieuNhap($manhap);

            while ($row = mysqli_fetch_array($kq)) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['mahh']);
                $sheet->setCellValue('B' . $rowCount, $row['tenhh']);
                $sheet->setCellValue('C' . $rowCount, $row['gianhap']);
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
            $fileName = 'CTPhieuNhap.xls';
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
    function CTPhieuNhap($mancc)
    {
        $ngaynhap = date("Y-m-d", time());
        $this->phieunhap->PhieuNhap_ins('', '', $_SESSION["user"], $ngaynhap, '');
        $mn = $this->phieunhap->ChonPhieuNhap();
        while ($r = mysqli_fetch_array($mn)) {
            $manhap = $r['Manhap'];
        };
        $_SESSION['mancc'] = $mancc;
        $_SESSION['tongtien'] = 0;
        $this->view('Masterlayout', [
            'page' => 'NhapHang/CTPhieuNhapView',
            'chonpn' => $this->phieunhap->ChonPhieuNhap(),
            'up' => $this->phieunhap->UpdatePhieuNhap($manhap, $mancc, '', '', ''),
            'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
            'result1' => $this->phieunhap->hh_all($manhap, $mancc),
            'manhap' => 'chonpn',
            'mancc' => $mancc,
            'tongtien' => $_SESSION['tongtien']
        ]);
    }
    function suactphieu($mahh)
    {
        $_SESSION['mahh'] = $mahh;
        $mancc = $_SESSION['mancc'];
        $mn = $this->phieunhap->ChonPhieuNhap();
        while ($r = mysqli_fetch_array($mn)) {
            $manhap = $r['Manhap'];
        };
        $this->view('Masterlayout', [
            'page' => 'NhapHang/SuaCTPhieuNhapView',
            'chonpn' => $this->phieunhap->ChonPhieuNhap(),
            'kqsuactpn' => $this->phieunhap->TimkiemnSuaCTPhieuNhap($manhap, $mahh),
            'result1' => $this->phieunhap->hh_all($manhap, $mancc),
            'mancc' => $mancc,
            'tongtien' => $_SESSION['tongtien']
        ]);
    }
    function xoactphieunhap($mahh)
    {
        $mancc = $_SESSION['mancc'];
        $mn = $this->phieunhap->ChonPhieuNhap();
        while ($r = mysqli_fetch_array($mn)) {
            $manhap = $r['Manhap'];
        };
        $tt = $this->phieunhap->TimkiemnSuaCTPhieuNhap($manhap, $mahh);
        while ($r = mysqli_fetch_array($tt)) {
            $thanhtien = $r['thanhtien'];
        };
        $_SESSION['tongtien'] -= $thanhtien;
        $this->phieunhap->DeleteCTPhieuNhap($mahh, $manhap);
        $this->view('Masterlayout', [
            'page' => 'NhapHang/CTPhieuNhapView',
            'chonpn' => $this->phieunhap->ChonPhieuNhap(),
            'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
            'result1' => $this->phieunhap->hh_all($manhap, $mancc),
            'manhap' => 'chonpn',
            'mancc' => $mancc,
            'tongtien' => $_SESSION['tongtien']
        ]);
        echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
    }
    function xemctphieu($manhap)
    {

        $kqpn = $this->phieunhap->TimkiemnPhieuNhap($manhap, '', '');
        while ($r = mysqli_fetch_array($kqpn)) {
            $tongtien = $r['tongtien'];
        };
        $_SESSION['manhap'] = $manhap;
        $this->view('Masterlayout', [
            'page' => 'NhapHang/XemCTPhieuView',
            'chonpn' => $this->phieunhap->ChonPhieuNhap(),
            'kqctpn' => $this->phieunhap->TimkiemnCTPhieuNhap($manhap),
            'manhap' => $manhap,
            'tongtien' => $tongtien

            // 'result1' => $this->phieunhap->hh_all($manhap,$mancc),
            // 'mancc' => $mancc,
            // 'mahh' => $mahh,
            // 'manhap' => $manhap,
            // 'gianhap' => $gianhap,
            // 'soluong' => $soluong,
            // 'thanhtien' => $thanhtien, 
            // 'tongtien'=>$_SESSION['tongtien']  
        ]);
    }
    function Xuatxemctphieu()
    {
        $_SESSION['tongtien'] = 0;
        if (isset($_POST['btnXuatxemctpn'])) {
            $manhap = $_SESSION['manhap'];
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('PN');
            $rowCount = 1;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'Mã HH');
            $sheet->setCellValue('B' . $rowCount, 'Hàng hóa');
            $sheet->setCellValue('C' . $rowCount, 'Giá nhập');
            $sheet->setCellValue('D' . $rowCount, 'Số lượng');
            $sheet->setCellValue('E' . $rowCount, 'Thành tiền');

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            //gán màu nền
            $sheet->getStyle('A1:E1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            //căn giữa
            $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $kq = $this->phieunhap->TimkiemnCTPhieuNhap($manhap);

            while ($row = mysqli_fetch_array($kq)) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['mahh']);
                $sheet->setCellValue('B' . $rowCount, $row['tenhh']);
                $sheet->setCellValue('C' . $rowCount, $row['gianhap']);
                $sheet->setCellValue('D' . $rowCount, $row['soluong']);
                $sheet->setCellValue('E' . $rowCount, $row['thanhtien']);
                $_SESSION['tongtien'] +=  $row['thanhtien'];
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
            $fileName = 'XemCTPhieuNhap.xls';
            $objWriter->save($fileName);
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
            header('Content-Length: ' . filesize($fileName));
            header('Content-Transfer-Encoding:binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($fileName);
        }
        $_SESSION['tongtien'] = 0;
    }
    function DSPhieuNhap()
    {
        if (isset($_POST['btnTimkiempn'])) {
            $manhap = $_POST['txtmanhap'];
            $mancc = $_POST['listncc'];
            $ngaynhap = $_POST['txtngaynhap'];
            $kqpn = $this->phieunhap->TimkiemnPhieuNhap($manhap, $mancc, $ngaynhap);
            $this->view('MasterLayout', [
                'page' => 'NhapHang/PhieuNhapView',
                'result' => $this->phieunhap->ncc_all(),
                'kqpn' => $kqpn,
                'manhap' => $manhap,
                'mancc' => $mancc,
                'ngaynhap' => $ngaynhap

            ]);
        }
        if (isset($_POST['btnNhaphang'])) {
            $this->view('Masterlayout', [
                'page' => 'NhapHang/ThemPhieuNhapView',
                'result' => $this->phieunhap->ncc_all(),
                'chonpn' => $this->phieunhap->ChonPhieuNhap(),
                'kqncc' => $this->phieunhap->Timkiemncc('', '', '', ''),
            ]);
        }
        if (isset($_POST['btnXuatpn'])) {
            $manhap = $_POST['txtmanhap'];
            $mancc = $_POST['listncc'];
            $ngaynhap = $_POST['txtngaynhap'];
            $objExcel = new PHPExcel();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet()->setTitle('PN');
            $rowCount = 1;
            //Tạo tiêu đề cho cột trong excel
            $sheet->setCellValue('A' . $rowCount, 'Mã phiếu');
            $sheet->setCellValue('B' . $rowCount, 'Nhà cung cấp');
            $sheet->setCellValue('C' . $rowCount, 'Người nhập');
            $sheet->setCellValue('D' . $rowCount, 'Ngày nhập');
            $sheet->setCellValue('E' . $rowCount, 'Tổng tiền');

            $sheet->getColumnDimension('A')->setAutoSize(true);
            $sheet->getColumnDimension('B')->setAutoSize(true);
            $sheet->getColumnDimension('C')->setAutoSize(true);
            $sheet->getColumnDimension('D')->setAutoSize(true);
            //gán màu nền
            $sheet->getStyle('A1:G1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
            //căn giữa
            $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $kq = $this->phieunhap->TimkiemnPhieuNhap($manhap, $mancc, $ngaynhap);

            while ($row = mysqli_fetch_array($kq)) {
                $rowCount++;
                $sheet->setCellValue('A' . $rowCount, $row['manhap']);
                $sheet->setCellValue('B' . $rowCount, $row['tenncc']);
                $sheet->setCellValue('C' . $rowCount, $row['tennv']);
                $sheet->setCellValue('D' . $rowCount, $row['ngaynhap']);
                $sheet->setCellValue('E' . $rowCount, $row['tongtien']);
            }
            // $rowCount++;
            // $sheet->setCellValue('A' . $rowCount, 'Tổng tiền:');
            // $sheet->setCellValue('E' . $rowCount, $_SESSION['tongtien']);
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
            $fileName = 'PhieuNhap.xls';
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
    function xoaphieunhap($manhap)
    {
        $this->phieunhap->DeletePhieuNhap($manhap);
        $this->view('Masterlayout', [
            'page' => 'NhapHang/PhieuNhapView',
            'result' => $this->phieunhap->ncc_all(),
            'kqpn' => $this->phieunhap->TimkiemnPhieuNhap('', '', ''),
            'manhap' => '',
            'mancc' => '',
            'ngaynhap' => ''
        ]);
        echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
    }
}
