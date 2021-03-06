<div class="card">
	<div class="card-header">
		<h4>Tambah Tingkat</h4>
	</div>
	<div class="card-body">
		<form id="form-tambah-tingkat" enctype="multipart/form-data" method="post" action="<?= site_url("tingkat/proses_simpan") ?>">
		<div class="form-group">
				<label for="">Jenis</label>
				<select name="jenisId" id="jenisId" class="form-control">
					<option value="">Pilih Jenis</option>
					<?php foreach ($jenis as $j) : ?>
						<option value="<?= $j->jenis_id ?>"><?= $j->nama_jenis; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			
			<div class="form-group">
				<label for="">Tingkat Kegiatan</label>
				<input required type="text" name="namaTingkat" id="namaTingkat" class="form-control" />
			</div>
			
		</form>
	</div>
</div>
<div class="card-footer">
	<button id="btn-save-tingkat" type="button" class="btn btn-success">
		<i class="fas fa-save"></i> Simpan
	</button>
</div>
</div>
<script>
	$(function() {
		$("#btn-save-tingkat").on("click", function() {
			let validate = $("#form-tambah-tingkat").valid();
			if (validate) {
				$("#form-tambah-tingkat").submit();
			}
		});
		$("#form-tambah-tingkat").validate({
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