<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="<?=base_url('crud/add')?>" class="btn btn-success btn-flat btn-xs"><i class="fas fa-plus"></i> Tambah User</a>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Nomor Hp</th>
                        <th>Tanggal Izin</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama ?></td>
                            <td><?= $data->nip ?></td>
                            <td>0<?= $data->nomorhp ?></td>
                            <td><?= $data->tglizin ?></td>
                            <td><?= $data->keterangan ?></td>
                            <td width="80px">
                                <a href="<?=site_url('crud/edit/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin edit data?')" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                <a href="<?=site_url('crud/delete/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin hapus data?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>