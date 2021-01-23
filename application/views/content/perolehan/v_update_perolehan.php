<div class="card">
	<div class="card-header">
		<h4>Update</h4>
	</div>
	<div class="card-body">
		<form id="form-update-perolehan" enctype="multipart/form-data" method="post" action="<?= site_url("perolehan/proses_update") ?>">
			<div class="form-group">
				<label for="">Nama Perolehan</label>
				<input value="<?= $perolehans->nama_perolehan ?>" required type="text"  name="namaPerolehan" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">Poin</label>
				<input value="<?= $perolehans->poin ?>" required type="text"  name="poin" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">Tingkat Id</label>
				<input value="<?= $perolehans->tingkat_id ?>" required type="text"  name="tingkatId" id="" class="form-control" />
		
			</div>
			<input type="hidden" name="id" value="<?= $perolehans->id_perolehan ?>" />
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