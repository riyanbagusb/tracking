try {
	window.$ = window.jQuery = require('jquery');
	require('datatables.net-dt');
} catch (e) {}

var t = $('.dataTables').DataTable({
	"columnDefs": [{
		"searchable": false,
		"orderable": false,
		"targets": 'no-sort',
	}],
	"pageLength": 25,
	"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
});

t.on('order.dt search.dt', function() {
	t.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
		cell.innerHTML = i+1+'.';
	});
}).draw();
