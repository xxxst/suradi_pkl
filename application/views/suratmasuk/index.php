<section class="content">
    <div class="card">
        <div class="card-header">
            <h6>Data Surat Masuk</h6>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Penandatanganan</th>
                        <th>Keterangan</th>
                        <th>Nomor Surat</th>
                        <th>Aksi</th>
                        
                </tr>
                </thead>
                <tbody>
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama_surat ?></td>
                            <td width="200px"><?= $data->tanggal_surat ?></td>
                            <td width="200px"><?= $data->penandatanganan ?></td>
                            <td width="200px"><?= $data->keterangan ?></td>
                            <td width="200px"><?= $data->nomor_surat ?></td>
                            <td width="200px">

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>