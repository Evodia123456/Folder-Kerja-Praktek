<div class="tab-pane" id="settings">

	<form class="form-horizontal">
		<?php if ($this->session->userdata('idMhs')) { ?>
			<div class="form-group row">
				<label for="inputName" class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="inputName"
						   placeholder="<?= $this->session->userdata('nim'); ?>" readonly>
				</div>
			</div>
		<?php } ?>
		<div class="form-group row">
			<label for="inputEmail" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="inputEmail"
					   placeholder="<?= $this->session->userdata('nama'); ?>" >
					   <!-- //readonly> -->
			</div>
		</div>
	
		<div class="form-group row">
			<label for="inputName2" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputName2"
					   placeholder="<?= $this->session->userdata('password_user'); ?>" readonly>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="offset-sm-2 col-sm-10">
				<button type="submit" class="btn btn-info">Reset Password</button>
			</div>
		</div>
	</form>
	<div class="card-footer">
		<a href="<?= site_url("users/add") ?>" class="btn btn-primary">
			<i class="fas fa-plus"></i> Tambah
		</a>
		
	</div>
</div>

<div class="modal fade" id="modal-confirm-delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h4>Anda Yakin Hapus data ini?</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Tidak</button>
				<button type="button" class="btn btn-danger" id="btn-delete">Hapus</button>
			</div>
		</div>
	</div>
</div>
<form id="form-delete" method="post" action="<?= site_url('user/proses_hapus') ?>">

</form>

<script>
	$(function() {
		let idmhs = 0;
		$(".btn-delete-mhs").on("click", function() {
			idmhs = $(this).data("id");
			console.log(idmhs);
			$("#modal-confirm-delete").modal("show");
		});
		$("#btn-delete").on("click", function() {
			//panggil url untuk hapus data
			let inputId = $("<input>")
				.attr("type", "hidden")
				.attr("name", "id")
				.val(idmhs);
			let formDelete = $("#form-delete");
			formDelete.empty().append(inputId);
			formDelete.submit();
			$("#modal-confirm-delete").modal("hide");
		});
	});
	$(function () {
		$(".btn-reset-password").on("click", function () {
			let idUser = $(this).data("id");
			$.confirm({
				theme: "material",
				type: "dark",
				title: "Konfirmasi",
				content: "Anda yakin akan mereset password user ini?<br> Password akan dikirim ke email user",
				buttons: {
					buttonOke: {
						text: "Reset Password",
						btnClass: "btn-dark",
						action: function () {
							prosesReset(idUser);
						}
					},
					buttonBatal: {
						text: "Batal",
						btnClass: "btn-info",
						action: function () {

						}
					}
				}
			});
		});

		function prosesReset(idUser) {
			$.LoadingOverlay("show");
			$.ajax({
				url: window.base_url + "user/reset_password",
				type: "post",
				data: {
					id_user: idUser
				},
					success: function (result) {
					$.LoadingOverlay("hide");
					if (result == "1") {
						$.alert({
							title: "Sukses",
							content: "Password Berhasil di reset"
						});
					}

				}
			})
		}
	});
</script>
