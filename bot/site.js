var scribe = require('scribe-js')(),
    app = require('express')(),
    server = require('http').Server(app),
    io = require('socket.io')(server),
    requestify = require('requestify');
var schedule = require('node-schedule');
server.listen(2021);

io.sockets.on('connection', function (socket) {
    updateOnline();
    updateStatus();
    socket.on('disconnect', function () {
        updateStatus();
    });
    socket.on('update', function(){
        updateStatus();
        gifts();
    });
    socket.on('update2', function(){
        gifts();
    });

});
function updateOnline(){
    console.info('Connected ' + Object.keys(io.sockets.adapter.rooms).length + ' clients');
}
function updateStatus() {
    requestify.post('http://вашсайт/api/stats', {})
        .then(function (response) {
            data = JSON.parse(response.body);
            var online = Object.keys(io.sockets.adapter.rooms).length;
            var users = data.users;
            var games = data.games;
            var data = [online, users, games];
            io.sockets.emit('statbox', data);
            console.log("stats");
        }, function (err) {
            console.log(err);
        });
}
hour();
function hour() {
    schedule.scheduleJob('0 00 * * * *', function(){
        requestify.post('http://вашсайт/hour', {})
            .then(function (response) {
                console.log("HOur bonus");
            }, function (err) {

            });
    });

}
getCont();
function getCont() {
    schedule.scheduleJob('0 01 * * * *', function(){
        requestify.post('http://вашсайт/getContestants', {})
            .then(function (response) {
                console.log("Contestants check");
            }, function (err) {

            });
    });

}
function gifts() {
    setTimeout(function () {
        requestify.post('http://вашсайт/api/last', {})
            .then(function (response) {
                data = JSON.parse(response.body);
                io.sockets.emit('last games', data);

                console.log("last gifts");
            }, function (err) {
                console.log(err);
            });
    }, 1000);
}

deletebot();
function deletebot() {
    setInterval(function () {
        requestify.post('http://вашсайт/delete_bot', {})
            .then(function (response) {
                console.log("Bot check");
            }, function (err) {
                console.log(err);
            });
    }, 1080000);
}

bot();
function bot() {
    setInterval(function () {
        requestify.post('http://вашсайт/bot', {})
            .then(function (response) {
                dataw = JSON.parse(response.body);
                setTimeout(function () {
                    requestify.post('http://вашсайт/api/last', {})
                        .then(function (response) {
                            data = JSON.parse(response.body);
                            io.sockets.emit('last games', data);
                            console.log("last gifts");
                        }, function (err) {
                            console.log(err);
                        });
                }, 2000);
                console.log(dataw);
            }, function (err) {
                console.log(err);
            });
    }, 15000);
}

io.sockets.on('last gift set', function () {
    setTimeout(function () {
        requestify.post('http://вашсайт/api/last_drop_get', {})
            .then(function (response) {
                data = JSON.parse(response.body);
                console.log("last gift set");
                io.sockets.emit('last gift get', data.last_drop);
            }, function (err) {

            });
    }, 4000);
})
