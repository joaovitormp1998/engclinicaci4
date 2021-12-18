
$(document).ready(function () {
	var table = $('#tb-estagiario').DataTable({
		orderCellsTop: true,
		fixedHeader: true
	});

	//Creamos una fila en el head de la tabla y lo clonamos para cada columna
	$('#tb-estagiario thead tr').clone(true).appendTo('#tb-estagiario thead');

	$('#tb-estagiario thead tr:eq(1) th').each(function (i) {
		var title = $(this).text(); //es el nombre de la columna
		$(this).html('<input type="text" placeholder="" />');

		$('input', this).on('keyup change', function () {
			if (table.column(i).search() !== this.value) {
				table
					.column(i)
					.search(this.value)
					.draw();
			}
		});
	});
});