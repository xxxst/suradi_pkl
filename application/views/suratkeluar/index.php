<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="<?=base_url('suratkeluar/add')?>" class="btn btn-success btn-flat btn-xs"><i class="fas fa-plus"></i> Tambah Surat Keluar</a>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Penandatanganan</th>
                        <th>Tujuan Surat</th>
                        <th>Keterangan</th>
                        <th>Nama File</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td width="5px"><?= $id++ ?></td>
                            <td width="200px"><?= $data->nama_surat ?></td>
                            <td width="200px"><?= $data->tanggal ?></td>
                            <td><?= $data->penandatanganan ?></td>
                            <td><?= $data->tujuan ?></td>
                            <td><?= $data->keterangan ?></td>
                            <td><?= $data->nama_file ?></td>
                            <td width="100px">
                                <a href="<?php echo base_url();?>suratkeluar/download/<?php echo $data->id;?>" onclick="return confirm ('Apakah anda akan mendownload file?')" class="btn btn-success btn-xs"><i class="fas fa-save"></i></a>
                                <a href="<?=site_url('suratkeluar/edit/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin edit data?')" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                <a href="<?=site_url('suratkeluar/delete/'.$data->id) ?>" onclick="return confirm ('Apakah anda yakin hapus data?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <embed width="960" height="450" href="<?php echo base_url();?>suratkeluar/preview/<?php echo $data->id;?>".uploads/surat_keluar/diskominfo-210813-aac273182e.pdf" type="application/pdf"></embed>
        <!-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"6807ffc33cba4993","version":"2021.8.1","r":1,"token":"1ef4d2b656e941dc9d0531846d5b4bcc","si":10}'></script> -->
    </div>
</section>