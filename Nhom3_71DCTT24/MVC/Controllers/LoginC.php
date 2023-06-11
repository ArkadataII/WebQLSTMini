<?php
class LoginC extends Controller
{
    public $login;
    public $thongbao = "";
    public function __construct()
    {
        $this->login = $this->model('Loginmodel');
    }
    function Getdata()
    {
        $this->view("Login", []);
    }
    function checkuser_pass()
    {
        if (isset($_POST['btnDangnhap'])) {
            $user = $_POST['username'];
            $pass = $_POST['pass'];
            $ch = $this->login->CheckUser_Pass($user, $pass);
            if (!$ch) {
                $this->giatri(['thongbao' => "Tên đăng nhập hoặc mật khâu không đúng!"]);
            } else
            {
                if ($user == 'QL1') {
                    $_SESSION["user"] = $user;
                    $this->view('MasterLayout', [
                        'page' => 'nenview'
                    ]);
                }else {
                    $_SESSION["user"] = $user;
                    $this->view('MasterLayout', [
                         'page' => 'Masterlayout1'
                     ]);
                }
            } 
            
        }
    }
}
