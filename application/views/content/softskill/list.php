<div class="card">
	<div class="card-header">
		<a class="btn btn-primary" href="<?= site_url('softskill/tambah') ?>">Tambah Data Softskill</a>
	</div>
	<div class="card-body">
		<table id="table1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Kegiatan</th>
					<th>Jenis</th>
					<th>Tingkat</th>
					<th>Status</th>
					<th>Gambar</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php
			$no = 1;
			foreach ($softskillList as $sof) {
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $sof->nm_kegiatan ?>
						<br>
						<span class="label label-danger badge" style="color: #00b7e7"> (<?= $sof->perolehan ?>)</span>
					</td>
					<td><?= $sof->id_jenis ?></td>
					<td><?= $sof->tingkat ?></td>
					<td></td>
					<td>
						<img height="70" onerror="this.onerror=null;this.src='<?= base_url() . 'assets/images/no-image.png' ?>';" src="<?= base_url() . "upload/images/" . $sof->gambar ?>" alt="Gambar" />

					</td>
					<td>
						<a class="btn btn-sm btn-warning" href="<?= site_url('softskill/edit/' . $sof->id_softskill) ?>">
							<i class="fas fa-edit"></i>
						</a>
						<a class="btn btn-sm btn-danger" href="<?= site_url('softskill/delete/' . $sof->id_softskill) ?>">
							<i class="fas fa-trash"></i>
						</a>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
	</div>
</div>
<script>
	$(function() {
		$('#table1').DataTable({
			dom: 'Bfrtip',
			buttons: [
				'colvis'
			]

		});
	});
</script>