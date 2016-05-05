var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-chanel', function (error, count) {

});

redis.on('message', function(channel, message) {
    console.log('Message Recieved:' + message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);
});

server.listen(3000, function () {
    console.log('Listening');
});