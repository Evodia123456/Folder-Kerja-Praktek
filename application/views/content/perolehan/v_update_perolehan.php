<div class="card">
	<div class="card-header">
		<h4>Update Data Perolehan</h4>
	</div>
	<div class="card-body">
	<form id="form-update-perolehan" enctype="multipart/form-data" method="post" action="<?= site_url("perolehan/proses_update") ?>">
	<div class="form-group">
				<label for="gambar">Tingkat Kegiatan</label>
				<select class="form-control" id="select-kategori" name="tingkatId" required value="">
					<option value="" disabled selected>Pilih Tingkat</option>
					<?php
					foreach ($tingkat as $data) { ?>
						<option value="<?= $data->tingkat_id ?>" <?= $data->tingkat_id == $perolehans->tingkat_id ? "selected" : '' ?>>
							<?= $data->nama_tingkat; ?></option>
					<?php
					} ?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Nama Perolehan</label>
				<input value="<?= $perolehans->nama_perolehan ?>" required type="text" name="namaPerolehan" id="" class="form-control" />
			</div>
			<input type="hidden" name="id" value="<?= $perolehans->id_perolehan ?>" />
			<div class="form-group">
				<label for="">Poin</label>
				<input required type="int"  name="poin" id="poin" class="form-control" value="<?= $perolehans->poin ?>" />
			</div>
		
		</form>
		</form>
	</div>
	<div class="card-footer">
		<button id="btn-save-perolehan" type="button" class="btn btn-success">
			<i class="fas fa-save"></i> Simpan
		</button>
	</div>
</div>
<script>
	$(function() {
		// ini aku sudah tambah mhs di setiap buttonnya
		$("#btn-save-perolehan").on("click", function() {
			let validate = $("#form-update-perolehan").valid();
			if (validate) {
				$("#form-update-perolehan").submit();
			}
		});
		$("#form-update-perolehan").validate({
			rules: {
				kode: {
					alphanumeric: true
				},
				harga: {
					digits: true
				},
				stock: {
					digits: true
				}
			},
			messages: {
				kode: {
					alphanumeric: "Hanya Boleh Angka, Huruf dan Undescore"
				}
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
</script>