$(document).ready( function () {
    $('#tb-usuario').DataTable();
    
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
          $('#formCadastroUsuario #nome').val(response.nome);
          $('#formCadastroUsuario #uid').val(response.id);
          $('#formCadastroUsuario #login').val(response.login);
          $('#formCadastroUsuario #senha').val(response.senha);
          $('#formCadastroUsuario #ativo').val(response.ativo);
          $('#formCadastroUsuario #nivel').val(response.nivel);
          $('#modalCadastroUsuario').modal('show');
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
    $('#formExcluirUsuario #uidExcluir').val(id);
    $('#modalExcluirUsuario').modal('show');
    
    
    

})