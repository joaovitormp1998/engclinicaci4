$(document).ready(function () {
  $("#tb-estagiario").DataTable();
  reponsive = true;
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
      $("#formCadastroEquipamento #data_aquisicao").val(
        response.data_aquisicao
      );
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
  $("#formExcluirOrdemServico .modal-excluir-span").text(id);
  $("#formExcluirOrdemServico").attr("action", urlAcao);
  $("#modalExcluirOrdemServico").modal("show");
});


$(".mostra-os").on("click", function(e) {
    e.preventDefault();
    let os = $(this).data("os");
    let equipamento = $(this).data("equipamento");
    let tipo = $(this).data("tipo");
    const urlAcao = "<?= base_url('equipamento/consultarOrdem') ?>";
    $.ajax({
        url: urlAcao,
        data: {
          uid: os,
          idEquipamento: equipamento,
          idTipo: tipo,
        },
        dataType: "json",
        method: "POST",
        beforeSend: function () {},
        success: function (response) {
          let tela = `
          <div class="row">
          <div class="col md-8">
            <p class="text-muted text-sm"><b>Data Preventiva: </b> ${moment(response.data_preventiva).format('DD/MM/YYYY')} </p>
            <p class="text-muted text-sm"><b>Data Proxima: </b> ${moment(response.data_proxima).format('DD/MM/YYYY')}</p>
            <p class="text-muted text-sm"><b>Técnico Responsável: </b>${response.tecnico}</p>
            <p class="text-muted text-sm"><b>Data Entrada: </b> ${moment(response.data_entrada).format('DD/MM/YYYY')}</p>
            <p class="text-muted text-sm"><b>Hora Entrada: </b> ${response.hora_entrada}</p>
            <p class="text-muted text-sm"><b>Data Saida: </b> ${moment(response.data_saida).format('DD/MM/YYYY')}</p>
            <p class="text-muted text-sm"><b>Hora Saida: </b>${response.hora_saida}</p>
          </div>
          <div class="col md-4">
            <label>Foto da OS</label>
            <img src="<?= base_url('fotoos/') . "/"?>${response.imagem}" width="150px" height="150px"></img>
          </div>
        </div>
          `;
          $("#modalOrdemServico .modal-body").html(tela);
          $("#modalOrdemServico").modal("show");
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
})

