<div class="card">
	<div class="card-header">
		<h4>Tambah Jenis</h4>
	</div>
	<div class="card-body">
		<form id="form-tambah-jenis" enctype="multipart/form-data" method="post" action="<?= site_url("jenis/proses_simpan") ?>">
		<div class="form-group">
				<label for="">Nama Jenis</label>
				<!-- <select class="form-control" id="jenisPerolehan" name="jenisperolehan">
					<option value="" disabled selected>Perolehan Jabatan</option>
					<option value="Ketua">Ketua Umum/Ketua</option>
					<option value="Wakil Ketua">Wakil Ketua Umum/Wakil Ketua</option>
					<option value="Sekretaris/Bendahara">Sekretaris/Bendahara</option>
					<option value="Anggota">Anggota</option>
				</select> -->
				<input required type="text"  name="namaJenis" id="namaJenis" class="form-control" />
			</div>
			
			
			
		
		</div>
		</div>
		</form>
	</div>
	<div class="card-footer">
		<button id="btn-save-jenis" type="button" class="btn btn-success">
			<i class="fas fa-save"></i> Simpan
		</button>
	</div>
</div>
<script>
	$(function() {
		$("#btn-save-jenis").on("click", function() {
			let validate = $("#form-tambah-jenis").valid();
			if (validate) {
				$("#form-tambah-jenis").submit();
			}
		});
		$("#form-tambah-jenis").validate({
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