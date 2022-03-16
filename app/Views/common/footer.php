<!-- jQuery -->
<!-- <script src="//base_url('assets/plugins/jquery/jquery.min.js') ?>"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<!-- <script src="<?= base_url('assets/plugins/sparklines/sparkline.js') ?>"></script> -->
<!-- JQVMap -->
<!-- <script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js') ?>"></script>
<!-- tabela -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<!-- mascaras -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> -->
<script type="text/javascript">
  $(document).ready(function() {
    var $campoCpf = $("#cpf");
    var $campoCep = $("#cep");
    var $campoTelefone = $("#telefone");
    var $campoCelular = $("#celular");
    var $campoCnpj = $("#cnpj");
    var $campoMatricula = $("#matricula");
    $campoCpf.mask('000.000.000-00');
    $campoCep.mask('00000-000');
    $campoTelefone.mask('(00) 0000-0000');
    $campoCelular.mask('(00) 90000-0000');
    $campoCnpj.mask('00.000.000/0000-00');
    $campoMatricula.mask('000000000')



    function limpa_formulário_cep() {

      $("#rua").val("");
      $("#bairro").val("");
      $("#cidade").val("");
      $("#uf").val("");
      $("#ibge").val("");
    }

    $("#cep").blur(function() {
      console.log($(this).val());

      var cep = $(this).val().replace(/\D/g, '');

      if (cep != "") {

        var validacep = /^[0-9]{8}$/;

        if (validacep.test(cep)) {

          $("#logradouro").val("...");
          $("#bairro").val("...");
          $("#cidade").val("...");
          $("#uf").val("...");
          $("#ibge").val("...");

          $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

            if (!("erro" in dados)) {

              $("#logradouro").val(dados.logradouro);
              $("#bairro").val(dados.bairro);
              $("#cidade").val(dados.localidade);
              $("#uf").val(dados.uf);
              $("#ibge").val(dados.ibge);
            } else {

              limpa_formulário_cep();
              alert("CEP não encontrado.");
            }
          });
        } else {

          limpa_formulário_cep();
          alert("Formato de CEP inválido.");
        }
      } else {

        limpa_formulário_cep();
      }

    });
  });
</script>
    

