const ubicacion = document.getElementById("ubicacion");
const paciente = document.getElementById("paciente");
const form = document.getElementById("form-llamado");
const tipo = document.getElementById("tipo");

const socket = io("ws://192.168.1.5:3000");

socket.on("alert", data => {
  alert(data.msg);
});

form.addEventListener("submit", e => {
  // e.preventDefault(); // Evitamos que el formulario se envíe y resetee la página
  let mensaje = `Alerta tipo: ${tipo.value} \n${paciente.value} ubicado en ${ubicacion.value}`;
  
  socket.emit("alert", { msg: mensaje });
});

