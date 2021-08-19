<section class="content">
    <div class="card">
        <div class="card-header">
            <h6>Data Surat DISKOMINFO</h6>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Jenis Surat</th>
                        <th>Tanggal</th>
                        <th>Tujuan</th>
                        <th>Nomor Surat</th>
                        <th>Verifikator 1</th>
                        <th>Verifikator 2</th>
                        <th>Verifikator 3</th>
                        <th>Verifikator 4</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama_surat ?></td>
                            <td width="200px"><?= $data->jenissurat ?></td>
                            <td width="120px"><?= $data->tanggal ?></td>
                            <td><?= $data->tujuan ?></td>
                            <td><?php echo $data->klasifikasi; ?>/<?php echo $data->nomorurut == 0 ?"<b>Pending</b>" : "$data->nomorurut"; ?>/<?php echo $data->module== "Diskominfo" ?"35.73.04.1007" : "$data->nomorurut"; ?>/<?= date('Y') ?> <br> <small>Status TTE : <?=$data->tte_oleh=="" ? "Proses":"$data->tte_oleh"?></small></td>
                            <td width="125px"><?= $data->verifikator1 == 0 ?"Pending" : "<b>Sukses</b>"?><br><small><?= $data->ket_verifikator1 ?></small></td>
                            <td width="125px"><?= $data->verifikator2 == 0 ?"Pending" : "<b>Sukses</b>"?><br><small><?= $data->ket_verifikator2 ?></small></td>
                            <td width="125px"><?= $data->verifikator3 == 0 ?"Pending" : "<b>Sukses</b>"?><br><small><?= $data->ket_verifikator3 ?></small></td>
                            <td width="125px"><?= $data->verifikator4 == 0 ?"Pending" : "<b>Sukses</b>"?><br><small><?= $data->ket_verifikator4 ?></small></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>