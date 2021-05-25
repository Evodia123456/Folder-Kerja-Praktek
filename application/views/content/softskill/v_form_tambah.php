<div class="card">
    <div class="card-header">
        <h4> Form Tambah Softskill</h4>
    </div>
    <div class="card-body">

        <form id="form-tambah-mhs" enctype="multipart/form-data" method="post"
            action="<?=site_url("softskill/prosesTambah")?>">
            <div class="card-body">
                <form id="form-tambah-mhs" enctype="multipart/form-data" method="post"
                    action="<?=site_url("mahasiswauser/proses_simpan")?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis</label>
                            <select class="form-control" id="jenis" name="jenis">
                                <option value="" disabled selected> Pilih Jenis</option>
                                <?php
foreach ($jenis as $j) {
    echo "<option value='" . $j->jenis_id . "'>" . $j->nama_jenis . "</option>";
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
                            <label>Perolehan</label>
                            <select class="form-control" name="perolehan" id="perolehan">
                                <option value="" disabled selected> Pilih Perolehan</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input type="input" class="form-control" name="nama" id="nama" placeholder="Nama Kegiatan">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kegiatan</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                placeholder="Tanggal Kegiatan">
                        </div>
                        <div class="form-group">
                            <label>IPK</label>
                            <input type="number" inputmode="number"  class="form-control" step="0.01" name="ipk" id="ipk"
                                placeholder="IPK">
                        </div>
                        <div class="form-group">
                            <div class="form-group">

                                <label for="gambar">Gambar </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="gambar" class="custom-file-input" id="gambar">
                                        <label class="custom-file-label" for="gambar-softskill">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="btn-save-mhs" type="button" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a class="btn btn-secondary" href="<?=site_url("softskill")?>">Batal</a>
                    </div>
                </form>
            </div>
    </div>
    <script>
    $(document).ready(function() {
        $("#btn-save-mhs").on("click", function() {
            let validate = $("#form-tambah-mhs").valid();
            if (validate) {
                $("#form-tambah-mhs").submit();
            }
        });
        $("#jenis").change(function() {
            $("#tingkat").hide();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("/jenis/subJenis"); ?>",
                data: {
                    jenis_id: $("#jenis").val()
                },
                dataType: "json",
                success: function(response) {
                    $("#tingkat").html(response.listTingkat).show();
                }
            });
        });
        $("#tingkat").change(function() {
            $("#perolehan").hide();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url("/jenis/subTingkat"); ?>",
                data: {
                    tingkat_id: $("#tingkat").val()
                },
                dataType: "json",
                success: function(response) {
                    $("#perolehan").html(response.ListPerolehan).show();
                }
            });
        });

    });
    </script>