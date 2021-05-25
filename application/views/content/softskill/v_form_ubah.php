<div class="card">
	<div class="card-header">
		<h4> Form Ubah Softskill</h4>
	</div>
	<div class="card-body">

		<form id="form-tambah-mhs" enctype="multipart/form-data" method="post"
			  action="<?= site_url("softskill/prosesEdit") ?>">
			<div class="card-body">
				<div class="card-body">
					<div class="form-group">
						<label>Jenis</label>
						<select class="form-control" id="jenis" name="jenis">
							<option value="" disabled selected> Pilih Jenis</option>
							<?php
							foreach ($jenis as $data) { ?>
								<option value="<?= $data->jenis_id ?>" <?= $data->jenis_id == $softs->id_jenis ? "selected" : '' ?>>
									<?= $data->nama_jenis; ?>
								</option>
								<?php
							} ?>
						</select>
					</div>
					<div class="form-group">
						<label>Tingkat</label>
						<select class="form-control" name="tingkat" id="tingkat">
							<option value="" disabled selected> Pilih Tingkat</option>
							<?php
							foreach ($tingkat as $data) { ?>
								<option value="<?= $data->tingkat_id ?>" <?= $data->tingkat_id == $softs->tingkat ? "selected" : '' ?>>
									<?= $data->nama_tingkat; ?>
								</option>
								<?php
							} ?>
						</select>
					</div>
					<div class="form-group">
						<label>Perolehan</label>
						<select class="form-control" name="perolehan" id="perolehan">
							<option value="" disabled selected> Pilih Perolehan</option>
							<?php
							foreach ($perolehan as $data) { ?>
								<option value="<?= $data->id_perolehan ?>" <?= $data->id_perolehan == $softs->id_perolehan ? "selected" : '' ?>>
									<?= $data->nama_perolehan; ?>
								</option>
								<?php
							} ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Kegiatan</label>
						<input type="input" value="<?= $softs->nm_kegiatan ?> " class="form-control" name="nama"
							   id="nama" placeholder="Nama Kegiatan">
					</div>
					<div class="form-group">
						<label>Tanggal Kegiatan</label>
						<input type="date" value="<?= $softs->tgl_kegiatan ?>" class="form-control" name="tanggal"
							   id="tanggal"
							   placeholder="Tanggal Kegiatan">
					</div>
					<div class="form-group">
						<label>IPK</label>
						<input type="text" value="<?= $softs->ipk ?>" class="form-control" step="0.01" name="ipk"
							   id="ipk"
							   placeholder="IPK">
					</div>
					<div class="form-group">
						<label for="gambar">Gambar </label>
						<div class="input-group">
							<div class="custom-file">
								<label class="custom-file-label" for="gambar-softskill">Choose file</label>
								<input type="file" name="gambar" class="custom-file-input" value="<?= $softs->gambar ?>"
									   id="gambar">
							</div>
						</div>
						<td>
							</br>
							<img height="70"
								 onerror="this.onerror=null;this.src='<?= base_url() . 'assets/images/no-image.png' ?>';"
								 src="<?= base_url() . "upload/images/" . $softs->gambar ?>" width="100" alt="Gambar"/>
						</td>
					</div>
					<input type="hidden" value="<?= $softs->id_softskill ?> " class="form-control" name="id" id="id">

					<div class="card-footer">
						<button id="btn-save-mhs" type="button" class="btn btn-success">
							<i class="fas fa-save"></i> Simpan
						</button>
						<a class="btn btn-secondary" href="<?= site_url("softskill") ?>">Batal</a>
					</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#btn-save-mhs").on("click", function () {
			let validate = $("#form-tambah-mhs").valid();
			if (validate) {
				$("#form-tambah-mhs").submit();
			}
		});
		$("#jenis").change(function () {
			$("#tingkat").hide();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url("/jenis/subJenis"); ?>",
				data: {
					jenis_id: $("#jenis").val()
				},
				dataType: "json",
				success: function (response) {
					$("#tingkat").html(response.listTingkat).show();
				}
			});
		});
		$("#tingkat").change(function () {
			$("#perolehan").hide();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url("/jenis/subTingkat"); ?>",
				data: {
					tingkat_id: $("#tingkat").val()
				},
				dataType: "json",
				success: function (response) {
					$("#perolehan").html(response.ListPerolehan).show();
				}
			});
		});

	});
</script>
