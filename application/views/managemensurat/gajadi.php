<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="<?=base_url('managemensurat/halamantambahsurat')?>" class="btn btn-success btn-flat btn-xs"><i class="fas fa-plus"></i> Tambah Surat</a>
        </div>
        <div class="card-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Surat</th>
                        <th>Kode Klasifikasi</th>
                        <th>Nama Klasifikasi</th>
                        <th>Module</th>
                        <th>File</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $id=1; foreach($row->result() as $key => $data){ ?>
                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $data->namasurat ?></td>
                            <td><?= $data->kodeklasifikasi ?></td>
                            <td><?= $data->namaklasifikasi ?></td>
                            <td><?= $data->module ?></td>
                            <td><?= $data->file ?></td>
                            <td width="80px">
                                <form action="<?=site_url('managemensurat/deletesurat')?>" method="POST">
                                <a href="<?=site_url('managemensurat/halamanteditsurat/'.$data->id) ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
                                    <input type="hidden" name="id" value="<?=$data->id?>">
                                    <button class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>