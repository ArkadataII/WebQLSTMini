<?php
class Dsnccmodel extends connectDB
{

    public function ncc_all()
    {
        $url = 'http://localhost:2001/nhacungcap'; // URL API nhacungcap
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
            // Trả về mảng dữ liệu nhà cung cấp
        } else {
            echo "Không có dữ liệu nhà cung cấp";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function ncc_ins($mancc, $tenncc, $dcncc, $sdtncc)
    {
        $url = 'http://localhost:2001/nhacungcap/Them';

        $data = array(
            'Mancc' => $mancc,
            'Tenncc' => $tenncc,
            'Dcncc' => $dcncc,
            'Sdtncc' => $sdtncc
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

    public function checktrungmncc($mancc)
    {
        $sql = "SELECT Mancc FROM nhacungcap WHERE Mancc ='$mancc'";
        $ds = mysqli_query($this->con, $sql);
        $kq = false;
        if (mysqli_num_rows($ds) > 0) {
            $kq = true;
        }
        return $kq;
    }

    public function Timkiemncc($mancc, $tenncc, $dcncc, $sdtncc)
    {
        $url = 'http://localhost:2001/nhacungcap/Timkiem'; // URL API nganhhoc
        $data = array(
            'Mancc' => $mancc,
            'Tenncc' => $tenncc,
            'Dcncc' => $dcncc,
            'Sdtncc' => $sdtncc
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
            // Trả về mảng dữ liệu nhà cung cấp
        } else {
            echo "Không có dữ liệu nhà cung cấp";
            return []; // Trả về một mảng rỗng nếu không có dữ liệu
        }
    }

    public function Deletencc($mancc)
    {
        $url = 'http://localhost:2001/nhacungcap/Xoa/' . $mancc;

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

    public function Updatencc($mancc, $tenncc, $dcncc, $sdtncc)
    {
        $url = 'http://localhost:2001/nhacungcap/Sua/' . $mancc;

        $data = array(
            'Tenncc' => $tenncc,
            'Dcncc' => $dcncc,
            'Sdtncc' => $sdtncc
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
