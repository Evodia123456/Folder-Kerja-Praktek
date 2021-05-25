<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4>Daftar Softskill</h4>
        <a href="<?php echo base_url('softskill/print') ?>" class="active btn btn-primary" target="_blank">
            <i class="fas fa-print"></i> Print Pdf
        </a>
        <a href="<?php echo base_url('softskill/export') ?>" class="active btn btn-success" target="_blank">
            <i class="fas fa-print"></i> Export Excel
        </a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM Mahasiswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Total Poin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                    </tfoot>
                    <tbody>
                        <?php
$no = 1;
foreach ($daftarSoftskil as $row) {?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$row->nim?></td>
                            <td><?=$row->nama?></td>
                            <td> <span class="badge badge-primary badge-pill"><?=$row->total?></span></td>
                            <td>
                                <a class="btn btn-sm btn-warning" data-nama="$row->nama"
                                    href="<?=site_url('softskill/detail/' . $row->mahasiswa)?>">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>