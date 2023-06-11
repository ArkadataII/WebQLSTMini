'use strict';
module.exports = function (app) {
    let nhomhang = require('./controllers/nhomhang');
    let taikhoan = require('./controllers/taikhoan');
    let nhacungcap = require('./controllers/nhacungcap');
    let khachhang = require('./controllers/khachhang');
    //nhóm hàng

    app.route('/nhomhang')
        .get(nhomhang.Getallnhomhang);
    app.route('/nhomhang/Timkiem')
        .get(nhomhang.Findnhomhang);
    app.route('/nhomhang/Them')
        .post(nhomhang.Insert);
    app.route('/nhomhang/Hienthi/:Manh')
        .get(nhomhang.Show);
    app.route('/nhomhang/Sua/:Manh')
        .put(nhomhang.Update);
    app.route('/nhomhang/Xoa/:Manh')
        .delete(nhomhang.Delete);
    app.route('/nhomhang/Kiemtra/')
        .get(nhomhang.Kiemtrama);
    //tài khoản

    app.route('/taikhoan')
        .get(taikhoan.Getalltaikhoan);
    app.route('/taikhoan/nv')
        .get(taikhoan.Getallnv);
    app.route('/taikhoan/Them')
        .post(taikhoan.Insert);
    app.route('/taikhoan/Timkiem')
        .get(taikhoan.Findtaikhoan);
    app.route('/taikhoan/Sua/:Manv')
        .put(taikhoan.Update);
    app.route('/taikhoan/Xoa/:Manv')
        .delete(taikhoan.Delete);
    //nhà cung cấp

    app.route('/nhacungcap')
        .get(nhacungcap.Getallnhacungcap);
    app.route('/nhacungcap/Timkiem')
        .get(nhacungcap.Findnhacungcap);
    app.route('/nhacungcap/Them')
        .post(nhacungcap.Insert);
    app.route('/nhacungcap/Sua/:Mancc')
        .put(nhacungcap.Update);
    app.route('/nhacungcap/Xoa/:Mancc')
        .delete(nhacungcap.Delete);
    //khách hàng

    app.route('/khachhang')
        .get(khachhang.Getallkhachhang);
    app.route('/khachhang/Timkiem')
        .get(khachhang.Findkhachhang);
    app.route('/khachhang/Them')
        .post(khachhang.Insert);
    app.route('/khachhang/Sua/:Makh')
        .put(khachhang.Update);
    app.route('/khachhang/Xoa/:Makh')
        .delete(khachhang.Delete);
};