function ValidarCampos() {
  var validarCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  var correo = $("#txtCorreo").val();
  var pass = $("#txtPass").val();

  if (correo.trim().length <= 0) {
    fnToast("warning", "Completar correo");
    return false;
  }

  if (!validarCorreo.test(correo)) {
    fnToast("warning", "Correo invalido");
    return false;
  }

  if (pass.length <= 0) {
    fnToast("warning", "Completar contraseña");
    return false;
  }

  return true;
}
