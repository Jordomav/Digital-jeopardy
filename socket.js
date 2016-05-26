
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('buzzer-channel', function (err, count) {
    //
});

redis.on('message', function (channel, message) {
    // console.log('Message Received: ' + message);
    message = JSON.parse(message);
    // console.log(message);
    console.log(io);
    io.emit(channel + ':' + message.event, message.data);
});

http.listen(3000, function () {
    console.log('Listening on *:3000');
});