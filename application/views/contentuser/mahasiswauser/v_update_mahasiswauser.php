<div class="card">
	<div class="card-header">
		<h4>Update Mahasiswa User</h4>
	</div>
	<div class="card-body">
		<form id="form-update-mhs" enctype="multipart/form-data" method="post" action="<?= site_url("mahasiswauser/proses_update") ?>">
			<div class="form-group">
				<label for="">NIM mahasiswa</label>
				<input value="<?= $mhs->nim ?>" required type="text"  name="nim" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">Nama Mahasiswa</label>
				<input value="<?= $mhs->nama ?>" required type="text"  name="nama" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">Jenis Kelamin</label>
				<select class="form-control" id="jk" name="jk">
					<option value="" disabled selected>Pilih Kelamin</option>
					<option value="L" <?= $mhs->jk == 'L' ? 'selected' : '' ?>>Laki-laki</option>
					<option value="P" <?= $mhs->jk == 'P' ? 'selected' : '' ?>>Perempuan</option>
				</select>
			</div>

			<div class="form-group">
				<label for="">Alamat Mahasiswa</label>
				<input value="<?= $mhs->alamat ?>" required type="text" name="alamat" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">Tanggal Lahir</label>
				<input value="<?= $mhs->tgl_lahir ?>" required type="text"  name="tgl_lahir" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">IPK</label>
				<input value="<?= $mhs->ipk ?>" required type="text"  name="ipk" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">Jenis</label>
				<input value="<?= $mhs->jenis ?>" required type="text"  name="jenis" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">IPK</label>
				<input value="<?= $mhs->tingkat ?>" required type="text"  name="tingkat" id="" class="form-control" />
			</div>
			<div class="form-group">
				<label for="">IPK</label>
				<input value="<?= $mhs->prestasi ?>" required type="text"  name="prestasi" id="" class="form-control" />
			</div>

			<div class="form-group">
				<label for="gambar">Gambar mahasiswa</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="gambar" class="custom-file-input" id="gambar">
						<label class="custom-file-label" for="gambar">Choose file</label>
					</div>
				</div>
			</div>
			<input type="hidden" name="id" value="<?= $mhs->id_mahasiswa ?>" />
		</form>
	</div>
	<div class="card-footer">
		<button id="btn-save-mhs" type="button" class="btn btn-success">
			<i class="fas fa-save"></i> Simpan
		</button>
	</div>
</div>
<script>
	$(function() {
		// ini aku sudah tambah mhs di setiap buttonnya
		$("#btn-save-mhs").on("click", function() {
			let validate = $("#form-update-mhs").valid();
			if (validate) {
				$("#form-update-mhs").submit();
			}
		});
		$("#form-update-mhs").validate({
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