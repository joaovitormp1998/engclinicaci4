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
$("#formCadastroEquipamento #nome").val(response.nome);
$("#formCadastroEquipamento #uid").val(response.id);
$("#formCadastroEquipamento #marca").val(response.marca);
$("#formCadastroEquipamento #modelo").val(response.modelo);
$("#formCadastroEquipamento #numero_serie").val(response.numero_serie);
$("#formCadastroEquipamento #patrimonio").val(response.patrimonio);
$("#formCadastroEquipamento #criticidade").val(response.criticidade);
$("#formCadastroEquipamento #tag").val(response.tag);
$("#formCadastroEquipamento #sincov").val(response.sincov);
$("#formCadastroEquipamento #localizacao").val(response.localizacao);
$("#formCadastroEquipamento #fk_setor").val(response.fk_setor);
$("#formCadastroEquipamento #unidade").val(response.unidade);
$("#formCadastroEquipamento #fornecedor").val(response.fornecedor);
$("#formCadastroEquipamento #data_aquisicao").val(response.data_aquisicao);
$("#formCadastroEquipamento #data_fabricacao").val(
response.data_fabricacao
);
$("#formCadastroEquipamento #numero_pasta").val(response.numero_pasta);
$("#formCadastroEquipamento #numero_certificado").val(
response.numero_certificado
);
$("#formCadastroEquipamento #periocidade").val(response.periocidade);
$("#formCadastroEquipamento #nome_img_qr").val(response.nome_img_qr);
$("#modalCadastroEquipamento").modal("show");
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
$("#formExcluirEquipamento #uidExcluir").val(id);
$("#modalExcluirEquipamento").modal("show");
});