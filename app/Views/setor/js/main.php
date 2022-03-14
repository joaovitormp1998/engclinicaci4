$(document).ready(function () {
$("#tb-usuario").DataTable();
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
$("#formCadastroSetor #uid").val(response.id);
$("#formCadastroSetor #nome").val(response.nome);

$("#modalCadastroSetor").modal("show");
},
error: function (response) {
alert("erro");
return false;
},
});
return false;
});

$(".btn-excluir").on("click", function (e) {
e.preventDefault();


$("#formExcluirSetor #uidExcluir").val(id);
$("#modalExcluirSetor").modal("show");
});