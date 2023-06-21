function ValidarAgregar() {
  var rol = $("#txtNomRol").val();

  if (rol.trim().length <= 0) {
    fnToast("warning", "Completar rol");
    return false;
  }

  return true;
}

function AbrirEditar(id, rol) {
  $("#lblCodigo").val(id);
  $("#lblNomRol").val(rol);

  $("#modalEditar").modal("show");
}

function ValidarEditar() {
  var rol = $("#lblNomRol").val();

  if (rol.trim().length <= 0) {
    fnToast("warning", "Completar rol");
    return false;
  }

  return true;
}

function AbrirEliminar(id, nom, num) {
  if (num > 0) {
    fnToast(
      "error",
      "El rol que desea eliminar, contiene usuarios registrados"
    );
    return false;
  }

  $("#codRol").val(id);
  $("#nomRol").val(nom);

  $("#modalEliminar").modal("show");

  return true;
}
