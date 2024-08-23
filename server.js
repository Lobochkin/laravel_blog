var http = require('http').Server();
var io = require('socket.io')(http,{
    cors: {
        origin: ["http://laravel-blog.lobochkin.ru"],
        credentials: true,
        methods: ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'],
        allowedHeaders: ['Origin', 'X-Requested-With', 'Content-Type', 'Accept'],
    }
});
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('news-action');
redis.on('message', function(channel,message) {
    console.log('Message received: ' + message);
    console.log('Name chanel : ' + channel);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event,message.data)
})

http.listen(3000, function() {
    console.log('Listening on Port: 3000');
})
