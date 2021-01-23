<div class="card">
        <div class="card-header">
        Form Ubah
        </div>
   
      
        <div class="card-body">
            Nama Kegiatan : <?= $softskill->nm_kegiatan ?>
        </div>
        <div class="card-body">
           Tanggal Kegiatan : <?= $softskill->tgl_kegiatan ?>
        </div>
        
        <div class="card-body">
            gambar : <?= $softskill->gambar ?>
        </div>
        <!-- /.card-body -->

        <a class="btn btn-danger" href="<?= site_url("softskill/prosesHapus/$softskill->id_softskill") ?>">Hapus Data softskill</a>
        <a class="btn btn-white" href="<?= site_url("softskill") ?>">Batal</a>

    </div>
</div>