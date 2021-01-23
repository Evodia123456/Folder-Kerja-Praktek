<div class="card">
	<div class="card-header">
		<h4>Tambah Perolehan</h4>
	</div>
	<div class="card-body">
		<form id="form-tambah-perolehan" enctype="multipart/form-data" method="post" action="<?= site_url("perolehan/proses_simpan") ?>">
			<div class="form-group">
				<label for="">Nama Perolehan</label>
				<input required type="text"  name="namaPerolehan" id="namaPerolehan" class="form-control" />
			</div>
			

		<div class="form-group">
			<label>Jenis</label>
			<select class="form-control" id="jenis" name="jenis">
			<option value="" disabled selected> Pilih Jenis</option>
		<?php 
				foreach($jenis as $j){
   				echo"<option value='".$j->jenis_id."'>".$j->nama_jenis."</option>";
			}
		?>     

</select>
</div>             

<div class="form-group">
<label>Tingkat</label>
<select class="form-control" name="tingkat" id="tingkat">
<option value="" disabled selected> Pilih Tingkat</option>

                    </select>
</div>

<div class="form-group">
				<label for="">Poin</label>
				<input required type="int"  name="poin" id="poin" class="form-control" />
			</div>
		
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
		$("#btn-save-perolehan").on("click", function() {
			let validate = $("#form-tambah-perolehan").valid();
			if (validate) {
				$("#form-tambah-perolehan").submit();
			}
		});
		$("#form-tambah-perolehan").validate({
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
$(document).ready(function(){
    $("#jenis").change(function(){
        $("#tingkat").hide();
        $.ajax({
            type: "POST",
            url : "<?php echo base_url("/jenis/subJenis");?>",
            data: {
                jenis_id: $("#jenis").val()
            },
            dataType: "json",
            success:function(response){
                $("#tingkat").html(response.listTingkat).show();
            }
        });
    });
});

</script>