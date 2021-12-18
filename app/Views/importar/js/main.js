$(document).ready( function () {
    $('#tb-estagiario').DataTable();
    
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
          $('#formCadastroEstagiario #nome').val(response.nome);
          $('#formCadastroEstagiario #uid').val(response.id);
          $('#formCadastroEstagiario #matricula').val(response.matricula);
          $('#formCadastroEstagiario #cpf').val(response.cpf);
          $('#formCadastroEstagiario #dataNascimento').val(response.dataNascimento);
          $('#formCadastroEstagiario #email').val(response.email);
          $('#formCadastroEstagiario #telefone').val(response.telefone);
          $('#formCadastroEstagiario #celular').val(response.celular);
          $('#formCadastroEstagiario #cep').val(response.cep);
          $('#formCadastroEstagiario #logradouro').val(response.logradouro);
          $('#formCadastroEstagiario #numero').val(response.numero);
          $('#formCadastroEstagiario #bairro').val(response.bairro);
          $('#formCadastroEstagiario #cidade').val(response.cidade);
          $('#formCadastroEstagiario #uf').val(response.uf);
          $('#modalCadastroEstagiario').modal('show');
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
    $('#formExcluirEstagiario #uidExcluir').val(id);
    $('#modalExcluirEstagiario').modal('show');
    
    
    

})