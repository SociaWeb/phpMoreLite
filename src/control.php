<?php
require_once __DIR__ . '/db/connect.php';
class control
{
    public function index()
    {
        $connect = new connect();
        $conn = $connect->getMysqli();
        echo 'This is Index';
    }
    public function admin()
    {
        echo 'this is admin';
    }
}
