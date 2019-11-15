const mysql = require("mysql");

const conf = {
  host: "192.168.1.3:3306",
  user: "root",
  password: "",
  database: "bd_codigoazul"
};
const pool = mysql.createPool(conf);

pool.getConnection((err, conn) => {
  if (err) {
    if (err.code === "PROTOCOL_CONNECTION_LOST") {
      console.error("La conexión con la DB fue cerrada");
    }
    if (err.code === "ER_CON_COUNT_ERROR") {
      console.error("DB tiene muchas conexiones");
    }
    if (err.code === "ECONNREFUSED") {
      console.error("Database connection was refused");
      console.error("Db debegó la conexión");
    }
  }

  if (conn) {
    conn.release();
    console.log("DB is Connected");
  }
  return;
});

module.exports = pool;
