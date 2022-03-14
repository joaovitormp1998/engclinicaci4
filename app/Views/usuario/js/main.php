$(document).ready(function () {
$("#tb-estagiario").DataTable();
reponsive=true
});
$(".btn-editar").on("click", function (e) {
e.preventDefault();
const id = $(this).data("id");
const urlAcao = $(this).attr("href");
console.log(id);
console.log(urlAcao);
$.ajax({
url: urlAcao,
data: {
uid: id,
},
dataType: "json",
method: "POST",
beforeSend: function () {},
success: function (response) {
console.log(response);
$("#formCadastroUsuario #nome").val(response.nome);
$("#formCadastroUsuario #uid").val(response.id);
$("#formCadastroUsuario #email").val(response.email);
$("#formCadastroUsuario #nivel").val(response.nivel);
$("#formCadastroUsuario #senha").val(response.senha);

$("#modalCadastroUsuario").modal("show");
},
error: function (response) {
try {
bootbox.alert(response.message);
} catch (e) {
bootbox.alert(
"Erro inesperado.<br> Estamos registrando esse erro para corrigirmos."
);
}
return false;
},
});
return false;
});

$(".btn-excluir").on("click", function (e) {
e.preventDefault();

const id = $(this).data("id");
const urlAcao = $(this).attr("href");
console.log(id);
console.log(urlAcao);
$("#formExcluirUsuario").attr('action', urlAcao);
$("#modalExcluirUsuario").modal("show");
});