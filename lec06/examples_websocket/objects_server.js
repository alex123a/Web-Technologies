const WebSocket = require('ws');
const server = new WebSocket.Server({
  port: 8080
});

server.on('connection', function(socket) {
  console.log('Connected');
  
  socket.on('message', function(msg) {
    console.log(JSON.parse(msg));
    socket.send(JSON.stringify({id : 1, name: "A Name"}));
  });

  socket.on('close', function() {
    console.log("Disconnected");
  });
});