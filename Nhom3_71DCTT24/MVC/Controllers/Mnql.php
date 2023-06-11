<?php
class Mnql extends controller
{
    function Getdata()
    {
        //tham số page gọi đến trang bằng cách =>
        $this->view('Masterlayout', [
            'page' => 'Mnqlview',
        ]);
    }
}
?>