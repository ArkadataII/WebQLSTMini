<?php
class Account_list extends controller
{
    public $account;

    function __construct()
    {
        $this->account = $this->model('Account_list_model');
    }

    function Getdata()
    {
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'Account/Account_management',
            'result' => $this->account->account_all(),
            'nv' => $this->account->nv(),
            'manv' => '',
            'matkhau' => ''
        ]);
    }

    function action_account()
    {
        if (isset($_POST['btnTimkiem'])) {
            $manv = $_POST['ddlnv'];
            $matkhau = $_POST['txtMatkhau'];
            $kq = $this->account->account_search($manv, $matkhau);
            $this->view('Masterlayout', [
                'page' => 'Account/Account_management',
                'result' =>  $kq, 
                'nv' => $this->account->nv(),
                'manv' => $manv,
                'matkhau' => $matkhau
            ]);
        }

        if (isset($_POST['btnThem'])) {
            $manv = $_POST['ddlnv'];
            $matkhau = $_POST['txtMatkhau'];
            if ($manv == '' || $matkhau == '') {
                $this->view('Masterlayout', [
                    'page' => 'Account/Account_management',
                    'result' => $this->account->account_all(),
                    'nv' => $this->account->nv(),
                    'thongbao' => 'Bạn chưa nhập đủ thông tin',
                ]);
            } else {
                    $this->account->account_ins($manv, $matkhau);
                    $this->view('Masterlayout', [
                        'page' => 'Account/Account_management',
                        'result' => $this->account->account_all(),
                        'nv' => $this->account->nv(),
                        'thongbao' => 'Thêm mới thành công',
                        'manv' => $manv,
                        'matkhau' => $matkhau,
                    ]);
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
                $manv = $sheetData[$i]["A"];
                $matkhau = $sheetData[$i]["B"];
                $kq = $this->account->account_ins($manv, $matkhau);
            }
            $this->view('Masterlayout', [
                'page' => 'Account/Account_management',
                'kqtk1' => $this->account->account_search('', '', '', '')
            ]);
            echo "<script type='text/javascript'>alert('Nhập dữ liệu thành công!');</script>";
        }

        if (isset($_POST['btnLuu'])) {
            $manv = $_SESSION['Manv'];
            $matkhau = $_POST['txtMatkhau'];
            $kq = $this->account->Update_account($manv, $matkhau);
            if ($kq) {
                $this->view('Masterlayout', [
                    'page' => 'Account/Account_management',
                    'result' => $this->account->account_all(),
                    'thongbao' => '',
                    'kqtk1' => $this->account->account_search('', '')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thành công!');</script>";
            } else {
                $this->view('Masterlayout', [
                    'page' => 'Account/Account_management',
                    'result' => $this->account->account_all(),
                    'thongbao' => '',
                    'kqtk1' => $this->account->account_search('', '')
                ]);
                echo "<script type='text/javascript'>alert('Sửa thất bại!');</script>";
            }
        }
    }

    function edit_account($manv)
    {
        $_SESSION['Manv'] = $manv;
        $this->view('Masterlayout', [
            'page' => 'Account/Edit_account',
            'result' => $this->account->account_search($manv, ''),
            'thongbao' => ''
        ]);
    }

    function btn_delete_account($manv)
    {
        $this->account->Delete_account($manv);
        $this->view('Masterlayout', [
            'page' => 'Account/Account_management',
            'result' => $this->account->account_all(),
            'thongbao' => '',
            'kqtk1' => $this->account->account_search('', '')
        ]);
        echo "<script type='text/javascript'>alert('Xóa thành công!');</script>";
    }
}
?>
