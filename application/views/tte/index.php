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
                        <th>Nomor Surat</th>
                        <th>Tanggal</th>
                        <th>Tujuan</th>
                        <th>Nama File</th>
                        <th>Status</th>
                        <th>Actions</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama_surat ?></td>
                            <td><?php echo $data->klasifikasi; ?>/<?php echo $data->nomorurut == 0 ?"<b>Pending</b>" : "$data->nomorurut"; ?>/<?php echo $data->module== "Diskominfo" ?"35.73.04.1007" : "$data->nomorurut"; ?>/<?= date('Y') ?> <br> <small>Status TTE : <?=$data->tte_oleh=="" ? "Proses":"$data->tte_oleh"?></small></td>
                            <td width="120px"><?= $data->tanggal ?></td>
                            <td><?= $data->tujuan ?></td>
                            <td><?= $data->nama_file ?></td>
                            <td width="200">Sekdin :<?php echo $data->verifikator3 == 0 ?"Pending" : "<b>Terverifikasi</b>"; ?><br> Kadin : <?php echo $data->verifikator4 == 0 ?"Pending" : "<b>Terverifikasi</b>"; ?></td>
                            <td width="150px">
                            <?php if($this->fungsi->user_login()->level==1){ ?>
                                <!-- <a href="<?=base_url('tte/verifikasi/'.$data->id)?>" class="btn btn-warning btn-xs" onclick="return confirm('Apakah anda yakin memberi TTE surat ini?')"><i class="fas fa-edit"></i> TTE</a> -->
                                <a class="btn btn-success btn-xs btn-flat" href="<?php echo base_url(); ?>tte/download/<?php echo $data->id; ?>">Download</a>
                            <?php }?>
                            <?php if($this->fungsi->user_login()->level==6){ ?>
                                <a href="<?=base_url('tte/verifikasi/'.$data->id)?>" class="btn btn-warning btn-xs" onclick="return confirm('Apakah anda yakin memberi TTE surat ini?')"><i class="fas fa-edit"></i> TTE</a>
                                <a class="btn btn-success btn-xs btn-flat" href="<?php echo base_url(); ?>tte/download/<?php echo $data->id; ?>">Download</a>
                            <?php }?>
                            <?php if($this->fungsi->user_login()->level==5){ ?>
                                <a href="<?=base_url('tte/verifikasi/'.$data->id)?>" class="btn btn-warning btn-xs" onclick="return confirm('Apakah anda yakin memberi TTE surat ini?')"><i class="fas fa-edit"></i> TTE</a>
                                <a class="btn btn-success btn-xs btn-flat" href="<?php echo base_url(); ?>tte/download/<?php echo $data->id; ?>">Download</a>
                            <?php }?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>