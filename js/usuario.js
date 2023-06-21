function ValidarAgregar() {
  var validarCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  var correo = $("#txtCorreo").val();
  var pass = $("#txtPass").val();
  var nombre = $("#txtNombre").val();
  var fecha = $("#txtFecha").val();
  var idRol = $("#txtRol").val();

  if (correo.trim().length <= 0) {
    fnToast("warning", "Completar correo");
    return false;
  }

  if (!validarCorreo.test(correo)) {
    fnToast("warning", "Correo invalido");
    return false;
  }

  if (pass.trim().length <= 0) {
    fnToast("warning", "Completar contraseña");
    return false;
  }

  if (nombre.trim().length <= 0) {
    fnToast("warning", "Completar nombre");
    return false;
  }

  if (fecha === "") {
    fnToast("warning", "Completar fecha de contrato");
    return false;
  }

  if (idRol === "") {
    fnToast("warning", "::: Seleccionar rol :::");
    return false;
  }

  return true;
}

function AbrirEditar(id, correo, pass, nombre, fecha, idRol) {
  $("#lblCodigo").val(id);
  $("#lblCorreo").val(correo);
  $("#lblPass").val(pass);
  $("#lblNombre").val(nombre);
  $("#lblFecha").val(fecha);
  $("#lblRol").val(idRol);

  $("#modalEditar").modal("show");
}

function ValidarEditar() {
  var validarCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  var correo = $("#lblCorreo").val();
  var pass = $("#lblPass").val();
  var nombre = $("#lblNombre").val();
  var fecha = $("#lblFecha").val();
  var idRol = $("#lblRol").val();

  if (correo.trim().length <= 0) {
    fnToast("warning", "Completar correo");
    return false;
  }

  if (!validarCorreo.test(correo)) {
    fnToast("warning", "Correo invalido");
    return false;
  }

  if (pass.trim().length <= 0) {
    fnToast("warning", "Completar contraseña");
    return false;
  }

  if (nombre.trim().length <= 0) {
    fnToast("warning", "Completar nombre");
    return false;
  }

  if (fecha === "") {
    fnToast("warning", "Completar fecha de contrato");
    return false;
  }

  if (idRol === "") {
    fnToast("warning", "::: Seleccionar rol :::");
    return false;
  }

  return true;
}

function AbrirEliminar(idUsu, nombre) {
  $("#codUsu").val(idUsu);
  $("#nomUsu").val(nombre);

  $("#modalEliminar").modal("show");
}
