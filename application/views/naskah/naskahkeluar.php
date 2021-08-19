<?= $this->session->flashdata('pesan'); ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('naskahkeluar/t_naskahkeluar') ?>" class="btn btn-success btn-xs btn-flat"><i class="fas fa-plus"> Tambah Naskah Keluar</i></a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example3" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal Naskah</th>
                <th>Penandatanganan</th>
                <th>Klasifikasi</th>
                <th>Jenis Naskah</th>
                <th>Tujuan Surat</th>
                <th>Keterangan</th>
                <th>Dibuat</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $id=1;
        foreach($naskahkeluar as $nk): ?>
        <tbody>
            <tr>
                <td><?= $id++ ?></td>
                <td><?= $nk->tglnaskah ?></td>
                <td><?= $nk->penandatanganan ?></td>
                <td><?= $nk->klasifikasi ?></td>
                <td><?= $nk->jenisnaskah ?></td>
                <td><?= $nk->tujuansurat ?></td>
                <td><?= $nk->keterangan ?></td>
                <td><?= $nk->created_at ?></td>
                <td>
                    <button data-toggle="modal" data-target="#edit<?=$nk->id?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                    <a href="<?=base_url('naskahkeluar/deletenaskahkeluar/'.$nk->id)?>" class="btn btn-danger btn-sm" 
                    onclick="return confirm('Apakah anda yakin menghapus data naskah ini?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>  
        </tbody>
        <?php endforeach ?>
        </table>
    </div>   
</div>  

<!-- Modal Edit -->
<?php foreach($naskahkeluar as $nk){ ?>
<div class="modal fade" id="edit<?=$nk->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Naskah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?=base_url('naskahkeluar/editinputnaskahkeluar/'.$nk->id)?>" method="POST">
                <div class="form-group">
                    <label>Tanggal Naskah</label>
                    <input type="date" name="tglnaskah" class="form-control" value="<?=$nk->tglnaskah?>">
                    <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
                </div>
                <div class="form-group">
                    <label>Penandatanganan</label>
                    <input type="text" name="penandatanganan" class="form-control" value="<?=$nk->penandatanganan?>">
                    <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
                </div>
                <div class="form-group">
                    <label>Klasifikasi</label>
                    <input type="text" name="klasifikasi" class="form-control" value="<?=$nk->klasifikasi?>">
                    <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
                </div>
                <div class="form-group">
                    <label>Jenis Naskah</label>
                    <input type="text" name="jenisnaskah" class="form-control" value="<?=$nk->jenisnaskah?>">
                    <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
                </div>
                <div class="form-group">
                    <label>Tujuan Surat</label>
                    <input type="text" name="tujuansurat" class="form-control" value="<?=$nk->tujuansurat?>">
                    <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="<?=$nk->keterangan?>">
                    <?= form_error('tglnaskah','<div class="text-small text-danger">','</div>') ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>