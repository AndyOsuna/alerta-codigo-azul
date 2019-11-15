const express = require("express"), // Framework para backend para NodeJS
  app = express(),
  morgan = require("morgan"), // modulo para ver peticiones http
  { join } = require("path"),
  SocketIO = require("socket.io");

/* Configuración */
const PORT = 3000;
app.set("views", join(__dirname, "views"));
app.set("view engine", "ejs");

/* Middlewares */
app.use(morgan("dev"));
app.use(express.json());

/* Rutas */
app.use(require(join(__dirname, "routes")));

/* Archivos estáticos */
app.use(express.static(join(__dirname, "public")));

/* Encendemos el servidor */
const server = app.listen(PORT, () => {
  console.log("Servidor encendido. Puerto:", PORT);
});

/* SocketIO: libreria que usa websocket.
  websockets para comunicacion inmediata de la alerta a todos los usuarios que estén conectados
  Crea un canal de comunicacion bidireccional, real-time
*/
const io = SocketIO(server);

io.on("connection", socket => {
  console.log("Socket conectado!");

  socket.on("alert", data => {
    console.log(data.msg);
    
    io.sockets.emit("alert", { msg: data.msg });
    let d = { msg: data.msg };
    io.sockets.emit("alert", d);
  });
});
