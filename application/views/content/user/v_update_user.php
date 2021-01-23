<div class="card">
    <div class="card-header">
        <h4>Update User</h4>
    </div>
    <div class="card-body">
        <form id="form-update-user" enctype="multipart/form-data" method="post"
              action="<?= site_url("users/update") ?>">
            <div class="form-group">
                <label for="">Nama User</label>
                <input required type="text" name="nama_user" value="<?= $user->nama_user ?>" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Email User</label>
                <input required type="email" value="<?= $user->email_user ?>" name="email_user"  class="form-control"/>
            </div>
            <div class="form-group">
                <label for="">Role User</label>
                <select name="role_user" id="" required class="form-control">
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="mahasiswa">Mahasiswa</option>
                </select>
            </div>
            <div>
                  <input type="hidden" name="id_user"  value="<?= $user->id_user ?>" />
                <input type="submit" name="submit" value="Simpan" class="btn btn-cons btn-primary">
            </div>
          
        </form>
    </div>
<!--    <div class="card-footer">
        <button id="btn-save-user" type="button" class="btn btn-success">
            <i class="fas fa-save"></i> Simpan
        </button>
    </div>-->
</div>
<script>
    $(function () {
        $("#btn-save-user").on("click", function () {
            let validate = $("#form-update-user").valid();
            if (validate) {
                $("#form-update-user").submit();
            }
        });
        $("#form-update-user").validate({
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
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
