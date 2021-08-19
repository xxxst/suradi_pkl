<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="<?=base_url('managemensurat/add')?>" class="btn btn-success btn-flat btn-xs"><i class="fas fa-plus"></i> Tambah Data</a>
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
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama_surat ?></td>
                            <td><?= $data->klasifikasi ?></td>
                            <td><?= $data->module ?></td>
                            <td><?= $data->nama_file ?></td>
                            <td width="100px">
                                <a href="<?php echo base_url();?>managemensurat/download/<?php echo $data->id;?>" onclick="return confirm ('Apakah anda akan mendownload file?')" class="btn btn-success btn-xs"><i class="fas fa-save"></i></a>
                                <a href="<?=site_url('managemensurat/edit/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin edit data?')" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                <a href="<?=site_url('managemensurat/delete/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin hapus data?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>