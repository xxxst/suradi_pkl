<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="<?=base_url('suratkeluar/add')?>" class="btn btn-success btn-flat btn-xs"><i class="fas fa-plus"></i> Tambah Surat Keluar</a>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Tujuan Surat</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama_surat ?></td>
                            <td><?php echo $data->klasifikasi; ?>/<?php echo $data->nomorurut == 0 ?"<b>Pending</b>" : "$data->nomorurut"; ?>/<?php echo $data->module== "Diskominfo" ?"35.73.04.1007" : "$data->nomorurut"; ?>/<?= date('Y') ?> <br> <small>Status TTE : <?=$data->tte_oleh=="" ? "Proses":"$data->tte_oleh"?></small></td> 
                            <td width="200px"><?= $data->tanggal ?></td>
                            <td width="200px"><?= $data->tujuan ?></td>
                            <td><?= $data->keterangan ?></td>
                            <td width="160px">
                                <a href="<?php echo base_url();?>suratkeluar/download/<?php echo $data->id;?>" onclick="return confirm ('Apakah anda akan mendownload file?')" class="btn btn-success btn-xs"><i class="fas fa-save"></i> Download</a>
                                <a href="<?=site_url('pendistribusian/kirim/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin mengirim surat?')" class="btn btn-info btn-xs"><i class="fas fa-paper-plane"></i> Kirim</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>