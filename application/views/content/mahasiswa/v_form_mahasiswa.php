<div class="card">
    <div class="card-header">
        <h4>Tambah Mahasiswa User</h4>
    </div>
    <div class="card-body">
        <form id="form-tambah-mhs" enctype="multipart/form-data" method="post"
            action="<?=site_url("mahasiswa/proses_simpan")?>">
            <div class="form-group">
                <label for="nim">NIM Mahasiswa</label>
                <input required type="text" value="" name="nim" id="nim" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Nama Mahasiswa</label>
                <input required type="text" value="" name="nama" id="nama" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control" id="jk" name="jk">
                    <option disabled selected>Pilih Kelamin</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea required type="text" name="alamat" id="alamat" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input required type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" />
            </div>


            <div class="form-group">
                <label for="">Email</label>
                <input required type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input required type="password" name="password" id="password" class="form-control" />
            </div>
            <div class="form-group">
                <label for="gambar">Gambar </label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="gambar" class="custom-file-input" id="gambar">
                        <label class="custom-file-label" for="gambar-mhs">Choose file</label>
                    </div>
                </div>
            </div>
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
    $("#btn-save-mhs").on("click", function() {
        let validate = $("#form-tambah-mhs").valid();
        if (validate) {
            $("#form-tambah-mhs").submit();
        }
    });
    $("#form-tambah-mhs").validate({
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