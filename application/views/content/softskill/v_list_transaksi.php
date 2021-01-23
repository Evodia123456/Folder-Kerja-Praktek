<div class="card">
	<div class="card-header">
		<h4>Daftar Softskill</h4>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
			<tr>
				<th>No</th>
				<th>NIM Mahasiswa</th>
				<th>Nama Mahasiswa</th>
				<th>Total Poin</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$no = 1;
			foreach ($daftarSoftskil as $row) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $row->nim ?></td>
					<td><?= $row->nama ?></td>
					<td> <span class="badge badge-primary badge-pill"><?= $row->total ?></span></td>
					<td>
						<a class="btn btn-sm btn-warning" data-nama="$row->nama"
						   href="<?= site_url('softskill/detail/' . $row->mahasiswa) ?>">
							<i class="fas fa-eye"></i>
						</a>
					</td>
				</tr>
				<?php
			}
			?>
			</tbody>
		</table>
	</div>
</div>
