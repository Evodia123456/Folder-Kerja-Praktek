<div class="card">
<div class="card-footer">
		<a href="<?= site_url("tingkat/tambah") ?>" class="btn btn-primary">
			<i class="fas fa-plus"></i> Tambah Tingkat
		</a>
		
	</div>
	<div class="card-header">
		<h4>Daftar Tingkat</h4>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Kegiatan</th>
					<th>Tingkat Kegiatan</th>
					<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($tingkat as $row) {
				?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $row->nama_jenis ?></td>				
						<td><?= $row->nama_tingkat ?></td>				
						<td>
							<a href="<?= site_url("tingkat/update/$row->tingkat_id") ?>" class="btn btn-sm btn-warning">
								<i class="fas fa-edit"></i>
							</a>
							<a href="#" data-id="<?= $row->tingkat_id ?>" class="btn btn-sm btn-danger btn-delete-mhs"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
	
</div>

<div class="modal fade" id="modal-confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Anda Yakin Hapus data ini?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
				<button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
			</div>
		</div>
	</div>
</div>
<form id="form-delete" method="post" action="<?= site_url('tingkat/proses_hapus') ?>">

</form>
<script>
	$(function() {
		let idmhs = 0;
		$(".btn-delete-mhs").on("click", function() {
			idmhs = $(this).data("id");
			console.log(idmhs);
			$("#modal-confirm-delete").modal("show");
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id")
				.val(idmhs);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal("hide");
		});
	});
</script>