'use strict';

const util = require('util');
const mysql = require('mysql');
const db = require('../connectdb');

// lấy all nhà cung cấp
exports.Getallnhacungcap = function (req, res) {
    let sql = "SELECT * from nhacungcap";
    db.query(sql, (err, response) => { //thực hiện câu lệnh sql đẩy dữ liệu trả về vào trong response
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
//Tìm kiếm nhà cung cấp
exports.Findnhacungcap = function (req, res) {
    let Mancc = req.body.Mancc;
    let Tenncc = req.body.Tenncc;
    let Dcncc = req.body.Dcncc;
    let Sdtncc = req.body.Sdtncc;

    let sql = "Select * from nhacungcap"
    + " Where (Mancc LIKE '%"+ Mancc +"%') and (Tenncc LIKE '%"+ Tenncc +"%')"
    + " and (Dcncc LIKE '%"+ Dcncc +"%') and (Sdtncc LIKE '%"+ Sdtncc +"%')";

    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
// thêm nhà cung cấp
exports.Insert = function (req, res) {
    let sql = 'INSERT INTO nhacungcap VALUES (?, ?, ?, ?)';
    db.query(sql, [req.body.Mancc, req.body.Tenncc, req.body.Dcncc, req.body.Sdtncc], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
//Sửa nhầ cung cấp
exports.Update = function (req, res) {
    let sql = "UPDATE nhacungcap SET Tenncc = ?, Dcncc = ?, Sdtncc = ? WHERE Mancc= ?";
    db.query(sql, [req.body.Tenncc,req.body.Dcncc,req.body.Sdtncc,req.params.Mancc], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};
//Xóa nhà cung cấp
exports.Delete = function (req, res) {
    let sql = 'DELETE FROM nhacungcap WHERE Mancc = ?';
    db.query(sql, [req.params.Mancc], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Nhà cung cấp không tồn tại' });
        }
        res.json(response);
    });
};