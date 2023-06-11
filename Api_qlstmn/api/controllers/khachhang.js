'use strict';

const util = require('util');
const mysql = require('mysql');
const db = require('../connectdb');

// lấy all khách hàng
exports.Getallkhachhang = function (req, res) {
    let sql = "SELECT * from khachhang";
    db.query(sql, (err, response) => { //thực hiện câu lệnh sql đẩy dữ liệu trả về vào trong response
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
//Tìm kiếm khách hàng
exports.Findkhachhang = function (req, res) {
    let Makh = req.body.Makh;
    let Tenkh = req.body.Tenkh;
    let Tichdiem = req.body.Tichdiem;
    let Sdtncc = req.body.Sdtncc;

    let sql = "Select * from khachhang"
    + " Where (Makh LIKE '%"+ Makh +"%') and (Tenkh LIKE '%"+ Tenkh +"%')"
    + " and (Tichdiem LIKE '%"+ Tichdiem +"%')";

    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
// thêm khách hàng
exports.Insert = function (req, res) {
    let sql = 'INSERT INTO khachhang VALUES (?, ?, ?)';
    db.query(sql, [req.body.Makh, req.body.Tenkh, req.body.Tichdiem], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
//Sửa nhầ cung cấp
exports.Update = function (req, res) {
    let sql = "UPDATE khachhang SET Tenkh = ?, Tichdiem = ? WHERE Makh= ?";
    db.query(sql, [req.body.Tenkh,req.body.Tichdiem,req.params.Makh], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
//Xóa khách hàng
exports.Delete = function (req, res) {
    let sql = 'DELETE FROM khachhang WHERE Makh = ?';
    db.query(sql, [req.params.Makh], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'khách hàng không tồn tại' });
        }
        res.json(response);
    });
};