var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);

server.listen(3000);

io.on('connection', function (socket) {
    socket.emit('user');
    socket.on('user', function (user) {
        
    });
});