<?php
class Home extends controller
{
    function Getdata()
    {
        $this->view('Masterlayout', ['page'=>'nenview']);
    }
}
?>