<section class="content">
    <div class="card">
        <div class="card-header">
            <h6>Data Surat DISKOMINFO</h6>
            <a href="<?= site_url('managemensurat/tambahdatasurat') ?>" class="btn btn-success btn-flat btn-sm"><i class="fas fa-plus"></i> Tambah Data Surat</a>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Klasifikasi</th>
                        <th>Module</th>
                        <th>Nama File</th>
                        <th>Status</th>
                        <th>Diunggah Pada</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->namasurat ?></td>
                            <td><?= $data->klasifikasi ?></td>
                            <td><?= $data->module?></td>
                            <td><?= $data->nama_berkas?></td>
                            <td><?= $data->is_active == 1 ? "Aktif" : "Tidak Aktif"?></td>
                            <td width="160px"><?= $data->created_at?></td>
                            <td width="80px">
                                <a data-toggle="modal" data-target="#edit<?=$data->id?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                <a href="<?=site_url('managemensurat/delete/'.$data->id)?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php foreach($row->result() as $key => $data){ ?>
    <div class="modal fade" id="edit<?=$data->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="<?=base_url('managemensurat/prosesupload')?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Surat</label>
                        <input type="text" name="tglnaskah" class="form-control" value="<?=$data->namasurat?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama Surat</label>
                        <input type="text" name="tglnaskah" class="form-control" value="<?=$data->klasifikasi?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>File Surat</label>
                        <input type="file" name="berkas">
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