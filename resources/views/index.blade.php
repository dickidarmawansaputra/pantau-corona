<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
</head>
<body>
	Negara: {{$negara}} <br>
	Positif: {{$positif}} <br>
	Sembuh: {{$sembuh}} <br>
	Meninggal: {{$meninggal}} <br>
	{{-- Terakhir data di update pada: {{$update}} <br> --}}
	<table class="table table-striped table-bordered" style="width:100%" id="tabel-corona">
		<thead>
			<tr>
				<th>#</th>
				<th>Negara</th>
				<th>Positif</th>
				<th>Sembuh</th>
				<th>Meninggal</th>
			</tr>	
		</thead>
		<tbody>
		</tbody>
	</table>

	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
		    $('#tabel-corona').DataTable({
		        processing: true,
		        serverSide: true,
		        ajax: '{!! route('data') !!}',
		        columns: [
		            { data: 'DT_RowIndex', name: 'DT_RowIndex' },
		            { data: 'negara', name: 'negara', className: 'text-center' },
		            { data: 'positif', name: 'positif', className: 'text-center' },
		            { data: 'sembuh', name: 'sembuh', className: 'text-center' },
		            { data: 'meninggal', name: 'meninggal', className: 'text-center' }
		        ]
		    });
		} );
	</script>
</body>
</html>