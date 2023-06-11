const express = require('express');
const app = express();
const bodyParser = require('body-parser');
require('dotenv').config();
const port = process.env.PORT || 2001;


app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

let routes = require('./api/routes'); //importing route
routes(app);

// Middleware xử lý lỗi
app.use(function (err, req, res, next) {
    console.error(err.stack);
    res.status(500).send('Internal Server Error');
});

// Middleware xử lý yêu cầu không khớp với bất kỳ định tuyến nào
app.use(function (req, res) {
    res.status(404).send({ url: req.originalUrl + ' not found' });
});

app.listen(port, (err) => {
    if (err) {
        console.error('Error starting the server:', err);
    } else {
        console.log('RESTful API server started on: ' + port);
    }
});
