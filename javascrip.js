const formulario = document.querySelector('.formulario');
formulario.addEventListener('submit', function(e) {
e.preventDefault(); //para que no recargue el documento
// Validar el Formulario...
//const { nombre, email, mensaje } = datos;
var nombre=document.getElementById("Nombre");
var telefono=document.getElementById("Telefono");
var correo=document.getElementById("Correo");
var correo1=document.getElementById("Correo1");
var mensaje=document.getElementById("Mensaje");
if(nombre.value === '' || telefono.value === '' || correo.value === 
'' || mensaje.value === '' ) {
//mostrarError('Todos los campos son obligatorios');
alert("Todos los campos son obligatorios");
return; // Detiene la ejecución de esta función
}
if(correo.value !== correo1.value ) {
//mostrarError('Todos los campos son obligatorios');
alert("Los correos no son iguales");
return; // Detiene la ejecución de esta función
}
//mostrarMensaje('Mensaje enviado correctamente');
alert("Mensaje enviado correctamente");
});
function mostrarError(mensaje) {
const alerta = document.createElement('p');
alerta.textContent = mensaje;
alerta.classList.add('error');
formulario.appendChild(alerta);
setTimeout(() => {
alerta.remove();
}, 3000);
}
function mostrarMensaje(mensaje) {
const alerta = document.createElement('p');
alerta.textContent = mensaje;
alerta.classList.add('correcto');
formulario.appendChild(alerta);
setTimeout(() => {
alerta.remove();
}, 3000);
}
