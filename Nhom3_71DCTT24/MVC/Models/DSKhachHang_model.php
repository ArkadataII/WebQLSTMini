<?php
class DSKhachHang_model extends connectDB
{

    public function Khachhang_all()
    {
        $url = 'http://localhost:2001/khachhang'; // URL API khachhang
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
            // Trả về mảng dữ liệu khách hàng
        } else {
            echo "Không có dữ liệu khách hàng";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function Khachhang_ins($makh, $tenkh, $tichdiem)
    {
        $url = 'http://localhost:2001/khachhang/Them';

        $data = array(
            'Makh' => $makh,
            'Tenkh' => $tenkh,
            'Tichdiem' => $tichdiem
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

    public function ChecktrungMakh($makh)
    {
        $sql = "SELECT Makh FROM khachhang WHERE Makh ='$makh'";
        $ds = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($ds) > 0) {
            $kq = true;
        }
        return $kq;
    }

    public function TimKiemKhachHang($makh, $tenkh, $tichdiem)
    {
        $url = 'http://localhost:2001/khachhang/Timkiem'; // URL API nganhhoc
        $data = array(
            'Makh' => $makh,
            'Tenkh' => $tenkh,
            'Tichdiem' => $tichdiem
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
            // Trả về mảng dữ liệu khách hàng
        } else {
            echo "Không có dữ liệu khách hàng";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function Delete_KhachHang($makh)
    {
        $url = 'http://localhost:2001/khachhang/Xoa/' . $makh;

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

    public function Update_KhachHang($makh, $tenkh, $tichdiem)
    {
        $url = 'http://localhost:2001/khachhang/Sua/' . $makh;

        $data = array(
            'Tenkh' => $tenkh,
            'Tichdiem' => $tichdiem
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
