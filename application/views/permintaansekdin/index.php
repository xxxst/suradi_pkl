<section class="content">
    <div class="card">
        <div class="card-header">
           <small>Silahkan Verifikasi</small> 
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Tanggal</th>
                        <th>Tujuan</th>
                        <th>Nama File</th>
                        <th>Status Anda</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama_surat ?></td>
                            <td width="200px"><?= $data->tanggal ?></td>
                            <td width="150px"><?= $data->tujuan ?></td>
                            <td><?= $data->nama_file ?></td>
                            <td width="115px"><?= $data->verifikator3 == 0 ?"Pending" : "<b>Terverifikasi</b>"?></td>
                            <td><?= $data->ket_verifikator3 ?></td>
                            <td width="180px">
                            <a href="<?php echo base_url();?>permintaansekdin/download/<?php echo $data->id;?>" onclick="return confirm ('Apakah anda akan mendownload file?')" class="btn btn-success btn-xs"><i class="fas fa-save"></i> Download</a>   
                            <a href="<?=site_url('permintaansekdin/verifikasi/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin verifikasi data?')" class="btn btn-info btn-xs"><i class="fas fa-file-signature"></i> Verifikasi</a>
                            <a href="<?=site_url('permintaansekdin/edit/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin verifikasi data?')" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Revisi</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>