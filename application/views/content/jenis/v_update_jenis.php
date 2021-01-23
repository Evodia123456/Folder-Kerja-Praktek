<div class="card">
	<div class="card-header">
		<h4>Update Jenis</h4>
	</div>
	<div class="card-body">
		<form id="form-update" enctype="multipart/form-data" method="post" action="<?= site_url("jenis/proses_update") ?>">
			<div class="form-group">
				<label for="">Nama Jenis</label>
				<input value="<?= $jeniss->nama_jenis ?>" required type="text" maxlength="20" name="namaJenis" id="" class="form-control" />
			</div>
			
			
			<div class="form-group">
				<label for="gambar">Gambar Mahasiswa</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="gambar" class="custom-file-input" id="gambar">
						<label class="custom-file-label" for="gambar">Choose file</label>
					</div>
				</div>
			</div>
			<input type="hidden" name="id" value="<?= $jeniss->jenis_id ?>" />
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