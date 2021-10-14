const WebSocket = require('ws');
const server = new WebSocket.Server({
  port: 8080
});

server.on('connection', function(socket) {
  console.log('Connected');

  socket.on('message', function(msg) {
    let data = msg.toString();
    console.log(data);
    socket.send(msg.toString());
  });

  socket.on('close', function() {
    console.log("Disconnected");
  });
});