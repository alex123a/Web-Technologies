const https = require('https');
const fs = require('fs');

const options = {
    key: fs.readFileSync('localhost.key'), //private/secret
    cert: fs.readFileSync('localhost.crt') //public cert.
};

https.createServer(options, function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.end('Hello World!');
}).listen(3000);