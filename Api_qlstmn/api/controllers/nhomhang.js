'use strict';

const util = require('util');
const mysql = require('mysql');
const db = require('../connectdb');

// lấy all nhóm hàng

exports.Getallnhomhang = function (req, res) {
    let sql = "SELECT Manh, Tennh from nhomhang";
    db.query(sql, (err, response) => { //thực hiện câu lệnh sql đẩy dữ liệu trả về vào trong response
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Tìm kiếm nhóm hàng
exports.Findnhomhang = function (req, res) {
    let Manh = req.body.Manh;
    let Tennh = req.body.Tennh;
    

    let sql = "Select Manh, Tennh from nhomhang"
    + " Where (Manh LIKE '%"+ Manh +"%') and (Tennh LIKE N'%"+ Tennh +"%')";

    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

//Kiểm tra trùng mã Nhóm hàng
exports.Kiemtrama = function (req, res) {
    let Manh = req.body.Manh;

    const sql = 'SELECT Manh FROM nhomhang WHERE Manh = ?';
    db.query(sql, [Manh], (err, rows) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if (rows.length > 0) {
            res.json({ message: 'Nhóm hàng đã tồn tại' });
        } else {
            res.json({ message: 'Nhóm hàng không tồn tại' });
        }
    });
};

// Thêm Nhóm hàng
exports.Insert = function (req, res) {
    let sql = 'INSERT INTO nhomhang VALUES (?, ?)';
    db.query(sql, [req.body.Manh, req.body.Tennh], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa Nhóm hàng
exports.Show = function (req, res) {
    let sql = 'SELECT * FROM nhomhang WHERE Manh = ?';
    db.query(sql, [req.params.Manh], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.length === 0) {
            return res.status(404).json({ message: 'Nhóm hàng không tồn tại' });
        }
        res.json(response);
    });
};

exports.Update = function (req, res) {
    let sql = "UPDATE nhomhang SET Tennh = ? WHERE Manh= ?";
    db.query(sql, [req.body.Tennh,req.params.Manh], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

//Xóa Nhóm hàng
exports.Delete = function (req, res) {
    let sql = 'DELETE FROM nhomhang WHERE Manh = ?';
    db.query(sql, [req.params.Manh], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Nhóm hàng không tồn tại' });
        }
        res.json(response);
    });
};
