<?php
class Account_list_model extends connectDB
{

    public function account_all()
    {
        $url = 'http://localhost:2001/taikhoan'; // URL API taikhoan
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            // Xử lý lỗi khi gọi API
            echo "Error: " . $error;
            return []; // Trả về một mảng rỗng nếu có lỗi
        }

        $data = json_decode($response, true);
        curl_close($curl);
        if (!empty($data)) {
            $data = json_decode($response, true);
            return $data;
            // Trả về mảng dữ liệu tài khoản
        } else {
            echo "Không có dữ liệu tài khoản";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function nv()
    {
        $url = 'http://localhost:2001/taikhoan/nv'; // URL API nhomhang
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            // Xử lý lỗi khi gọi API
            echo "Error: " . $error;
            return []; // Trả về một mảng rỗng nếu có lỗi
        }

        $data = json_decode($response, true);
        curl_close($curl);
        if (!empty($data)) {
            $data = json_decode($response, true);
            return $data;
            // Trả về mảng dữ liệu nhóm hàng
        } else {
            echo "Không có dữ liệu tài khoản";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function account_ins($manv, $matkhau)
    {
        $url = 'http://localhost:2001/taikhoan/Them';

        $data = array(
            'Manv' => $manv,
            'Matkhau' => $matkhau
        );

        // Convert data to JSON format
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST"); // Use POST request
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        return $result; // Return the result of the update operation
    }


    public function account_search($manv, $matkhau)
    {
        $url = 'http://localhost:2001/taikhoan/Timkiem'; // URL API nganhhoc
        $data = array(
            'Manv' => $manv,
            'Matkhau' => $matkhau
        );

        // Convert data to JSON format
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET"); // Use GET request
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            // Xử lý lỗi khi gọi API
            echo "Error: " . $error;
            return []; // Trả về một mảng rỗng nếu có lỗi
        }

        $data = json_decode($response, true);
        curl_close($curl);;
        if (!empty($data)) {
            $data = json_decode($response, true);
            return $data;
            // Trả về mảng dữ liệu tài khoản
        } else {
            echo "Không có dữ liệu tài khoản";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function Delete_account($manv){
        $url = 'http://localhost:2001/taikhoan/Xoa/' . $manv;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        return $result;
    }

    public function Update_account($manv, $matkhau){
        $url = 'http://localhost:2001/taikhoan/Sua/' . $manv;

        $data = array(
            'Matkhau' => $matkhau
        );

        // Convert data to JSON format
        $json_data = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT"); // Use PUT request
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_data);

        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            echo "Error: " . $error;
            return false;
        }

        $result = json_decode($response, true);

        return $result; // Return the result of the update operation
    }
}