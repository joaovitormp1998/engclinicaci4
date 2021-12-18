$(document).ready( function () {
    $('#tb-supervisor').DataTable();
    
} );
$('.btn-editar').on('click',function () {
    const id = $(this).data('id');
    const urlAcao = $(this).attr("href");
    
    $.ajax({
        url: urlAcao,
        data: {
            uid : id
        },
        dataType: "json",
        method: "POST",
        beforeSend: function () {},
        success: function (response) {
           
          console.log(response);
          $('#formCadastroSupervisor #nome').val(response.nome);
          $('#formCadastroSupervisor #uid').val(response.id);
          $('#formCadastroSupervisor #cargo').val(response.cargo);
          $('#formCadastroSupervisor #cpf').val(response.cpf);
          $('#formCadastroSupervisor #dataNascimento').val(response.dataNascimento);
          $('#formCadastroSupervisor #email').val(response.email);
          $('#formCadastroSupervisor #telefone').val(response.telefone);
          $('#formCadastroSupervisor #celular').val(response.celular);
          $('#formCadastroSupervisor #cep').val(response.cep);
          $('#formCadastroSupervisor #logradouro').val(response.logradouro);
          $('#formCadastroSupervisor #numero').val(response.numero);
          $('#formCadastroSupervisor #bairro').val(response.bairro);
          $('#formCadastroSupervisor #cidade').val(response.cidade);
          $('#formCadastroSupervisor #uf').val(response.uf);
          $('#modalCadastroSupervisor').modal('show');
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
     
})

$('.btn-excluir').on('click',function (e) {
    e.preventDefault();

    
    const id = $(this).data('id');
    const urlAcao = $(this).attr("href");
    $('#formExcluirSupervisor #uidExcluir').val(id);
    $('#modalExcluirSupervisor').modal('show');
    
    
    

})