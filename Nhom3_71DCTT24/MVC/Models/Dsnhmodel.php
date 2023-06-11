<?php
class Dsnhmodel extends connectDB{

    public function nh_all()
    {
        $url = 'http://localhost:2001/nhomhang'; // URL API nhomhang
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
            echo "Không có dữ liệu nhóm hàng";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function nh_ins($manh, $tennh)
    {
        $url = 'http://localhost:2001/nhomhang/Them';

        $data = array(
            'Manh' => $manh,
            'Tennh' => $tennh
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

    public function checktrungmnh($manh)
    {
        $url = 'http://localhost:2001/nhomhang/Hienthi/' . $manh; // URL API nganhhoc
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
            echo "Không có dữ liệu nhóm hàng";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function Timkiemnh($manh, $tennh)
    {
        $url = 'http://localhost:2001/nhomhang/Timkiem'; // URL API nganhhoc
        $data = array(
            'Manh' => $manh,
            'Tennh' => $tennh
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
        // Kiểm tra key 'Manh' tồn tại trong mảng $data
        if (!empty($data)) {
            $data = json_decode($response, true);
            return $data;
            // Trả về mảng dữ liệu nhóm hàng
        } else {
            echo "Không có dữ liệu nhóm hàng";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function Deletenh($manh){
        $url = 'http://localhost:2001/nhomhang/Xoa/' . $manh;

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

    public function Hienthi($manh){
        $url = 'http://localhost:2001/nhomhang/Hienthi/' . $manh;
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
        curl_close($curl);;
        if (!empty($data)) {
            $data = json_decode($response, true);
            return $data;
            // Trả về mảng dữ liệu nhóm hàng
        } else {
            echo "Không có dữ liệu nhóm hàng";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function Updatenh($manh, $tennh){
        $url = 'http://localhost:2001/nhomhang/Sua/' . $manh;

        $data = array(
            'Tennh' => $tennh
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
?>