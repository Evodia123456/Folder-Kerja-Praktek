<html><head>
    <title></title>

</head>
<body>

<div class="card">
	<div class="card-header alert alert-default-primary">
		<h6>Detail </h6>
	</div>
	<div class="card-body">
		<?php
		$no = 1;
		foreach ($tambahan as $row) { ?>
			<div class="row col-12">
				<div class="col-md-4">
					<?= $row->nim ?>
				</div>
				<div class="col-md-4">
					<?= $row->nama ?>
				</div>
				<div class="col-md-4">
					<?= $row->poin ?>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>

<div class="card">

	<div class="card-body">
		<table class="table">
			<thead>
			<tr>
				<th>No</th>
				<th>Nama Kegiatan</th>
				<th>Jenis Kegiatan</th>
				<th>Tingkat</th>
				<th>Tanggal Kegiatan</th>
				<th>Poin</th>
				<th>Sertifikat</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($detail as $row) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->nm_kegiatan ?></td>
					<td><?= $row->id_jenis ?></td>
					<td><?= $row->tingkat ?></td>
					<td><?= $row->tgl_kegiatan ?></td>
					<td><?= $row->poin ?></td>
					<td><?= $row->gambar ?></td>
					<td></td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>

</div>
</body></html>
