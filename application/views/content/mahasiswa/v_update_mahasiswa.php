<div class="card">
    <div class="card-header">
        <h4>Update Mahasiswa</h4>
    </div>
    <div class="card-body">
        <form id="form-update" enctype="multipart/form-data" method="post"
            action="<?=site_url("mahasiswa/proses_update")?>">
            <div class="form-group">
                <label for="">NIM</label>
                <input value="<?=$mhs->nim?>" required type="text" name="nim" id="nim" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <input value="<?=$mhs->nama?>" required type="text" name="nama" id="nama" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk" value="<?=$mhs->jk?>">
                    <option disabled selected>Pilih Kelamin</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Alamat</label>
                <input value="<?=$mhs->alamat?>" required type="text" name="alamat" id="alamat" class="form-control" />
            </div>

            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input required type="date" value="<?=$mhs->tgl_lahir?>" name="tgl_lahir" id="tgl_lahir"
                    class="form-control" />
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input required type="email" name="email" value="<?=$mhs->email?>" id="email" class="form-control" />
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input required type="password" name="password" value="<?=$mhs->password?>" id="password"
                    class="form-control" />
            </div>

            <div class="form-group">
                <label for="gambar">Gambar Mahasiswa</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="gambar" class="custom-file-input" value="<?=$mhs->gambar?>"
                            id="gambar">
                        <label class="custom-file-label" for="gambar">Choose file</label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="<?=$mhs->id_mahasiswa?>" />
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