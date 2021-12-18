$(document).ready(function () {
	$("#tb-estagiario").DataTable();
	reponsive=true
});
$(".btn-editar").on("click", function () {
	const id = $(this).data("id");
	const urlAcao = $(this).attr("href");

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
			$("#formCadastroEquipamento #numeroSerie").val(response.numeroSerie);
			$("#formCadastroEquipamento #patrimonio").val(response.patrimonio);
			$("#formCadastroEquipamento #criticidade").val(response.criticidade);
			$("#formCadastroEquipamento #tag").val(response.tag);
			$("#formCadastroEquipamento #siconv").val(response.siconv);
			$("#formCadastroEquipamento #localizacao").val(response.localizacao);
			$("#formCadastroEquipamento #setor").val(response.setor);
			$("#formCadastroEquipamento #unidade").val(response.unidade);
			$("#formCadastroEquipamento #fornecedor").val(response.fornecedor);
			$("#formCadastroEquipamento #dataAquisicao").val(response.dataAquisicao);
			$("#formCadastroEquipamento #dataFabricacao").val(
				response.dataFabricacao
			);
			$("#formCadastroEquipamento #numeroPasta").val(response.numeroPasta);
			$("#formCadastroEquipamento #numeroCertificado").val(
				response.numeroCertificado
			);
			$("#formCadastroEquipamento #periodicidade").val(response.periodicidade);
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
