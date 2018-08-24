const http = require('http');
const url = require('url');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  let message = '';
  if (url.parse(req.url).pathname !== '/') {
  	message = 'Error: 404 not found!';
  } else {
  	message = 'Full Sail Grads Rock!';
  }
  res.end(message);
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});