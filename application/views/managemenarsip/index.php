<section class="content">
    <div class="card">
        <div class="card-header">
            <h6>Arsip Surat DISKOMINFO</h6>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Tanggal</th>
                        <th>Tujuan</th>
                        <th>Status</th>
                        <th>Nama File</th>
                        <th>Actions</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama_surat ?></td>
                            <td width="100px"><?= $data->tanggal ?></td>
                            <td width="100px"><?= $data->tujuan ?></td>
                            <td width="160px"><?= $data->verifikator4 == 0 ?"Belum Terverifikasi" : "<b>Terverifikasi</b>"?></td>
                            <td><?= $data->nama_file ?></td>
                            <td width="110px">
                                <a href="" class="btn btn-warning btn-xs btn-flat"><i class="fas fa-edit"></i></a>
                                <a href="<?=base_url('suratkeluar/delete/'.$data->id)?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin menghapus data naskah ini?')"><i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-success btn-xs btn-flat"><i class="fas fa-cloud-download-alt"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>