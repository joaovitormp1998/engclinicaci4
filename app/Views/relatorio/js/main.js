$(document).ready( function () {
    $('#tb-professor').DataTable();
    
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
          $('#formCadastroProfessor #nome').val(response.nome);
          $('#formCadastroProfessor #uid').val(response.id);
          $('#formCadastroProfessor #curso').val(response.fk_curso).trigger("change");
          $('#formCadastroProfessor #cpf').val(response.cpf);
          $('#formCadastroProfessor #dataNascimento').val(response.dataNascimento);
          $('#formCadastroProfessor #email').val(response.email);
          $('#formCadastroProfessor #telefone').val(response.telefone);
          $('#formCadastroProfessor #celular').val(response.celular);
          $('#formCadastroProfessor #cep').val(response.cep);
          $('#formCadastroProfessor #logradouro').val(response.logradouro);
          $('#formCadastroProfessor #numero').val(response.numero);
          $('#formCadastroProfessor #bairro').val(response.bairro);
          $('#formCadastroProfessor #cidade').val(response.cidade);
          $('#formCadastroProfessor #uf').val(response.uf);
          $('#modalCadastroProfessor').modal('show');
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
    $('#formExcluirProfessor #uidExcluir').val(id);
    $('#modalExcluirProfessor').modal('show');
    
    
    

})