<div class="card">
	<div class="card-header">
		<h4>Update Tingkat</h4>
	</div>
	<div class="card-body">
		<form id="form-update" enctype="multipart/form-data" method="post" action="<?= site_url("tingkat/proses_update") ?>">
			<div class="form-group">
				<label for="">Nama Tingkat</label>
				<input value="<?= $tingkatt->nama_tingkat ?>" required type="text" name="namaTingkat" id="" class="form-control" />
			</div>

			<div class="form-group">
				<label for="gambar">Jenis</label>
				<select class="form-control" id="select-kategori" name="kategori_id" required value="">
					<option value="" disabled selected>Pilih Kategori</option>
					<?php
					foreach ($jenis as $data) { ?>
						<option value="<?= $data->jenis_id ?>" <?= $data->jenis_id == $tingkatt->jenis_id ? "selected" : '' ?>>
							<?= $data->nama_jenis; ?></option>
					<?php
					} ?>
				</select>
			</div>
			<input type="hidden" name="id" value="<?= $tingkatt->tingkat_id ?>" />
		</form>
	</div>
	<div class="card-footer">
		<button id="btn-save" type="button" class="btn btn-success">
			<i class="fas fa-save"></i> Simpan
		</button>
	</div>
</div>
<script>
	$(function() {
		$("#btn-save").on("click", function() {
			let validate = $("#form-update").valid();
			if (validate) {
				$("#form-update").submit();
			}
		});
		$("#form-update").validate({
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