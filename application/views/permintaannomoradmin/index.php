<section class="content">
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
                    <th>Status Verifikasi</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach($row->result() as $row){?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->nama_surat; ?></td>
                        <td><?php echo $row->penandatanganan; ?></td>
                        <td><?php echo $row->nomorurut == 0 ?"Pending" : "<b>$row->nomorurut</b>"; ?></td>
                        <td>Sekdin :<?php echo $row->verifikator3 == 0 ?"Pending" : "<b>Terverifikasi</b>"; ?><br> Kadin : <?php echo $row->verifikator4 == 0 ?"Pending" : "<b>Terverifikasi</b>"; ?></td>
                        <td><?php echo $row->klasifikasi; ?>/<?php echo $row->nomorurut == 0 ?"<b>Pending</b>" : "$row->nomorurut"; ?>/<?php echo $row->module== "Diskominfo" ?"35.73.04.1007" : "$row->nomorurut"; ?>/<?= date('Y') ?></td>
                        <td>
                        <?php if($this->fungsi->user_login()->level==1){ ?>
                            <a href="<?=base_url('permintaannomoradmin/tambahnomor/'.$row->id)?>" class="btn btn-warning btn-flat btn-xs"><i class="fas fa-edit"></i> Isi Nomor Surat</a>
                        <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>