'use strict';

const util = require('util');
const mysql = require('mysql');
const db = require('../connectdb');

// lấy all tài khoản
exports.Getalltaikhoan = function (req, res) {
    let sql = "SELECT * from taikhoan";
    db.query(sql, (err, response) => { //thực hiện câu lệnh sql đẩy dữ liệu trả về vào trong response
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
// lấy all nhân viên cho list
exports.Getallnv = function (req, res) {
    let sql = "SELECT * from nhanvien Where manv not in (Select Manv from taikhoan)";
    db.query(sql, (err, response) => { //thực hiện câu lệnh sql đẩy dữ liệu trả về vào trong response
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
// thêm tài khoản
exports.Insert = function (req, res) {
    let sql = 'INSERT INTO taikhoan VALUES (?, ?)';
    db.query(sql, [req.body.Taikhoan, req.body.Matkhau], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
// tìm kiếm tài khoản
exports.Findtaikhoan = function (req, res) {
    let Manv = req.body.Manv;
    let Matkhau = req.body.Matkhau;

    let sql = "Select * from taikhoan"
    + " Where (Manv LIKE '%"+ Manv +"%') and (Matkhau LIKE '%"+ Matkhau +"%')";

    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
// Sửa Tài khoản
exports.Update = function (req, res) {
    let sql = "UPDATE taikhoan SET Matkhau = ? WHERE Manv= ?";
    db.query(sql, [req.body.Matkhau,req.params.Manv], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
//Xóa tài khoản
exports.Delete = function (req, res) {
    let sql = 'DELETE FROM taikkhoan WHERE Manv = ?';
    db.query(sql, [req.params.Manv], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Tài khoản không tồn tại' });
        }
        res.json(response);
    });
};

