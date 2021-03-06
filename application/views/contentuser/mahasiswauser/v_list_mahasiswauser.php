<div class="card">
	<div class="card-header">
		<h4>Daftar Mahasiswa</h4>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Tanggal Lahir</th>
					<>Gambar</>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($mhs as $row) {
				?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $row->nim ?></td>
						<td><?= $row->nama ?></td>
						<td><?= $row->jk ?></td>
						<td><?= $row->alamat ?></td>
						<td><?= $row->tgl_lahir ?></td>
						<!-- <td><?= $row->ipk ?></td> -->
						<td>
							<img height="70" onerror="this.onerror=null;this.src='<?= base_url() . 'assets/images/no-image.png' ?>';" src="<?= base_url() . "upload/images/" . $row->gambar ?>" alt="Gambar" />

						</td>
						<td>
							<a href="<?= site_url("mahasiswa/update/$row->id_mahasiswa") ?>" class="btn btn-sm btn-warning">
								<i class="fas fa-edit"></i>
							</a>
							<a href="No" data-id="<?= $row->id_mahasiswa ?>" class="btn btn-sm btn-danger btn-delete-mhs"><i class="fas fa-trash"></i></a>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="card-footer">
		<a href="<?= site_url("mahasiswa/tambah") ?>" class="btn btn-primary">
			<i class="fas fa-plus"></i> Tambah Mahasiswa
		</a>
		
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
<form id="form-delete" method="post" action="<?= site_url('mahasiswa/proses_hapus') ?>">

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
				.attr("name", "u")
				.val(idmhs);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal("hide");
		});
	});
</script>