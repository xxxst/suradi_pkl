<section>
    <a class="btn btn-success btn-flat btn-sm" href="<?php echo base_url(); ?>suratkeluar/create"><i class="fas fa-plus"></i> Tambah Surat Baru</a>
    <hr/>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped" id="example3" width="75%" style="text-align:center;">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Surat</th>
                    <th>Penandatanganan</th>
                    <th>Nomor Urut</th>
                    <th>Nomor Surat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($namafile->result() as $row){?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->nama_surat; ?></td>
                        <td><?php echo $row->penandatanganan; ?></td>
                        <td><?php echo $row->nomorurut; ?></td>
                        <td><?php echo $row->klasifikasi; ?>/<?php echo $row->nomorurut; ?>/<?php echo $row->module; ?>/<?= date('Y') ?></td>
                        <td>
                        <?php if($this->fungsi->user_login()->level==1){ ?>
                            <a class="btn btn-warning btn-flat btn-xs" data-toggle="modal" data-target="#edit<?=$row->id?>"><i class="fas fa-edit"></i> Isi Nomor Surat</a>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php foreach($namafile->result() as $row){ ?>
    <div class="modal fade" id="edit<?=$row->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Nomor Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="<?=base_url('tambahnomor/update')?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Surat</label>
                        <input type="text" name="nama_surat" class="form-control" value="<?=$row->nama_surat?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Surat</label>
                        <input type="text" name="jenissurat" class="form-control" value="<?=$row->jenissurat?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nomor Urut</label>
                        <input type="text" name="nomorurut" class="form-control" value="<?=$row->nomorurut?>">
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

</section>

